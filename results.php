<?php
$contents = file_get_contents("results.txt");
?>

<html>
<header>
	<title>Survey Results</title>
	<link rel="stylesheet" type="text/css" href="pageStyles.css">
</header>
<body>
	<h1>Results Page</h1>

	<?php

		$filename = 'results.txt';
		$contents = file($filename);

		foreach($contents as $line){
			echo $line . "<br><br>" . PHP_EOL;
		}

	?>

	
</body>
</html>