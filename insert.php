<?php
    session_start();


    if(isset($_SESSION['uname'])){
        $con = mysqli_connect("Localhost","root","","register");
        if(mysqli_connect_error()){
            echo"Unable to connect to the database: ".mysqli_connect_error();
        }
            $myusername = $_SESSION['uname'];
            $mypassword = $_SESSION['pass']; 

            //$reg = $_POST['reg_no'];
            //$stud_name = $_POST['stud_name'];

            $reg =  isset($_POST["reg_no"]) ? $_POST["reg_no"]: "";
            $stud_name =  isset($_POST["stud_name"]) ? $_POST["stud_name"]: "";

            $sql = "SELECT class,institution FROM members WHERE username = '$myusername' and passwd = '$mypassword'";
            $result = mysqli_query($con,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $class = $row['class'];
            $institution=$row['institution'];
            $tableName = $class.$institution;
            $tableName = str_replace(" ","",$tableName);

            $count = mysqli_num_rows($result);

            // If result matched $myusername and $mypassword, table row must be 1 row
                
            if($count == 1 && $reg !="" && $stud_name != "") {
                $sql2 = "INSERT INTO $tableName(reg_no, stud_name,reg_time)
                VALUES('$reg','$stud_name',now())";

                
                if(mysqli_query($con, $sql2)){
                    echo"Record inserted successfully, continuing to insert more records";
                    ?>
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>DRAXYLSTAR-REGISTER | Insert</title>
                        <link rel="icon" href="logo3.png">
                        <link rel="stylesheet" href="auth.css">
                    </head>
                    <body>
                        <button><a href="register.php">View Table</a></button>
                        <meta http-equiv="refresh" content="5, insert.php">
                    </body>
                    <?php
                }
                else{
                    echo"RECORD NOT INSERTED";
                ?>
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>DRAXYLSTAR-REGISTER | Insert</title>
                    <link rel="icon" href="logo3.png">
                    <link rel="stylesheet" href="auth.css">
                </head>
                <body>

                <form action="insert.php" method="POST" style="text-align: center;">
                    <img src="logo3.png" alt="logo"style="width: 80px; height:80px;background: rgb(56, 182, 255,0.6);
                    border-top-right-radius: 50%;border-top-left-radius: 50%;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                    <h3>INSERT RECORDS</h3>
                    <fieldset class="input" style="display: flex; flex-direction: column;">
                        <label for="reg_no"style="min-height: 33px;">Registration number:</label>
                        <input type="text" name="reg_no" style="max-width: 333px;min-height: 40px" required>
                    </fieldset>

                    <fieldset class="input" style="display: flex; flex-direction: column;">
                        <label for="name"style="min-height: 33px;">Name:</label>
                        <input type="text" name="stud_name" style="max-width: 333px;min-height: 40px" required>
                    </fieldset>

                    <button type="submit">SUBMIT</button>
                </form>
                </body>
                <?php

                }
            }
            else{
                echo"";
                ?>
                    <head>
                        <meta charset="UTF-8">
                        <meta http-equiv="X-UA-Compatible" content="IE=edge">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <title>DRAXYLSTAR-REGISTER | Insert</title>
                        <link rel="icon" href="logo3.png">
                        <link rel="stylesheet" href="auth.css">
                    </head>
                    <body>

                    <form action="insert.php" method="POST" style="text-align: center;">
                        <img src="logo3.png" alt="logo"style="width: 80px; height:80px;background: rgb(56, 182, 255,0.6);
                        border-top-right-radius: 50%;border-top-left-radius: 50%;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                        <h3>INSERT RECORDS</h3>

                        <label for="reg_no"style="min-height: 33px;">Registration number:</label>
                        <fieldset class="input" style="display: flex; flex-direction: column;">
                            <input type="text" name="reg_no" style="max-width: 333px;min-height: 40px" required>
                        </fieldset><br>

                        <label for="name"style="min-height: 33px;">Name:</label>
                        <fieldset class="input" style="display: flex; flex-direction: column;">
                            <input type="text" name="stud_name" style="max-width: 333px;min-height: 40px" required>
                        </fieldset><br>

                        <button type="submit">SUBMIT</button>
                    </form>
                    </body>
                <?php
            }
        }
            else{
                header('location: login.php');
            }

    ?>