<div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Add a Post</p>
    </header>
    <section class="modal-card-body">

		<div class="columns is-centered">
			<div class="column">
				<div id="step-start" class="step active">
					<div class="post-selection">
						<div><a onclick="stepFile()" class="button is-primary">Image</a></div>
						<div class="post-selection-divider">
							<div></div>
							<div>OR</div>
							<div></div>
							<sample-div>Sexy</sample-div>
						</div>
						<div><a onclick="stepWebcam()" class="button is-primary">Webcam</a></div>
					</div>
				</div>

				<div id="step-file" class="step">
					<div class="post-selection">
						<div class="canvas-display">
							<canvas id="file-preview"></canvas>
						</div>
						<div class="file is-boxed">
							<label class="file-label">
								<input id="file-input" class="file-input" type="file" accepts="image/*" name="image">
								<span class="file-cta">
									<span class="file-icon">
										<i class="fas fa-upload"></i>
									</span>
									<span class="file-label">
										Choose a file…
									</span>
								</span>
							</label>
						</div>
					</div>
				</div>

				<div id="step-webcam" class="step">
					<div class="post-selection">
						<canvas id="webcam-preview"></canvas>
					</div>
				</div>

				<div id="step-canvas" class="step">
					<div class="post-selection">
						<div><a class="button is-primary">Image</a></div>
						<div class="post-selection-divider">
							<div></div>
							<div>OR</div>
							<div></div>
						</div>
						<div><a class="button is-primary">Webcam</a></div>
					</div>
				</div>


			</div>
		</div>


	<div class="step">
		<div id="post-file-upload">
	
		</div>
	
		<div id="post-video">
			<video autoplay></video>
		</div>
	</div>



	<link rel="stylesheet" href="/css/snippets/add-post.css">
	<script src="/js/snippets/add-post.js"></script>
    </section>
    <!-- <footer class="modal-card-foot is-vcentered">
        <button id="send-reset-link" class="button is-primary">Send Link</button>
    </footer> -->
  </div>