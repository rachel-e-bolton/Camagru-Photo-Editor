const loadScript = (source) => 
{
	return new Promise((resolve, reject) => 
	{
		const script = document.createElement('script')
		document.body.appendChild(script)
		script.onload = resolve(`Loaded ${script}`)
		script.onerror = reject(Error("Failed to load script"))
		script.async = true
		script.src = source
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

			modal.querySelectorAll("script").forEach(script => {
				if (script.src)
				{
					loadScript(script.src)
					.catch(err => {
						console.log("Error", err)
					})
				}
			})
		})
		.catch(err => {
			console.log("Error", err)
		})

}