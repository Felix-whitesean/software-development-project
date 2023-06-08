<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>AUTO-ATTENDANCE | Login</title>
        <link rel="icon" href="logo3.png">
        <link rel="stylesheet" href="auth.css">
    </head>
    <body>
        <?php
        include ('header.php');
    $uname = $_POST['username'];
    $pass = $_POST['pass'];
    $pass = base64_encode($pass);
    $con = mysqli_connect("localhost","root","","register");
    if (mysqli_connect_error()){
        echo"Failed to connect to the MYSQLI database: ".mysqli_connect_error();
        exit();
    }
    $sql = "SELECT * FROM members WHERE username = '$uname' and passwd = '$pass'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $class = $row['class'];
        $institution=$row['institution'];
        $tableName = $class.$institution;
        $tableName = str_replace(" ","",$tableName);

    $count = mysqli_num_rows($result);

    if($count == 1){
        $_SESSION['uname'] =$uname;
        $_SESSION['pass'] =$pass;
        header('Location:check_location.php');
    }else {
        ?>
        <h4 style="color: red;">Wrong username or password, please try again<br> Redirecting...</h4>
        <meta http-equiv="refresh" content="5, login.php">
        </body>
        </html>
        <?php
    }
    mysqli_close($con);
?>
