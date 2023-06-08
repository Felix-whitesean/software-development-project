<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTO-ATTENDANCE | Checking location...</title>
    <link rel="icon" href="logo3.png">
    <meta http-equiv="refresh" content="60">
</head>
<body onload="findMyLocation()" style="background-repeat: no-repeat;background-size: cover;background-attachment: fixed;background: url('bg4.jpg')">
    <?php   
        $con = mysqli_connect("localhost","root","","register");
        if (mysqli_connect_error()){
            echo"Failed to connect to the MYSQLI database: ".mysqli_connect_error();
            exit();
        }
        session_start();
        $uname = $_SESSION['uname'];
        $sql = "SELECT * FROM members WHERE username = '$uname'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);
        if($count == 1){
            ?>
            <div class="container">
                <?php
                    $lattitude = $row['lattitude'];
                    $longitude = $row['longitude'];
                    $inst = $row['institution'];
                ?>
                <h4 id ="location" style="color: red;"></h4>
                <h4 id ="redirect" style="color: red;"></h4>
                <input style="display:none" id="lattitude" value="<?php echo"$lattitude";?>">
                <input style="display:none" id="longitude" value="<?php echo"$longitude";?>">
                <input style="display:none" id="inst" value="<?php echo"$inst";?>">
            </div>
            <?php
        }
        else{
            echo"User not found";
        }
        ?>
    <script src="check_location.js"></script>
    <?php
        session_abort();
        include('header.php');
        include('footer.html');
    ?>
</body>
</html>