<?= Component::load("GlobalHeader", ["title" => "Gallery - All Users"]) ?>
<body>
<?php Component::load("Desktop/SignedInHeader-desktop") ?>

<section class="hero is-primary" style="margin-top: 2rem; padding-left: 0; padding-right: 0;" >
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
            [[NAME]]'s Gallery.
        </h1>
        <h2 class="subtitle">
            See what [[NAME]] has been up to...
        </h2>
        </div>
    </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="posts">

			<?php foreach(range(0, 100) as $_): ?>
			
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

<?php Component::load("Desktop/SignedInFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>