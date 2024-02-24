<?php 
 $email="";
 $password="";
 $error="";


 $conn= mysqli_connect("localhost","root","","database");

 if(isset($_POST['Login'])){
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);

    $sql="SELECT * FROM users WHERE email='".$email."' AND password='".$password."' LIMIT 1";
    $result= mysqli_query($conn,$sql);

    if(empty($email)){
        $error="email is required!";
    }else if(empty($password)){
        $error="password is mandatory!";
    } else if(mysqli_num_rows($result)==1){
        header('Location: http://localhost/login and register/home/index.html');
    }else{
        $error="your email or password is incorrect";
    }
 }

?>

<!DOCTYPE html>
<html>
<head>
    <title>login form</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>
 
    <link rel="stylesheet" href="style/login.css">
   <!-- <script src="login.js"></script> -->
</head>
<body>
    <div class="login">
        <img class="login-img" src="style/loginn.jpg">

        <form action="login.php" method="post" class="login-form">
            <h1 class="login-title">Login</h1>

            <div class="error">
                <?php echo $error; ?>
            </div>

            <div class="content">
                <div class="loginbox">
                <i class="ri-user-3-line login-icon"></i>
                    <div class="loginbox-input">
                         <input type="email" name="email" class="login-input" id="login-email" placeholder="">
                         <label for="" class="login-lable">Email</label>
                    </div>
                </div>

                <div class="loginbox">
                  <i class="ri-lock-2-line login-icon"></i>
    
                         <div class="loginbox-input">
                              <input type="password" name="password" class="login-input" id="login-pass" placeholder="">
                              <label for="" class="login-lable">Password</label>
                              <i class="ri-eye-off-line login-eye" id="login-eye"></i>
                         </div>
                      </div>
                    </div>
                     <div class="login-check">
                        <div class="check">
                            <input type="checkbox" class="input-check">
                            <label for="" class="lable-check">Remember me</label>

                        </div>
                             <a href="#" class="login-forget">Forgot password?</a>
                     </div>
                     <input type="submit" value="Login" name="Login" class="login-button">

                     <p class="register">Don't have an account? <a href="register.php">Register</a> </p>
                      
        </form>
    </div>
</body>
</html>   