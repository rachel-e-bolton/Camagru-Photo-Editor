console.log("Add POst JS laoded")


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
                window.location.href = "/"
            else
                Messages.push(resp.message)
        })
}