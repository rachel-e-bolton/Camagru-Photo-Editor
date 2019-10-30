<?= Component::load("GlobalHeader", ["title" => "Sign Up"]) ?>

<link rel="stylesheet" href="/css/signup.css">

<div class="columns is-centered">
	<div class="column is-4">

		<!-- <form id="new_user">
			First Name 		<input name="first_name" type="text"><br>
			Last Name 		<input name="last_name" type="text"><br>
			Handle 			<input name="handle" type="text"><br>
			Email 			<input name="email" type="email"><br>
			Password 		<input name="password" type="password"><br>
			Date of Birth 	<input name="dob" type="date"><br>
			Profile Image 	<input name="profile_img" type="file"><br>
		</form>

		<button class="button is-primary" onclick="createUser('new_user')">Add</button> -->



		<div class="slide-container">
			<div class="slide center">
				<form id="new_user">
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Handle</label>
					</div>
					<div class="field-body">
						<div class="field has-addons">
							<p class="control">
								<a class="button is-static">@</a>
							</p>
							<p class="control is-expanded">
								<input id="handle" class="input" type="text">
							</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Password</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control is-expanded">
								<input class="input" type="password">
							</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Repeat Password</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control">
								<input class="input" type="password">
							</p>
						</div>
					</div>
				</div>

				<div class="buttons">
					<div class="spacer"></div>
					<button type="button" class="button is-primary" onclick="nextSlide()">Next</button>
				</div>

			</div>
			<div class="slide right">
				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">First Name</label>
					</div>
					<div class="field-body">
						<div class="field">
						<p class="control is-expanded">
							<input class="input" type="text" name="first_name">
						</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Last Name</label>
					</div>
					<div class="field-body">
						<div class="field">
						<p class="control is-expanded">
							<input class="input" type="text">
						</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label is-normal">
						<label class="label">Email</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control is-expanded">
								<input class="input" type="email">
							</p>
						</div>
					</div>
				</div>


				<div class="buttons">
					<button type="button" class="button" onclick="previousSlide()">Back</button>
					<button type="button" class="button is-primary" onclick="createUser('new_user')">Sign Up</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <div class="columns is-centered">
	<div class="notification is-primary column is-half">
	<button class="delete"></button>
	Primar lorem ipsum dolor sit amet, consectetur
	adipiscing elit lorem ipsum dolor. <strong>Pellentesque risus mi</strong>, tempus quis placerat ut, porta nec nulla. Vestibulum rhoncus ac ex sit amet fringilla. Nullam gravida purus diam, et dictum <a>felis venenatis</a> efficitur. Sit amet,
	consectetur adipiscing elit
	</div>
</div> -->

<script src="/js/api.js"></script>
<script src="/js/signup.js"></script>

<?= Component::load("GlobalFooter") ?>