function formValidation(){
    var uname = document.getElementById('username');
    var pass = document.getElementById('pass');


    if(notEmpty(uname, "Enter a username")){
        if(notEmpty(pass, "Enter a valid password")){
            return true;
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
function showLoginPassword(){
    var pass = document.getElementById('pass');
    var show = document.getElementById('login_pss');
    var checkbox = document.getElementById('login_pass');
    if(checkbox.checked){
        show.className = "fa-solid fa-eye-slash";
        pass.type= "text";
    }
    else if(show.className = "fa-solid fa-eye"){
        show.className = "fa-solid fa-eye"
        pass.type= "password";
    }

}