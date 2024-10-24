
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Information</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }
        .contact-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
          }
        nav {
            background-color: #343a40; 
        }
        nav .navbar-brand,
        nav .navbar-nav a {
            color: #fff !important; 
        }
        }
        h2 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .contact-info p {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .contact-info a {
            color: #007bff;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
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


<div class="container contact-container">
    <h2>Contact Information</h2>
    <div class="contact-info">
        <p>Email: <a href="mailto:example@gmail.com">Dr.Alvin'sDentalClinic@gmail.com</a></p>
        <p>Phone: <a href="tel:+1234567890">09999606059</a></p>
        <p>Address: San Vicente, Santa Rita, Pampanga</p>
    </div>
</div>

</body>
</html>
