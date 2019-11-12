function likeImage() {

    var image = document.getElementById("like-image")

    var liked = (image.classList.contains("liked")) ? true : false

    if (liked) 
    {
        image.src = "img/unliked.png";
        image.classList.remove("liked")
    }
    else 
    {
        image.src = "img/liked.png";
        image.classList.add("liked")
    }
}