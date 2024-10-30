<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>
    <head>
        <title>Homepage</title>
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
     <!--homepage-->   
     <section id="home">
         <div class="" > 
             <h5>NEW ARRIVALS</h5>
             <h1>Best Prices This Season</h1>
             <p>BOS Offers best quality</p>
             <button>Shop Now</button>
         </div>
     </section>
     <section id="new"  class="w-100">
         <div class="row p-0 m-0">
             
             <div onclick="window.location.href='shop.php';"  class="one col-lg-4 col-md-12 col-sm-12 p-0">
                 <img class="img-fluid" src="Img1.jpg"/>
                 <div class="details">
                    <h2>Extremely Awesome Pieces</h2>
                     <button href="shop.php" class="text-uppercase">Shop Now </button>
                 </div>
             </div>
             
             <!--Two-->
      <div onclick="window.location.href='shop.php';" class="one col-lg-4 col-md-12 col-sm-12 p-0">
                 <img class="img-fluid" src="Img2.jpg"/>
                 <div class="details">
                     <h2> Awesome Jackets</h2>
                     <button href="shop.php" class="text-uppercase">Shop Now </button>
                 </div>
             </div>
             <!--Three-->          
              <div onclick="window.location.href='shop.php';" class="one col-lg-4 col-md-12 col-sm-12 p-0">
                 <img class="img-fluid" src="Img3.jpg"/>
                 <div class="details">
                     <h2> Awesome Shirts</h2>
                     <button href="shop.php" class="text-uppercase">Shop Now </button>
                 </div>
             </div>
         </div>
         <!--Featured--> 
         <section id="featured" class="my-5 pb5">
             <div class="container text-center mt-5 py-5"> 
                 <h3> Our Featured Products</h3>
                 <hr>
                 <p>Here you can check our featured products</p>
             </div>
             <div class="row mx-auto container-fluid">

             <?php include('get_featured_products.php'); ?>
             <?php while($row= $featured_products->fetch_assoc()) { ?>


                 <div onclick="window.location.href='Fifth_html.html';"  class="product text-center col-lg-3 col-md-4 col-sm-12">
                  <img class="img-fluid mb-3 " src="<?php echo $row['product_image'] ;?>"/>
                 <h5 class="p-name"><?php echo $row['product_name'] ;?></h5>
                 <h4 class="p-price"><?php echo $row['product_price'] ;?></h4>
                 <a href="single_product.php?product_id=<?php echo $row ['product_id'];?>?"><button class="buy-btn">Buy Now</button></a>
                 </div>
                 
  
                <?php } ?>
             </div>
         </section>
         <!--Banner--> 
         <section id="banner" class="my-5 py-5">
             <div class="container">
                 <h4>MID SEASON'SALE</h4>
                 <h1>Winter Collection <br> UP to 30% OFF</h1>
                 <button href="shop.php" class="text-uppercase">Shop Now</button>
             </div>
     </section>
         
         <!--Clothes-->
          <!--Featured--> 
         <section id="featured" class="my-5 ">
             <div class="container text-center mt-5 py-5"> 
                 <h3> Beanies , Shirts & Jerseys</h3>
                 <hr>
                 <p>Here you can check amazing pieces</p>
             </div>
             <div class="row mx-auto container-fluid">

             <?php include('get_featured_products2.php'); ?>
             <?php while($row= $featured_products2->fetch_assoc()) { ?>

              <div onclick="" class="product text-center col-lg-3 col-md-4 col-sm-12"> 
                  <img class="img-fluid mb-3 " src="<?php echo $row['product_image'] ;?>"/>
                  <div class="star">
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name"><?php echo $row['product_name'] ;?></h5>
                 <h4 class="p-price"><?php echo $row['product_price'] ;?></h4>
                 <a href="single_product.php?product_id=<?php echo $row ['product_id'];?>?"><button class="buy-btn">Buy Now</button></a>
                 </div>

                 <?php } ?>
             </div>
             <br>
         </section>
          
          <!--Footer-->
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
 