<?= Component::load("GlobalHeader", ["title" => "Log In"]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>

<style>
.right-inner-addon {
    position: relative;
}

.right-inner-addon img {
    position: absolute;
    right: 0px;
    padding: 10px 12px;
	height: 100%;
	filter: opacity(50%);
}
</style>

<div class="columns slide-container" style="margin-top: 3rem">
    <div  class="column is-offset-3 is-half box" style="padding: 1.5rem">
    <form id="login-form">
        <div style="width: 50%; margin-right: auto; margin-left:auto; padding-left: 1.5rem">
            <img src="/img/camagru..png">
        </div>
        <div class="login-fields">
            <div class="field is-horizontal">
                <div class="field-label grow-1 is-normal">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control is-expanded">
                        <input id="email" name="email" class="input" required type="email">
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

            <div class="has-text-centered" style="margin: .75rem;">
                <a onclick="loadSnippet('ResetPasswordLink')" class="is-large">Oops... I forgot my password. Help!</a>
            </div>

            <div class="buttons">
                <button type="button" class="button is-light" onclick="previousSlide()">Back</button>
                <button id="login" class="button is-primary">Log in</button>
            </div>
        </div>
        <div id="errors"></div>
        </form>
    </div>
</div>

<script src="/js/actions/login.js"></script>
<script src="/js/password-show-hide.js"></script>

<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>