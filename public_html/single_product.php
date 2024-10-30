<?php 

include("connection.php");

if(isset($_GET["product_id"])){

    $product_id =    $_GET["product_id"];
    $stmt = $conn->prepare("SELECT * FROM products where product_id= ?");
    $stmt->bind_param("i",$product_id);
    $stmt->execute();
    
    $products = $stmt->get_result();//[]
}
else{
    header('location: index.php');
}





?>




<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
   
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
  <div class="container">
      <img class="logo" src="Logo1.jpg" alt=""/>
      <h2 class="brand">Boys Of Soweto</h2>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        
         <li class="nav-item">
          <a class="nav-link" href="shop.php">Shop</a>
        </li>
        
        
         <li class="nav-item">
          <a class="nav-link" href="contact.html">Contact Us</a>
        </li>
        
        <li class="nav-item">
        <a href="Cart.php">
            <i class="fas fa-solid fa-cart-shopping">
                <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] !=0) {?>
                    <span> <?php echo $_SESSION['quantity'] ;?> </span>
                <?php } ?>

            </i>
                </a>
             <a href="account.php"><i class="fas fa-solid fa-user"></i><a>
        
        </li>    
       
      </ul>
   
    </div>
  </div>
</nav>
<section class="container single-product my-5 pt-5">
    <div class="row mt-5">
        <?php while($row = $products->fetch_assoc()) { ?> 
        <form method="post" action="Cart.php">
            <!-- Product Image Column -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <img class="img-fluid w-100 pb-1" src="<?php echo $row['product_image']; ?>" alt="Product Image"/>
            </div>

            <!-- Product Details Column -->
            <div class="col-lg-6 col-md-6 col-sm-12">
                <h6>Dress</h6>
                <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
                <h2>R<?php echo $row['product_price']; ?></h2>

                <!-- Size Selection -->
                <label for="size-select">Size</label>
                <select id="size-select" class="form-control mb-3">
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                </select>

                <!-- Product Form -->
                <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>" />
                <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>" />
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>" />
                <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>" />

                <!-- Quantity and Add to Cart Button -->
                <label for="quantity">Quantity</label>
                <input type="number" name="product_quantity" id="quantity" value="1" class="form-control mb-3" min="1"/>

                <button class="buy-btn btn btn-primary mt-3" type="submit" name="add_to_cart">Add to Cart</button>

                <!-- Product Description -->
                <h4 class="mt-5 mb-3">Product Details</h4>
                <p><?php echo $row['product_description']; ?></p>
            </div>  
        </form>
        <?php } ?>  
    </div>
</section>

        
        <!--Related Products-->
        <section id="related-products" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Related Products</h3>
        <hr>
    </div>
    <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3" src="IMG_F1.jpg"/>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Dress</h5>
            <h4 class="p-price">R4500</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        
        <!-- Feature 2 -->
        <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3" src="IMG_F2.jpg"/>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Certified Tracksuit</h5>
            <h4 class="p-price">R5200</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        
        <!-- Feature 3 -->
        <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3" src="IMG_F3.jpg"/>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Leather Shorts</h5>
            <h4 class="p-price">R3500</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
        
        <!-- Feature 4 -->
        <div class="product text-center col-lg-3 col-md-4 col-sm-6">
            <img class="img-fluid mb-3" src="IMG_F4.jpg"/>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name">Shawl</h5>
            <h4 class="p-price">R2200</h4>
            <button class="buy-btn">Buy Now</button>
        </div>
    </div>
</section>


        
        <footer class="mt-5 py-5">
              <div class="row container mx-auto pt-5">
                  <div class="footer onecol-lg-3 col-md-6 col-sm-12">                      
                      <img class="logo" src="Logo1.jpg" alt=""/>
                      <p class="pt-3">We provide the best products for the most affordable prices></p>
                  </div>
                   <div class="footer onecol-lg-3 col-md-6 col-sm-12">                      
                       <h5 class="pb-2">Featured</h5>
                       <ul class="text-uppercase">
                           <li><a href="#">Men</a></li>
                           <li><a href="#">Women</a></li>
                           <li><a href="#">Men</a></li>
                           <li><a href="#">Boys</a></li>
                           <li><a href="#">Girls</a></li>
                           <li><a href="#">New Arrival</a></li>
                           
                       </ul>
                  </div>
                   <div class="footer onecol-lg-3 col-md-6 col-sm-12">                      
                       <h5 class="pb-2">Contact Us</h5>
                       <div>
                           <h6 class="text-uppercase">Address</h6>
                           <p> 99 Juta St , Braamfontein , Johannesburg , 2001</p>
                       </div>
                       <div>
                           <h6 class="text-uppercase">Tel /Phone</h6>
                            <p>074 935 5220</p>
                       </div>
                        <div>
                           <h6 class="text-uppercase">Email</h6>
                            <p>Boysofsoweto@Gmail.com</p>
                       </div>
                        <div class="footer onecol-lg-3 col-md-6 col-sm-12">                      
                            <h5 class="pb-2">Instagram</h5>
                            <div class="row">
                                <img src="IMG_F1.jpg"class="img-fluid w-25 h-100 m-2"/>
                                 <img src="IMG_F2.jpg"class="img-fluid w-25 h-100 m-2"/>
                                  <img src="IMG_F3.jpg"class="img-fluid w-25 h-100 m-2"/>
                                   <img src="IMG_F4.jpg"class="img-fluid w-25 h-100 m-2"/>
                            </div>
                  </div>
              </div>
                  <div class="copyright mt-5">
                      <div class="row-container mx-auto">
                          <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                              <img src="Pay1.jpg"/>
                          </div>
                          <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                              <p>eCommerce @2024 All Rights Reserved</p>
                          </div>
                            <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                                <a href="#"><i class="fab fa-facebook"></i><a/>
                                <a href="#"><i class="fab fa-instagram"></i><a/>
                                <a href="#"><i class="fab fa-twitter"></i><a/>
                          </div>
                      </div>
                      
                  </div>
          </footer>
        <script src="https://kit.fontawesome.com/65e6ef9c8c.js" crossorigin="anonymous"></script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 
    </body>
</html>