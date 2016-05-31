<?php
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
try{
	$db = new PDO("mysql:host=$dbHost;dbname=managerapp", $dbUser, $dbPassword); 	
}
catch (PDOException $ex){
	echo 'Error!: ' . $ex->getMessage();
	die();
}
?>

<html>
<head>
	<title>Adding Tenants</title>
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

		<input type="submit" value="Add Tenant">
	</form>
</body>
</html>