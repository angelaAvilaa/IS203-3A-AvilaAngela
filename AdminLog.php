<?php
session_start(); // Start the session
require('./Database.php');

$errorMessage = ""; // Initialize an error message variable

if (isset($_POST['select'])) {
    $UserName = $_POST['email'];
    $Password = $_POST['password'];

    // Validate user credentials
    $queryAccount = "SELECT * FROM admin WHERE UserName = '$UserName' AND Password = '$Password'";
    $sqlAccount = mysqli_query($connection, $queryAccount);

    // Check if a user was found
    if (mysqli_num_rows($sqlAccount) > 0) {
        $user = mysqli_fetch_assoc($sqlAccount);
        $_SESSION['user_name'] = $user['Name']; // Store user's name in session
        echo '<script>window.location.href = "/ANGELA3A/Admin.php";</script>';
    } else {
        $errorMessage = "Please enter correct username and password."; // Set the error message
    }
}
?>

<!DOCTYPE html>
<html lang="tl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            background:  #e7f3ff; 
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center; 
        }
        h1 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
            text-align: left; 
        }
        input {
            width: calc(100% - 22px); 
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: left; 
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        p {
            margin-top: 15px;
        }
        a {
            color: #007BFF;
        }
        .error {
            color: red;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LOG IN</h1>
        <form method="POST" action="">
            <label for="email">Username</label>
            <input type="email" id="email" name="email" placeholder="Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Password" required>

            <button type="submit" name="select">Log in</button>

            <?php if ($errorMessage): ?>
                <div class="error"><?php echo $errorMessage; ?></div>
            <?php endif; ?>
        </form>
        <p>Don't have an Account? <a href="AdminRegistration.php">Registration</a></p>
    </div>
</body>
</html>
