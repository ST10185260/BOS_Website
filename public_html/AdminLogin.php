<?php
session_start();

include('connection.php');

if(isset($_SESSION['Logged In'])){
    header('location:Dashboard.php');
    exit;
}


if(isset($_POST['login_btn'])){

    $email =$_POST['email'];
    $password = md5($_POST['password']);

    $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admin WHERE admin_email= ?  AND admin_password = ?");
    $stmt->bind_param('ss' , $email,$password);

    if($stmt->execute()){
        $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
        $stmt->store_result();

        if($stmt->num_rows() == 1){
            $stmt->fetch();
            $_SESSION['admin_id'] = $admin_id;
            $_SESSION['admin_name'] = $admin_name;
            $_SESSION['admin_email'] = $admin_email;
            $_SESSION['Logged In'] = true;

            header('location:AdminLogin.php?login_message=logged in successfully');

        }else {
            header('location:AdminLogin.php?message=Could not verify your account');
            
        }

    }
    else{
        //error
       header('location:AdminLogin.php?error=something went wrong');
   }

}
?>
<html>
    <head>
        <title>Register</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css"/>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
   
    </head>
    <body>


  

<section class="=my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h3 class="form-weight-bold">Login</h3>
                <hr><!-- comment -->
            </div>
            <div class="mx-auto container">
                <form id="login-form" method="POST" action="AdminLogin.php">
                    <div class="form-group" >
                        <?php if(isset($_GET['error'])){echo $_GET['error'];}?>
                        <label>Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="email" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="login-passsword" name="password" placeholder="password" required />
                    </div>
                     <div class="form-group">
                        <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
                    </div>
                     <div class="form-group">
                         <a id="register-url" href="AdminRegister.php" class="btn" >Don't have account ? Register</a>
                    </div>
                </form>
                <?php if (isset($_GET['message'])): ?>
        <script>
            // Display the message from the URL as an alert pop-up
            alert("<?php echo htmlspecialchars($_GET['message']); ?>");
        </script>
    <?php endif; ?>
            </div>
        </section>
    </body>
</html>