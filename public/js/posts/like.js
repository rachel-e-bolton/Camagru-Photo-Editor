function likeImage() {

    let image = document.getElementById("like-image")
    let liked = (image.classList.contains("liked")) ? true : false
    let postId = image.getAttribute('data-id');
    let postThumb = document.getElementById(postId);
    let likesContainer = postThumb.querySelector(".likes > .counter")
    let likesCount = parseInt(likesContainer.innerText)

    if (liked) 
    {
        Api.post("/posts/toggle_like", JSON.stringify({post_id: postId}))
            .then(resp => {
                if (!resp.success)
                    return Messages.error(resp.message)
                
                Messages.info("Like removed")
                image.src = "/img/unliked.png"
                image.classList.remove("liked")

                likesCount--;
                likesContainer.innerText = likesCount;
            })
    }
    else 
    {
        Api.post("/posts/toggle_like", JSON.stringify({post_id: postId}))
            .then(resp => {
                if (!resp.success)
                    return Messages.error(resp.message)
                
                Messages.info("Liked post")
                image.src = "/img/liked.png";
                image.classList.add("liked")

                likesCount++;
                likesContainer.innerText = likesCount;
            })
    }
}

function likeImageMobile() {

    let image = document.getElementById("like-image-mobile")
    let liked = (image.classList.contains("liked")) ? true : false
    let postId = image.getAttribute('data-id');
    let postThumb = document.getElementById(postId);
    let likesContainer = postThumb.querySelector(".likes > .counter")
    let likesCount = parseInt(likesContainer.innerText)

    if (liked) 
    {
        Api.post("/posts/toggle_like", JSON.stringify({post_id: postId}))
            .then(resp => {
                if (!resp.success)
                    return Messages.error(resp.message)
                
                Messages.info("Like removed")
                image.src = "/img/unliked.png"
                image.classList.remove("liked")

                likesCount--;
                likesContainer.innerText = likesCount;
            })
    }
    else 
    {
        Api.post("/posts/toggle_like", JSON.stringify({post_id: postId}))
            .then(resp => {
                if (!resp.success)
                    return Messages.error(resp.message)
                
                Messages.info("Liked post")
                image.src = "/img/liked.png";
                image.classList.add("liked")

                likesCount++;
                likesContainer.innerText = likesCount;
            })
    }
}