<?php
session_start(); // Start the session

// Include necessary files
include "db.php";
include "header.php";
include "navigation.php";
// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Check if year_of_study is set in the session
if (isset($_SESSION['year_of_study'])) {
    $year_of_study = $_SESSION['year_of_study'];

    // Determine which schedule to include based on year of study
    if ($year_of_study == '2nd') {
        include "second_schedule.php"; // Include the schedule for 2nd year
    } elseif ($year_of_study == '3rd') {
        include "third_schedule.php"; // Include the schedule for 3rd year
    } else {
        echo "Year of study not recognized."; // Handle other cases if necessary
    }
} else {
    echo "Year of study not set in session."; // Handle if year_of_study is not set
}

// Include footer if needed
include "footer.php";

?>
<style>
    /* Adjustments to prevent collision with navbar and sidebar */
    .table-container {
        margin-top: 60px; /* Ensure space above the table */
        margin-left: 200px;
      

    }

    .schedule-container h2 {
        color:rgba(4,36,61,255); /* Purple color for the heading */
        margin-left: 500px;
        padding-bottom: 40px;
        padding-top:10px;
    }

    .table-bordered {
        border-color: #ddd; /* Lighter border color */
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd; /* Lighter border for table cells */
    }

    .table-bordered thead {
        background-color:rgba(4,36,61,255); /* Purple background for table header */
        color: #fff; /* White text for table header */
    }

    .table-hover tbody tr:hover {
        background-color: #f9f9f9; /* Light gray background on hover */
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: #fff; /* White background for odd rows */
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #f2f2f9; /* Light purple background for even rows */
    }
    header .container {
    display: flex;
    color: white;
    justify-content: space-between;
   
    align-items: center; /* Align items vertically */
    
   
    background-color:rgba(4,36,61,255);
    margin-left: 600px;
}

nav ul {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    margin-right: 20px; /* Add space between menu items */
}

nav ul li.logout {
    margin-left: auto; /* Push the logout link to the right */
}

nav ul li a {
    text-decoration: none;
    color: #ffffff;
    transition: color 0.3s;
}

header {
    background-color:rgba(4,36,61,255);
   margin-top:-60px;
}
