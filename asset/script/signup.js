"use strict"  
        registerUsers();
        signup();
        function signup(){
            var btnSignUp = document.getElementById('signup');
            var checkAgree = document.getElementById('agree');
              checkAgree.checked == false;
                // if(checkAgree.checked == true){
                //     var registerUserForm = document.forms.registerForm;
                //     registerUserForm.onsubmit = function Prevent(){
                //         checkAgree.setCustomValidity('Do You Agree?');
                //         return false;
                //     }
                //     return false;
                // }
                //   if(checkAgree.checked == false){
                //        
                    
                  
                // }
                
                
        }
function alertDisplay(){
    var alert = document.getElementsByClassName('alert');
    alert[0].style.display='block';
}
  function registerUsers(){
    var registerUserForm = document.forms.registerForm;
    registerUserForm.onsubmit = function inputValidate(){
        var errorMessg = document.getElementById('errorMessg');
        if((registerUserForm.username.value == "") || (registerUserForm.email.value == "") || (registerUserForm.password.value == "") || (registerUserForm.confirmpassword.value == "") || (registerUserForm.phonenumber.value == "")){
            errorMessg.innerHTML = "All Fieldset Are Required ! -- Try Again";
            alertDisplay() ;
            return false;
        } else if(registerUserForm.username.value.length > 0 && registerUserForm.username.value.length <= 2){
            errorMessg.innerHTML="Username Or Password Weak ! --  Try Again!";
            alertDisplay();
            return false;
        }else if(registerUserForm.password.value.length < 6){
            errorMessg.innerHTML = "Username Or Password Weak ! --  Try Again!";
                alertDisplay();
                return false;
        }else if(registerUserForm.password.value !== registerUserForm.confirmpassword.value){
            errorMessg.innerHTML= "Password Doesnt Match ! --  Try Again!"
            alertDisplay();
            return false;
        }else if(registerUserForm.phonenumber.value.length < registerUserForm.phonenumber.maxLength - 2){
            registerUserForm.phonenumber.setCustomValidity('invalid Number!  Remove (+)');
            return false;
        }else if(registerUserForm.phonenumber.value.length > registerUserForm.phonenumber.maxLength ){
            registerUserForm.phonenumber.setCustomValidity('invalid Number! Remove (+)');
            return false;
        }else if(registerUserForm.username.value == registerUserForm.password.value ){
            errorMessg.innerHTML= " Username & Password Cannot Be The Same ! --  Try Again!"
            alertDisplay();
            return false;
        }
    }
  }

  
   