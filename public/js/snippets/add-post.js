console.log("hello");

// const constraints = {
// 	video: true
// };

// const video = document.querySelector('video');

// navigator.mediaDevices.getUserMedia(constraints)
// 	.then((stream) => {video.srcObject = stream});


step_start = document.getElementById("step-start")
step_file  = document.getElementById("step-file")
step_webcam  = document.getElementById("step-webcam")
step_canvas  = document.getElementById("step-canvas")

file_preview = document.getElementById("file-preview")
file_context = file_preview.getContext("2d")
file_input = document.getElementById("file-input")

webcam_preview = document.getElementById("webcam-preview")
webcam_context = file_preview.getContext("2d")



steps = [step_start, step_file, step_webcam, step_canvas]

current_step = step_start

function stepFile()
{
	current_step.classList.remove("active")
	current_step = step_file
	current_step.classList.add("active")
}

function stepWebcam()
{
	current_step.classList.remove("active")
	current_step = step_webcam
	current_step.classList.add("active")
}

file_input.addEventListener("change", (e) => {
	if ( file_input.files && file_input.files[0] ) {
        var FR= new FileReader();
        FR.onload = function(e) {
           var img = new Image();
           img.addEventListener("load", function() {
				clearCanvas(file_context, file_preview)
            	file_context.drawImage(img, 70, 20, 600, 600, 0, 0, 600, 600);
           });
           img.src = e.target.result;
        };       
        FR.readAsDataURL( file_input.files[0] );
    }
}, false);

function clearCanvas(context, canvas) {
	context.clearRect(0, 0, canvas.width, canvas.height);
	var w = canvas.width;
	canvas.width = 1;
	canvas.width = w;
}




// class CanvasImage
// {

// }