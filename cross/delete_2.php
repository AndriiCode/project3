<?php

include ('connect.php');

$idsub = $_POST['idsub'];



mysqli_query($db,"DELETE FROM subdivision  WHERE id_subdivision = '$idsub'");



?>