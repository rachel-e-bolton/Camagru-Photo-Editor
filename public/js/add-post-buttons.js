function toggleButtonUpload() {

    var uploadButton = document.getElementById("upload-button");
    var selfieButton = document.getElementById("selfie-button");

    if (uploadButton.classList.contains("is-light") && selfieButton.classList.contains("is-primary")) 
    {
        uploadButton.classList.remove("is-light");
        uploadButton.classList.add("is-primary");
        selfieButton.classList.remove("is-primary");
        selfieButton.classList.add("is-light")
    }
    else if (!(uploadButton.classList.contains("is-light") || selfieButton.classList.contains("is-light") || uploadButton.classList.contains("is-primary") || selfieButton.classList.contains("is-primary"))) {
        uploadButton.classList.add("is-primary");
        selfieButton.classList.add("is-light")
    }
}

function toggleButtonSelfie() {

    var uploadButton = document.getElementById("upload-button");
    var selfieButton = document.getElementById("selfie-button");
    

    if (selfieButton.classList.contains("is-light") && uploadButton.classList.contains("is-primary")) 
    {
        selfieButton.classList.remove("is-light");
        selfieButton.classList.add("is-primary");
        uploadButton.classList.remove("is-primary");
        uploadButton.classList.add("is-light")
    }
    else if (!(uploadButton.classList.contains("is-light") || selfieButton.classList.contains("is-light") || uploadButton.classList.contains("is-primary") || selfieButton.classList.contains("is-primary"))) {
        selfieButton.classList.add("is-primary");
        uploadButton.classList.add("is-light")
    }
}

document.getElementById("upload-button").addEventListener("click", stickerListener);
document.getElementById("selfie-button").addEventListener("click", stickerListener);

function stickerListener() {
    var stickers = document.getElementById("stickers");

    if (stickers.style.display == 'none')
    {
        stickers.style.display = '';
    }

    stickers.addEventListener("click", enableCapture);

    function enableCapture() {
        var uploadButton = document.getElementById("upload-button");
        var selfieButton = document.getElementById("selfie-button");
        var captureButton = document.getElementById("capture-button")

        captureButton.classList.remove("is-light");
        captureButton.classList.add("is-primary");


        if (uploadButton.classList.contains("is-primary") || selfieButton.classList.contains("is-primary")) {
            captureButton.disabled = false;
        }
        else {
            captureButton.disabled = true;
        }
    }
}
