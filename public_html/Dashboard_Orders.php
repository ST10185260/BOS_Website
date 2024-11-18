<!-- orders.php -->
<?php
session_start();
include('connection.php');



$sql = "SELECT * FROM order_items"; // Adjust table name as needed
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Orders</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .product-image {
            max-width: 100px; /* Set maximum width */
            max-height: 100px; /* Set maximum height */
            width: auto; /* Allow width to adjust automatically */
            height: auto; /* Allow height to adjust automatically */
            object-fit: cover; /* Maintain aspect ratio, cropping if necessary */
        }
    </style>
</head>
<body>
    <?php include('DHeader.php'); ?>
    <div class="container mt-5">
        <h2>Manage Orders</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Order ID</th>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>User ID</th>
                    <th>Order Date</th>
                    <th>Product Price</th>
                    <th>Product Quantity</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["item_id"]; ?></td>
                            <td><?php echo $row["order_id"]; ?></td>
                            <td><?php echo $row["product_id"]; ?></td>
                            <td><?php echo $row["product_name"]; ?></td>
                            <td>
                                <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_image"]; ?>" class="product-image">
                            </td>
                            <td><?php echo $row["user_id"]; ?></td>
                            <td><?php echo $row["order_date"]; ?></td>
                            <td><?php echo $row["product_price"]; ?></td>
                            <td><?php echo $row["product_quantity"]; ?></td>
                            <td><a href="remove_product.php?id=<?php echo $row["order_id"]; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this product?');">Remove</a>
                            </td>
                            
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No orders found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include('FDashboard.php'); ?>
</body>
</html>
