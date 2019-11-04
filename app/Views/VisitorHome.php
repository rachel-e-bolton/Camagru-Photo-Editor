<?php Component::load("GlobalHeader", ["title" => "Welcome to Camagru."]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>


<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="posts">

			<?php foreach(range(0, 10) as $_): ?>
			
				<div class="post-container">
				<div class="post">
					<div class="stats">
						<div class="likes single">
							<img class="icon" src="/img/heart.svg" alt="">
							<div class="counter">10.5K</div>
						</div>
						<div class="stats-spacer"></div>
						<div class="comments single">
							<!-- <div class="icon"></div> -->
							<img class="icon" src="/img/comment.svg" alt="">
							<div class="counter">10.9K</div>
						</div>
					</div>
					<div class="image">
						<img src="https://via.placeholder.com/300">
					</div>

				</div>
				<div class="attribution">
						<a href="#" class="user">@gwasserf</a>
						<div class="date">July 07 2019</div>
				</div>
				</div>
			<?php endforeach; ?>

			<?php foreach(range(0, 10) as $_): ?>
			
				<div class="post-container">
				<div class="post">
					<div class="stats">
						<div class="likes single">
							<img class="icon" src="/img/heart.svg" alt="">
							<div class="counter">10.5K</div>
						</div>
						<div class="stats-spacer"></div>
						<div class="comments single">
							<!-- <div class="icon"></div> -->
							<img class="icon" src="/img/comment.svg" alt="">
							<div class="counter">10.9K</div>
						</div>
					</div>
					<div class="image">
						<img src="https://via.placeholder.com/300">
					</div>

				</div>
				<div class="attribution">
						<a href="#" class="user">@gwasserf</a>
						<div class="date">July 07 2019</div>
				</div>
				</div>
			<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>


<div class="modal is-active">
	<div class="modal-background"></div>
	<div class="modal-content">
		<!-- Any other Bulma elements you want -->
		<div class="columns is-centered">
			<div class="column">
				<div class="content" style="background: white; border-radius: 5px; width: 50vw; height: 50vh;">
					<iframe src="/development/view/TermsOfUse" frameborder="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>



<link rel="stylesheet" href="/css/dev.css">
<script src="/js/dev.js"></script>



<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?php Component::load("GlobalFooter") ?>