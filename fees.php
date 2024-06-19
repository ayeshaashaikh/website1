<?php
session_start();
include "db.php"; // Include the database connection file
include "header.php"; // Include your header file if necessary
// Include navigation file if necessary
include "navigation.php";
?>

<style>
    /* Adjustments to prevent collision with navbar and sidebar */
    .table-container {
        margin-top: 60px; /* Ensure space above the table */
        margin-left: 200px;
      

    }

    .table-container h2 {
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
h2{
    color:rgba(4,36,61,255);
}
</style>

<div class="container table-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Fees</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Retrieve username from session
                        if (isset($_SESSION['username'])) {
                            $username = $_SESSION['username'];

                            // Query to fetch fee records for the logged-in user based on username
                            $query = "SELECT f.total_amount, f.paid_amount, f.payment_date FROM fees f
                                      INNER JOIN users u ON f.user_id = u.user_id
                                      WHERE u.username = ?";
                            $stmt = $conn->prepare($query);
                            $stmt->bind_param("s", $username);
                            $stmt->execute();
                            $result = $stmt->get_result();

                            if (!$result) {
                                die("Query failed: " . mysqli_error($conn));
                            }

                            $row_color = '#fff'; // Initialize row color

                            while ($row = mysqli_fetch_assoc($result)) {
                                $row_color = ($row_color == '#fff') ? '#f2f2f9' : '#fff'; // Toggle row color
                                echo "<tr style='background-color: {$row_color}'>";
                                echo "<td>{$row['total_amount']}</td>";
                                echo "<td>{$row['paid_amount']}</td>";
                                echo "<td>{$row['payment_date']}</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>No fee records found for this user.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Close the database connection -->
<?php mysqli_close($conn); ?>

<!-- Include footer if needed -->
<?php // include "footer.php"; ?>

