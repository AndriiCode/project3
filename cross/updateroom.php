<?php

include ('connect.php');

$name = $_POST['name'];

$room = $_POST['room'];





mysqli_query($db,"UPDATE  room  SET name_room = '$name' WHERE id_room = '$room'");

?>