<?php
    @ob_start();
    session_start();
    $connection = mysqli_connect("localhost","root", "", "playplay");
    if(isset($_POST['submit']))
    {
        $username = mysqli_real_escape_string( $connection, $_POST['username']);
        $password =mysqli_real_escape_string( $connection, $_POST['password']);
        $enc_password = md5($password);
        //echo $enc_password;//
    }

        $sel = "SELECT *
                        FROM user
                        WHERE username = '$username'
                        AND password = '$enc_password'
                        LIMIT 1";
        $sel_query = mysqli_query($connection, $sel);
        if (mysqli_num_rows($sel_query)>0)
            while ($data = mysqli_fetch_assoc($sel_query)){
                $_SESSION['uid']=$data['id'];
                header("location:home.php");
            }
        else{
            echo "Access denied if new";
        }
?><html> <a href="signup.php">REGISTER</a>
</html>