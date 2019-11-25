// window.onscroll = function() {
// 	if ((window.innerHeight + Math.ceil(window.pageYOffset)) >= document.body.offsetHeight) {
// 		alert('At the bottom!');
// 		console.log("asd");
// 		getPosts(0)
// 	}
// };

var postCount = 0
var canRefresh = false

window.addEventListener("DOMContentLoaded", e => {
	var container = document.getElementById("posts-container")

	Messages.info("loaded infiniter scroll")
	Messages.info(overrideHandle)

	ApiClient.getPosts(postCount, overrideHandle)
		.then(json => {
			Array.from(json).forEach(post => {
                let postEl = new Post(post)
                postEl.render(container)
			})
			canRefresh = true;
			postCount += 15
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
		Messages.push("Fetching more shit")
		var container = document.getElementById("posts-container")

		if (endOfContent)
			return false
		ApiClient.getPosts(postCount, overrideHandle)
			.then(json => {
				console.log(json)
				endOfContent = (json.length > 0) ? false : true
				Array.from(json).forEach(post => {
					let postEl = new Post(post)
					postEl.render(container)
				})
				canRefresh = true;
				postCount += 15
			})
	}
}