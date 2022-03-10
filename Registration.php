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
    <section class="registration-type my-4 mx-5">
        <div class="container">
            <div class="jumbotron no-gutters">
                <div class="col-lg-12 px-5">
                    <h1 class="font-weight-bold py-3">Sign Up Now !</h1>
                    <h5 class="py-1">Register as a Customer or Agency</h5>
                </div>
                <div class="mt-5">
                    <button type="button" id="customerbtn" class="btn btn-outline-danger mr-5">Customer</button>
                    <button type="button" id="agencybtn" class="btn btn-outline-danger ml-5">Agency</button>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    let customerulr = "http://localhost/Car%20rental%20agency/customer-registration";
    let agencyurl="http://localhost/Car%20rental%20agency/agency-registration";

    document.getElementById("customerbtn").onclick =
        function() {
            window.location.href = customerulr;
        }

    document.getElementById("agencybtn").onclick =
        function() {
            window.location.href = agencyurl;
        }
</script>
</html>