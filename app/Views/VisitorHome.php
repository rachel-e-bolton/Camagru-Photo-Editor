<?= Component::load("GlobalHeader") ?>
<body>
<?= Component::load("PageHeader") ?>
<div class="container">
	<div class="row">
		<div class="col-12">
			main content here should be centered
		</div>
	</div>
</div>
<<<<<<< HEAD

<?php foreach($data["posts"] as $post): ?>

<body>
	<?= $post->delete() ?>
</body>

<?php endforeach; ?>

<?php require_once dirname(__DIR__) . "/Views/Components/Footer.php"; ?>

=======
<?= Component::load("PageFooter") ?>
</body>
<?= Component::load("GlobalFooter") ?>
>>>>>>> e70dc30372e5a52366cda870f278442ad6efd873
