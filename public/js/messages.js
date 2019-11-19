class Messages
{
	static push(string, cls="is-info")
	{
		var container = document.getElementById("messages")
		var message = document.createElement("article")
		message.classList.add("message")
		//message.classList.add(cls)

		var header = document.createElement("div")
		header.className = "message-header"

		var text = document.createElement("p")
		text.innerText = string
		
		var button = document.createElement("button")
		button.className = "delete"
		button.onclick = () => {message.parentElement.removeChild(message)}

		header.appendChild(text)
		header.appendChild(button)
		message.appendChild(header)
		
		container.appendChild(message)

		setTimeout(() => {
			message.parentElement.removeChild(message)
		}, 4000);
	}

	static info(text)
	{
		Messages.push(text, "is-info")
	}

	static warning(text)
	{
		Messages.push(text, "is-warning")
	}

	static error(text)
	{
		Messages.push(text, "is-error")
	}
}
