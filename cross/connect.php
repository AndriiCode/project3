<?php
$host = "localhost";
$user = "Admin";
$password = "1111";
$db_name = "cross";
$db = mysqli_connect($host,$user,$password,$db_name) or die(mysqli_error());
mysqli_set_charset ($db,"utf8");
?>