<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "carrentalagency";

$conn = mysqli_connect($server, $username, $password, $database)
or die(mysqli_error($conn));

?>