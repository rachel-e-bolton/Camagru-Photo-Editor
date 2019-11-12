
document.addEventListener("DOMContentLoaded", event => {
    
    console.log("Loaded Dom")
    

    console.log(document.querySelectorAll(".post-container"))

    
    
    
    
    
    
    document.querySelectorAll(".post-container").forEach(el => {
        el.onclick = function ()
        {
            console.log("asdasd")
            Array.from(document.querySelectorAll(".post-info")).forEach(pi => {
                pi.remove()
            })
            
            //console.log(this)
            var container = document.querySelector(".posts")
            var ipr = Math.floor(container.offsetWidth / this.offsetWidth)
            var posts = Array.from(document.querySelectorAll(".post-container"))
            var index = posts.indexOf(this)
            
            
            console.log(`posts.length = ${posts.length}`)
            while (this.offsetTop == posts[index].offsetTop)
            {
                index++;
                if (index >= posts.length)
				break
            }
            console.log(`selected index = ${index}`)
            postsContainer[index].insertAdjacentHTML(
                "afterend", `
				<div id="post-info" class="post-info">
                <div class="image">Image Here</div>
                <div class="comments">Comments here</div>
				</div>
                `
                )
            }
            
        })
})