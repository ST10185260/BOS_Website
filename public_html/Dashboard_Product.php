<!-- products.php -->
<?php
session_start();
include('connection.php');



$sql = "SELECT * FROM products"; // Adjust table name as needed
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
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
        <h2>Manage Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Product Category</th>
                    <th>Product Description</th>
                    <th>Product image</th>
                    <th>Product price</th>
                    <th>Product color</th>
                    <th>Remove</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $row["product_id"]; ?></td>
                            <td><?php echo $row["product_name"]; ?></td>
                            <td><?php echo $row["product_category"]; ?></td>
                            <td><?php echo $row["product_description"]; ?></td>
                            <td>
                                <img src="<?php echo $row["product_image"]; ?>" alt="<?php echo $row["product_image"]; ?>" class="product-image">
                            </td>
                            <td><?php echo $row["product_price"]; ?></td>
                            <td><?php echo $row["product_color"]; ?></td>
                              </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">No products found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php include('FDashboard.php'); ?>
</body>
</html>
