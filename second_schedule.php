<?php
include "db.php"; // Include your database connection file
include "header.php"; // Include your header file if necessary

// Handle edit form submission
if (isset($_POST['update_schedule'])) {
    $schedule_id = $_POST['id'];
    $time = $_POST['time'];
    $mon = $_POST['mon'];
    $tue = $_POST['tue'];
    $wed = $_POST['wed'];
    $thu = $_POST['thu'];
    $fri = $_POST['fri'];
    $sat = $_POST['sat'];

    $query = "UPDATE schedule_second SET time = '{$time}', Mon = '{$mon}', Tue = '{$tue}', Wed = '{$wed}', Thu = '{$thu}', Fri = '{$fri}', Sat = '{$sat}' WHERE id = {$schedule_id}";

    $update_result = mysqli_query($conn, $query);

    if (!$update_result) {
        die("Update query failed: " . mysqli_error($conn));
    } else {
        // Redirect back to the schedule page after successful update
        header("Location: second_schedule.php");
        exit;
    }
}

// Fetch schedule entries for display
$query = "SELECT * FROM schedule_second";
$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

?>

<style>
    /* Adjustments to prevent collision with navbar and sidebar */
    .schedule-container {
        margin-top: 60px; /* Ensure space above the table */
        margin-left: 200px;
    }

    .schedule-container h2 {
        color: #5c43e7; /* Purple color for the heading */
        margin-left: 500px;
    }

    .table-bordered {
        border-color: #ddd; /* Lighter border color */
    }

    .table-bordered th,
    .table-bordered td {
        border: 1px solid #ddd; /* Lighter border for table cells */
    }

    .table-bordered thead {
        background-color: #5c43e890; /* Purple background for table header */
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

    .btn {
        margin: 2px; /* Adjust button margin */
    }

    .edit-form {
        display: none; /* Hide edit form initially */
    }

    .edit-form.active {
        display: block; /* Show edit form when active */
    }
</style>

<div class="container schedule-container">
    <div class="row">
        <div class="col-md-12">
            <h2>2nd Year Schedule</h2>
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                            <th>Saturday</th>
                            <?php
                            if ($_SESSION['role'] == 'admin') {
   
                           echo  "<th>Action</th>";
                            } ?>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['time']}</td>";
                            echo "<td>{$row['Mon']}</td>";
                            echo "<td>{$row['Tue']}</td>";
                            echo "<td>{$row['Wed']}</td>";
                            echo "<td>{$row['Thu']}</td>";
                            echo "<td>{$row['Fri']}</td>";
                            echo "<td>{$row['Sat']}</td>";
                            
                            if ($_SESSION['role'] == 'admin') {
                            echo "<td>";
                            echo "<button class='btn btn-primary btn-sm edit-btn' data-schedule-id='{$row['id']}'>Edit</button>"; // Edit button
                            echo "</td>"; }
                            echo "</tr>";
                            // Edit form for each row
                            echo "<tr class='edit-form' id='edit-form-{$row['id']}'>";
                            echo "<td colspan='7'>";
                            echo "<form method='POST' action='second_schedule.php'>";
                            echo "<input type='hidden' name='id' value='{$row['id']}'>";
                            echo "<input type='text' name='time' value='{$row['time']}' class='form-control' placeholder='Time' required>";
                            echo "<input type='text' name='mon' value='{$row['Mon']}' class='form-control' placeholder='Monday' required>";
                            echo "<input type='text' name='tue' value='{$row['Tue']}' class='form-control' placeholder='Tuesday' required>";
                            echo "<input type='text' name='wed' value='{$row['Wed']}' class='form-control' placeholder='Wednesday' required>";
                            echo "<input type='text' name='thu' value='{$row['Thu']}' class='form-control' placeholder='Thursday' required>";
                            echo "<input type='text' name='fri' value='{$row['Fri']}' class='form-control' placeholder='Friday' required>";
                            echo "<input type='text' name='sat' value='{$row['Sat']}' class='form-control' placeholder='Saturday' required>";
                            echo "<button type='submit' name='update_schedule' class='btn btn-success btn-sm'>Update</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    // Script to toggle edit form visibility
    const editBtns = document.querySelectorAll('.edit-btn');
    editBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const scheduleId = btn.getAttribute('data-schedule-id');
            const editForm = document.getElementById(`edit-form-${scheduleId}`);
            editForm.classList.toggle('active');
        });
    });
</script>

<?php
// Include admin navigation only if user role is admin
if ($_SESSION['role'] == 'admin') {
    include "admin.php"; // Include navigation file for admin
}
?>

<?php mysqli_close($conn); ?>
