<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registeration</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="asset/css/main.css" />
</head>
<body>
    <div class="container-fluid">
        <div class="row">
             <div class="header">
                 <div class="col-lg-offset-5 col-md-offset-5  col-sm-offset-5  col-xs-offset-4"><h3>Textrix</h3></div>
             </div>
            <hr>
            <!-- <?php
                    // if(isset($_POST['username']) && !empty($_POST['username'])){
                    //     $username = $_POST['username'];
                    //   if(!preg_match('\kingojem\'',$username)){
                    //         echo '<h4 id="errMssg">.$username. Must Contain Only Letters & Numbers</h4>';
                    //      }
                    // }
                ?> -->
            <div class="formfill">
            <div class="alert">
                <span class="close btn" onclick="">&times;</span>
                <h4 id="errMssg" ><!-- This Displays An Error Message --></h4>
                
                
            </div>
                <form action="index.php" method="post" name="registerForm" class="form-group form">
                    <div class= "col-lg-8 col-md-8 col-md-offset-2 col-lg-offset-2 ">
                        <input type ="text" class= "form-control formset"  placeholder="Pick Username" required aria-required="true" name="username"> 
                        <input type="email" class="form-control formset" name="email" placeholder="Email" aria-required="true" required>
                        <input type="password" class="form-control formset" name="password" placeholder="Password" required aria-required="true" >
                        <input type="password" class = "form-control formset" name="confirmPassword" placeholder = "Confirm password"  required aria-required="true">
                        <span><input type="checkbox" required name="agree" id="agree"> By Clicking You Agree To Our <a href="#"><b>Term Of Use</b></a> And <a href="#"><b>Privacy Policy</b></a></span>
                        <br><span style="float:right;"><button type="submit" class ="btn btn-success disabled" id ="signup">Sign UP</button></span> 
                    </div>
                </form>
            </div>
            <footer>
                <div class="footer col-sm-offset-8 col-md-offset-8 col-lg-offset-9">
                    All Right Reserved, J.I.S.T Network&reg; <?php echo '20'.$date = Date('y');?>
                </div>
            </footer>
        </div>
    </div>
     <script src="asset/script/main.js"></script>
</body>
</html>