<?php
    $reg_no = $_POST['reg_no'];
    $stud_name = $_POST['stud_name'];
    $institution = $_POST['inst_name'];
    $class = $_POST['class'];
    $tableName = $class.$institution;
    $tableName = str_replace(" ","",$tableName);

    $con = mysqli_connect("localhost","root","","register");
    if(mysqli_connect_error()){
        "Failed to connect: ".mysqli_connect_error();
    }

    $sql = "INSERT INTO $tableName(reg_no, stud_name,reg_time)
    VALUES('$reg_no', '$stud_name', now())";

    if(mysqli_query($con, $sql)){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DRAXYLSTAR | Update</title>
            <link rel="icon" href="logo3.png">
        </head>
        <body style="background: url('bg5.jpg');background-attachment: fixed;background-repeat: no-repeat;color: white;background-size: 100vw 100vh;">
            <meta http-equiv="refresh" content="5,login.php">
            <h3><?php echo"RECORD INSERTED SUCCESSFULLY";?></h3>
        </body>
        <?php
    }
    else{
        include('header.html');
        echo"Unable to insert record: ". $sql . "<br>" . mysqli_error($con);
    }
    mysqli_close($con);
    ?>