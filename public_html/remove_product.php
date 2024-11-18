<?php
session_start();
include('connection.php');

if (isset($_GET['id'])) {
    $productId = $_GET['id'];

    // Prepare and execute delete statement
    $stmt = $conn->prepare("DELETE FROM order_items WHERE order_id = ?");
    $stmt->bind_param("i", $productId);
    
    if ($stmt->execute()) {
        header("Location: Dashboard_Orders.php?success=Product removed successfully");
    } else {
        echo "Error removing product: " . $stmt->error;
    }
} else {
    die("No product ID provided");
}
?>
