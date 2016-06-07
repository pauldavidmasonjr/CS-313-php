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


//Variables from previous page
$name = $_POST["name"];
$userName = $_POST["userName"];
$password = $_POST["password"];
$phoneNumber = $_POST["phoneNumber"];
$emailAddress = $_POST["emailAddress"];
$streetAddress = $_POST["streetAddress"];
$city = $_POST["city"];
$state = $_POST["state"];
$zipCode = $_POST["zipCode"];

$complexName = $_POST["complexName"];

/********************************************
*	Insert complex info
*
*		name
*		street_address
*		city
*		State
*		zip
*********************************************/
$insertLine = $db->prepare("INSERT INTO complex(name, street_address, city, state, zip) Values(:name, :streetAddress, :city, :state, :zip)");
$insertLine->bindParam(':name', $complexName);
$insertLine->bindParam(':streetAddress', $streetAddress);
$insertLine->bindParam(':city', $city);
$insertLine->bindParam(':state', $state);
$insertLine->bindParam(':zip', $zipCode);

$insertLine->execute();
$complexID = $db->lastInsertId();
echo $complexID;

/****************
*TEST complex insert information
**********************************/
foreach($db->query('SELECT name, street_address, city, state, zip FROM complex') as $row){ 
		echo 'Complex Name: ' . $row['name'] . '<br>' . 'Address: ' . $row['street_address'] . '<br>' . $row['city'] . ', ' . $row['state'] . $row['zip'] . '<br><br>';
	}
/********************************************
*	Insert user table info:
*
*		name
*		user_name
*		password
*		phone_number
*		email
*		complex_id
**********************************************/
$insertLine = $db->prepare("INSERT INTO user(name, user_name, password, phone_number, email, complex_id) Values(:name, :user_name, :password, :phone_number, :email, :complex_id)");
$insertLine->bindParam(':name', $name);
$insertLine->bindParam(':user_name', $userName);
$insertLine->bindParam(':password', $password);
$insertLine->bindParam(':phone_number', $phoneNumber);
$insertLine->bindParam(':email', $emailAddress);
$insertLine->bindParam(':complex_id', $complexID);

$insertLine->execute();

/*********************
* Test user table insert
*****************************/
foreach($db->query('SELECT name, user_name, password, phone_number, email, complex_id FROM user') as $row){ 
		echo 'User: ' . $row['name'] . '<br>' . 'Username: ' . $row['user_name'] . '<br>' . 'Password: ' . $row['password'] . '<br>' . 'Phone Number: ' . $row['phone_number'] . '<br>' . 'Email: ' . $row['email'] . '<br>' . 'Complex Id: ' . $row['complex_id'] . '<br><br>';
	}
/*********************************************
*	Insert number of floors:
*
*		num_apartments
*		complex_id
*********************************************/

/********************************************
*	Insert apartment info
*		floor_id
*		apartment_number
*********************************************/
//insert information into database
$insertLine = $db->prepare("INSERT INTO user(name) Values(:name)");
$insertLine->bindParam(':name', $name);

$insertLine->execute();

foreach($db->query('SELECT name FROM user') as $row){ 
		echo 'name of user: ' . $row['name'] . '<br>';
	}

?>