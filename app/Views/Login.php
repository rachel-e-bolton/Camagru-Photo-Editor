<?= Component::load("GlobalHeader") ?>

<body>
<!-- Development login form with sessions     -->

<pre>
Session Info Here
<? print_r($_SESSION) ?>

</pre>


<div class="section login-form">
    <div id="errors"></div>
    <form id="login-form">
        Username <input name="username" required type="text"><br>
        Password <input name="password" required type="password"><br>
        <button class="button" id="login" type="button">Login</button>
    </form>
    <a href="/users/logout" class="button primary">Logout</a>
</div>

<video autoplay></video>

</body>

<script src="/js/api.js"></script>
<script>

let errors = document.getElementById("errors")

document.getElementById("login").addEventListener("click", event => {

    var username = document.getElementsByName("username")[0]

    if (username.value.length < 1)
    {
       errors.innerHTML = "Username cannot be blank"
    }
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
    // If errors display

    // Else redirect


    var video = document.createElement('video');
    video.setAttribute('playsinline', '');
    video.setAttribute('autoplay', '');
    video.setAttribute('muted', '');
    video.style.width = '200px';
    video.style.height = '200px';

    /* Setting up the constraint */
    var facingMode = "user"; // Can be 'user' or 'environment' to access back or front camera (NEAT!)
    var constraints = {
    audio: false,
    video: {
    facingMode: facingMode
    }
    };

    /* Stream it to video element */
    navigator.mediaDevices.getUserMedia(constraints).then(function success(stream) {
    video.srcObject = stream;
    });


})



</script>



<?= Component::load("GlobalFooter") ?>