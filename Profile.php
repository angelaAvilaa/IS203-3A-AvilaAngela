<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: Login.php'); // Redirect to login if not logged in
    exit();
}

// Initialize message variable
$message = '';

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['profile_pic'])) {
    $user_id = $_SESSION['user_id'];
    $target_dir = "uploads/";

    // Create uploads directory if it doesn't exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    $file_name = basename($_FILES["profile_pic"]["name"]);
    $file_name = preg_replace('/[^A-Za-z0-9\._-]/', '', $file_name);
    $imageFileType = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $new_file_name = uniqid($user_id . '_', true) . '.' . $imageFileType; // Unique file name
    $target_file = $target_dir . $new_file_name;

    $uploadOk = 1;
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if ($check === false) {
        $message = "File is not an image.";
        $uploadOk = 0;
    }

    if ($_FILES["profile_pic"]["size"] > 500000) {
        $message = "File is too large.";
        $uploadOk = 0;
    }

    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $message = "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
            // Save the profile picture path to the user's specific file
            $profile_file = "user_profile_{$user_id}.txt";
            file_put_contents($profile_file, $target_file);
            $_SESSION['profile_pic'] = $target_file; // Store in session

            // Redirect to Page.php after successful upload
            header('Location: Page.php');
            exit();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Profile Picture</title>
</head>
<body>
    <h1>Upload Profile Picture</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_pic" accept="image/*" required>
        <button type="submit">Upload</button>
    </form>
    <?php if (!empty($message)): ?>
        <div style="color: red;"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
</body>
</html>
