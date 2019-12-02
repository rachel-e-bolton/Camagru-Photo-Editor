function send_mail()
{
    let name = document.getElementById("name").value
    let handle = document.getElementById("handle").value
    let email = document.getElementById("email").value
    let subject = document.getElementById("subject").value
    let message = document.getElementById("message").value
    let type = document.getElementById("type").value

    let data = JSON.stringify({
        name : name,
        handle : handle,
        email : email,
        subject : subject,
        message : message,
        type : type,
    })

    Api.post("/home/send_mail", data)
        .then(resp => {
            Messages.info(resp.message);
            if (resp.success)
                closeAllModals()
        })

}