<?= Component::load("GlobalHeader", ["title" => "Reset Password"]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>

<style>
.right-inner-addon {
    position: relative !important;
}

.right-inner-addon img {
    position: absolute !important;
    right: 0px;
    padding: 10px 12px;
	height: 100%;
	filter: opacity(50%);
}
</style>

<div class="columns" style="margin-top: 3rem">
    <div  class="column is-offset-3 is-half box" style="padding: 1.5rem">
    <form id="reset-password-form">

        <div class="field is-horizontal">
            <div class="field-label grow-1 is-normal">
                <label class="label">New Password</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded right-inner-addon">
                        <input id="password-field" 
                                name="password" 
                                class="input" 
                                type="password"
                                minlength="8"
                                maxlength="32">
                        <img id="password-show-hide" class="hidden" src="/img/icons8-show-password-48.png">
                    </p>
                </div>
            </div>
        </div>

        <div class="box has-background-warning has-text-centered">
        A password should be <strong>at least 8 characters</strong> in length and <strong>contain at least</strong>:<br/> 
        a <strong>special character</strong>,
        a <strong>number</strong> and a <strong>capital letter</strong>.
        </div>

        <div class="buttons">
            <button id="reset-password" class="button is-primary">Reset</button>
        </div>
    </div>
    </form>
    <div id="errors"></div>
    </div>
</div>


<script>

function login(event)
{
    var form = document.getElementById("reset-password-form");
    if (form.reportValidity())
    {
        let formData = JSON.stringify(Object.fromEntries(new FormData(form)))
    
        Api.post("/users/update_password", formData)
            .then(resp => {
                Messages.info(resp.message)
                if (resp.success)
                {
                    setTimeout(() => {
                        window.location.href = "/login"
                    }, 1000);
                }
            })
    }
    event.preventDefault()
}

document.getElementById("reset-password-form").addEventListener("submit", login)

</script>

<script src="/js/password-show-hide.js"></script>

<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>