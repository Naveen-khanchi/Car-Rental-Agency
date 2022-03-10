<?php

session_start();

if (!isset($_SESSION['agencyloggedin']) || $_SESSION['agencyloggedin'] != true) {
    header("location:login.php");
    exit;
}
$showAlert = false;
$agency_id = $_SESSION['user_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Database/dbconnection.php';
    $model = $_POST['model'];
    $number = $_POST['number'];
    $capacity = $_POST['capacity'];
    $rent = $_POST['rent'];
    $exists = false;
    if ($exists == false) {
        $qry = "INSERT INTO `carstbl` (`model`, `number`, `capacity`, `rate`, `agency`) VALUES ('$model', '$number', '$capacity', '$rent', '$agency_id')";

        $submit = mysqli_query($conn, $qry) or die(mysqli_error($conn));
        if ($submit) {
            $showAlert = true;
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Car</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include('Includes/side-nav.php') ?>
    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" class="btn btn-outline-danger rounded-pill shadow-sm px-4 mb-4" type="button">Menu</button>

        <?php
        if ($showAlert) {
            echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Vehicle is successfully added.
          </div>';
        }
        ?>
        <section class="add-car">
            <h1 class="title">Add New Car</h1>
            <div class="container">
                <form method="post" action="">
                    <div class="contact-form row">
                        <div class="form-field col-lg-6">
                            <input id="model" type="text" class="input-text" required="true" name="model">
                            <label for="model" class="lable">Vehicle Model</label>
                        </div>
                        <div class="form-field col-lg-6">
                            <input id="number" type="text" class="input-text" required="true" name="number">
                            <label for="number" class="lable">Vehicle Number</label>
                        </div>
                        <div class="form-field col-lg-6">
                            <input id="capacity" type="text" class="input-text" required="true" name="capacity">
                            <label for="capacity" class="lable">Vehicle Seating Capacity</label>
                        </div>
                        <div class="form-field col-lg-6">
                            <input id="rent" type="text" class="input-text" required="true" name="rent">
                            <label for="rent" class="lable">Rent/Day in Rs.</label>
                        </div>
                        <div class="form-field col-lg-6">
                            <input type="submit" value="submit" class="submit-btn">
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</body>

</html>