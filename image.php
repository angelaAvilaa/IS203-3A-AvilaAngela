<?php
session_start();

// Check if the user is logged in
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$profile_pic = 'default-profile.png'; // Default image

if ($user_id) {
    // Define the path to the user's profile picture file
    $profile_file = "user_profile_{$user_id}.txt";

    // Check if the profile picture file exists
    if (file_exists($profile_file)) {
        // Get the path to the profile picture from the file
        $profile_pic = file_get_contents($profile_file);
        
        // Verify that the file exists and is an image
        if (!file_exists($profile_pic) || !is_image($profile_pic)) {
            $profile_pic = 'default-profile.png'; // Fallback if file doesn't exist or is not an image
        }
    }
}

// Serve the image
if (file_exists($profile_pic)) {
    $image_info = getimagesize($profile_pic);
    header('Content-Type: ' . $image_info['mime']); // Set the appropriate content type
    readfile($profile_pic); // Read and output the image file
} else {
    // If the image doesn't exist, serve the default image
    header('Content-Type: image/jpeg');
    readfile('default-profile.png');
}

// Function to check if the file is an image
function is_image($file) {
    $image_types = ['jpg', 'jpeg', 'png', 'gif'];
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
    return in_array($extension, $image_types);
}
?>
