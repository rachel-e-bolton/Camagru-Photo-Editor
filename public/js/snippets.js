const loadScript = (source) => 
{
	return new Promise((resolve, reject) => 
	{
		const script = document.createElement('script')
		document.body.insertAdjacentElement('afterend', script)
		script.onload = resolve(`Loaded ${script}`)
		script.onerror = reject(Error("Failed to load script"))
		script.classList.add("modal-dynamic")
		script.async = true
		script.src = source
	})
}

const loadLink = (source) => 
{
	return new Promise((resolve, reject) => 
	{
		const head = document.getElementsByTagName('head')[0];
		const link = document.createElement('link')
		link.rel = 'stylesheet'  
        link.type = 'text/css'
		link.href = source
		link.classList.add("modal-dynamic")
		head.appendChild(link)
		resolve("css laoded")
	})
}


function loadSnippet(name)
{
	var modal = document.getElementById("modal")
	var modalContent = document.getElementById("modal-content")

	fetch(`/snippets/load/${name}`)
		.then((resp) => resp.text())
		.then(data => {
			modalContent.innerHTML = data
			modal.classList.toggle("is-active")

			// Load any snippet script files
			modal.querySelectorAll("script").forEach(script => {
				if (script.src)
				{
					loadScript(script.src)
					.catch(err => {
						Messages.error(err)
					})
				}
			})

			// Load any css links into head
			modal.querySelectorAll("link").forEach(link => {
				if (link.href)
				{
					loadLink(link.href)
				}
			})

		})
		.catch(err => {
			Messages.error(err)
		})

}

function loadPostSnippet(containerId, postId)
{
	var container = document.getElementById(containerId)
	fetch(`/snippets/post/${postId}`)
		.then((resp) => resp.text())
		.then(data => {
			container.innerHTML = data

			// Load any snippet script files
			container.querySelectorAll("script").forEach(script => {
				if (script.src)
				{
					loadScript(script.src)
					.catch(err => {
						Messages.push(err.message)
					})
				}
			})

			// Load any css links into head
			container.querySelectorAll("link").forEach(link => {
				if (link.href)
				{
					loadLink(link.href)
				}
			})
		})
		.catch(err => {
			Messages.push(err.message)
		})
}