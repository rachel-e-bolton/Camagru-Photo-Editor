var posts = document.querySelector(".posts")

document.querySelectorAll(".post-container").forEach(el => {
	el.onclick = function ()
	{
		Array.from(document.querySelectorAll(".post-info")).forEach(pi => {
			pi.remove()
		})

		var container = document.querySelector(".posts")
		var ipr = Math.floor(container.offsetWidth / this.offsetWidth)
		var posts = Array.from(document.querySelectorAll(".post-container"))
		var index = posts.indexOf(this)

		while (this.offsetTop == posts[index].offsetTop)
		{
			index++;
			if (index >= posts.length)
				break
		}
		posts[index + 1].insertAdjacentHTML(
			"afterend", `
				<div class="post-info">
					<div class="image">Image Here</div>
					<div class="comments">Comments here</div>
				</div>
			`
		)
	}

})