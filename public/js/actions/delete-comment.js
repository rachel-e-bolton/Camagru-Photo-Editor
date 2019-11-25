function deleteComment(span)
{
    Api.delete(`/comment/delete/${span.id}`)
        .then(resp => {
            if (!resp.success)
                return Messages.error(resp.message)


            let postId = document.getElementById("post-view").dataset.postid
            var comment = span.closest(".comment")

            comment.style.maxHeight = '0';
            comment.style.opacity = '0';
            comment.style.margin = '0';
            comment.style.padding = '0';

            let postThumb = document.getElementById(postId);
            let likesContainer = postThumb.querySelector(".comments > .counter")
            let likesCount = parseInt(likesContainer.innerText)

            likesContainer.innerText = likesCount - 1;


            setTimeout(() => {
                comment.parentNode.removeChild(comment)
            }, 500);

            Messages.info("Comment deleted.")
        })
}