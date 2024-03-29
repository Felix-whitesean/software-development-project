<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTO-ATTENDANCE | Login</title>
    <link rel="icon" href="logo3.png">
    <link rel="stylesheet" href="auth.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include ('header.php');
    ?>
    <div>
        <form class="form" action="view.php" method="POST">
            <h3>Sign In</h3>
                <label for="username">Username:</label>
            <fieldset class="input">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" id="username" autocomplete="given-name" required> 
            </fieldset>
            <br>

            <label for="pass">password:</label>
            <fieldset class="input">  
                <i class="fa fa-lock"></i>
                <input type="password" name="pass" id="pass" required>
                <label for="login_pass"><i id="login_pss" style="color: rgb(255,255,255,.6)" class="fa-solid fa-eye" onclick="showLoginPassword()"></i></label>
                <input type="checkbox" name="login_pass" id="login_pass" style="display: none;"> 
            </fieldset>
            <br><br>
            <button type="submit" onclick="return formValidation()">Submit</button>
        </form>
    </div>
    <?php
        include('footer.html');
    ?>
    <script src="login.js"></script>
</body>
</html>