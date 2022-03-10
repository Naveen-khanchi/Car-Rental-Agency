<?php session_start();

if (!isset($_SESSION['agencyloggedin']) || $_SESSION['agencyloggedin'] != true) {
    header("location:login.php");
    exit;
}

include 'Database/dbconnection.php';

$agency_id = $_SESSION['user_id'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include('Includes/side-nav.php') ?>

    <div class="page-content p-5" id="content">
        <button id="sidebarCollapse" class="btn btn-outline-danger rounded-pill shadow-sm px-4 mb-4" type="button">Menu</button>

        <section class="manage-car">
            <h1 class="title">Car Booking Requests</h1>
            <div class="container">
                <div class="table-responsive row">
                    <table>
                        <thead>
                            <tr>
                                <th>Booking Id</th>
                                <th>Customer Mail</th>
                                <th>Vehicle Model</th>
                                <th>Vehicle Number</th>
                                <th>Number of days vehicle required for</th>
                                <th>Starting date</th>
                                <th>Reject request</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php $selectquery = " SELECT * From carsbooking WHERE agency='$agency_id'";
                            $query = mysqli_query($conn, $selectquery);

                            while ($res = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $res['sno']; ?></td>
                                    <td><?php echo $res['customeremail']; ?></td>
                                    <td><?php echo $res['model']; ?></td>
                                    <td><?php echo $res['carnumber']; ?></td>
                                    <td><?php echo $res['numberofdays']; ?></td>
                                    <td><?php echo $res['startdate']; ?></td>
                                    <td><a href="cancelrequest.php?id=<?php echo $res['sno']; ?>" data-toggle="tooltip" data-placement="bottom" title="Cancel the request">
                                            <i class="fa fa-times" aria-hidden="true"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </div>
</body>

</html>