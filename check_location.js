function findMyLocation(){
    var location = document.getElementById('location');
    var latti = document.getElementById('lattitude').value;
    var lon = document.getElementById('longitude').value;
    var institution = document.getElementById('inst');
    var inst = institution.value;


    function success(position){
        const latt = position.coords.latitude;
        var lat= (Math.floor(latt*100))/100;
        const lng = position.coords.longitude;
        const long = (Math.floor(lng*100))/100;
        console.log(latti)
        console.log(lon)
        

        if(latti == lat){
            if(lon == long){
                window.location.replace('register.php');
            }
        }else{
            location.textContent = "Your're not at "+ inst;
            console.log(lat)
            console.log(long)
            //window.location.replace('login.php');
        }
        
    }
    function error(){
        location.textContent = 'Unable to show current position. Please allow location in settings... Redirecting...';
        window.location.replace('login.php');
    }
    navigator.geolocation.getCurrentPosition(success, error);
}