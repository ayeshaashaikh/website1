<?php
include "db.php"; // Assuming this file handles database connections
include "header.php"; // Including the header with Bootstrap links
include "navigation.php"; // Including the navigation bar
?>

<style>
/* Inline CSS */

#wrapper {
    padding-left: 0;
}

#sidebar-wrapper {
    position: fixed;
    top: 50px; /* Height of your navbar */
    left: 0;
    width: 200px;
    height: 100%;
    background: linear-gradient(to top, #ffffff, #5c43e7); /* Apply gradient background */
    padding-top: 40px;
}

#page-content-wrapper {
    margin-left: 200px; /* Width of the sidebar */
    padding: 15px;
}

/* Additional styling */
.nav-sidebar {
    margin-right: -15px; /* Adjust as needed */
}

.nav-sidebar > li > a {
    color: #333;
    padding: 10px 15px;
    text-decoration: none;
}

.nav-sidebar > li > a:hover {
    background-color: #fff;
}

/* Dropdown styling */
.nav-sidebar .dropdown-menu {
    background-color: #5c43e7; /* Purple background */
    border: none; /* Remove border */
    box-shadow: 0 5px 10px rgba(0,0,0,0.2); /* Add shadow */
}

.nav-sidebar .dropdown-menu a {
    color: #fff; /* White text */
    padding: 10px 20px; /* Padding */
    display: block; /* Block display for full width */
    text-decoration: none; /* Remove underlines */
}

.nav-sidebar .dropdown-menu a:hover {
    background-color: #4a3387; /* Darker purple on hover */
}
</style>

<div id="wrapper" class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="col-sm-3 col-md-2 sidebar">
            <ul class="nav nav-sidebar">
                <li>
                    <a href="manage_fees.php"><i class="fa fa-money"></i> Manage Fees</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-calendar"></i> Manage Schedule <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="second_schedule.php">2nd Year</a></li>
                        <li><a href="third_schedule.php">3rd Year</a></li>
                    </ul>
                </li>
                <li>
                    <a href="upload_material.php"><i class="fa fa-upload"></i> Upload Learning Material</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
        <!-- /#page-content-wrapper -->
    </div>
</div>
<!-- /#wrapper -->

<?php include "footer.php"; ?>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
