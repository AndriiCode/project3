<?php
include ('connect.php');




$name = $_POST['name'];
$desc = $_POST['desc'];
$date = $_POST['date'];
$room = $_POST['room'];
$sub = $_POST['sub'];


	
	
	mysqli_query($db,"CALL add_doc('$name', '$desc', '$date')");
	$result1 = mysqli_query($db, "SELECT id_subdivision FROM subdivision  WHERE name_subdivision = '$sub'");
	while ($line1 = mysqli_fetch_array($result1)){
	$a =  $line1['id_subdivision'];
	}
	mysqli_query($db, "UPDATE  room   SET id_subdivision = '$a' WHERE name_room = '$room'");
	
?>