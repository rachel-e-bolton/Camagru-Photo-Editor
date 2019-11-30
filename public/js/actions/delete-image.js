function deleteImage(el)
{
    var id = el.dataset.id

    Api.delete(`/posts/delete/${id}`)
        .then(resp => {
            Messages.info(resp.message)
            if (resp.success)
            {
                setTimeout(() => {
                    window.location.reload(true)
                }, 500);
            }
        })
}