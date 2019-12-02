var passwordInput = document.getElementById("password-field")
var passwordView = document.getElementById("password-show-hide");

passwordView.onclick = function() {
	if (passwordView.classList.contains("hidden")) {
		passwordView.classList.remove("hidden");
		passwordView.classList.add("shown");
		passwordView.src = "/img/icons8-hide-48.png";
		passwordInput.type = "text";
	}
	else if (passwordView.classList.contains("shown")) {
		passwordView.classList.remove("shown");
		passwordView.classList.add("hidden");
		passwordView.src = "/img/icons8-show-password-48.png";
		passwordInput.type = "password";
	}
}

var oldPasswordInput = document.getElementById("old-password")
var oldPasswordView = document.getElementById("old-password-show-hide");

oldPasswordView.onclick = function() {
	if (oldPasswordView.classList.contains("hidden")) {
		oldPasswordView.classList.remove("hidden");
		oldPasswordView.classList.add("shown");
		oldPasswordView.src = "/img/icons8-hide-48.png";
		oldPasswordInput.type = "text";
	}
	else if (oldPasswordView.classList.contains("shown")) {
		oldPasswordView.classList.remove("shown");
		oldPasswordView.classList.add("hidden");
		oldPasswordView.src = "/img/icons8-show-password-48.png";
		oldPasswordInput.type = "password";
	}
}