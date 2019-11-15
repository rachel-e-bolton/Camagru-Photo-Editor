<div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add a Post</p>
    </header>
    <section class="modal-card-body">
		<span class="hidden">
			<input type="file" name="" id="file-in">
		</span>
		<div class="main-container">
			<div id="view" class="media-view">
			</div>
		</div>
		<div id="controls" class="media-controls columns is-vcentered">
			<div class="field has-addons column">
				<div class="control">
					<a id="upload-button" onclick="uploadFile();toggleButtonUpload();" class="button is-medium">Upload Image</a>
				</div>
				<div class="control">
					<a id="selfie-button" onclick="webcam();toggleButtonSelfie();" class="button is-medium">Selfie</a>
				</div>
			</div>
			<div class="column" style="margin-top: -1.5rem;">
				<button id="capture-button" onclick="snapshot()" class="button is-medium is-light" disabled>Capture</button>
			</div>
		</div>
		<div id="stickers" class="sticker-container" style="display: none;"></div>
	<link rel="stylesheet" href="/css/snippets/camagru-canvas.css">
	<script src="/js/snippets/camagru-canvas.js"></script>
    </section>
    <footer class="modal-card-foot level-right" style="justify-content: center;">
	    <button id="save-post" class="level-item button is-primary is-large" disabled>1... 2... 3... Post!</button>
	</footer>
	<script src="/js/actions/add-post.js"></script>
	<script src="/js/add-post-buttons.js"></script>
</div>
