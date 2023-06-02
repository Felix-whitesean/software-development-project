<?php
    $reg = $_POST['registration'];
    $status = $_POST['attendance']; 
    
    $con = mysqli_connect("localhost", "root", "", "register");
    if(mysqli_connect_error()){
        echo"Failed to connect to the database: ".mysqli_connect_error;
    }
    session_start();
    $uname = $_SESSION['uname'];
    if(isset($uname)){
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
        $email = $row['email'];
        $tableName = $class.$institution;
        $tableName = str_replace(" ","",$tableName);
        
        $count = mysqli_num_rows($result);
        
        // If result matched $myusername and $mypassword, table row must be 1 row
            
        if($count == 1) {

    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br> <input name="registration" value="'.$reg.'">
    <input name="status" value="'.$status.'">
     <p><button class="btn btn-primary"><a href="http://localhost/user-login/passwordreset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

            include_once 'PHPMailer\class.phpmailer.php';
            include_once 'PHPMailer\class.smtp.php';
            $email = $email; 
            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->SMTPAuth = true;                 
            $mail->SMTPSecure = "tls";      
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587; 
            $mail->Username = "dailystar.co.ke@gmail.com";   //Enter your username/emailid
            $mail->Password = "3581 3629";   //Enter your password
            $mail->FromName = "Draxylstar";
            $mail->AddAddress($email);
            $mail->Subject = "Reset Password";
            $mail->isHTML( TRUE );
            $mail->Body =$message;
            if($mail->send())
            {
            $msg = "These are the register results: ";
            echo"meassage sent successfully";
            }
            }
            else
            {
            $msg = "We can't find a user with that email address";
            echo"Email not found";
            }
        }
        else{
            echo"Please login first";
            session_start();
            $uname = $_SESSION['uname'];
            echo"$uname";
        }


?>