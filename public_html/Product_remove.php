<?php
session_start();
include('connection.php');

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    
    if ($stmt->execute()) {
        header("Location: Dashboard_Product.php?success=Product removed successfully");
    } else {
        echo "Error removing product: " . $stmt->error;
    }
} else {
    die("No product ID provided");
}
?>
