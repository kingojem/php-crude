<?php 
session_start();
$modelFolder ='../models';
define('MODELS',$modelFolder);
include  MODELS.'/Users.php';
include 'errors.php';

if(isset($_POST['register-user'])){
  $register = new Register();
  $register -> Register();
}
if(isset($_POST['login-user'])){
    $login = new Login();
    $login -> Login();
}
if(isset($_post['make-post'])){
    $newPost = new MakeNewPost();
}
//$loginerrors = new LoginErrors(); 
 class Register{
    private $users ;
     public function Register(){
        $errors = new RegisterErrors();
            $this->users =  new Users();
            $username = strtolower(trim($_POST['username']));
            $password = strtolower(trim($_POST['password']));
            $confirmPassword = strtolower(trim($_POST['confirm-password']));
            $agreeTerms = $_POST['agree'];
            $email = strtolower(trim( $_POST['email']));
            $mobile =  trim($_POST['phonenumber']);
            $usernameLength = strlen($username);  // i want the right username Length;
            $passwordLength = strlen($password); // i want the right password length; 
            $mobileLength = strlen($mobile);  // right mobile number
            // ... collect @params .... No Needd to Crowd My user ! /
            
        if((empty($username) || empty($password) || empty($confirmPassword) || empty($mobile) || empty($email))){
                $flagError = $errors -> emptyString();
            }else if((!preg_match("/^[a-zA-Z0-9]*$/",$username)) || (!preg_match("/^[a-zA-Z0-9.@]*$/",$password))){
                $flagError = $errors -> invalidString();
            }else if(($usernameLength <= 2) || ($passwordLength  <= 5)){
                $flagError = $errors -> invalidEmail();
            }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
                $flagError = $errors -> shortStringLength();
            }else if(($username == $password)){
                $flagError = $errors -> sameTypeError();
            }else if(($mobile == $password)){
                $flagError = $errors -> sameTypeError();
            }else if(($agreeTerms !== 'on')){
                $flagError = $errors -> agree();
            }else if(($password !== $confirmPassword)){
                $flagError = $errors -> passwordConfirm();
            }else if(($mobileLength < 11 || $mobileLength > 13)){
                $flagError = $errors -> WrongMobile();
            }else if((!ctype_digit($mobile))){
                $flagError = $errors -> WrongMobile();
            }
        else{
             
                $sendNewUser =  $this->users -> register(['username' => $username,'password' =>$password, 'confirm-password' =>$confirmPassword,
                'email'=> $email, 'mobile' => $mobile ]) or die('error');
            }
     }
    
 }
    
class Login{
    private $users ;
    public function Login(){
    $loginerrors = new LoginErrors();
        $this->users =  new Users();
        $loginUser = strtolower(trim($_POST['username-login']));
        $loginPass = strtolower(trim($_POST['password-login']));
        if((empty($loginUser) || empty($loginPass))){
            $flagError = $loginerrors -> emptyStringLogin();
        }elseif($loginUser == $loginPass){
            $flagError = $loginerrors -> sameTypeErrorLogin();
        }else{
        
            $loginExistingUser = $this->users ->login($loginUser,$loginPass);
        }
    }
}
class MakeNewPost{
    
}

?>