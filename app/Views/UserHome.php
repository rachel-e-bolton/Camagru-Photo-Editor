<?= Component::load("GlobalHeader", ["title" => "My Posts"]) ?>
<body>
<?php Component::load("Desktop/SignedInHeader-desktop") ?>

<section class="hero is-primary" style="margin-top: 2rem; padding-left: 0; padding-right: 0;" >
    <div class="hero-body">
        <div class="container">
        <h1 class="title">
			Welcome Home <?= $user["first_name"] ?>.
        </h1>
        <h2 class="subtitle">
            A collection of your best moments...
        </h2>
        </div>
    </div>
</section>

<div class="container">
	<div class="row">
		<div class="col-12">
			<div id="posts-container" class="posts">
				
			</div>
		</div>
	</div>
</div>

<script src="/js/actions/get-posts.js"></script>
<script src="/js/infinite-scroll.js"></script>
<?php Component::load("Desktop/SignedInFooter-desktop") ?>
</body>
<?php Component::load("GlobalFooter") ?>