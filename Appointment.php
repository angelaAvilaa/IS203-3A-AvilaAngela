<?php 
require('./Database.php');

$errorMessage = '';
$successMessage = ''; // Variable to store success message

if (isset($_POST['create'])) {
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $concerns = isset($_POST['concerns']) ? $_POST['concerns'] : [];

    // Validate that the name does not contain numbers
    if (preg_match('/[0-9]/', $Name)) {
        $errorMessage = "Error: Name must not contain numbers.";
    } 
    // Validate that the email is a Gmail address
    elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL) || strpos($Email, '@gmail.com') === false) {
        $errorMessage = "Error: Email must be a valid Gmail address.";
    }
    // Validate that the phone number is numeric and exactly 11 digits
    elseif (!preg_match('/^\d{11}$/', $Phone)) {
        $errorMessage = "Error: Phone number must be exactly 11 digits.";
    }
    // Validate that at least one checkbox is selected
    elseif (empty($concerns)) {
        $errorMessage = "Error: You must select at least one concern.";
    } 
    // If all validations pass, insert into the database
    else {
        $concernsString = implode(", ", $concerns);
        $queryCreate = "INSERT INTO cform (Name, EmailAddress, PhoneNumber, Concern) VALUES ('$Name', '$Email', '$Phone', '$concernsString')";
        $sqlCreate = mysqli_query($connection, $queryCreate);

        if ($sqlCreate) {
            $successMessage = "Appointment successfully created!"; // Set success message
            // Optionally, redirect to another page after a few seconds
            echo '<script>setTimeout(function() { window.location.href = "/ANGELA3A/Page.php"; }, 3000);</script>';
        } else {
            $errorMessage = "Error: " . mysqli_error($connection);
        }
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
            margin: 0;
        }
        .navbar {
            background-color: #007bff;
            padding: 10px;
            color: white;
            text-align: center;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .container {
            background: #e7f3ff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin: 50px auto; /* Center the form vertically */
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
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
        input:focus, button:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #5cb85c;
            border: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #4cae4c;
        }
        p {
            margin-top: 15px;
            font-size: 14px;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .success {
            color: green;
            margin-top: 10px;
        }
        .concerns {
            margin: 15px 0;
            text-align: left; 
            display: flex;
            flex-direction: column; 
            align-items: flex-start; 
        }
        .concerns strong {
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
            color: #333;
        }
        .concerns label {
            display: flex; 
            align-items: center; 
            margin: 8px 0;
            font-size: 14px;
            color: #555;
            cursor: pointer;
            padding: 5px; 
            border-radius: 4px; 
            transition: background-color 0.2s; 
        }
        .concerns label:hover {
            background-color: #e0f7fa; 
        }
        .concerns input {
            margin-right: 8px; 
            margin-top: 2px; 
            transform: translateY(1px); 
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href="/ANGELA3A/Page.php">Home</a>
    <a href="/ANGELA3A/Services.php">Services</a>
    <a href="/ANGELA3A/Contact.php">Contact</a>
</div>

<div class="container">
    <h1>Appointment Form</h1>
    <form method="POST" action="">
        <input type="text" name="Name" placeholder="Name" required pattern="[A-Za-z\s]+" title="Name must not contain numbers.">
        <input type="email" name="Email" placeholder="Email (must be a Gmail address)" required>
        <input type="text" name="Phone" placeholder="Phone Number" required pattern="^\d{11}$" title="Phone number must be exactly 11 digits.">
        
        <div class="concerns">
            <strong>Select Your Concerns:</strong>
            <label><input type="checkbox" name="concerns[]" value="Braces"> Braces</label>
            <label><input type="checkbox" name="concerns[]" value="Dental Fillings"> Dental Fillings</label>
            <label><input type="checkbox" name="concerns[]" value="Tooth Extraction"> Tooth Extraction</label>
            <label><input type="checkbox" name="concerns[]" value="Cleaning"> Cleaning</label>
        </div>

        <button type="submit" name="create">Submit</button>
        
        <?php if ($errorMessage): ?>
            <p class="error"><?php echo $errorMessage; ?></p>
        <?php endif; ?>

        <?php if ($successMessage): ?>
            <p class="success"><?php echo $successMessage; ?></p>
        <?php endif; ?>
    </form>
</div>
</body>
</html>
