var passwordInput = document.getElementById("new-password")
var passwordMessage = document.getElementById("password-message")
var repeatPasswordInput = document.getElementById("repeat-new-password")
var repeatPasswordMessage = document.getElementById("repeat-password-message")

passwordInput.onfocus = function() {
	passwordMessage.style.display = "block";
	passwordMessage.innerHTML = "";
	passwordMessage.style.paddingBottom = "";
}

passwordInput.onblur = function() {
	var re = /(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,32}/;
	var test = re.test(passwordInput.value);

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

        if (document.getElementById("old-password").value === passwordInput.value) {
            var msg = "Old and New Passwords cannot match.<br/>";
        }
        else {
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

	if (repeatPasswordInput.value === passwordInput.value) {
		repeatPasswordMessage.style.display = "none";
		repeatPasswordInput.classList.remove("is-danger");
		repeatPasswordInput.classList.add("is-success");
		if (passwordInput.classList.contains("is-success") && repeatPasswordInput.classList.contains("is-success")) {
			document.getElementById("update-password").disabled = false;
		}
		else {
			document.getElementById("update-password").disabled = true;
		}
	}
	else {
		repeatPasswordMessage.style.paddingBottom = ".5rem";
		repeatPasswordMessage.innerHTML = "Passwords do not match."
		repeatPasswordInput.classList.remove("is-success");
		repeatPasswordInput.classList.add("is-danger");
		document.getElementById("update-password").disabled = true;

	}
}

var passwordView = document.getElementById("password-show-hide");
var repeatPasswordView = document.getElementById("repeat-show-hide");

passwordView.onclick = function() {
	if (passwordView.classList.contains("hidden")) {
		passwordView.classList.remove("hidden");
		passwordView.classList.add("shown");
		passwordView.src = "../img/icons8-hide-48.png";
		passwordInput.type = "text";
	}
	else if (passwordView.classList.contains("shown")) {
		passwordView.classList.remove("shown");
		passwordView.classList.add("hidden");
		passwordView.src = "../img/icons8-show-password-48.png";
		passwordInput.type = "password";
	}
}

passwordView.onmouseleave = function() {
	if (passwordView.classList.contains("shown")) {
		passwordView.classList.remove("shown");
		passwordView.classList.add("hidden");
		passwordView.src = "../img/icons8-show-password-48.png";
		passwordInput.type = "password";
	}
}

repeatPasswordView.onclick = function() {
	if (repeatPasswordView.classList.contains("hidden")) {
		repeatPasswordView.classList.remove("hidden");
		repeatPasswordView.classList.add("shown");
		repeatPasswordView.src = "../img/icons8-hide-48.png";
		repeatPasswordInput.type = "text";
	}
	else if (repeatPasswordView.classList.contains("shown")) {
		repeatPasswordView.classList.remove("shown");
		repeatPasswordView.classList.add("hidden");
		repeatPasswordView.src = "../img/icons8-show-password-48.png";
		repeatPasswordInput.type = "password";
	}
}

repeatPasswordView.onmouseleave = function() {
	if (repeatPasswordView.classList.contains("shown")) {
		repeatPasswordView.classList.remove("shown");
		repeatPasswordView.classList.add("hidden");
		repeatPasswordView.src = "../img/icons8-show-password-48.png";
		repeatPasswordInput.type = "password";
    }
}