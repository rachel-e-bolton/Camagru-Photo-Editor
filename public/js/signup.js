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
var passwordInput = document.getElementById("password-field")
var passwordMessage = document.getElementById("password-message")
var repeatPasswordInput = document.getElementById("repeat-password-field")
var repeatPasswordMessage = document.getElementById("repeat-password-message")

emailInput.onfocus = function() {
	emailMessage.style.display = "block";
	emailMessage.innerHTML = "";
	emailMessage.style.paddingBottom = "";
}

emailInput.onblur = function() {
	var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var test = re.test(emailInput.value);
	var str = emailInput.value;
	var array = str.split("@");


	if (this.value.length < 3)
		return false
	if (test) {
		if (array[0].length <= 64 && array[1].length <= 255) {
			emailMessage.style.display = "none";
			emailInput.classList.remove("is-danger");
			emailInput.classList.add("is-success");
		}
		else {
			emailMessage.style.paddingBottom = ".5rem";
			emailMessage.innerHTML = "Username or Domain too long. Please try again."
			emailInput.classList.remove("is-success");
			emailInput.classList.add("is-danger");
		}
	}
	else {
		emailMessage.style.paddingBottom = ".5rem";
		emailMessage.innerHTML = "Invalid email format. Please try again."
		emailInput.classList.remove("is-success");
		emailInput.classList.add("is-danger");
	}
}

passwordInput.onfocus = function() {
	passwordMessage.style.display = "block";
	passwordMessage.innerHTML = "";
	passwordMessage.style.paddingBottom = "";
}

passwordInput.onblur = function() {
	var re = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}/;
	var test = re.test(passwordInput.value);

	if (this.value.length < 3)
		return false
	if (test) {
		passwordMessage.style.display = "none";
		passwordInput.classList.remove("is-danger");
		passwordInput.classList.add("is-success");
	}
	else {
		var len = passwordInput.value.length;
		var upper = /(?=.*[A-Z])/;
		var lower = /(?=.*[a-z])/;
		var digit = /(?=.*\d)/;
		var special = /(?=.*[@$!%*?&])/;

		if (len < 8) {
			var msg = "Password is too short.<br/>";
		}
		if (len > 32) {
			var msg = "Password is too long.<br/>"
		}
		if (!(upper.test(passwordInput.value))) {
			msg = msg.concat("Password must contain an UPPERCASE letter.<br/>")
		}
		if (!(lower.test(passwordInput.value))) {
			msg = msg.concat("Password must contain a LOWERCASE letter.<br/>")
		}
		if (!(special.test(passwordInput.value))) {
			msg = msg.concat("Password must contain one of the following SPECIAL CHARACTERS: @$!%*?&.<br/>")
		}
		if (!(digit.test(passwordInput.value))) {
			msg = msg.concat("Password must contain a DIGIT.</br>")
		}

		passwordMessage.style.paddingBottom = ".5rem";
		passwordMessage.innerHTML = msg;
		passwordInput.classList.remove("is-success");
		passwordInput.classList.add("is-danger");
	}
}

repeatPasswordInput.onfocus = function() {
	repeatPasswordMessage.style.display = "block";
	repeatPasswordMessage.innerHTML = "";
	repeatPasswordMessage.style.paddingBottom = "";
}

repeatPasswordInput.oninput = function() {
	if (this.value.length < 3)
		return false
	if (repeatPasswordInput.value === passwordInput.value) {
		repeatPasswordMessage.style.display = "none";
		repeatPasswordInput.classList.remove("is-danger");
		repeatPasswordInput.classList.add("is-success");
		if (emailInput.classList.contains("is-success") && passwordInput.classList.contains("is-success") && repeatPasswordInput.classList.contains("is-success")) {
			document.getElementById("next-button").disabled = false;
			document.getElementById("slide-right").style.display = "";
		}
		else {
			document.getElementById("next-button").disabled = true;
			document.getElementById("slide-right").style.display = "none";
		}
	}
	else {
		repeatPasswordMessage.style.paddingBottom = ".5rem";
		repeatPasswordMessage.innerHTML = "Passwords do not match."
		repeatPasswordInput.classList.remove("is-success");
		repeatPasswordInput.classList.add("is-danger");
		document.getElementById("next-button").disabled = true;
		document.getElementById("slide-right").style.display = "none";
	}
}

var passwordView = document.getElementById("password-show-hide");
var repeatPasswordView = document.getElementById("repeat-show-hide");

passwordView.onclick = function() {
	if (passwordView.classList.contains("hidden")) {
		passwordView.classList.remove("hidden");
		passwordView.classList.add("shown");
		passwordView.src = "img/icons8-hide-48.png";
		passwordInput.type = "text";
	}
	else if (passwordView.classList.contains("shown")) {
		passwordView.classList.remove("shown");
		passwordView.classList.add("hidden");
		passwordView.src = "img/icons8-show-password-48.png";
		passwordInput.type = "password";
	}
}

passwordView.onmouseleave = function() {
	if (passwordView.classList.contains("shown")) {
		passwordView.classList.remove("shown");
		passwordView.classList.add("hidden");
		passwordView.src = "img/icons8-show-password-48.png";
		passwordInput.type = "password";
	}
}

repeatPasswordView.onclick = function() {
	if (repeatPasswordView.classList.contains("hidden")) {
		repeatPasswordView.classList.remove("hidden");
		repeatPasswordView.classList.add("shown");
		repeatPasswordView.src = "img/icons8-hide-48.png";
		repeatPasswordInput.type = "text";
	}
	else if (repeatPasswordView.classList.contains("shown")) {
		repeatPasswordView.classList.remove("shown");
		repeatPasswordView.classList.add("hidden");
		repeatPasswordView.src = "img/icons8-show-password-48.png";
		repeatPasswordInput.type = "password";
	}
}

repeatPasswordView.onmouseleave = function() {
	if (repeatPasswordView.classList.contains("shown")) {
		repeatPasswordView.classList.remove("shown");
		repeatPasswordView.classList.add("hidden");
		repeatPasswordView.src = "img/icons8-show-password-48.png";
		repeatPasswordInput.type = "password";
	}
}

