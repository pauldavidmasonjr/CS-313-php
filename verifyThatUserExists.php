<?php
session_start();
?>
<?php
$dbHost = getenv('OPENSHIFT_MYSQL_DB_HOST'); 
$dbPort = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
$dbUser = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
try{
	$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword); 	
}
catch (PDOException $ex){
	echo 'Error!: ' . $ex->getMessage();
	die();
}


$userName = $_POST['userName'];
echo 'User Name: ' . $userName;
$_SESSION["userName"] = $userName;
//echo 'SessionVariable: ' . $_SESSION["userName"];

$password = $_POST['password'];
echo 'Password: ' . $password;
echo'<br><br>';

foreach($db->query('SELECT user_name FROM user') as $row){
		$dataBaseUser = $row['user_name']; 
		echo 'in the query';
		if($userName == $dataBaseUser){
			header('Location: managerAppMain.php');
		}
	}
	echo 'no user found display create user account here';

?>