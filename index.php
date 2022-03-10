<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include('Includes/Header.php') ?>

    <section class="container-fluid">
        <div class="row">
            <div class="banner">
                <div class="banner-content col-xs-4">
                    <h2>What are you wating for?</h2>
                    <h2>Book Your car now!</h2>
                    <?php
                    if (!isset($_SESSION['agencyloggedin']) || $_SESSION['agencyloggedin'] != true) {
                        echo ' 
                    <a href="availablecars.php" class="abtnfilled" >BOOK NOW</a>';
                    } ?>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="section-header text-centre">
                <h2>Book The Car You Want</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, quo. Quas obcaecati aut commodi possimus provident ullam iure animi beatae corrupti laboriosam natus atque, perferendis saepe id in praesentium autem? Repellat reiciendis eveniet culpa magni aliquam ipsum quia id, molestias obcaecati enim illum repudiandae ratione omnis eligendi excepturi eius amet!</p>
            </div>
        </div>
    </section>

    <?php include('Includes/footer.php') ?>
</body>

</html>