 function formValidation(){
    var uname = document.getElementById('username');
    var pass = document.getElementById('pass');
    var conf_pass = document.getElementById('conf_pass');
    var email = document.getElementById('email');
    var institution = document.getElementById('institution');
    var lvl = document.getElementById('int_type');
    var department = document.getElementById('department');
    var className = document.getElementById('class');
    
    if(notEmpty(uname, "Enter a username")){
        if(notEmpty(pass, "Enter a valid password")){
            if(notEmpty(conf_pass, "Confirm password")){
                if(notEmpty(email, "Enter valid email")){
                    if(notEmpty(institution, "Enter institutiion naame")){
                        if(notEmpty(lvl, "Enter institutiion naame")){
                            if(notEmpty(department, "Enter the department of the institution")){
                                if(notEmpty(className, "Enter the name of the class")){
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return false;
 }
 function notEmpty(elem, helperMsg){
    if(elem.value.length == 0){
        alert(helperMsg);
        elem.focus();
        return false;
    }
    return true;
}

function showPassword(){
    var pass = document.getElementById('pass');
    var show = document.getElementById('show_pss');
    var checkbox = document.getElementById('check');
    if(checkbox.checked){
        show.className = "fa-solid fa-eye";
        pass.type= "text";
    }
    else if(show.className = "fa-solid fa-eye"){
        show.className = "fa-solid fa-eye-slash"
        pass.type= "password";
    }

}
function showConfPassword(){
    var confirm_pass = document.getElementById('conf_pass');
    var show2 = document.getElementById('show_conf_pss');
    var checkbox = document.getElementById('check2');
    if(checkbox.checked){
        show2.className = "fa-solid fa-eye";
        confirm_pass.type= "text";
    }
    else{
        show2.className = "fa-solid fa-eye-slash";
        confirm_pass.type= "password";
    }
}
    