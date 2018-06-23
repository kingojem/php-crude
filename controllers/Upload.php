<?php
session_start();
$models = '../models';
define('MODELS',$models);
if(!is_dir(MODELS)){
  exit('Controller Folder is Damaged, Fix Error To Continue');
}
include_once MODELS."/database.php";
if(isset($_POST['submit'])){
$validate = new Upload();
$validate->validateFile();
} 
?>
<?php
//  $modelFolder = '../';
//  define('MODEL', $modelFolder);
//  if(!is_dir(MODEL)){
//     exit('Model folder does not exist');
//  }
 
 

class Upload{
    private $db;
    public function __construct(){
        $database = new Database;
        $this->db = $database->getConnection();
        
    }
    public function validateFile(){
            $profilePicture = $_FILES['profilePicture'];
            $ppName = $profilePicture['name'];
            $ppSize = $profilePicture['size'];
            $ppTmpName = $profilePicture['tmp_name'];
            $ppSize = $profilePicture['type'];
            $ppErr = $profilePicture['error'];
            $fileExt = explode('.',$ppName);
            $actualFileExt = strtolower(end($fileExt));
           
        $filesExtAllowed  = array('jpg','png','jpeg' );
        if(!in_array($actualFileExt,$filesExtAllowed)){
            header("location:../welcome.php?msg=?");
            
        }else{
            if($ppErr == 0){
                if($ppSize <= 1000 ){
                    $thisUser = $_SESSION['username'];
                    $newFileName = $thisUser.".".$actualFileExt;
                    $fileDestination = "../models/profiles/$thisUser/images/profile-picture/".$newFileName;
                    move_uploaded_file($ppTmpName,$fileDestination) or exit('error');
                    $sql = "SELECT * from `users`";
                    $result = mysqli_query($this->db,$sql);
                    while($row = mysqli_fetch_array($result)){ 
                       $sqliImg = "UPDATE `users` set `profile-image` = '$newFileName' where `users`.`username` = '$thisUser' ";
                       $resultImg = mysqli_query($this->db,$sqliImg);
                       header("location:../welcome.php?msg=uploaded!");
                    }
                   
                }else{
                    header("location:../welcome.php?msg=?"); 
                }
            }else{
                header("location:../welcome.php?msg=?");
            }
        }
    } 
}  
?>