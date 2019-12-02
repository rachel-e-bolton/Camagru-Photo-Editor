
document.addEventListener("DOMContentLoaded", () => {

    document.getElementById("update-handle-form").onsubmit = updateDetails
    document.getElementById("update-password-form").onsubmit = updatePassword
    document.getElementById("update-email-form").onsubmit = updateEmail
    document.getElementById("update-notifications-form").onsubmit = updateNotifications
    document.getElementById("delete-account-form").onsubmit = deleteAccount

})

function updateDetails(event)
{
    event.preventDefault()
    
    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/update_details", form)
        .then(resp => {
            if (!resp.success)
                Messages.error(resp.message)
            else
            {
                Messages.info(resp.message + " Reloading in 1 second")
                setTimeout(() => {
                    window.location.href = "/accounts/edit"
                }, 1000);
            }
        })
}

function updatePassword(event)
{
    event.preventDefault()

    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/update_password", form)
        .then(resp => {
            if (!resp.success)
                Messages.error(resp.message)
            else
                Messages.info(resp.message)
        })
}

function updateEmail(event)
{
    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/update_email", form)
        .then(resp => {
            if (!resp.success)
                return Messages.error(resp.message)
            
            Messages.info(resp.message)

            setTimeout(() => {
                window.location.href = "/"
            }, 1000);
        })

    event.preventDefault()
}

function updateNotifications(event)
{
    event.preventDefault()
    
    let answer = (document.getElementById("yes").checked) ? true : false;

    Api.post("/accounts/update_notifications", JSON.stringify({answer}))
        .then(resp => {
            if (!resp.success)
                Messages.error(resp.message)
            else
                Messages.info(resp.message)
        })
}

function deleteAccount(event)
{
    event.preventDefault()

    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/delete", form)
        .then(resp => {
            if (!resp.success)
            {
                Messages.error(resp.message)
                let input = document.getElementById("account-password")
                input.value = ""
                input.dispatchEvent(new Event('input'));
                input.focus()
            }
            else
                Messages.info(resp.message)
                setTimeout(() => {
                    document.location.href = "/"
                }, 500);
        })

}