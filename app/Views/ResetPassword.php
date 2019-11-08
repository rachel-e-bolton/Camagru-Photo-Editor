<?= Component::load("GlobalHeader", ["title" => "Reset Password"]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>

<div class="columns" style="margin-top: 3rem">
    <div  class="column is-offset-3 is-half box" style="padding: 1.5rem">
    <form id="reset-password-form">

        <div class="field is-horizontal">
            <div class="field-label grow-1 is-normal">
                <label class="label">New Password</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control is-expanded">
                        <input name="password" class="input" type="password">
                    </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label grow-1 is-normal">
                <label class="label">Repeat</label>
            </div>
            <div class="field-body">
                <div class="field">
                    <p class="control">
                        <input class="input" type="password">
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

<script src="/js/api.js"></script>
<!-- <script src="/js/errors.js"></script> -->
<script>

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
                errors.innerHTML = "Login Failed"
        })

    }

    event.preventDefault()

}

document.getElementById("login-form").addEventListener("submit", login)

</script>

<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>