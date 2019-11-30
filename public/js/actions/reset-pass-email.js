var form = document.getElementById("reset-password-modal")

form.onsubmit = function (event) {
    event.preventDefault()
    
    Api.post('/users/send_reset', JSON.stringify(Object.fromEntries(new FormData(this))))
        .then(resp => {
            Messages.info(resp.message)
            if (resp.success)
            {
                document.querySelectorAll(".modal-close").forEach(el => {
                    el.click()
                })
            }
        })
}