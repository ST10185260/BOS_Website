<!-- index.php -->
<?php
session_start();
include('connection.php');

if (!isset($_SESSION['admin_id'])) {
    // Redirect to login page if not logged in
    header("Location: AdminLogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"> <!-- Replace with your FontAwesome kit link -->
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="index.php">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="Dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="AdminLogin.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Dashboard.php?logout=1" onclick="return confirm('Are you sure you want to logout?');">Logout</a>

                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h1 class="text-center mb-4">Admin Dashboard</h1>
    <div class="row g-4">
        
        <!-- Manage Orders Card -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-box fa-3x mb-3 text-primary"></i>
                    <h5 class="card-title">Manage Orders</h5>
                    <p class="card-text">View and manage all customer orders.</p>
                    <a href="Dashboard_Orders.php" class="btn btn-primary">Go to Orders</a>
                </div>
            </div>
        </div>

        <!-- Manage Users Card -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-users fa-3x mb-3 text-success"></i>
                    <h5 class="card-title">Manage Users</h5>
                    <p class="card-text">View and manage registered users.</p>
                    <a href="Dashboard_Users.php" class="btn btn-success">Go to Users</a>
                </div>
            </div>
        </div>

        <!-- Manage Products Card -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-tags fa-3x mb-3 text-warning"></i>
                    <h5 class="card-title">Manage Products</h5>
                    <p class="card-text">View and update product listings.</p>
                    <a href="Dashboard_Product.php" class="btn btn-warning">Go to Products</a>
                </div>
            </div>
        </div>

        <!-- Add Products Card -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <i class="fas fa-plus-circle fa-3x mb-3 text-info"></i>
                    <h5 class="card-title">Add Products</h5>
                    <p class="card-text">Add new products to the catalog.</p>
                    <a href="Dashboard_AddProducts.php" class="btn btn-info">Add Product</a>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/yourkit.js" crossorigin="anonymous"></script> <!-- Replace with your FontAwesome kit link -->
</body>
</html>
