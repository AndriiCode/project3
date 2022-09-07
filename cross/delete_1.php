<?php

include ('connect.php');

$room = $_POST['room2'];



mysqli_query($db,"DELETE FROM room  WHERE id_room = '$room'");



?>