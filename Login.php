<?php
session_start(); // Start the session
require('./Database.php');

$errorMessage = ""; // Initialize an error message variable

if (isset($_POST['select'])) {
    $UserName = $_POST['email'];
    $Password = $_POST['password'];

    // Prepare and execute the statement to prevent SQL injection
    $stmt = $connection->prepare("SELECT * FROM tbl3aaa WHERE UserName = ? AND Password = ?");
    $stmt->bind_param("ss", $UserName, $Password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a user was found
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['id']; // Store user ID in session
        $_SESSION['user_name'] = $user['Name']; // Store user's name in session
        echo '<script>window.location.href = "/ANGELA3A/Page.php";</script>';
        exit; // Ensure no further code is executed
    } else {
        $errorMessage = "Please enter correct username and password."; // Set the error message
    }

    $stmt->close();
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
            color: #333;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
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
            text-align: center;
            margin-top: 15px;
        }
        a {
            color: #007BFF;
        }
        .error {
            color: red;
            text-align: center;
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
        <p>Don't have an Account? <a href="Index.php">Registration</a></p>
    </div>
</body>
</html>
