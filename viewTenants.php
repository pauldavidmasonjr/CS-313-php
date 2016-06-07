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
	<title>List of Tenants</title>
	<link rel="stylesheet" type="text/css" href="pageStyles.css">
</head>
<body>
	<h1>Tenants Listed by Floor and Apartment</h1>

	<?php
		

			for($counter = 1; $counter < 5; $counter ++){

				if($counter == '1'){
					echo "<h2>First Floor:</h2>";
				}
				if($counter == '2'){
					echo "<h2>Second Floor:</h2>";
				}
				if($counter == '3'){
					echo "<h2>Third Floor:</h2>";
				}
				if($counter == '4'){
					echo "<h2>Fourth Floor:</h2>";
				}
				//echo "$counter";
				foreach($db->query('SELECT first_name, last_name, phone_number, email_address, apartment_id FROM tenant') as $row){
				//find apartment id from the tenant table
				$apartmentId = $row['apartment_id'];

				$tenantFirstName = $row['first_name'];
				$tenantLastName = $row['last_name'];
				$tenantPhoneNumber = $row['phone_number'];
				$tenantEmailAddress = $row['email_address'];

				//display first floor
				foreach($db->query('SELECT id, floor_id FROM apartment')as $row2){
						$floorId = $row2['floor_id'];
						$currentApartment = $row2['id'];
						//echo "Floor Id: $floorId";

						if($floorId == $counter && $currentApartment == $apartmentId){
						//echo "$tenantFirstName $tenantLastName";
							//echo "Floor: $floorId <br>";
							echo "<p style='text-align:center'>$tenantLastName, $tenantFirstName - $tenantPhoneNumber ($tenantEmailAddress) </p>";
						}
					}
				}
			}

	?>
</body>
</html>