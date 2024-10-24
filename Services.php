<!DOCTYPE html>
<html lang="en">
<head>
    <title>Our Services</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
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
        .services-container {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
            margin-bottom: 30px;
            text-align: center;
        }
        .service-card {
            margin-bottom: 20px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .service-card:hover {
            transform: translateY(-5px);
        }
        .service-icon {
            font-size: 40px;
            color: #007bff;
        }
        .service-title {
            font-size: 1.5rem;
            margin-top: 15px;
        }
        .service-description {
            font-size: 1.1rem;
            margin-bottom: 15px;
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
                <li class="nav-item active"><a class="nav-link" href="Page.php">Home</a></li>
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

<div class="container services-container">
    <h2>Our Services</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card service-card p-4 text-center">
                <i class="fas fa-braces service-icon"></i>
                <div class="service-title">Braces</div>
                <div class="service-description">Align your teeth for a perfect smile.</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card service-card p-4 text-center">
                <i class="fas fa-tooth service-icon"></i>
                <div class="service-title">Dental Fillings</div>
                <div class="service-description">Restore your teeth with durable fillings.</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card service-card p-4 text-center">
                <i class="fas fa-exclamation-triangle service-icon"></i>
                <div class="service-title">Tooth Extraction</div>
                <div class="service-description">Safe removal of problematic teeth.</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card service-card p-4 text-center">
                <i class="fas fa-broom service-icon"></i>
                <div class="service-title">Cleaning</div>
                <div class="service-description">Professional cleaning for a healthy mouth.</div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
