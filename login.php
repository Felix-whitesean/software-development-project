<?php


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAXYLSTAR-REGISTER | Login</title>
    <link rel="icon" href="logo3.png">
    <link rel="stylesheet" href="auth.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include ('header.php');
    ?>
    <div>
        <form action="view.php" method="POST">
        <img src="logo3.png" alt="logo"style="width: 80px; height:80px;background: rgb(56, 182, 255,0.6);border-top-right-radius: 50%;border-top-left-radius: 50%;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
            <h3>Sign In</h3>
                <label for="username">Username:</label>
            <fieldset>
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" required> 
            </fieldset>
            <br>

            <label for="password">password:</label>
            <fieldset>  
                <i class="fa fa-lock"></i>
                <input type="password" name="password" required><br>
            </fieldset>
            <input type="checkbox" name="remember">
            <label for="remember">Remember Me.</label>
            <br><br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    
</body>
</html>