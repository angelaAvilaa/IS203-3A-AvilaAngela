<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome to Our Dental Clinic</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }
        nav {
            background-color: #343a40; /* Dark gray background for navigation */
        }
        nav .navbar-brand,
        nav .navbar-nav a {
            color: #fff !important; /* White text for navigation */
        }
        .jumbotron {
            position: relative;
            background-color: #add8e6; /* Light blue background for jumbotron */
            color: #333; /* Dark text for contrast */
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .jumbotron h1 {
            font-size: 3.5rem;
        }
        .jumbotron p {
            font-size: 1.25rem;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            color: #007bff;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Dr. Alvin's Dental Clinic</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active"><a class="nav-link" href="Page.php">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="Index.php">Registration</a></li>
                <li class="nav-item"><a class="nav-link" href="About.php">About Us</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="Logout.php" onclick="return confirm('Are you sure you want to log out?');">Log out</a></li>
                <li class="nav-item"><a class="nav-link" href="AdminRegistration.php">Admin</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="jumbotron">
    <h1>Welcome to Dr. Alvin's Clinic</h1>
    <p>Your smile is our priority! Experience top-notch dental care in a comfortable environment.</p> 
</div>
  
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="card p-3">
                <h3>Personalized Care</h3>
                <p>We believe in tailored treatments that cater to your unique dental needs.</p>
                <p>Our team is dedicated to ensuring a positive experience at every visit.</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card p-3">
                <h3>Expert Team</h3>
                <p>Our skilled professionals use the latest techniques to provide exceptional care.</p>
                <p>We stay updated with advancements in dentistry for the best outcomes.</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card p-3">
                <h3>Comprehensive Services</h3>        
                <p>From preventive care to cosmetic procedures, we have you covered.</p>
                <p>Your oral health is important to us, and we’re here to help you achieve it.</p>
            </div>
        </div>
    </div>
</div>

</body>
</html>
