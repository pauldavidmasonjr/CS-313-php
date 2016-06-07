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
</head>
<body>
	<?php
		$firstName = $_POST['tenantFirstName'];
		//echo $firstName;
		$lastName = $_POST['tenantLastName'];
		//echo $lastName;
		$phoneNumber = $_POST['tenantPhoneNumber'];
		//echo $phoneNumber;
		$email = $_POST['tenantEmailAddress'];
		//echo $email;
		$apartment = $_POST['tenantApartmentNumber'];
		//echo $apartment;
		$apartmentID;

		//figure out which apartmetn id to add the tenant to
		foreach($db->query('SELECT id, apartment_number FROM apartment') as $row){
				$apartmentNumFromDatabase = $row['apartment_number'];

				if($apartmentNumFromDatabase == $apartment){
					$apartmentID = $row['id'];
					//echo "id placed - $apartmentID";
				}
			}
		?>

		<?php
			$insertLine = $db->prepare('INSERT INTO tenant(first_name, last_name, phone_number, email_address, 
				apartment_id) VALUES(:firstName, :lastName, :phoneNumber, :emailAddress, :apartmentId)');
			$insertLine->bindParam(':firstName', $firstName);
			$insertLine->bindParam(':lastName', $lastName);
			$insertLine->bindParam(':phoneNumber', $phoneNumber);
			$insertLine->bindParam(':emailAddress', $email);
			$insertLine->bindParam(':apartmentId', $apartmentID);

			$insertLine->execute();

			header('Location: addTenantToComplex.php');
		?>
</body>
</html>


