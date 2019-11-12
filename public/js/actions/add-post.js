console.log("Add POst JS laoded")


var submit = document.getElementById("save-post")

submit.onclick = function(event)
{
    layers = []
    Array.from(document.querySelectorAll("canvas")).forEach(canvas => {
        layers.push(canvas.toDataURL())
    })

    ApiClient.savePost(layers)
}