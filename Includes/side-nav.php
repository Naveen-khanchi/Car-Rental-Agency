<div class="vertical-nav bg-white" id="sidebar">
    <div class="bg-light py-4 px-3 mb-4">
        <div class="media d-flex align-items-centre">
            <div class="media-body">
                <a href="index.php" class="brand">
                    <h2 class="brand">Car Rental</h2>
                </a>
            </div>
        </div>
    </div>

    <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Dashboard</p>

    <ul class="nav flex-column bg-white mb-0">
        <li class="nav-item">
            <a href="index.php" class="nav-link text-dark bg-light">
                Home
            </a>
        </li>
        <li class="nav-item">
            <a href="availablecars.php" class="nav-link text-dark bg-light">
                Car Available
            </a>
        </li>
        <li class="nav-item">
            <a href="add-car.php" id="addnewcar" class="nav-link text-dark bg-light">
                Add New Car
            </a>
        </li>
        <li class="nav-item">
            <a href="manage-cars.php" class="nav-link text-dark bg-light">
                Manage Cars
            </a>
        </li>
        <li class="nav-item">
            <a href="booking.php" class="nav-link text-dark bg-light">
                Bookings
            </a>
        </li>
        <li class="nav-item">
            <a href="logout.php" class="nav-link text-dark bg-light">
                Logout
            </a>
        </li>
    </ul>
</div>

<script>
    $(document).ready(function() {

        $(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar, #content').toggleClass('active');
            });
        });

    });
</script>