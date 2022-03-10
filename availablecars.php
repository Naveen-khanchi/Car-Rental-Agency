<?php

session_start();

include 'Database/dbconnection.php';

$showbtn = false;
$cancelrequest = false;
$showAlert = false;

if (!isset($_SESSION['customerloggedin']) || $_SESSION['customerloggedin'] != true) {
    $showbtn = false;
} else {
    $showbtn = true;
}




$select_query = "SELECT * FROM `carstbl` ";
$select_query_result = mysqli_query($conn, $select_query) or die(mysqli_error($conn));


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bookbtn'])) {
        if (!isset($_SESSION['agencyloggedin']) || $_SESSION['agencyloggedin'] != true) {
            if (!isset($_SESSION['customerloggedin']) || $_SESSION['customerloggedin'] != true) {
                header("location: login.php");
            } else {
                $vehicleid = $_POST['vehicleno'];
                $customerid = $_SESSION['user_id'];
                $select = "SELECT * FROM carstbl WHERE number='$vehicleid'";
                $select_result = mysqli_query($conn, $select) or die(mysqli_error($conn));
                $rslt = mysqli_fetch_array($select_result);
                $agencyid = $rslt['agency'];
                $carmodel = $rslt['model'];
                $startdate = $_POST['startdate'];
                $noofdays = $_POST['noofdays'];
                $qry = "INSERT INTO `carsbooking` (`customeremail`, `model`, `carnumber`, `numberofdays`, `startdate`, `agency`) VALUES ('$customerid', '$carmodel', '$vehicleid', '$noofdays', '$startdate', '$agencyid')";
                $final = mysqli_query($conn, $qry) or die(mysqli_error($conn));

                if ($final) {
                    $showAlert = true;
                }
            }
        } else {
            $cancelrequest = true;
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
    <?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong> Your Request is submitted.We Will connect with you soon.
            </div>';
    }

    
    if ($cancelrequest) {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Failure!</strong> Sorry you can not book a car as an agency
        </div>';
    }
    ?>

    <section class="listingbanner">
        <div>
            <h1>CARS AVAILABLE</h1>
        </div>
    </section>

    <section class="container car-list">
        <h1>List Of The Cars Available For Booking</h1>
        <section class="listing-card col-lg-12 my-4">
            <div class="container">
                <?php while ($fetch_row = mysqli_fetch_array($select_query_result)) { ?>
                    <div class="row card-content no-gutters">
                        <div class="col-lg-5">
                            <img src="Images/17.jpg" class="img-fluid" alt="">
                        </div>
                        <div class="col-lg-7 px-5 pt-4">
                            <h3><?php echo $fetch_row['model']; ?></h3>
                            <hr>
                            <div class="row">
                                <div class="col-lg-7">
                                    <ul>
                                        <li>
                                            <h6>Price : <?php echo $fetch_row['rate'] ?> Rs./Day</h6>
                                        </li>
                                        <li>
                                            <h6>Vehicle Number : <?php echo $fetch_row['number'] ?></h6>
                                        </li>
                                        <li>
                                            <h6><?php echo $fetch_row['capacity'] ?> Seats</h6>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <form method="post" action="">
                                <?php
                                if ($showbtn) {
                                    echo '
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="exampleFormControlSelect1">Number of days car required for</label>
                                        <select class="form-control" required name="noofdays" id="exampleFormControlSelect1">
                                            <option value="">Select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        Start Date:
                                        <input required="true" type="date" name="startdate" id="">
                                    </div>
                                </div>';
                                } ?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" name="bookbtn" value="Book The Car" class="btn btn-primary btn-block"></input>
                                    </div>
                                </div>
                                <input type="hidden" name="vehicleno" value="<?php echo $fetch_row['number']; ?>">
                            </form>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>


    </section>

    <?php include('Includes/footer.php') ?>
</body>

</html>
