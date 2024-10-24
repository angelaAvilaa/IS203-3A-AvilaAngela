<?php 
require('./Database.php');

$errorMessage = '';

if (isset($_POST['create'])) {
    $Name = $_POST['Name'];
    $UserName = $_POST['UserName'];
    $Password = $_POST['Password'];

    // Validate that the name does not contain numbers
    if (preg_match('/[0-9]/', $Name)) {
        $errorMessage = "Error: Name must not contain numbers.";
    }
    // Validate that the username is a Gmail address
    elseif (filter_var($UserName, FILTER_VALIDATE_EMAIL) && strpos($UserName, '@gmail.com') !== false) {
        $querryCreate = "INSERT INTO tbl3aaa VALUES (null, '$Name', '$UserName', '$Password')";
        $sqlcreate = mysqli_query($connection, $querryCreate);

        if ($sqlcreate) {
            echo '<script>window.location.href = "/ANGELA3A/Login.php"</script>';
        } else {
            $errorMessage = "Error: " . mysqli_error($connection);
        }
    } else {
        $errorMessage = "Error: Username must be a valid Gmail address.";
    }
}
?>

<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background: #e7f3ff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        input, button {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #5cb85c;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
        p {
            text-align: center;
        }
        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Registration Form</h1>
    <form method="POST" action="">
        <input type="text" name="Name" placeholder="Name" required pattern="[A-Za-z\s]+" title="Name must not contain numbers.">
        <input type="text" name="UserName" placeholder="UserName (must be a Gmail address)" required>
        <input type="password" name="Password" placeholder="Password" required>
        <button type="submit" name="create">Register</button>
        <p>Already have an account? <a href="Login.php">Log in</a></p>
        
        <?php if ($errorMessage): ?>
            <div class="error"><?php echo $errorMessage; ?></div>
        <?php endif; ?>
        
    </form>
</div>
</body>
</html>
