
// interact with camagru canvas here

var viewPanel = document.getElementById("view")
var fileInput = document.getElementById("file-in")
var stickers = document.getElementById("stickers")
var webStream = null
var layers = document.getElementById("layers")

ApiClient.getStickers()
	.then(resp => {
		
		// IF success
		if (resp.success)
		{
			resp.data.forEach(sticker => {
				var img = new Image	
				img.src = sticker.image
				img.class = "sticker"
				img.onclick = stickerClicker
				stickers.appendChild(img)
			});
		}
		else
		{
			console.log(resp.message)
		}
	})


function stickerClicker(event)
{
	newLayer(this.src)
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

	div.innerText = name
	div.appendChild(button)
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
}

fileInput.onchange = function(event)
{
	if (this.files.length)
	{
		removeBaseLayer()
		newLayer(URL.createObjectURL(this.files[0]), "base")
		killVideo()
	}
}

function snapshot()
{
	if (webStream)
	{	
		var video = document.querySelector("video")
		console.log(video)
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
		  })
		  .catch(function (error) {
			Messages.error(error);
		  });
	  }
	viewPanel.appendChild(video)
}