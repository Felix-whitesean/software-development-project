<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header</title>
    <link rel="stylesheet" href="header.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bg">
        <div class="navbar">
            <nav>
                <a href="login.php">Register App</a>
                <a href="index.php"><i class="fa fa-house fa-sm"></i>HOME</a>
                <a href="login.php"><i class="fa fa-arrow-right-to-bracket fa-sm"></i>Sign In</a>
                <a id="signup" href="signup.php"><i class="fa fa-user-plus fa-sm"></i>Sign Up</a>
            </nav>  
        </div>
        <div class="head">
            <img src="logo3.png" alt="LOGO" onclick="home()">
            <div class="name">
                <h2>AUTO-ATTENDANCE</h2>
                <h3>Register at hand</h3>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    function home(){
        window.location.replace('index.php');
    }
</script>