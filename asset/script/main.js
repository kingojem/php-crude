"use strict"   
          
        signup();
       
function alertDisplay(){
    var alert = document.getElementsByClassName('alert');
    alert[0].style.display='block';
}
function closeAlert(){
    var closeAlert = document.getElementsByClassName('close');
        closeAlert[0].onclick = function(){
            var alert = document.getElementsByClassName('alert');
            alert[0].style.display='none';
        }
}
function signup(){
    var btnSignUp = document.getElementById('signup');
    var checkAgree = document.getElementById('agree');
   checkAgree.onclick = function(){
       checkAgree.setAttribute('checked','');
       if( checkAgree.hasAttribute('checked')){
        btnSignUp.classList.remove('disabled');
       }  
   }
}

var registerUserForm = document.forms.registerForm;

    registerUserForm.onsubmit = function inputValidate(){
        var errorMessg = document.getElementById('errMssg');
        if(registerUserForm.username.value.length > 0 && registerUserForm.username.value.length <= 2 ){
                errorMessg.innerHTML="Username Weak!";
                alertDisplay();
                closeAlert();
                return false;
        } else if (registerUserForm.password.value.length < 6){
            errorMessg.innerHTML = "Password length Too Short";
            alertDisplay();
            closeAlert();
            return false;
        }else if(registerUserForm.password.value !== registerUserForm.confirmPassword.value){
            errorMessg.innerHTML= " Password Doesn't Match"
            alertDisplay();
            closeAlert();
            return false;
        }
        else{
            return true;
        }  
    }
