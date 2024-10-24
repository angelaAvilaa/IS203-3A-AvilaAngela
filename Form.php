<?php 
session_start(); // Start the session
require('./Read.php');

// Handle search functionality
$searchTerm = '';
if (isset($_POST['search'])) {
    $searchTerm = mysqli_real_escape_string($connection, $_POST['searchTerm']);
}

$queryAccount = "SELECT * FROM cform WHERE Concern LIKE '%$searchTerm%'"; // Adjust query for searching
$sqlAccount = mysqli_query($connection, $queryAccount);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <style>
        @media print {
            #printButton {
                display: none;
            }
        }
        #printButton {
            background-color: green; 
            color: white; 
            border: none; 
            padding: 10px 15px; 
            font-size: 16px; 
            cursor: pointer; 
            margin-top: 20px; /* Top margin */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="page.php">WEBPAGE</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="Admin.php">Admin Table</a></li>
            <li><a href="Email.php">Email Notification</a></li>
            <li><a href="#">SMS Notification</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="AdminLog.php">Log Out</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <br>
    <div class="row">
        <div class="col-md-8">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h1>
        </div>
        <div class="col-md-4 text-right">
            <!-- Search Form -->
            <form action="Form.php" method="post" class="form-inline" style="margin-top: 20px;">
                <input type="text" name="searchTerm" placeholder="Search by Concern" class="form-control" required />
                <input type="submit" name="search" value="SEARCH" class="btn btn-info" />
            </form>
        </div>
    </div>

    <br>

    <form action="Create(2).php" method="post">
        <h3>Create User Info</h3>
        <input type="text" name="Name" placeholder="Enter your Name" required />
        <input type="text" name="EmailAddress" placeholder="Enter your EmailAddress" required />
        <input type="text" name="PhoneNumber" placeholder="Enter your Phone Number" required />
        <input type="text" name="Concern" placeholder="Enter your Concern" required />
        <input type="submit" name="create" value="CREATE" class="btn btn-success" />
    </form>

    <br>
    <table class="table">
        <tr class="info">
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Concern</th>
            <th>Actions</th>
        </tr>
        <?php while ($results = mysqli_fetch_array($sqlAccount)) { ?>
            <tr class="table table-bordered">
                <td><?php echo $results['ID']; ?></td>
                <td><?php echo htmlspecialchars($results['Name']); ?></td>
                <td><?php echo htmlspecialchars($results['EmailAddress']); ?></td>
                <td><?php echo htmlspecialchars($results['PhoneNumber']); ?></td>
                <td><?php echo htmlspecialchars($results['Concern']); ?></td>
                <td>
                    <form action="Edit(2).php" method="post" style="display:inline;">
                        <input type="submit" name="edit" value="EDIT" class="btn btn-primary" style="width: 80px;">
                        <input type="hidden" name="editID" value="<?php echo $results['ID']; ?>">
                        <input type="hidden" name="editN" value="<?php echo htmlspecialchars($results['Name']); ?>">
                        <input type="hidden" name="editE" value="<?php echo htmlspecialchars($results['EmailAddress']); ?>">
                        <input type="hidden" name="editP" value="<?php echo htmlspecialchars($results['PhoneNumber']); ?>">
                        <input type="hidden" name="editC" value="<?php echo htmlspecialchars($results['Concern']); ?>">
                    </form>
                    <form action="Delete(2).php" method="post" style="display:inline;">
                        <input type="submit" name="delete" value="DELETE" class="btn btn-danger">
                        <input type="hidden" name="deleteID" value="<?php echo $results['ID']; ?>">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>

    <!-- Print button moved to the bottom -->
    <button id="printButton" onclick="window.print()">Print</button>
</div>
</body>
</html>
