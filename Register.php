
<!DOCTYPE html>
<html lang="en">
    <html>
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>DRAXYLSTAR-REGISTER | Users</title>
            <link rel="icon" href="logo3.png">
            <link rel="stylesheet" href="reg.css">
            <meta http-equiv="refresh" content="600, login.php">
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
                           <img class="img" src="logo3.png" alt="logo">
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
                            <form action='mailto: <?php echo"$email"; ?>'target="_BLANK" id="form" method="POST">

                            <?php
                            $i = 0;
                            while($row = mysqli_fetch_assoc($result2)) {
                                $i ++;
                                $studReg = $row['reg_no']."-".$i;
                                $studName= $row['stud_name']."-".$i;
                                $serial = $row['id'];
                                ?>
                                    <tr>
                                        <td><?php echo "$i"; ?></td>
                                        <td><input type="text" id="reg" class="reg" name="registration" value="<?php echo"$studReg"; ?>"></td>
                                        <td><input type="text" value='<?php echo"$studName"; ?>' id="studName"> </td>
                                        <td><label>Present: <input type="radio" class="name" name='<?php echo"$studName";  ?>' value="present" id="present" required><br></label>
                                        <label>Absent:<input type="radio" name='<?php echo"$studName";  ?>' value="absent" id="absent" required></label>
                                        </td>
                                    </tr>
                            <?php
                            }
                            ?>
                            </table>
                            <br>
                            <textarea class="comt" placeholder="//comment"></textarea><br>
                            <button type="submit" name="btn">SUBMIT</button><br><br>
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
                     <h3><?php echo"Please Login First And Try Again...<br>Redirecting...";?></h3>
                     <meta http-equiv="refresh" content="5,login.php">
                     <?php
                }

            ?>
        </body>
        
    </html>
<?php
   include('footer.html');
?>





