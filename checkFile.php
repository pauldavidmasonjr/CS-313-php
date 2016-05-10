<?php

	if(strpos(file_get_contents("results.txt"),$_GET['userName']) !== false){
		echo "userName already exists!";
		header('Location: results.php');
	}
	else{
		echo "user name does not exist yet";
		header('Location: survey.html');
	}

	?>