  
<?php
    // this page display error to the  user as targetted
    if(isset($_GET['msg']) && $_GET['msg'] == "error1"){
        ?>
            <div class="alert alert-warning" id="error">All Fieldset Are Required ! -- Try Again</div>
        <?php
        // if one of the field or all of the field is empty 
                    
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "error12"){
        ?>
            <div class ="alert alert-warning" id ="error"> Username Or Password Weak ! -- Try Again ! </div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "error1567%"){
        ?>
            <div class ="alert alert-warning" id ="error">Inavlid Username Or Password Character ! -- Try Again ! </div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "error3467%"){
        ?>
            <div class ="alert alert-warning" id ="error">Inavlid Email ! -- Try Again ! </div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "!signin?"){
        ?>
            <div class ="alert alert-info" id ="error">Please Login Your Details To Continue ! -- Try Again ! </div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "passerr_6e%"){
        ?>
            <div class="alert alert-warning" id="error">Username And Password Cannot Be The Same ! -- Try Again</div>
        <?php
        // username and password cannot be the same
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "passerr_634%"){
        ?>
            <div class="alert alert-warning" id="error">Your Number Can Be Easily Guesssed, Try Another ! -- Try Again</div>
        <?php
        //Caant Pick ur Number
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "password\"21321ef76%"){
        ?>
        <div class ="alert alert-warning" id="error">Password Doesn't Match! -- Try Again ! </div>
        <?php
        //flags this error if password and confirm-password not correct!
    }
    if(isset($_GET['msg']) && $_GET['msg'] =="policy\"21321ef76%"){
        ?>
       <div class ="alert alert-warning" id="error">Agree To Our Term of Use ! -- Try Again ! </div>
       <?php
       //users havve to agree to the term of use
    }
    if(isset($_GET['msg']) && $_GET['msg'] =="num\"21321ef76%"){
        ?>
       <div class ="alert alert-warning" id="error">Invalid Number ! -- Try Again ! </div>
       <?php
       //users havve to agree to the term of use
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "error345%"){
        ?>
        <div class=" alert alert-danger" id ="error"> ...oops  Someone with Your Details Already exist ! -- Try Again !</div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "error695%"){
        ?>
        <div class=" alert alert-success" id ="error">Incorrect Username or Password ! -- Try Again !</div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "su_error3554%"){
        ?>
        <div class=" alert alert-sucess" id ="error"> ...oops  Something Went Wrong ! -- Try Again !</div>
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg']=="?"){
        ?>
        <script>
            {
                var modal = document.getElementById("myModal");
                modal.style.display="block";
                var err = document.getElementById("err");
                err.innerHTML = "File Upload Failed ! <br>  Either File Too Large or Invalid Format -- Try again!";
                err.style.color="red";
             }
            //Notify The user that The file Extention or format or size is ivalid or incorrect   
        </script>
        
        <?php
    }
    if(isset($_GET['msg']) && $_GET['msg'] == "uploaded!"){
        ?>
        <script>
            window.location.href = "welcome.php";
        </script>
        <?php
    }
?>