var postCount = 0
var canRefresh = false

window.addEventListener("DOMContentLoaded", e => {
	var container = document.getElementById("posts-container")

	ApiClient.getPosts(postCount, overrideHandle)
		.then(json => {

			Array.from(json).forEach(post => {
                let postEl = new Post(post)
                postEl.render(container)
			})
			canRefresh = true;
			postCount += 12
		})
})

var endOfContent = false

window.onscroll = function(event)
{
	if ((window.innerHeight + Math.ceil(window.pageYOffset))
		>= document.body.offsetHeight + 125) {
		
		if (!canRefresh)
			return false;
		canRefresh = false
		var container = document.getElementById("posts-container")

		if (endOfContent)
			return false
		ApiClient.getPosts(postCount, overrideHandle)
			.then(json => {

				endOfContent = (json.length > 0) ? false : true
				Array.from(json).forEach(post => {
					let postEl = new Post(post)
					postEl.render(container)
				})
				canRefresh = true;
				postCount += 12
			})
	}
}
