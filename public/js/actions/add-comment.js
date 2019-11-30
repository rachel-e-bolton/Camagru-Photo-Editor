class Comment 
{
    constructor(comment)
    {
        this.html = `
                <figure class="media-left image is-64x64">
                    <p class="">
                    <img class="is-rounded" src="/img/User Icon.png">
                    </p>
                </figure>
                <div class="media-content">
                    <div class="content">
                    <p>
                        <strong>@${comment.handle}</strong> &nbsp; 
                        <span onclick="deleteComment(this)" id="${comment.id}" class="icon-trash is-pulled-right"></span> 
                        <small class="is-pulled-right">${comment.date}</small> 
                            
                        <br>
                        ${comment.comment}
                    </p>
                    </div>
                </div>
        `
    }

    render(parent)
    {
        var container = document.createElement("article")
        container.className = "media comment"
        container.innerHTML = this.html
		parent.prepend(container)
    }
}

function addComment(event)
{
    var comment = document.getElementById("comment-text")
    var postId = comment.dataset.postid

    var data = {
        comment: comment.value,
        post_id: postId
    }

    Api.post("/comment/add", JSON.stringify(data))
    .then(resp => {

        if (!resp.success)
            return Messages.error(resp.message)

        let comment = new Comment(resp.data);
        let parent = document.getElementById("list-comments")
        comment.render(parent)

        let postThumb = document.getElementById(postId);
        let likesContainer = postThumb.querySelector(".comments > .counter")
        let likesCount = parseInt(likesContainer.innerText)

        likesContainer.innerText = likesCount + 1;

    })
}