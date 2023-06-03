
<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DRAXYLSTAR-REGISTER | Users</title>
            <link rel="icon" href="logo3.png">
            <link rel="stylesheet" href="auth.css">
            <link rel="stylesheet" href="reg.css">
        </head>

        <body>
            <?php
                //include ('header.php');
                session_start();
                if(isset($_SESSION['uname'])){
                    $con = mysqli_connect("Localhost","root","","register");
                    if(mysqli_connect_error()){
                        echo"Unable to connect to the database: ".mysqli_connect_error();
                    }
                        
                    $myusername = $_SESSION['uname'];
                    $mypassword = $_SESSION['pass']; 

                    $sql = "SELECT class,institution,email FROM members WHERE username = '$myusername' and passwd = '$mypassword'";
                    $result = mysqli_query($con,$sql);
                    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                    $class = $row['class'];
                    $institution=$row['institution'];
                    $email=$row['email'];                    
                    $tableName = $class.$institution;
                    $tableName = str_replace(" ","",$tableName);
                    
                    $count = mysqli_num_rows($result);
                    
                    // If result matched $myusername and $mypassword, table row must be 1 row
                        
                    if($count == 1) {
                        ?>
                           <img src="logo3.png" alt="logo"style="width: 80px; height:80px;background: rgb(56, 182, 255,0.6);position:fixed;margin-top: -80px;
                                border-top-right-radius: 50%;border-top-left-radius: 50%;border-bottom-left-radius: 15px;border-bottom-right-radius: 15px;">
                                <nav>
                                    <a href="insert.php" target="_BLANK">Add Students</a>
                                    <a href=>View Attendance Report</a>
                                </nav>
                                
                            <table>
                                    <tr>
                                        <th>S/N</th>
                                        <th>REG No.:</th>
                                        <th>NAME</th>
                                        <th>STATUS</th>
                                    </tr>
                                    <?php
                                $sql2 = "SELECT * FROM $tableName";
                                $result2 = mysqli_query($con, $sql2);
                        if(mysqli_num_rows($result2)>0){
                            ?>
                            <form action="mailto:<?php echo"$email"?>" method="POST">

                            <?php
                            while($row = mysqli_fetch_assoc($result2)) {
                                $studReg = $row['reg_no'];
                                $studName= $row['stud_name'];
                                $serial = $row['id'];
                                ?>
                                    <tr>
                                        <td><?php echo "$serial"; ?></td>
                                        <td><input type="text" class="reg" name="registration" value='<?php echo"$studReg"; ?>'></td>
                                        <td><?php echo"$studName"; ?></td>
                                        <td><label>Present: <input type="checkbox" name="attendance_present" id="present"><br></label>
                                        <label>Absent:<input type="checkbox" name="attendance_absent" id="absent"></label>
                                        </td>
                                    </tr>
                                <?php
                            }
                            ?>
                            <button type="submit">SUBMIT</button>
                            </form>
                                    <?php
                        
                        }else{
                            echo"NO STUDENT RECORD FOUND";
                            echo"PLEASE INSERT STUDENT RECORDS";
                        }
                        
                    }
                    else {
                        $error = "Your Login Name or Password is invalid";
                    }

                }
                else{
                    ?>
                    <meta http-equiv="refresh" content="5,login.php">
                     <h3><?php echo"Please Login First And Try Again...<br>Redirecting...";?></h3>
                     <?php
                }

            ?>
            </table>
        </body>
        <?php
            include('footer.html');
        ?>
    </html>
