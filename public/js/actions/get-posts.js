class Post
{
    post;
    
    constructor(post)
	{
        this.post = post
		this.html = `
			<div onclick="" class="post">
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
					<a href="/home/gallery/${post.handle}" onclick="event.stopPropagation();" class="user">@${post.handle}</a>
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
        container.onclick = viewPost
        container.id = this.post.id
		parent_element.appendChild(container)
	}
}

function getPosts(start = 0, handle = null)
{
	var container = document.getElementById("posts-container")
	posts = []
	ApiClient.getPosts(start, handle)
		.then(json => {
			Array.from(json).forEach(post => {
                let postEl = new Post(post)
                postEl.render(container)
			})
		})
}

function viewPost(event)
{
    document.querySelectorAll(".post-info").forEach(el => {
        el.parentNode.removeChild(el);
    })

    var id = this.id

    var main = this.parentElement.children
    var index = Array.prototype.indexOf.call(main, this)
    
    while (this.offsetTop == main[index].offsetTop)
    {
        index++;
        if (index >= main.length)
            break
    }

    main[index - 1].insertAdjacentHTML(
        "afterend", `
        <div id="post-info" class="post-info"></div>
        `)
    loadPostSnippet("post-info", id)

}
