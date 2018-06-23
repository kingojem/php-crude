<?php 

  $controllerFolder = 'controllers';
  define('CONTROLLER', $controllerFolder);
  if(!is_dir(CONTROLLER)){
    exit('Controller folder does not exist');
 }
include 'asset/header-footer/header.inc.php';
?>
<!DOCTYPE html>
<html>
<br>
<body>
<div class="alert alert-warning" id="errorMessg" > Some Error!</div>
            <?php
                 include_once CONTROLLER. "/Errors_Show.php";
            ?> 
    <div class="login">
            <form action="controllers/users.php" method="post" name="registerForm" class="form-group form">
                <div class= "col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2 ">
                <input type ="text" required class= "form-control formset"  placeholder="Username / Email / Phone Number" aria-required="true" name="username-login"> 
                <input type="password" required class="form-control formset" name="password-login" placeholder="Password"  aria-required="true" >
                <br><span style="float:right;"><button type="submit" class ="btn btn-success" name="login-user" id ="signup">Sign UP</button></span> <br><br>
                <span> Dont Have an Account?<a href="index.php" style="font-size:14px; color:black;"><b> Register Now</b></a></span>
            </form>
    </div>
</body>