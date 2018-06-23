<?php
    $controllerFolder = 'controllers';
    define('CONTROLLER', $controllerFolder);

    $modelFolder = 'models';
    define('MODEL', $modelFolder);
    
    if(!is_dir(CONTROLLER)){
       exit('Controller folder does not exist');
    }

    if(!is_dir(MODEL)){
       exit('Model folder does not exist');
    }
    include 'asset/header-footer/header.inc.php';
    ?>
<!DOCTYPE html>
<html>
<br>
    <div class="alert alert-warning" id="errorMessg" > Some Error!</div>

            <?php
                 include_once CONTROLLER. "/Errors_Show.php";
            ?> 
           
       
        <div class="formfill">
            <form action="controllers/users.php" method="post" name="registerForm" class="form-group form">
                <div class= "col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2 ">
                    <input type ="text" required class= "form-control formset"  placeholder="Pick Username" aria-required="true" name="username"> 
                    <input type="email" required class="form-control formset" name="email" placeholder="Email" aria-required="true" >
                    <input type="number" required maxLength="13"  placeholder="2348181234531" name="phonenumber" class="form-control formset">
                    <input type="password" required class="form-control formset" name="password" placeholder="Password"  aria-required="true" >
                    <input type="password" required class = "form-control formset" name="confirm-password" placeholder = "Confirm password"  aria-required="true">
                    <span><input type="checkbox" required name="agree" id="agree"> By Clicking You Agree To Our <a href="#"><b>Term Of Use</b></a> And <a href="#"><b>Privacy Policy</b></a></span><br>
                    <br><span style="float:right;"><button type="submit" class ="btn btn-success disabled " name="register-user" id ="signup">Sign UP</button></span> <br><br>
                    <span> Have an Account?<a href="login.php" style="font-size:14px; color:black;"><b> Login</b></a></span>
                </div>
            </form>
        </div>     
           
           
      
    <script src="asset/script/signup.js"></script>
    </html>
    <?php
        include 'asset/header-footer/footer.inc.php';
    ?>