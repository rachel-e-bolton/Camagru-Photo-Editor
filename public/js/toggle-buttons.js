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