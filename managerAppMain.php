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


//trying to get session variables
//echo 'Session Var: ' . $_SESSION["userName"];
$userName = $_SESSION["userName"];

//user variables
$nameOfUser;
$complexId;

//complex variables
$complexName;
$complexStAddress;
$complexCity;
$complexState;
$complexZip;

//tenant variables
$tenantFirstName;
$tenantLastName;
$tenantPhoneNumber;
?>
<html>
	<head>
		<title>Manager App Main</title>
		<link rel="stylesheet" type="text/css" href="pageStyles.css">
	</head>
	<body>
		<?php
			
			foreach($db->query('SELECT name, user_name, complex_id FROM user') as $row){
				$dataBaseUser = $row['user_name']; 
		
				if($userName == $dataBaseUser){
					$nameOfUser = $row["name"];
					$complexId = $row["complex_id"];
			}
		}

		?>
		<h1>Welcome to Your Complex <?php echo $nameOfUser; ?> 
		</h1>

		<h2>Your complex</h2>

			<?php
				foreach($db->query('SELECT id, name, street_address, city, state, zip FROM complex') as $row){
				$complex = $row['id']; 
		
				if($complexId == $complex){
					$complexName = $row["name"];
					$complexStAddress = $row["street_address"];
					$complexCity = $row["city"];
					$complexState = $row["state"];
					$complexZip = $row["zip"];
				}
			}

			echo "<h2>Complex Name: $complexName </h2>";
			echo "<p style='text-align: center'>Address: $complexStAddress, $complexCity $complexState $complexZip</p>";
			?>

		<p style='text-align: center'><a href="viewTenants.php">View List of your Tenants</a></p>
		<p style='text-align: center'><a href="addTenantToComplex.php">Add Tenant to Complex</a></p>

		<h2>Action Options</h2>

		<h3 style='text-align:center'>Send message to entire complex</h3>
			<form action="entireComplexMessage.php" method="post" id="forms">
				<h2>Enter your message here</h2>

					<center>
						<TEXTAREA STYLE="text-align:center" NAME="message" COLS=40 ROWS=6></TEXTAREA><br><br>

						<input type="submit" value="Send Message">
					</center>
			</form>

		<h3 style='text-align:center'>Send message to just one floor</h3>
		<form action="messageToOneFloor.php" method="post" id="forms">
				<h2>Enter your message here</h2>

					<center>
						<TEXTAREA NAME="message" COLS=40 ROWS=6></TEXTAREA><br>

						<input type="radio" name="floor" value="1">1st Floor<br>
	  					<input type="radio" name="floor" value="2">2nd Floor<br>
  						<input type="radio" name="floor" value="3">3rd Floor<br>
  						<input type="radio" name="floor" value="4">4th Floor<br><br>

						<input type="submit" value="Send Message">
					</center>
			</form>

		<h3 style='text-align:center'>Send Message to just one apartment</h3>
		<form action="messageToOneApartment.php" method="post" id="forms">
				<h2>Enter your message here</h2>

					<center>
						<TEXTAREA NAME="message" COLS=40 ROWS=6></TEXTAREA><br>

						<p style='text-align: center'>Apartment #:</p>
						<input type="text" name="apartmentNumber"></input>

						<input type="submit" value="Send Message">
					</center>
			</form>

		<h3 style='text-align:center'>Send message to just one tenant</h3>
		<form action="messageToOneTenant.php" method="post" id="forms">
				<h2>Enter your message here</h2>

					<center>
						<TEXTAREA NAME="message" COLS=40 ROWS=6></TEXTAREA><br>

						<p style='text-align: center'>First Name:</p>
						<input type="text" name="firstName"></input>
						<p style='text-align: center'>Last Name:</p>
						<input style='text-align: center' type="text" name="lastName"></input><br><br>


						<input type="submit" value="Send Message">
					</center>
			</form>
	</body>
</html>