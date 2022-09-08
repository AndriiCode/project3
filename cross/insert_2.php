<?php
include ('connect.php');




$subdivision = $_POST['subdivision'];
$responsible = $_POST['responsible'];
$budget = $_POST['budget']."$";


	
	
	mysqli_query($db,"CALL add_sub('$subdivision', '$responsible', '$budget')");

	
?>