<?php 

include('Database/dbconnection.php');

$id = $_GET['id'];

$deletequery = " DELETE FROM carsbooking WHERE sno=$id";

$query = mysqli_query($conn, $deletequery);

header('location: booking.php');

?>