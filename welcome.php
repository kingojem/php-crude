<?php
session_start();
$controllers = 'controllers';
define('CONTROLLERS',$controllers);
if(!is_dir(CONTROLLERS)){
  exit('Controller Folder is Damaged, Fix Error To Continue');
}
$models = 'models';
define('MODELS',$models);
if(!is_dir(MODELS)){
  exit('Controller Folder is Damaged, Fix Error To Continue');
}
include_once MODELS.'/database.php';
$getData= new Database();
$db = $getData->getConnection();
?>
<!DOCTYPE html>
  <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Textrix | Chat-Connect</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="asset/css/bootstrap_css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" media="screen" href="asset/css/welcome.css" />
      
  </head>
<?php 
if(isset( $_SESSION['username']) && isset($_SESSION['userid'])){
  $thisUser = $_SESSION['username'];
$sql = "UPDATE `logged-in` set `logged-in`.`online-status`='1' where `logged-in`.`userid`= '$thisUser' ";
$query = mysqli_query($db,$sql);
$sql = "SELECT `online-status` from `logged-in` where `logged-in`.`userid`= '$thisUser'";
$query = mysqli_query($db,$sql);
$show = mysqli_fetch_assoc($query);
foreach($show as $item=>$i){
  if($i == '1'){
    $userview = new userDisplay();
  }
}
}else{
  header("location:login.php?msg=!signin?");
}
?>

<?php
 class userDisplay{
   private $db ;
   
   public function __construct(){
    $getData= new Database();
    $this->db = $getData->getConnection();
?>
    <header class="">
    <div class="container-fluid ">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header">
          <nav class=" nav page-header ">
            <div class="col-lg-4 col-xs-12"><h3>Textrix</h3><hr style="width:18%;float:left;" /></div>
            <div class="col-lg-4 col-lg-offset-4 col-xs-12" >
              <?php
              $sql = "SELECT * from `users`";
              $result = mysqli_query($this->db,$sql);
              while($row = mysqli_fetch_array($result)){
                if(($row['username'] == $_SESSION['username']) && ($row['profile-image']!= 'no-image')){
                  echo ' <span class="profile" id ="myBtn"  title="avartar">
                  <img src="models/profiles/'.$_SESSION['username'].'/images/profile-picture/'.$_SESSION['profile-image'].'" class="profile btn-link"  id ="myBtn" title="avartar" alt=""> 
                </span>';
                }else {
                  if(($row['username'] == $_SESSION['username']) && $row['profile-image'] == 'no-image'){
                   
                    echo ' <span class="profile" >
                  <img src="asset/images/profile.jpg" class="profile btn-link"  id ="myBtn" title="avartar" alt=""> 
                </span>';
                  }
                }
              }
              ?>
                  <!-- <img src="models/profiles/'.$_SESSION['username'].'/images/'.$_SESSION['profile-image'].'jpg" class="profile btn-link"  id ="myBtn" title="avartar" alt="">  -->

              <span style="color:blue;margin-left:2%;"> <?php echo '<big>'.ucfirst($_SESSION['username']) . '</big>';?></span>
              <button class="btn-sm  btn-danger"  style="margin-left:10%;" type="submit"  onclick = "logOutUser()" id="logout">Log Out</button>'.
            </div> 
          </nav>
          </nav>
        </div>
      </div>
    </div>
    </header>
    <main>
    <div id ="myModal" class ="modal" >
                  <div class ="modal-content">
                      <span class ="close">&times;</span>
                      <h4 id = "err"></h4>
                      <h4><b> Upload Profile Picture</b></h4>
                    <form action="controllers/upload.php" method="POST" enctype= "multipart/form-data">
                        <input type="file" name="profilePicture"><br>
                        <input type="submit" name="submit" class=" btn btn-primary" value="Submit">
                    </form>
                  </div>
    <!-- Modal box to Select images, Thia is not Visible -->
   </div>
    <div class="container-fluid "  id = "main">
      <div class="row" >
        <div class="col-lg-4 sideleft" style=" ">
        <div id="" >Some text some message..</div> 
        </div>
        <div class="col-lg-4 middle" style="">
          <div class="col-lg-12" id="make-post" >
          <?php  
          echo ' 
                <span class="profile" id ="myBtn"  title="avartar">
                  <img src="models/profiles/'.$_SESSION['username'].'/images/profile-picture/'.$_SESSION['profile-image'].'
                    " class="" style=" height:50px;
                    width:50px;
                    margin-left:0%;
                    border-radius: 100px;" id ="myBtn" title="avartar" alt=""> 
                </span> 
                <span style="margin-left:10%" >  
                  <a class="a-link"> Upload Picture/Video <img src ="asset/images/upload.png" 
                      style="margin-top:-8px;width:30px;height:30px; border-radius:150px"></a>
                </span><br>';
              ?>
              <textarea name ="post"></textarea>
              <form action="controllers/users.php" class= "form" method="POST">
                <span style="float:right; margin-top:3%;margin-right:2%;">
                  <button  class="btn btn-primary" class= "form-control" name = "send-post" type="submit">Post</button>
                </span>
              </form>
          </div> 
          <div class="col-lg-12" id="make-post" >
          </div>
          <div class="col-lg-12" id="make-post" >
          </div>
          <div class="col-lg-12" id="make-post" >
          </div>
        </div>
        <div class="col-lg-3   sideright" style=" background-color:inherit;">
          <div class="col-lg-12" id="make-post" >
              <?php  echo ' 
                <span class="profile" id ="myBtn"  title="avartar">
                  <img src="models/profiles/'.$_SESSION['username'].'/images/profile-picture/'.$_SESSION['profile-image'].'
                    " class="" style=" height:50px;
                    width:50px;
                    margin-left:0%;
                    border-radius: 100px;" id ="myBtn" title="avartar" alt=""> 
                </span> 
                <span style="margin-left:10%" >  
                  <a class="a-link"> Upload Picture/Video <img src ="asset/images/upload.png" 
                      style="margin-top:-8px;width:30px;height:30px; border-radius:150px"></a>
                </span><br>';
              ?>
                    <textarea name ="post"></textarea>
                    <form action="controllers/users.php" class= "form" method="POST">
                    <span style="float:right; margin-top:3%;margin-right:2%;">
                      <button  class="btn btn-primary" class= "form-control" name = "send-post" type="submit">Post</button>
                    </span>
                    </form>
                    
          </div> 
        </div>
        <div class="col-lg-3   sideright" style="">
          <div id="" >Some text some message..</div> 
        </div>
       
      </div>
   <div id="snackbar" >Click Avartar To Upload Profile Picture</div> 
   </div>
    </main>
    
    <?php
   }
 }
?>
<script src=asset/script/welcome.js></script>
<script src=asset/script/bootstrap_js/bootstrap.min.js></script>
<script src=asset/script/bootstrap_js/jquery_3.3.1_min.js></script>
<?php include CONTROLLERS.'/errors_show.php'?>
