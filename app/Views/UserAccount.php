<?= Component::load("GlobalHeader", ["title" => "Edit My Account"]) ?>
<body>
<?php Component::load("Desktop/SignedInHeader-desktop") ?>

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

<!-- <div class="container box" style="margin-top: 3rem; padding-bottom: 3rem; padding-left: 0; padding-right: 0;"> -->
<section class="hero is-primary" style="margin-top: 2rem; padding-left: 0; padding-right: 0;" >
<div class="hero-body">
    <div class="container">
    <h1 class="title">
        Hello <?= $user["first_name"] ?>!
    </h1>
    <h2 class="subtitle">
        Welcome to your account details page...
    </h2>
    </div>
</div>
</section>

<div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
    <div  class="column is-offset-2 is-two-thirds box" style="padding: 1.5rem">
   
    <section class="hero is-small" >
        <div class="hero-body">
            <div class="container" style="margin-top: -1rem;">
            <h1 class="title">
                Update Your Info
            </h1>
            <h2 class="subtitle">
                Change your personal details here.
            </h2>
            </div>
        </div>
        </section>

        <form id="update-handle-form">

            <div class="field is-horizontal">
                <div class="field-label grow-1 is-normal">
                    <label class="label">Handle</label>
                </div>
                <div class="field-body">
                    <div class="field has-addons">
                        <p class="control">
                            <a class="button is-static">@</a>
                        </p>
                        <p class="control is-expanded">
                            <input name="new-handle" id="new-handle" class="input" type="text" value="<?= $user["handle"] ?>">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label grow-1 is-normal">
                    <label class="label">First Name</label>
                </div>
                <div class="field-body">
                    <div class="field has-addons">
                        <p class="control is-expanded">
                            <input name="new-firstname" class="input" type="text" value="<?= $user["first_name"] ?>">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label grow-1 is-normal">
                    <label class="label">Last Name</label>
                </div>
                <div class="field-body">
                    <div class="field has-addons">
                        <p class="control is-expanded">
                            <input name="new-lastname" class="input" type="text" value="<?= $user["last_name"] ?>">
                        </p>
                    </div>
                </div>
            </div>

            <div class="buttons">
                <button id="update-handle" class="button is-primary">Update</button>
            </div>
        </div>
        </form>
    </div>

    <div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
        <div  class="column is-offset-2 is-two-thirds box" style="padding: 1.5rem">
            
        <section class="hero is-small" >
            <div class="hero-body">
                <div class="container" style="margin-top: -1rem;">
                <h1 class="title">
                    Update Password
                </h1>
                <h2 class="subtitle">
                    Fill in your old password followed by your new password twice.
                </h2>
                </div>
            </div>
            </section>

            <form id="update-password-form">

                <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label">Old Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="old-password" name="old-password" class="input" type="password">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label">New Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field right-inner-addon">
                            <p class="control">
                                <input id="new-password" name="new-password" class="input" type="password">
                                <img id="password-show-hide" class="hidden" src="/img/icons8-show-password-48.png">
                            </p>
                        </div>
                    </div>
                </div>

                <div id="password-message" style="display: none" class="has-text-danger has-text-centered"></div>

                <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label">Repeat New</label>
                    </div>
                    <div class="field-body">
                        <div class="field right-inner-addon">
                            <p class="control">
                                <input id="repeat-new-password" class="input" type="password">
                                <img id="repeat-show-hide" class="hidden" src="/img/icons8-show-password-48.png">
                            </p>
                        </div>
                    </div>
                </div>

				<div id="repeat-password-message" style="display: none" class="has-text-danger has-text-centered"></div>

                <div class="box has-background-warning has-text-centered">
                A password should be <strong>at least 8 characters</strong> in length and <strong>contain at least</strong>:<br/> 
                a <strong>special character</strong>,
                a <strong>number</strong> and a <strong>capital letter</strong>.
                </div>

                <div class="buttons">
                    <button id="update-password" class="button is-primary" disabled>Update</button>
                </div>
            </div>
            </form>
        </div>    

    <div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
        <div  class="column is-offset-2 is-two-thirds box" style="padding: 1.5rem">
            
        <section class="hero is-small" >
            <div class="hero-body">
                <div class="container" style="margin-top: -1rem;">
                <h1 class="title">
                    Update Email Address
                </h1>
                <h2 class="subtitle">
                    Changing your email address will log you out. 
                    <br/>
                    You will need to re-verify your account to log in again.
                </h2>
                </div>
            </div>
            </section>

            <form id="update-email-form">

                <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label">Email</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="new-email" name="new-email" class="input" type="email" value="<?= $user["email"] ?>">
                            </p>
                        </div>
                    </div>
                </div>

                <div id="new-email-message" style="display: none" class="has-text-danger has-text-centered"></div>

                <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label">Repeat New</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="new-email-repeat" class="input" type="email">
                            </p>
                        </div>
                    </div>
                </div>

                <div id="new-email-repeat-message" style="display: none" class="has-text-danger has-text-centered"></div>

                <div class="buttons">
                    <button id="update-email" class="button is-primary" disabled>Update & Log Out</button>
                </div>
            </div>
            </form>
        </div>

        <div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
        <div  class="column is-offset-2 is-two-thirds box" style="padding: 1.5rem">
            
        <section class="hero is-small" >
            <div class="hero-body">
                <div class="container" style="margin-top: -1rem;">
                <h1 class="title">
                    Notification Settings
                </h1>
                <h2 class="subtitle">
                    Send me email notifications when I receive a comment on my post?
                </h2>
                </div>
            </div>
            </section>

            <form id="update-notifications-form" class="has-text-centered">
                <div class="control has-text-centered" style="margin: .25rem; margin-bottom: .rem;">
             
                <?php if ($user["notifications"]): ?>             
                    <label class="radio" style="font-size: 23px">
                        <input type="radio" name="answer" id="yes" class="title" checked>
                        &nbspYes
                    </label>
                    <label class="radio" style="font-size: 23px">
                        <input type="radio" name="answer" id="no" class="title" value="no">
                        &nbspNo
                    </label>
                <?php else: ?>
                    <label class="radio" style="font-size: 23px">
                        <input type="radio" name="answer" id="yes" class="title">
                        &nbspYes
                    </label>
                    <label class="radio" style="font-size: 23px">
                        <input type="radio" name="answer" id="no" class="title" checked>
                        &nbspNo
                    </label>
                <?php endif; ?>

                </div>

                <div class="buttons">
                    <button id="update-notification-settings" class="button is-primary">Update</button>
                </div>
            </form>
        </div>

    </div>


    <div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
        <div  class="column is-red is-offset-2 is-two-thirds box" style="padding: 1.5rem">
            
        <section class="hero is-small" >
            <div class="hero-body">
                <div class="container" style="margin-top: -1rem;">
                <h1 class="title is-white">
                    Delete account
                </h1>
                <h2 class="subtitle is-white">
                    Permanently delete your account and all posts. This action is nonreversible
                </h2>
                </div>
            </div>
            </section>

            <form id="delete-account-form" class="has-text-centered">
                
            <div class="field is-horizontal">
                    <div class="field-label grow-1 is-normal">
                        <label class="label is-white">Account Password</label>
                    </div>
                    <div class="field-body">
                        <div class="field">
                            <p class="control">
                                <input id="account-password" name="account-password" class="input" type="password" min="8">
                            </p>
                        </div>
                    </div>
                </div>

                <div class="buttons">
                    <button id="delete-account" class="button" disabled>Delete Account</button>
                </div>
            </form>
        </div>

    </div>



</div>

<script src="/js/accounts/edit.js"></script>
<script src="/js/useraccount-validation.js"></script>

<?php Component::load("Desktop/SignedInFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>