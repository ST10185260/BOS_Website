<?php
session_start();
include('connection.php');



// Check if the form is submitted
if (isset($_POST['add_product'])) {
    // Get product details from the form
    $productName = $_POST['product_name'];
    $productCategory = $_POST['product_category'];
    $productDescription = $_POST['product_description'];
    $productImage = $_FILES['product_image']['name'];
    $targetDir = "uploads/"; // Ensure this directory exists and is writable
    $productPrice = $_POST['product_price'];
    $productColor = $_POST['product_color'];

    // Move uploaded file to the target directory
    move_uploaded_file($_FILES['product_image']['tmp_name'], $targetDir . $productImage);

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO products (product_name, product_category,product_description, product_price,product_color) VALUES (?,?,?,?,?,?)");
    $stmt->bind_param("ssssis", $productName,$productCategory,$productDescription, $productImage,$productPrice,$productColor);

    if ($stmt->execute()) {
        header("Location: products.php?success=Product added successfully");
        exit();
    } else {
        echo "Error adding product: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Add New Product</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" id="product_name" name="product_name" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Category</label>
                <input type="text" class="form-control" id="product_category" name="product_category" required>
            </div>
            <div class="form-group">
                <label for="product_price">Product Description</label>
                <input type="text" class="form-control" id="product_description" name="product_description" required>
            </div>
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <input type="file" class="form-control" id="product_image" name="product_image" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Price</label>
                <input type="number" class="form-control" id="product_price" name="product_price" required>
            </div>
            <div class="form-group">
                <label for="product_name">Product Color</label>
                <input type="text" class="form-control" id="product_color" name="product_color" required>
            </div>
            <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
        </form>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success mt-3"><?php echo $_GET['success']; ?></div>
        <?php endif; ?>

        <h2 class="mt-5">Current Products</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch and display existing products
                $result = $conn->query("SELECT * FROM products");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['product_id']}</td>
                            <td>{$row['product_name']}</td>
                            <td>{$row['product_price']}</td>
                            <td><img src='uploads/{$row['product_image']}' alt='{$row['product_name']}' style='width: 100px;'></td>
                            <td>
                                <a href='edit_product.php?id={$row['product_id']}' class='btn btn-warning btn-sm'>Edit</a>
                                <a href='remove_product.php?id={$row['product_id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to remove this product?');\">Remove</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
