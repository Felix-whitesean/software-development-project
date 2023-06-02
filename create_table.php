<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DRAXYLSTAR | Signup</title>
    <link rel="stylesheet" href="auth.css">
    <link rel="icon" href="logo3.png">
</head>
<body>
    <?php
    include('header.php');

    $uname = $_POST['username'];
    $lvl = $_POST['lvl'];
    $inst_name = $_POST['inst_name'];
    $department = $_POST['department'];
    $class = $_POST['class'];
    $pass= $_POST['password'];
    $latt = $_POST['lat'];
    $lng = $_POST['long'];
    $lat = (floor((float)$latt * 1000))/1000;
    $long = (floor((float)$lng * 1000))/1000;    
    $conf_pass = $_POST['conf_password'];
    $pass= base64_encode($pass);
    $conf_pass= base64_encode($conf_pass);
    $email = $_POST['email'];
    $tableName = $class.$inst_name;
    $tableName = str_replace(" ","",$tableName);


    $con = mysqli_connect("localhost","root","","register");
    if(mysqli_connect_error()){
        echo"Failed to connect to the database: ". mysqli_connect_error();
        exit();
    }
    if($lat != 0 && $long != 0){
    $sql = "INSERT INTO members(username, email, institution,lvl, department,class, passwd,lattitude,longitude, joined_at)
    VALUES('$uname','$email', '$inst_name','$lvl','$department','$class','$pass','$lat','$long',now())";

    $sql2 = "CREATE TABLE $tableName (id INT(5) NOT NULL AUTO_INCREMENT , reg_no VARCHAR(30) NOT NULL , stud_name VARCHAR(50) NOT NULL ,reg_time DATETIME NOT NULL , PRIMARY KEY (id), UNIQUE reg_id (reg_no)) ENGINE = InnoDB;";
    ?>
    <p style="padding: 2%;background: rgb(0,0,9,0.6), color: red;">
    <?php
    if (mysqli_query($con, $sql)) {
            sleep(1.5);
            if ($pass == $conf_pass){
                if(mysqli_query($con, $sql2)){
                    $paswd = base64_decode($pass);
                    echo"LOGIN DETAILS: Username-: $uname Password-: $paswd";
                    ?>
                    <div class="form">
                    <form method="POST" action="update.php">
                        <h3 style="color: red; text-decoration: underline;">Alert! Do not skip this.</h3>
                        <script>alert("Please enter 1 student details")</script>
                        <h2>Enter at least one Student record</h2>
                        <fieldset>
                            <legend><label for="reg_no">Registration number:</label></legend>
                            <input type="text" name="reg_no" required> 
                        </fieldset>

                        <fieldset>
                            <legend><label for="stud_name"> Name:</label></legend>
                            <input type="text" name="stud_name" required> 
                        </fieldset>

                        <fieldset style="display: none;">
                            <legend><label for="institution" required>Institution name:</label></legend>
                            <input type="text"  name="inst_name" value="<?php echo"$inst_name";?>">
                        </fieldset>

                        <fieldset style="display: none;">
                            <legend><label for="class" required>Class:</label></legend>
                            <input type="text"  name="class" value="<?php echo"$class";?>">
                        </fieldset>

                        <button type="submit">Submit</button>
                        </form>
                        </div>
                    <?php
                }
                else{
                    echo"Unable to register the user";
                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                    die();
                    ?>
                    <meta http-equiv="refresh" content="2,url=signup.php">
                    <?php
                }
            }
            else{
                echo '<script>alert("Password does not match!")</script>';
                ?>
                <meta http-equiv="refresh" content="1.3,url=signup.php">
                <?php
            }
            

        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        die();
        }
        mysqli_close($con);
    ?>
    </p>
    <?php
    }else{
        ?>
        <h3 style="tranform: rotate(120deg);border-radius: 8px;color: red;background: linear-gradient(60deg, rgb(255,255,255,0.8),grey, darkgrey); padding: 4%;text-align: center;margin: auto;width: 70%;border: 5px solid rgb(56, 182, 255);">
            <?php echo"Unable to enter details, please allow user location and try again"; ?>
        </h3>
        <?php
    }
    ?>
</body>
</html>