<?php 
$index = '../';
    define('INDEX',$index);
    class RegisterErrors{
        public function emptyString(){
            header("location:".INDEX."index.php?msg=error1");
            //none empty fields, fieild cannot be empty.
        }
        public function invalidString(){
            header("location:".INDEX."index.php?msg=error1567%");
            //check for valid string.
        }
        public function invaldEmail(){
            header("location:".INDEX."index.php?msg=error3467%");
        }
        public function shortStringLength(){
            header("location:".INDEX."index.php?msg=error12");
            //if the user name is lesser than 2 or password is lesser than 6;  
        }
        public function sameTypeError(){
            header("location:".INDEX."index.php?msg=passerr_6e%");
            // password and username wis the same which flags an error
        }
        public function pickedNumberError(){
            header("location:".INDEX."index.php?msg=passerr_634%");
            // U cant use ur number as a password!, try mixing
        }
       public function passwordConfirm(){
        header("location:".INDEX."index.php?msg=password\"21321ef76%");
            //flags this error if password and confirm-password not correct!
           
       }
       public function agree(){
        header("location:".INDEX."index.php?msg=policy\"21321ef76%");
            //users as tto Agree to thde Term of use;
       }
       public function wrongMobile(){
        header("location:".INDEX."index.php?msg=num\"21321ef76%");
        //users as tto Agree to thde Term of use;
       }
    }
    class LoginErrors{
        public function emptyStringLogin (){
            header("location:".INDEX."login.php?msg=error1");
            //none empty fields, fieild canmot be empty.
        } 
        public function sameTypeErrorLogin(){
            header("location:".INDEX."login.php?msg=passerr_6e%");
            // if one of the field or all of the field is empty
        }
    }
?>