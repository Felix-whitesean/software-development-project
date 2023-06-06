
function items(){
    var registration = document.getElementById('reg').value;
    var student_name = document.getElementById('studName').value;
    var status = document.getElementById('present').value;;

    localStorage.setItem("registration", registration);
    localStorage.setItem("studentName", student_name);
    if (status.checked){
        localStorage.setItem("present", present);
    }
    else{
        localStorage.setItem("absent", absent);
    }
    console.log(registration)
    console.log(student_name)

    
    //

}
function load(){
    var registration =  localStorage.getItem("registration");
    var student_name =  localStorage.getItem("studentName");
    var status =  localStorage.getItem("present");
    var status1 =  localStorage.getItem("absent");
    console.log(registration);
    console.log(student_name);
    console.log(status);
    console.log(status1);

    var listItems = document.getElementById('list');
    listItems.outerHTML = '<div name="display"> <h1>Attendance register </h1>'+'<br>'
    +'<h3> Registation: ' + registration + '</h3>' + '<br>'
    +'<h3> Name: ' + student_name + '</h3>' + '<br>' +'</div>';
    //'<h3> status: ' + status + '</h3> < br>'
    //'<h3> status: ' + status1 + '</h3> < br>';

}