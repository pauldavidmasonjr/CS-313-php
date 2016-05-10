<?php

$user = htmlspecialchars($_POST["userName"]);
$major = htmlspecialchars($_POST["major"]);
$favColor = htmlspecialchars($_POST["favoriteColor"]);
$sport = htmlspecialchars($_POST["favoriteSport"]);
$crazyThing = htmlspecialchars($_POST["crazyThing"]);

$line = "$user - $major, $favColor, $sport, $crazyThing\n";

file_put_contents("results.txt", $line, FILE_APPEND);

header('Location: results.php');

?>