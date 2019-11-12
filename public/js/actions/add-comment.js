function addComment(event)
{
    var comment = document.getElementById("comment-text")
    var postId = comment.dataset.postid

    var data = {
        comment: comment.value,
        post_id: postId
    }

    ApiClient.addComment(data)
        .then(resp => {
            console.log(resp)
        })
}