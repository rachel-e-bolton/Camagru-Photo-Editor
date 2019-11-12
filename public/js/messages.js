class Messages
{
	static push(text, type="error")
	{
		var container = document.getElementById("messages")
		var message = document.createElement("div")
		message.classList.add("notification")
		message.classList.add("is-primary")
		message.classList.add("has-text-centered")
		message.innerText = text;
		container.appendChild(message)

		setTimeout(() => {
			message.parentElement.removeChild(message)
		}, 3000);
	}
}