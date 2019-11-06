var currentSlide = 0;
var slides = document.querySelectorAll(".slide")
var count = slides.length

function nextSlide()
{
	slides[currentSlide].classList.remove("center")
	slides[currentSlide].classList.add("left")
	currentSlide++;
	slides[currentSlide].classList.remove("right")
	slides[currentSlide].classList.add("center")
}

function previousSlide()
{
	slides[currentSlide].classList.remove("center")
	slides[currentSlide].classList.add("right")
	currentSlide--;
	slides[currentSlide].classList.remove("left")
	slides[currentSlide].classList.add("center")
}

document.getElementById("handle").addEventListener("keypress", event => {
	if ([" ", "/", "."].includes(event.key))
		event.preventDefault()
	event.target.classList.remove("is-danger")
})


document.getElementById("handle").addEventListener("blur", event => {
	var val = event.target.value;

	if (val.length > 3)
	{
		fetch(`/users/handleExists/${val}`)
			.then(response => {return response.json()})
			.then(data => {
				if (data.status)
					event.target.classList.remove("is-danger")
				else
					event.target.classList.add("is-success")
			})
	}
})


function handleErrors(response) {
	if (!response.ok) {
		throw Error(response.statusText);
	}
	return response;
}

function createUser(formId)
{
	ApiClient.createUser(formId)
	.then(data => {
		if (data.success)
			window.location.href = "/login";
	})
	.catch(err => {
		console.log(err)
    })
}