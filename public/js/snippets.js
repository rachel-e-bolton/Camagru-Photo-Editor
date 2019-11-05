function loadSnippet(name)
{
	var modal = document.getElementById("modal")
	var modalContent = document.getElementById("modal-content")

	fetch(`/snippets/load/${name}`)
		.then((resp) => resp.text())
		.then(data => {
			console.log(data)
			modalContent.innerHTML = data
			modal.classList.toggle("is-active")

		})
		.catch(err => {
			console.log(err)
		})

}