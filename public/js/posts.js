class Post
{
	constructor(post)
	{
		this.html = `
			<div class="post">
				<div class="stats">
					<div class="likes single">
						<img class="icon" src="/img/heart.svg" alt="">
						<div class="counter">${post.like_count}</div>
					</div>
					<div class="stats-spacer"></div>
					<div class="comments single">
						<img class="icon" src="/img/comment.svg" alt="">
						<div class="counter">${post.comment_count}</div>
					</div>
				</div>
				<div class="image">
					<img src="${post.image}">
				</div>
			
			</div>
			<div class="attribution">
					<a href="#" class="user">@${post.handle}</a>
					<div class="date">${post.date}</div>
			</div>
		`
	}

	htmlToElement() {
		var template = document.createElement('template');
		html = this.html.trim();
		template.innerHTML = html;
		this.content = template.content.firstChild;
	}
	

	render(parent_element)
	{
		var container = document.createElement("div")
		container.className = "post-container"
		container.innerHTML = this.html
		parent_element.appendChild(container)
	}
}

function getPosts(handle = null, order = null)
{
	var container = document.getElementById("posts-container")
	posts = []
	ApiClient.getPosts(handle, order)
		.then(json => {
			Array.from(json).forEach(post => {
				posts.push(new Post(post))
			})
			posts.forEach(post => {
				post.render(container)
			})
		})
}

document.addEventListener("DOMContentLoaded", getPosts());