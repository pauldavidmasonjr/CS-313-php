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
	<title>Entire Complex message</title>
</head>
<body>
	<h1>Message sent to entire complex!</h1>

	<h2>Message</h2>
	<?php

	$message = $_POST['message'];
	echo 'Your message: <br><br>' . $message . '<br><br>'; 

	$tenantFirstName = $_POST['firstName'];
	$tenantLastName = $_POST['lastName'];

				foreach($db->query('SELECT first_name, last_name, phone_number FROM tenant') as $row){ 
					$databaseFirstName = $row["first_name"];
					$databaseLastName = $row["last_name"];

					if($databaseFirstName == $tenantFirstName && $databaseLastName == $tenantLastName){
						$tenantPhoneNumber = $row["phone_number"];

						echo $tenantFirstName . ' ' . $tenantLastName . ' - ' . $tenantPhoneNumber . '<br>';

					}

					
			}

	?>
</body>

</html