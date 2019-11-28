<?= Component::load("GlobalHeader", ["title" => "My Posts"]) ?>
<link rel="stylesheet" href="/css/snippets/camagru-canvas.css">
<link rel="stylesheet" href="/css/snippets/add-post.css">
<body>
<?php Component::load("Desktop/SignedInHeader-desktop") ?>



<section class="hero is-primary" style="margin-top: 2rem; padding-left: 0; padding-right: 0;" >
    <div class="hero-body">
        <div class="container">
			<h1 class="title">
				Create a new post.
			</h1>
			<pre>
				<?php print_r($user);  ?>
			</pre>
        </div>
    </div>
</section>


<div class="container">
	<div class="row">
		<div class="col-12">
			<span class="hidden">
				<input type="file" name="" id="file-in">
			</span>
			
			<div class="main-container">
				<div class="layers-container">
					<div id="layers"></div>
				</div>
				<div id="view" class="media-view"></div>
				<div class="view-spacer"></div>
			</div>

			<div id="controls" class="media-controls columns is-vcentered">
				<div class="field has-addons column">
					<div class="control">
						<a id="upload-button" onclick="uploadFile(); toggleButtonUpload();" class="button is-medium">Upload Image</a>
					</div>
					<div class="control">
						<a id="selfie-button" onclick="webcam(); toggleButtonSelfie();" class="button is-medium">Selfie</a>
					</div>
				</div>
				<div class="column" style="margin-top: -1.5rem;">
					<button id="capture-button" onclick="snapshot()" class="button is-medium is-light" disabled>Capture</button>
				</div>
			</div>


			<div id="stickers" class="sticker-container" style="display: none;"></div>
			<h2 class="title">Previous Posts</h2>
			<div id="previous-posts"></div>

			<footer class="level-right" style="justify-content: center;">
				<button id="save-post" class="level-item button is-primary is-large" disabled>1... 2... 3... Post!</button>
			</footer>

		</div>
	</div>
</div>

<script src="/js/snippets/camagru-canvas.js"></script>
<script src="/js/actions/add-post.js"></script>
<script src="/js/add-post-buttons.js"></script>
<script>

let prevPosts = document.getElementById("previous-posts")

document.addEventListener("DOMContentLoaded", e => {
	Api.get("/posts/get?handle=<?= $user['handle'] ?>")
		.then(data => {
			if (data)
			{
				Array.from(data).forEach(post => {
					let img = document.createElement("img")
					img.class = "prev-post"
					img.src = post.image
					prevPosts.appendChild(img)

				})
			}
		})
})


</script>
<?php Component::load("Desktop/SignedInFooter-desktop") ?>
</body>
<?php Component::load("GlobalFooter") ?>