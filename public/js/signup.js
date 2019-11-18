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

// Starting front end validation... Not yet working
// var emailInput = document.getElementById("email-field");
// var passwordInput = document.getElementById("password-field");
// var repeatPasswordInput = document.getElementById("repeat-password-field");

// emailInput.onfocus = function () {
// 	document.getElementById("email-message").display = "block"
// }

// emailInput.onblur = function() {
// 	document.getElementById("email-message").display = "none"
// }

// emailInput.onkeyup = function() {
// 	document.getElementById("email-message").innerHTML = "Something here..."
// }

var emailInput = document.getElementById("email-field")
var emailMessage = document.getElementById("email-message")

emailInput.onfocus = function() {
	emailMessage.style.display = "block";
	emailMessage.innerHTML = "";
}

emailInput.onblur = function() {
	var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var test = re.test(emailInput.value);

	if (test) {
		emailMessage.style.display = "none";
		emailInput.classList.remove("is-danger");
		emailInput.classList.add("is-success");
	}
	else {
		emailMessage.innerHTML = "Invalid email format. Please try again."
		emailInput.classList.remove("is-success");
		emailInput.classList.add("is-danger");
	}
}