<?php
    $comment_text = $_POST['comment'];
    $email = $_POST['email'];

    $con = mysqli_connect("localhost","root","","register");
    if(mysqli_connect_error()){
        echo"Failed to connect to database".mysqli_connect_error();
        exit();
    }
    $sql = "INSERT INTO comments (comment_text,email,posted_at)
    VALUES('$comment_text','$email', now())";
    if(mysqli_query($con, $sql)){
        include('header.php');
        echo("Comment posted successfull <br> We value your feeedback and shall be reviewed...");
        ?>
            <meta http-equiv="refresh" content="5,index.php">
        <?php
    }
    else{
        echo"Unable to post comment polease try again";
        header('Location: index.php');
    }
    mysqli_close($con);

?>