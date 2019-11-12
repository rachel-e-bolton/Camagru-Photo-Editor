class Comment
{
    constructor(comment)
    {
        this.html = `
            <figure class="media-left image is-64x64">
                <p class="">
                <img class="is-rounded" src="${comment.user.image}">
                </p>
            </figure>
            <div class="media-content">
                <div class="content">
                <p>
                    <strong>@${comment.user.handle}</strong> <small>${comment.date}</small>
                    <br>
                    ${comment.text}
                </p>
                </div>
            </div>
        `
    }

    render(parent)
    {
        var comment = document.createElement("article")
        comment.classList.add("media")
        comment.classList.add("comment")
        comment.innerHTML = this.html
        parent.appendChild(comment)
    }
}