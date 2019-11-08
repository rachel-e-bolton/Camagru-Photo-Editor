<!DOCTYPE html>
<html lang="en" class="has-navbar-fixed-top has-navbar-fixed-bottom">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="/js/header+footer.js"></script>
	<link rel="stylesheet" href="/css/mystyles.css">
	<link rel="stylesheet" href="/css/signup.css">
	<link rel="stylesheet" href="/css/gallery-grid.css">
	<script src="/js/modals.js"></script>
	<script src="/js/snippets.js"></script>
	<script src="/js/custom-elements/canvas.js"></script>
	<title><?= $data["title"] ?></title>
</head>

<div id="modal" class="modal">
	<div class="modal-background"></div>
	<div id="modal-content" class="modal-content"></div>
	<button class="modal-close is-large" aria-label="close"></button>
</div>