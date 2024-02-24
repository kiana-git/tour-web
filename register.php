<?php
 $username="";
 $email="";
 $password="";
 $confirmpass="";
 $errors=[];
 $congra="";

 $conn=mysqli_connect("localhost","root","","database");

 if(isset($_POST['Register'])){
    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpass=mysqli_real_escape_string($conn,$_POST['confirmpass']);

    if($password!=$confirmpass){
        array_push($errors,"password doesn't match!");
    }
    $user_check_query="SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result= mysqli_query($conn, $user_check_query);
    $user=mysqli_fetch_assoc($result);

    if($user['username']===$username){
        array_push($errors,"User name already exist!");
    }else if($user['email']===$email){
        array_push($errors,"email already exist!");
    }
    if(count($errors)===0){
        $query="INSERT INTO users (username,email,password) VALUES('$username','$email','$password')";
        mysqli_query($conn,$query);
            $congra="You are successfilly registerd!";
    }
 }




?>



<!DOCTYPE html>
<html >
<head>
    <title>Register</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.1.0/fonts/remixicon.css"
    rel="stylesheet"
/>
<link rel="stylesheet" href="style/register.css">
</head>
<body>
    <div class="register">
        <img class="register-img" src="style/loginn.jpg">

        <form action="register.php" method="post" class="register-form">
            <h1 class="register-title">Register</h1>
        
                <?php include 'error.php'; ?>
        
            <?php echo $congra ?>

            <div class="content">

                <div class="registerbox">
                    <i class="ri-user-3-line"></i>
      
                           <div class="registerbox-input">
                                <input type="text" name="username" class="register-input" id="usename"  placeholder="" required>
                                <label for="username" class="register-lable">Username</label>
                           </div>
                        </div>

                <div class="registerbox">
                  <i class="ri-mail-line mail-icon"></i>
    
                         <div class="registerbox-input">
                              <input type="email" name="email" class="register-input" id="email"  placeholder="" required>
                              <label for="email" class="register-lable">Email</label>
                         </div>
                      </div>

                         <div class="registerbox">
                  <i class="ri-lock-2-line lock-icon"></i> 
    
                         <div class="registerbox-input">
                              <input type="password" name="password" class="register-input" id="password" placeholder="" required>
                              <label for="password" class="register-lable">Password</label>
                
                         </div>
                      </div>

                      <div class="registerbox">
                  <i class="ri-lock-2-line lock-icon"></i>
    
                         <div class="registerbox-input">
                              <input type="password" name="confirmpass" class="register-input" id="confirm-pass" placeholder="" required>
                              <label for="confirmpass" class="register-lable">Confirm password</label>
                    
                         </div>
                      </div>

                   
                    </div>
                    <p id="message"></p>
                    
                     <input type="submit" class="register-button" value="Register" name="Register">
                     <p class="login">Already have an account? <a href="login.php">Login</a> </p> 
        </form>
    </div>
</body>
</html>