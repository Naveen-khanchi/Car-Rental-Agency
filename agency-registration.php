<?php
$showAlert = false;
$showerror = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'Database/dbconnection.php';
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $exists = false;

    $customerlist = "SELECT * FROM `customertbl` WHERE email='$email'";
    $customerrecord = mysqli_query($conn, $customerlist);
    $customerno = mysqli_num_rows($customerrecord);

    $agencylist = "SELECT * FROM `agencytbl` WHERE email='$email'";
    $agencyrecord = mysqli_query($conn, $agencylist);
    $agencyno = mysqli_num_rows($agencyrecord);
    

    if($customerno>0){
        $exists = true;
    }elseif($agencyno>0){
        $exists = true;
    }else{
        $exists = false;
    }

    if ($exists == false) {
        $qry = "INSERT INTO `agencytbl` (`name`, `contactno`, `address`, `email`, `password`) VALUES ('$name', '$contact', '$address', '$email', '$password')";

        $submit = mysqli_query($conn, $qry) or die(mysqli_error($conn));
        if ($submit) {
            $showAlert = true;
        }
    }else{
        $showerror = true;
    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            background: #dcdcdc;
        }
    </style>
</head>

<body>
<?php include('Includes/Header.php') ?>
<?php
    if ($showAlert) {
        echo '<div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> Your account is now created' . ' and you can' . '<a href="login.php"> Login </a>' . 'now.
          </div>';
    }

    if ($showerror) {
        echo '<div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Failed!</strong> The User with same Email is already registered.</div>';
    }
    ?>
    <section class="registration-form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="form-content col-lg-7 px-5 pt-5">
                    <h1 class=" logo font-weight-bold py-3">Car Rental</h1>
                    <h4 class="py-1">Create a new agency account</h4>
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Enter Agency Name" class="form-control" required="true" name="name">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Agency Contact Number" class="form-control" required="true" name="contact">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="text" placeholder="Agency Address" class="form-control" required="true" name="address">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" placeholder="Enter Agency Email" class="form-control" required="true" name="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Create a Password" class="form-control" required="true" name="password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1">Create Account</button>
                            </div>
                        </div>
                        <p>Already have an account. Login<a href="login.php"> here</a></p>
                    </form>
                </div>
                <div class="col-lg-5">
                    <img src="Images/5.jpg" class="img-fluid" alt="">
                </div>
            </div>
        </div>
    </section>
</body>

</html>