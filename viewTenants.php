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
</head>
<body>
	<h1>Tenants Listed by Floor and Apartment</h1>

	<h2>First Floor</h2>
	<?php
		foreach($db->query('SELECT first_name, last_name, phone_number, email_address, apartment_id FROM tenant') as $row){
				//find apartment id from the tenant table
				$apartmentId = $row['apartment_id'];

				$tenantFirstName = $row['first_name'];
				$tenantLastName = $row['last_name'];
				$tenantPhoneNumber = $row['phone_number'];
				$tenantEmailAddress = $row['email_address'];
				foreach($db->query('SELECT floor_id FROM apartment')as $row2){
						$floorId = $row2['floor_id'];
						echo "Floor Id: $floorId";

						if($floorId === '1'){
						echo "$tenantFirstName $tenantLastName";
					}
				}

				//get floor id from apartment table

				//outputt user information if floor id == 1
			}

	?>
</body>
</html>