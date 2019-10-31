<?php Component::load("GlobalHeader") ?>

<?php Component::load("Desktop/GenericHeader-desktop") ?>

<style>

	@media screen and (max-width: 480px) {
		.post {
			width: 100% !important;
			height: auto !important;
		}
	}

	.posts {
		display: flex;
		flex-wrap: wrap;
		padding: 15px;
	}

	.post {
		position: relative;
		border: 1px solid lightgrey;
		transition: all .2s ease-in-out;
		height: 330px; 
		width: 300px;
		margin: 0.4em;
	}

	.post:hover {
		transform: scale(1.03);
		cursor: pointer;
	}

	.post:hover .stats {
		opacity: 1;
	}

	.attribution {
		line-height: 30px;
		padding: 0px 15px;
		display: flex;
		justify-content: space-between;
	}

	.stats {
		position: absolute;
		display: flex;
		justify-content: center;
		align-items: center;
		opacity: 0;
		background: rgba(0, 0, 0, 0.3);
		z-index: 1;
		width: 100%;
		height: 100%;
	}

	.stats .current {
		z-index: 2;
	}

	.user {
		font-weight: bold;
		font-size: 1.1em;
	}

	.icon {
		background-size: cover;
		filter: invert(1);
		height: 35px;
	}

	.stats-spacer {
		width: 20%;
	}

	.single {
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.counter {
		font-weight: bold;
		font-size: 1.2em;
		color: white;
	}

</style>

<body>
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="posts">

			<?php foreach(range(0, 100) as $_): ?>

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
						<img src="https://via.placeholder.com/300"></img>
					</div>
					<div class="attribution">
						<div class="user">@gwasserf</div>
						<div class="date">July 07 2019</div>
					</div>
				</div>

			<?php endforeach; ?>

			</div>
		</div>
	</div>
</div>
</body>
<?php //Component::load("Desktop/GenericFooter-desktop") ?>

<?php Component::load("GlobalFooter") ?>