<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="pageStyles.css">
	</head>
	<body>
		<h1>Welcome to the Apartment Manager</h1>

		<h2>Login Below to Access Your Complex</h2>

		<form action="verifyThatUserExists.php" method="post" id="forms" style="text-align:center">
			<h2>Username:</h2>
				<input type="text" name="userName"></input>
				<p>to use already created test account enter user name: Brooke04</p>

			<h2>Password</h2>
				<input type="text" name="password"></input>
				<p>along with Brooke04 enter password: manager1</p>

		<input type="submit" value="Log In">
	</form>

	</body>
</html>