// Assign click handlers on content load
document.addEventListener("DOMContentLoaded", () => {
    
    Messages.info("Loaded")
    
    // Update handle
    document.getElementById("update-handle-form").onsubmit = updateDetails
    document.getElementById("update-password-form").onsubmit = updatePassword
    document.getElementById("update-email-form").onsubmit = updateEmail
    document.getElementById("update-notifications-form").onsubmit = updateNotifications

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
    event.preventDefault()

    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/update_email", form)
        .then(resp => {
            if (!resp.success)
                Messages.error(resp.message)
            else
                window.location.href = "/"
        })
}

function updateNotifications(event)
{
    event.preventDefault()
    
    let form = JSON.stringify(Object.fromEntries(new FormData(this)))

    Api.post("/accounts/update_notifications")
        .then(resp => {
            if (!resp.success)
                Messages.error(resp.message)
            else
                Messages.info(resp.message)
        })
}