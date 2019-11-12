let errors = document.getElementById("errors")

function login(event)
{
    var form = document.getElementById("login-form");
    if (form.reportValidity())
    {
        var email = document.getElementsByName("email")[0]
    

        ApiClient.loginUser("login-form")
        .then(result => {
            if (result.success)
                return window.location.href='/';
            else
                Messages.push(result.message)
            //    errors.innerHTML = "Login Failed"
        })

    }

    event.preventDefault()

}

document.getElementById("login-form").addEventListener("submit", login)