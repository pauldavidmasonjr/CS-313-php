<?php
try{
	$db = new PDO("mysql:host=localhost;dbname=managerapp", 'kaylie_mason', 'manager1'); 	
}
catch (PDOException $ex){
	echo 'Error!: ' . $ex->getMessage();
	die();
}
?>

<html>
<head>
	<title>Adding Tenants</title>
	<link rel="stylesheet" type="text/css" href="pageStyles.css">
</head>
<body>
	<h1>Add Tenant to your Complex Below</h1>

	<form action="addTenantToDatabase.php" method="post" id="forms" style="text-align:center">
			
			<p>First Name:</p>
			<input type="text" name="tenantFirstName"></input>
			<p>Last Name:</p>
			<input type="text" name="tenantLastName"></input>
			<p>Phone Number:</p>
			<input type="text" name="tenantPhoneNumber"></input>
			<p>Email Address:<p>
			<input type="text" name="tenantEmailAddress"></input>
			<p>Apartment Number:</p>
			<input type="text" name="tenantApartmentNumber"></input>

			<br><br>
			<input type="submit" value="Add Tenant">
		</form>

	<p><a href="managerAppMain.php">Return to main page</a></p>
</body>
</html>