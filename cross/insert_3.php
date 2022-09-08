<?php


include ('connect.php');




$name = $_POST['name1'];
$housing = $_POST['housing'];
$number = $_POST['number'];


	
	
	mysqli_query($db,"INSERT INTO room (name_room, number_room, id_housing) VALUES ('$name', '$number', '$housing')");
	
	





?>

