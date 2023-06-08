<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>AUTO-ATTENDANCE</title>
    <link rel="icon" href="logo3.png">
</head>
<body>
    <?php
        include ('header.php');
    ?>
    <div class="bg">
        <div class="body">
            <div class="about">
                <h4>The Register App hopes to solve the problems posed by the manual <span>Paper Register.</span> </a>
                <ul>
                    <li> <img src="check-button.png" alt="">Efficient 💯</li>
                    <li> <img src="check-button.png" alt="">Available 🚀</li>
                    <li> <img src="check-button.png" alt="">Reliable 🚁</li>
                </ul>
                <a href="#">Read more</a></h4>
            </div>
            <div class="process">
                <h2>
                    Use the register:
                </h2>
                <ol>
                    <li>Signup for the website by pressing the signup button above.</li>
                    <li>Sign in to the website, and press <a href="register.php" style="color: rgb(6, 8, 56); text-decoration: none;">REGISTER APP</a> above.</li>
                    <li>Check against the name of the student as either present or absent.</li>
                    <li>Press submit button. </li>
                </ol>
            </div>           
        </div>
        <div class="comments">
                <?php
                    $con = mysqli_connect("localhost","root","","register");
                    if(mysqli_connect_error()){
                        echo"Failed to connect to database".mysqli_connect_error();
                        exit();
                    }
                    $sql = "SELECT * FROM comments";
                    $result = mysqli_query($con,$sql);

                    $count = mysqli_num_rows($result);
                    while($row = mysqli_fetch_assoc($result)) {
                        $count = mysqli_num_rows($result);
                        ?>
                        <td><i class="fa-solid fa-user fa-3x"></i>
                            <i class="fa-sharp fa-solid fa-quote-left" style="text-align: center;"></i>
                        <h5 style="min-height: 35px;margin: auto;text-align: center;color: white;background:rgb(56, 182, 255, .6);padding: 3%;border-radius: 23px;">
                        <?php
                        $text =$row['comment_text'];
                        echo"$text";
                        ?>
                        </h5>
                        </td>

                        <?php
                        
                    }
                ?>

            </div> 
    </div>
    <?php
    include('footer.html');
    ?>
</body>
</html>