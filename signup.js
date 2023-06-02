 function formValidation(){
    var uname = document.getElementById('user_name');
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
                    if(notEmpty(institution, "Enter institution name")){
                        if(notEmpty(lvl, "Enter level of institution")){
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
        elem.style.border = '1px solid red';
        elem.style.borderWidth= '1px 1px 1px 0';
        elem.style.borderStyle = 'dashed';
        elem.focus();
        return false;
    }
    //document.getElementById('submit').disabled = true;
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

function findMyLocation(){
    var lat_location = document.getElementById('lat');
    var long_location = document.getElementById('long');

    function success(position){
        const latt = position.coords.latitude;
        const lat= (Math.floor(latt * 1000))/1000;
        lat_location.value = lat;
        const lng = position.coords.longitude;
        const long = (Math.floor(lng * 1000))/1000;
        long_location.value = long;
    }

    function error(){
        alert('Please allow the app to access location...');
        lat_location.outerHTML = '<meta http-equiv="refresh" content="5,index.php">';
        redirect.outerHTML = '<meta http-equiv="refresh" content="10, login.php">';
    }
    navigator.geolocation.getCurrentPosition(success, error);
}
function help(){
    var help = document.getElementById('help');
    help.focus();
    help.style.border = '1px solid white';
}    
    
    