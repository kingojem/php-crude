function logOutUser(){
    confirm('Are You Sure You Want To Logout');
     if(confirm() == true){
         window.location.href="controllers/logout.php";
     }
   }
   imageNotify();
function imageNotify(){
    var body = document.body;
    body.onload = function(){
        var x = document.getElementById('snackbar');
        x.className ='show';
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
} 
uploadImage()
 function uploadImage(){
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("myBtn");
    var close = document.getElementsByClassName('close')[0];
    btn.onclick = function(){
        modal.style.display="block";
    }
    close.onclick = function(){
        modal.style.display ="none";
    }
    window.onclick = function(event){
        if(event.target == modal){
           modal.style.display ="none";
        }
       
    }
 }
