
// interact with camagru canvas here

var viewPanel = document.getElementById("view")
var fileInput = document.getElementById("file-in")
var webStream = null


function newLayer(src, id = "sticker")
{
	var canvas = document.createElement("canvas", {is : "camagru-canvas"})
	
	canvas.width = 600
	canvas.height = 600
	canvas.id = id
	if (src instanceof HTMLVideoElement)
		canvas.addVideoSnap(src)
	else
		canvas.addImage(src)
	canvas.activate()
	
	viewPanel.appendChild(canvas)
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
			console.log(error);
		  });
	  }
	viewPanel.appendChild(video)
}