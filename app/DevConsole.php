<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<script src="/js/api.js"></script>
	<title>Development Console</title>
</head>
<body>

	<h2>Create new User</h2>
	<form id="new_user">
		First Name 		<input name="first_name" type="text"><br>
		Last Name 		<input name="last_name" type="text"><br>
		Handle 			<input name="handle" type="text"><br>
		Email 			<input name="email" type="email"><br>
		Password 		<input name="password" type="password"><br>
		Date of Birth 	<input name="dob" type="date"><br>
		Profile Image 	<input name="profile_img" type="text"><br>
	</form>

	<button onclick="createUser('new_user')">Add</button>

	<h2>All Users</h2>
	<pre id="result"></pre>


	<script>

		ApiClient.getUsers()
		.then(data => {
			data.forEach(user => {
				document.getElementById("result").innerHTML += `${JSON.stringify(user)}<br>`;
			})
		})
		
		function createUser(form)
		{
			ApiClient.createUser(form)
			.then(data => {
				ApiClient.getUsers()
				.then(data => {
					data.forEach(user => {
						document.getElementById("result").innerHTML += `${JSON.stringify(user)}<br>`;
					})
				})
			})
		}


		

	</script>

</body>
</html>