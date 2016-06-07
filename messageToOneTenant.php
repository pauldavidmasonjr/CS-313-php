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
	<title>Message to One Tenant</title>
	<link rel="stylesheet" type="text/css" href="pageStyles.css">
</head>
<body>
	<h1>Message sent to entire complex!</h1>

	<h2>Message</h2>
	<?php

	$message = $_POST['message'];
	echo "<p style='text-align:center'>Your message: <br><br> $message </p><br>"; 

	$tenantFirstName = $_POST['firstName'];
	$tenantLastName = $_POST['lastName'];

				foreach($db->query('SELECT first_name, last_name, phone_number FROM tenant') as $row){ 
					$databaseFirstName = $row["first_name"];
					$databaseLastName = $row["last_name"];

					if($databaseFirstName == $tenantFirstName && $databaseLastName == $tenantLastName){
						$tenantPhoneNumber = $row["phone_number"];

						echo "<p style='text-align:center'>Sent To: <br> $tenantFirstName $tenantLastName - $tenantPhoneNumber </p><br>";


						//sending the text message
						mail("2088908912@txt.att.net", "", $message, "From: Kaylie <thetwoers@gmail.com>\r\n");
					}

					
			}

	?>
</body>

</html