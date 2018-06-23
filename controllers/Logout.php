<?php
session_start();
$models = '../models';
define('MODELS',$models);
if(!is_dir(MODELS)){
  exit('Controller Folder is Damaged, Fix Error To Continue');
}
include_once MODELS."/database.php";
$destroySession = new Logout();
 class Logout{
   private $logout;
   public function __construct(){
    $database = new Database;
    $this->logout = $database->getConnection();
    $thisUser = $_SESSION['userid'];
    unset($_SESSION['online-status']);
    $sql = "UPDATE `logged-in` set `logged-in`.`online-status`='0' where `logged-in`.`userid`= '$thisUser'";
    $query = mysqli_query($this->logout,$sql);
    //session_destroy();
    header("location: ../login.php");
    exit();
   }
 }
