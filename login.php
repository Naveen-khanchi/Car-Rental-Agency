<?php

session_start();

$login = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'Database/dbconnection.php';
    $email = $_POST['email'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    if($usertype=='customer'){
        $sql = "SELECT * FROM `customertbl` WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num>=1){
            $login = true;
            session_start();
            $_SESSION['customerloggedin'] = true;
            $_SESSION['user_id'] = $email;
            header("location: index.php");
        }
        else{
            echo "<script>alert('Wrong Credentials')</script>";
        }
    }else{
        $sql = "SELECT * FROM `agencytbl` WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num>=1){
            $login = true;
            session_start();
            $_SESSION['agencyloggedin'] = true;
            $_SESSION['user_id'] = $email;
            header("location: agency-welcome.php");
        }
        else{
            echo "<script>alert('Wrong Credentials')</script>";
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
    <title>Car Rentals Login</title>
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
    <section class="login-form my-4 mx-5">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-lg-5">
                    <img src="Images/login-img.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-7 form-content px-5 pt-5">
                    <h1 class=" logo font-weight-bold py-3">Car Rental</h1>
                    <h4 class="py-1">Sign into your account</h4>
                    <form method="post" action="">
                        <div class="form-row">
                            <div class="col-lg-7">
                                <select name="usertype" class="form-control">
                                    <option selected>Select the user account type</option>
                                    <option value="customer">Customer Account</option>
                                    <option value="agency">Agency Account</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="email" placeholder="Enter Your Email" class="form-control" required="true" name="email">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <input type="password" placeholder="Password" class="form-control" required="true" name="password">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-lg-7">
                                <button type="submit" class="btn1">Login</button>
                            </div>
                        </div>
                        <a href="#">Forgot Password?</a>
                        <p>Don't have an account? <a href="Registration.php">Register here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>