<?php
session_start();
?>

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
</head>
<body>
	<h1>Setting up floors on the complex.</h1>
</body>
</html>