<?php

include ('connect.php');

$sub = $_POST['sub'];

$newbud = $_POST['newbud']."$";





mysqli_query($db,"UPDATE  subdivision  SET budget = '$newbud' WHERE id_subdivision = '$sub'");

?>