var submit = document.getElementById("save-post")

submit.onclick = function(event)
{
    data = {
        layers: [],
        comment: ""   
    }
    Array.from(document.querySelectorAll("canvas")).forEach(canvas => {
        canvas.is_active = false;
        canvas.draw();
        data.layers.push(canvas.toDataURL())
    })

    ApiClient.savePost(data)
        .then(resp => {
            console.log(resp)
            if (resp.success)
                Messages.push(resp.message)
            else
                Messages.push(resp.message)
        })
}