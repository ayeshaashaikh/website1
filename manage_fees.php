<?php
include "db.php"; // Include the database connection file
include "header.php"; // Include your header file if necessary
include "admin.php"; // Include navigation file if necessary
?>

<style>
    /* Adjustments to prevent collision with navbar and sidebar */
    .table-container {
        margin-top: 60px; /* Ensure space above the table */
        margin-left: 200px;
    }

    .table-container h2 {
        color:  #5c43e7; /* Purple color for the heading */
        margin-left:500px;
    }

    .table-bordered {
        border-color: #ddd; /* Lighter border color */
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd; /* Lighter border for table cells */
    }

    .table-bordered thead {
        background-color:  #5c43e7; /* Purple background for table header */
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
</style>

<div class="container table-container">
    <div class="row">
        <div class="col-md-12">
            <h2>Manage Fees</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Fee ID</th>
                            <th>User ID</th>
                            <th>Total Amount</th>
                            <th>Paid Amount</th>
                            <th>Payment Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT fees.*, users.username FROM fees INNER JOIN users ON fees.user_id = users.user_id";
                        $result = mysqli_query($conn, $query); // Adjusted to use $conn

                        if (!$result) {
                            die("Query failed: " . mysqli_error($conn));
                        }

                        $row_color = '#fff'; // Initialize row color

                        while ($row = mysqli_fetch_assoc($result)) {
                            $row_color = ($row_color == '#fff') ? '#f2f2f9' : '#fff'; // Toggle row color
                            echo "<tr style='background-color: {$row_color}'>";
                            echo "<td>{$row['username']}</td>";
                            echo "<td>{$row['fee_id']}</td>";
                            echo "<td>{$row['user_id']}</td>";
                            echo "<td>{$row['total_amount']}</td>"; // Adjusted to total_amount
                            echo "<td>{$row['paid_amount']}</td>";  // Adjusted to paid_amount
                            echo "<td>{$row['payment_date']}</td>";
                            echo "</tr>";
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
