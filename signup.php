<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAXYLSTAR-REGISTER | Sign Up</title>
    <link rel="icon" href="logo3.png">
    <link rel="stylesheet" href="auth.css">
    <script src="https://kit.fontawesome.com/6aa0d943f8.js" crossorigin="anonymous"></script>
</head>
<body onload="findMyLocation()">
    <div>
    <?php
    include ('header.php');
    ?>
        <div class = "form">
        <form action="create_table.php" method="POST">
        <img src="logo3.png" alt="logo"style="width: 80px; height:80px;background: rgb(56, 182, 255,0.6);border-top-right-radius: 50%;border-top-left-radius: 50%;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
            <h3>Sign Up</h3>
            <legend><label for="username">Username:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa-regular fa-user"></i>
                <input type="text" name="username" id="user_name" required>
            </fieldset>
            <br>

            <legend><label for="password">Password:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="pass" required>
                <label for="check"><i id="show_pss" style="color: rgb(255,255,255,.6)" class="fa-solid fa-eye" onclick="showPassword()"></i></label>
                <input type="checkbox" name="check" id="check" style="display: none;">   
            </fieldset>
            <br>

            <legend><label for="conf_password">Confirm Password:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa fa-lock"></i>
                <input type="password" name="conf_password" id="conf_pass" required>
                <label for="check2"><i id="show_conf_pss" style="color: rgb(255,255,255,.6)" class="fa-solid fa-eye" onclick="showConfPassword()"></i></label>
                <input type="checkbox" name="check" id="check2" style="display: none;">            
            </fieldset>
            <br>
            <legend><label for="email">Email:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa-regular fa-envelope"></i>
                <input type="email" name="email" id="email" required>              
            </fieldset>
            <br>

            <legend><label for="lvl">Level: <span>*</span></label></legend>
            <fieldset class="input">
                <select name="lvl" id="int_type" required>
                    <option disabled="disabled" selected="selected" style="display:none;">Select the institution</option>
                    <option value="university">University</option>
                    <option value="tvet">TVET</option>
                    <option value="secondary">High School</option>
                    <option value="primary">Primary School</option>
                </select>
            </fieldset>
            <br>
            <legend><label for="institution" required>Institution name:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa fa-school-flag"></i>
                <input type="text"  name="inst_name" id="institution" required>
            </fieldset>
            <br>

            <legend><label for="department" >Department: <span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa fa-building-user"></i>
                <input type="text"  name="department" id="department" required>
            </fieldset>
            <br>

            <legend><label for="class" required>Class:<span>*</span></label></legend>
            <fieldset class="input">
                <i class="fa-solid fa-screen-users"></i>
                <input type="text"  name="class" id="class">
            </fieldset>
            <br>

            <input type="checkbox" name="conditions" style="height: 33px;" required>
            <label for="conditions" required>I agree to the </label>
            <a href="#links" id="terms">Terms and conditions</a>
            <br><br>

            <fieldset style="display: none;">
                <input type="text" name="lat" id="lat" style="display: none;">
                <input type="text" name="long" id="long" style="display: none;">              
            </fieldset>

            <button type="submit" id="submit" onclick="return formValidation()">Submit</button>
            <br><br>            
        </form>
        <a href="#links" id="problem_pass" onclick="help()">Have a problem signing up?</a>
        </div>
    </div>
    <?php
        include('footer.html');
    ?>
     <script src="signup.js"></script>
</body>
</html>