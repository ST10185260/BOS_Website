<?php
session_start();

include('connection.php');

if(isset($_POST['register'])){

    $name = $_POST['name'];
    $email =$_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['ConfirmPassword'];


    if($password !== $confirmPassword){
        header('location: AdminRegister.php?error=password dont match');
    }
    else if(strlen($password) < 6){
        header('location: AdminRegister.php?error=password must be at least 6 characters');
    } elseif (!preg_match('/[0-9]/', $password)) {
        header('location: AdminRegister.php?error=Password must contain at least one number');
    } elseif (!preg_match('/[\W]/', $password)) {
        header('location: AdminRegister.php?error=Password must contain at least one special character');
    }
    else{

    //check if user is with this email or not
    $stmt1=$conn->prepare("SELECT count(*) FROM admin WHERE admin_email=?");
    $stmt1->bind_param('s',$email);
    $stmt1->execute();
    $stmt1->bind_result($num_rows);
    $stmt1->store_result();
    $stmt1->fetch();

    //if there is a user alreadt registered with this email
    if($num_rows != 0){
        header('location: AdminRegister.php?error=user with this email already exsits');
    }

    else{

    $stmt = $conn->prepare("INSERT INTO admin(admin_name,admin_email,admin_password)
                            VALUES (?,?,?)");

    $stmt->bind_param('sss',$name,$email,md5($password));   

    //if account was created successfully
    if($stmt->execute()){
        $user_id = $stmt->insert_id;
        $_SESSION ['admin_id'] = $user_id;
        $_SESSION['admin_email'] = $email;
        $_SESSION['admin_name'] = $name ;
        $_SESSION['logged_In'] = true;
        header('location: AdminLogin.php?Register_success=You registered successfully');
    }else{
        header('location: AdminRegister.php?error=could  not create an account at the moment');
    }
}

}
//if user has already registered ,then take user to account page 
}else if(isset($_SESSION['logged In'])) {
    header('location:Dashboard.php');
    exit;
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
                <h3 class="form-weight-bold">Register</h3>
                <hr><!-- comment -->
            </div>
            <div class="mx-auto container">
                <form id="register-form" method="POST" action="AdminRegister.php">
                    <p><?php if(isset($_GET['error'])){echo $_GET['error'];}?></p>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" id="regiseter-name" name="name" placeholder="username" required />
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" id="regiseter-email" name="email" placeholder="email" required />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="regiseter-passsword" name="password" placeholder="password" required />
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <input type="password" class="form-control" id="regiseter-confirm-passsword" name="ConfirmPassword" placeholder="Confirm password" required />
                    </div>
                     <div class="form-group">
                        <input type="submit" class="btn" id="register-btn" name="register" value="Register" />
                    </div>
                     <div class="form-group">
                         <a id="login-url" href="AdminLogin.php" class="btn" >Do you have account ? Login</a>
                    </div>
                </form>
            </div>
        </section>





    </body>
</html>