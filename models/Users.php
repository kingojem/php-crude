<?php
session_start();
include_once "Database.php";

//  $contoller = '../controllers/';
//  define('CONTROLLERS',$contoller);
// if(!is_dir(CONTROLLERS)){
//     exit('Controller folder does not exist');
//  }
//  include_once CONTROLLERS. "errors.php";
 
class Users{
    // Properties
    private $db;
    private $userId;  // type int(11) 
    private $username;  // type varchar(10) 
    private $password;  // type varchar(100) 
    private $email;  // type varchar(200) 
    private $phoneNumber; // type varchar(15) 
    private $dateRegistered;

    public function __construct(){
        $database = new Database;
        $this->db = $database->getConnection();
        //$this ->db = $database ->__construct();
        
    }

    public function getUsers(){
       
    }
    // @params username
    // @params password
    // @return Boolean
    public function login($username,$password){
       // $status = false;
       //$getPass = password_verify($password,$rows['password']);
      //$myUsername = mysqli_real_escape_string($this->db,$username);

        $sql = "Select * From `users` WHERE  `users`.`username` = ?
                            or `users`.`email` =?
                            or  `users`.`phone_number` = ? ";
        $stmt = mysqli_stmt_init($this->db);
        if(!mysqli_stmt_prepare($stmt,$sql)){
            echo 'Something wrong here';
        }else{
            mysqli_stmt_bind_param($stmt,"sss",$username,$username,$username);
            mysqli_stmt_execute($stmt);
                    $result= mysqli_stmt_get_result($stmt);
                    $rows = mysqli_num_rows($result);
                    if($rows < 1){
                        header("location:../login.php?msg=error695%");
                    }else{
                        $sql = "Select * From `users` WHERE  `users`.`username` = '$username'
                        or `users`.`email` = '$username'
                        or  `users`.`phone_number` = '$username' ";
                        $users = mysqli_query($this->db, $sql);
                        while($rows = mysqli_fetch_assoc($users)){
                            $getPass = password_verify($password,$rows['password']);
                           if($getPass == false){
                                header("location:../login.php?msg=error695%");
                                exit();
                            }else if($getPass == true){
                                $sql= "INSERT into `logged-in`(`id`,`userid`) select `user_id`,`username` from `users` where `users`.`username`='$username'" ;
                                        mysqli_query($this->db, $sql);
                                    foreach($rows as $row => $v){
                                        $sqlog = "SELECT * from `logged-in` where `logged-in`.`userid`='$username'";
                                        $users = mysqli_query($this->db, $sqlog);
                                        $rows = mysqli_fetch_assoc($users);
                                        foreach($rows as $item =>$x){
                                            $_SESSION[$row] = $v;
                                            $_SESSION[$item] = $x;
                                        header("location:../welcome.php");

                                        }
                                    }
                                }
                            }
                        }
        }
    }

    // @return Array
    public function register($data = []){
        $_SESSION['username'] = 'username';
        $username = $data['username'];
        $password = $data['password'];
        $data['confirm-password'];
        $email= $data['email'];
        $mobile = $data['mobile'];
        $sql = "SELECT * From `users` where `users`.`username` =? 
                or `users`.`email` = ? or `users`.`phone_number` = ?";
                $stmt = mysqli_stmt_init($this->db);
                if(!mysqli_stmt_prepare($stmt,$sql)){
                    echo 'Something wrong here';
                }else{
                    mysqli_stmt_bind_param($stmt,"sss",$username,$email,$mobile);
                    mysqli_stmt_execute($stmt);
                    $result= mysqli_stmt_get_result($stmt);
                    $rows = mysqli_num_rows($result);
                    if(!$rows > 0){
                        $myPassword = password_hash($password,PASSWORD_DEFAULT);
                        $sql ="INSERT INTO `users`(`username`,`password`,`email`,`phone_number`) 
                                VALUES (?,?,?,?)";
                        $stmt = mysqli_stmt_init($this->db);
                            if(!mysqli_stmt_prepare($stmt,$sql)){
                                header("location:../index.php?msg=su_error3554%");
                            }else{
                                
                                mysqli_stmt_bind_param($stmt,"ssss",$username,$myPassword,$email,$mobile);
                                mysqli_stmt_execute($stmt);
                                mysqli_stmt_get_result($stmt);
                                $directory ="../models/profiles/$username/images/profile-picture/";
                                mkdir($directory,0777,true);
                                header("location:../login.php"); 
                            }
                  }else{
                        header("location:../index.php?msg=error345%");
                                die();
                    }
                }
    }
    public function makePost($data = []){
        print_r($data);
    }

    public function setUserId($userId,$myPassword){
        $this->userId = $userId;
    }
    public function getUserId(){
        return $this->userId;
    }

}