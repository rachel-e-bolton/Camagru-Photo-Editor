<?= Component::load("GlobalHeader", ["title" => "Log In"]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>

<!-- Development login form with sessions     -->

<!-- <pre>
Session Info Here
<? print_r($_SESSION) ?>

<?php 

?>

</pre>
 -->

<!-- <div class="section login-form">
    <div id="errors"></div>
    <form id="login-form">
        Username <input name="username" class="input" required type="email"><br>
        Password <input name="password" class="input" required type="password"><br>
        <button class="button" id="login" type="button">Login</button>
    </form>
    <a href="/users/logout" class="button primary">Logout</a>
</div> -->

<!-- 

<video autoplay></video> -->

</body>


<div class="columns slide-container" style="margin-top: 3rem">
    <div id="login-form" class="column is-offset-3 is-half box" style="padding: 1.5rem">
        <div style="width: 50%; margin-right: auto; margin-left:auto; padding-left: 1.5rem">
            <img src="/img/camagru..png">
        </div>

        <div class="field is-horizontal">
            <div class="field-label grow-1 is-normal">
                <label class="label">Email</label>
            </div>
            <div class="field-body">
                <div class="field">
                <p class="control is-expanded">
                    <input name="email" class="input" required type="email">
                </p>
                </div>
            </div>
        </div>

        <div class="field is-horizontal">
            <div class="field-label grow-1 is-normal">
                <label class="label">Password</label>
            </div>
            <div class="field-body">
                <div class="field">
                <p class="control is-expanded">
                    <input name="password" class="input" required type="password">
                </p>
                </div>
            </div>
        </div>

        <div class="buttons">
            <button type="button" class="button is-light" onclick="previousSlide()">Back</button>
            <button type="button" class="button is-primary" onclick="loginUser('email')">Log in</button>
        </div>
        </form>
    </div>
</div>

<script src="/js/api.js"></script>
<script src="/js/errors.js"></script>
<script>

let errors = document.getElementById("errors")

document.getElementById("login").addEventListener("click", event => {

    var username = document.getElementsByName("username")[0]

    if (username.value.length < 1)
       errors.innerHTML = "Username cannot be blank"
    else
    {
        ApiClient.loginUser("login-form")
        .then(result => {
            if (result)
                return window.location.href='/';
            else
                errors.innerHTML = "Login Failed"
        })
    }
})



</script>

<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>