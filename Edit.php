<?php
require('./Database.php');

$editID = $editN = $editU = $editP = ''; // Initialize variables

if (isset($_POST['edit'])) {
    $editID = $_POST['editID'];
    $result = mysqli_query($connection, "SELECT * FROM tbl3aaa WHERE ID = $editID");
    
    if ($result && mysqli_num_rows($result)) {
        $row = mysqli_fetch_assoc($result);
        $editN = $row['Name'];
        $editU = $row['UserName'];
        $editP = $row['Password'];
    } else {
        echo '<script>alert("User not found!"); window.location.href="/ANGELA3A/Admin.php";</script>';
        exit();
    }
}

if (isset($_POST['update'])) {
    $updateID = $_POST['updateID'];
    $updateN = mysqli_real_escape_string($connection, $_POST['updateN']);
    $updateU = mysqli_real_escape_string($connection, $_POST['updateU']);
    $updateP = mysqli_real_escape_string($connection, $_POST['updateP']);

    if (mysqli_query($connection, "UPDATE tbl3aaa SET Name='$updateN', UserName='$updateU', Password='$updateP' WHERE ID=$updateID")) {
      //  echo '<script>alert("Successfully Edited!"); window.location.href="/ANGELA3A/Admin.php";</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h3 {
            text-align: center;
            color: #343a40;
        }
        .form-control {
            margin-bottom: 15px; /* Space between input fields */
        }
        .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Data Information</h1>
        <form method="post">
            <h3>Edit Info</h3>
            <div class="form-group">
                <input type="text" name="updateN" placeholder="Enter your Name" value="<?php echo htmlspecialchars($editN); ?>" required class="form-control" />
            </div>
            <div class="form-group">
                <input type="text" name="updateU" placeholder="Enter your UserName" value="<?php echo htmlspecialchars($editU); ?>" required class="form-control" />
            </div>
            <div class="form-group">
                <input type="password" name="updateP" placeholder="Enter your Password" value="<?php echo htmlspecialchars($editP); ?>" required class="form-control" />
            </div>
            <button type="submit" name="update" class="btn btn-primary">SAVE</button>
            <input type="hidden" name="updateID" value="<?php echo htmlspecialchars($editID); ?>"/>
        </form>
    </div>
</body>
</html>