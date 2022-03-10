<?php 

include('Database/dbconnection.php');

$id = $_GET['id'];

$deletequery = " DELETE FROM carstbl WHERE sno=$id";

$query = mysqli_query($conn, $deletequery);

header('location: manage-cars.php');

?>