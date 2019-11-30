<?= Component::load("GlobalHeader", ["title" => "Add a Post"]) ?>
<link rel="stylesheet" href="/css/snippets/camagru-canvas.css">
<link rel="stylesheet" href="/css/snippets/add-post.css">
<body>
<?php Component::load("Desktop/SignedInHeader-desktop") ?>

<section class="hero is-primary is-hidden-touch" style="margin-top: 2rem; margin-bottom: 1rem; padding-left: 0; padding-right: 0;" >
    <div class="hero-body">
        <div class="container">
			<h1 class="title">
				Create a new post.
			</h1>
			<h2 class="subtitle">
            	Snap a moment and share it with the world...
        	</h2>
        </div>
    </div>
</section>


<div class="container">
	<div class="row">
		<div class="col-12">
			<span class="hidden">
				<input type="file" name="" id="file-in">
			</span>
			
			<div id="controls" class="media-controls columns is-vcentered" style="margin-bottom: -1rem;">
				<div class="field has-addons column">
					<div class="control">
						<a id="upload-button" onclick="uploadFile(); toggleButtonUpload();" class="button is-medium">Upload Image</a>
					</div>
					<div class="control">
						<a id="selfie-button" onclick="webcam(); toggleButtonSelfie();" class="button is-medium">Selfie</a>
					</div>
				</div>
			</div>

			<div class="main-container">
				<div class="view-spacer"></div>
				<div id="view" class="media-view"></div>
				<div class="layers-container is-hidden-touch has-background-light" style="margin-left: 1rem;">
					<h2 class="title has-text-centered" style="padding: 1rem;">Layers:<h2>
					<div id="layers" class="is-family-secondary font-regular" style="margin-top: -1rem;"></div>
				</div>
			</div>

			<div id="controls" class="media-controls columns is-vcentered">
				<div class="column" style="margin-top: -.5rem;">
					<button id="capture-button" onclick="snapshot()" class="button is-medium is-light" disabled>Capture</button>
				</div>
				<div class="column" >
					<button id="save-post" class="level-item button is-primary is-large" disabled>1... 2... 3... Post!</button>
				</div>
			</div>


			<div id="stickers" class="sticker-container" style="display: none;"></div>

		</div>
	</div>
</div>

<section class="hero is-light" style="margin-top: 2rem; margin-bottom: 1rem; padding-left: 0; padding-right: 0;" >
    <div class="hero-body">
        <div class="container">
			<h1 class="title">
				Previous Posts
			</h1>
			<div id="previous-posts"></div>
        </div>
    </div>
</section>

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


<style>

@media only screen and (max-width: 768px) {
	.media-view {
		min-width: inherit !important;
		width: 90vw;
		height: 90vw;
		margin: auto;
	}

	.media-view > video {
		width: 100%;
		height: auto;
		margin: auto;
	}

	.media-view > canvas {
		width: 100%;
		height: auto;
		margin: auto;
	}
}

</style>

<?php Component::load("Desktop/SignedInFooter-desktop") ?>
</body>
<?php Component::load("GlobalFooter") ?>