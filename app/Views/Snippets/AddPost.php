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
				<button onclick="snapshot()" class="button is-family-primary is-large" disabled>Capture!</button>
			</div>
		</div>
		<div id="stickers" class="sticker-container"></div>
	<link rel="stylesheet" href="/css/snippets/camagru-canvas.css">
	<script src="/js/snippets/camagru-canvas.js"></script>
    </section>
    <footer class="modal-card-foot is-vcentered">
        <button id="save-post" class="button is-primary">Save</button>
	</footer>
	<script src="/js/actions/add-post.js"></script>
	<script src="/js/toggle-buttons.js"></script>
  </div>
