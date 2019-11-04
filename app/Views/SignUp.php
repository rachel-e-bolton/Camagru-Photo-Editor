<?= Component::load("GlobalHeader", ["title" => "Sign Up"]) ?>
<body>
<?php Component::load("Desktop/GenericHeader-desktop") ?>

<div class="columns is-centered" style="margin-top: 3rem">
	<div class="column is-6">

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
			<div class="box slide center">
				<form id="new_user">
				
				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">Email</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control is-expanded">
								<input name="email" class="input" type="email">
							</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">Password</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control is-expanded">
								<input name="password" class="input" type="password">
							</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">Repeat</label>
					</div>
					<div class="field-body">
						<div class="field">
							<p class="control">
								<input class="input" type="password">
							</p>
						</div>
					</div>
				</div>

				<div class="box has-background-warning has-text-centered">
				A password should be <strong>at least 8 characters</strong> in length and <strong>contain at least</strong>:<br/> 
				a <strong>special character</strong>,
				a <strong>number</strong> and a <strong>capital letter</strong>.
				</div>

				<div class="buttons">
					<div class="spacer"></div>
					<button type="button" class="button is-primary" onclick="nextSlide()">Next</button>
				</div>

			</div>
			<div class="box slide right">

				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">Handle</label>
					</div>
					<div class="field-body">
						<div class="field has-addons">
							<p class="control">
								<a class="button is-static">@</a>
							</p>
							<p class="control is-expanded">
								<input name="handle" id="handle" class="input" type="text">
							</p>
						</div>
					</div>
				</div>


				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">First Name</label>
					</div>
					<div class="field-body">
						<div class="field">
						<p class="control is-expanded">
							<input name="first_name" class="input" type="text" name="first_name">
						</p>
						</div>
					</div>
				</div>

				<div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">Last Name</label>
					</div>
					<div class="field-body">
						<div class="field">
						<p class="control is-expanded">
							<input name="last_name" class="input" type="text">
						</p>
						</div>
					</div>
				</div>

				<div class="buttons">
					<button type="button" class="button is-light" onclick="previousSlide()">Back</button>
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

<?php Component::load("Desktop/GenericFooter-desktop") ?>
</body>
<?= Component::load("GlobalFooter") ?>