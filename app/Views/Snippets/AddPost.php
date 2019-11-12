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
			<div id="controls" class="media-controls">
				<button onclick="uploadFile()" class="button">Upload Image</button>
				<button onclick="webcam()" class="button">Selfie</button>
				<button onclick="snapshot()" class="button">Snapshot</button>
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
  </div>
