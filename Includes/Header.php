<header class="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Car Rental</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="availablecars.php">Cars Available</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Connect With Us</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <?php
                    if (isset($_SESSION['customerloggedin'])) {
                        echo '<a class="abtn" href="logout.php">LOGOUT</a>';
                    } elseif (isset($_SESSION['agencyloggedin'])) {
                        echo '<a class="abtn" href="agency-welcome.php">DASHBOARD</a>';
                        echo '<a class="abtn" href="logout.php">LOGOUT</a>';
                    } else {
                        echo '<button id="loginbtn" class="btn btn-outline-danger my-2 my-sm-0" type="submit">LOGIN</button>
                        <button id="registerbtn" class="btn btn-outline-danger my-2 my-sm-0" type="submit">REGISTER</button>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </nav>
</header>
<script>
    let loginurl = "http://localhost/Car%20rental%20agency/login";
    let registerurl = "http://localhost/Car%20rental%20agency/Registration.php";

    document.getElementById("loginbtn").onclick =
        function() {
            window.location.href = loginurl;
        }

    document.getElementById("registerbtn").onclick =
        function() {
            window.location.href = registerurl;
        }
</script>