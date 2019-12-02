
// interact with camagru canvas here

var viewPanel = document.getElementById("view")
var fileInput = document.getElementById("file-in")
var stickers = document.getElementById("stickers")
var webStream = null
var layers = document.getElementById("layers")
var counter = 0;
var cameraReady = false

ApiClient.getStickers()
	.then(resp => {
		
		if (resp.success)
		{
			resp.data.forEach(sticker => {
				var img = new Image	
				img.src = sticker.image
				img.class = "sticker"
				img.id = sticker.name
				img.onclick = stickerClicker
				stickers.appendChild(img)
			});
		}
		else
		{
			Messages.error(resp.message)
		}
	})


function stickerClicker(event)
{
	counter++;
	newLayer(this.src, `${this.id}-${counter}`)
}


function newLayer(src, id = "sticker")
{
	var canvas = document.createElement("canvas", {is : "camagru-canvas"})
	
	canvas.width = 600
	canvas.height = 600
	canvas.style.zIndex = 1
	canvas.id = id
	canvas.is_base = (id === "base")

	if (src instanceof HTMLVideoElement)
		canvas.addVideoSnap(src)
	else
		canvas.addImage(src)
	canvas.activate()

	if (canvas.is_base)
	{
		viewPanel.prepend(canvas)
		addLayerEntryBefore(id)
	}
	else
	{
		viewPanel.appendChild(canvas)
		addLayerEntry(id)
	}
}



function addLayerEntry(name)
{
	var div = document.createElement("div")
	var button = document.createElement("button")

	div.className = "layer"
	button.className = "delete"

	button.onclick = function (event) 
	{
		document.getElementById(name).remove()
		div.remove()
		event.stopPropagation()
	}

	div.onclick = function ()
	{
		document.querySelectorAll("canvas").forEach(canvas => {
			canvas.is_active = false
			canvas.style.zIndex = 1;
			canvas.draw()
		})

		let cnv = document.getElementById(name)
		cnv.is_active = true
		cnv.style.zIndex = 2;
		cnv.draw()
	}

	div.innerText = name
	div.appendChild(button)
	layers.appendChild(div)	
}

function addLayerEntryBefore(name)
{
	var div = document.createElement("div")
	var button = document.createElement("button")

	div.className = "layer"
	button.className = "delete"

	div.onclick = function ()
	{
		document.querySelectorAll("canvas").forEach(canvas => {
			canvas.is_active = false
			canvas.style.zIndex = 1;
			canvas.draw()
		})

		let cnv = document.getElementById(name)
		cnv.is_active = true
		cnv.style.zIndex = 2;
		cnv.draw()
	}

	div.innerText = name
	layers.prepend(div)
}

function uploadFile()
{
	fileInput.click()
}

function killVideo()
{
	if (webStream)
	{
		webStream.getTracks()[0].stop()
		webStream = null
	}
}

function removeBaseLayer()
{
	var base = document.getElementById("base")
	if (base)
		base.parentElement.removeChild(base)

	// Disable post button
	document.getElementById("save-post").disabled = true
}

fileInput.onchange = function(event)
{
	if (this.files.length)
	{
		removeBaseLayer()
		newLayer(URL.createObjectURL(this.files[0]), "base")

		// Enable post button
		document.getElementById("save-post").disabled = false


		killVideo()
	}
}

function snapshot()
{
	if (webStream)
	{	
		var video = document.querySelector("video")
		removeBaseLayer()
		newLayer(video, "base")
		killVideo()
	}
}

function webcam()
{
	removeBaseLayer()
	var video = document.createElement("video")

	video.autoplay = true
	video.id = "base"

	if (navigator.mediaDevices.getUserMedia) {
		navigator.mediaDevices.getUserMedia({ video: { width: 600, height: 600 } })
		  .then(function (stream) {
				webStream = stream
				video.srcObject = stream;
				return new Promise(resolve => video.onloadedmetadata = resolve);
		  })
		  .then(function () {
				document.getElementById("capture-button").disabled = false
		  })
		  .catch(function (error) {
			Messages.error(error);
		  });
	  }
	viewPanel.appendChild(video)
}