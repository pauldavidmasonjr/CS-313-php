<html>
<head>
	<title>Create User and Complex</title>
</head>
<body>
	<h1>Create an Account</h1>

	<p>Already have an account? <a href="loginToManagerApp.php">return to login</a></p>

	<h2>Please fill in the needed information below</h2>

	<form action="databaseEntry.php" method="post" id="forms">
			<h2>Your name:</h2>
				<input type="text" name="name"></input>

			<h2>Username:</h2>
				<input type="text" name="userName"></input>

			<h2>Password</h2>
				<input type="text" name="password"></input>

			<h2>Phone Number</h2>
				<input type="text" name="phoneNumber"></input>

			<h2>Email Address</h2>
				<input type="text" name="emailAddress"></input>

			<h2>Complex Name:<h2>
				<input type="text" name="complexName"></input>

			<h2>Street Address</h2>
				<input type="text" name="streetAddress"></input>

			<h2>City</h2>
				<input type="text" name="city"></input>

			<h2>State</h2>
				<input type="text" name="state"></input>

			<h2>Zip Code</h2>
				<input type="text" name="zipCode"></input>

			<h2>

		<input type="submit" value="Create Complex">
	</form>
</body>
</html>