<?php
@ob_start();
session_start();
if(isset($_POST['sign_up'])){
    $err = 0;
    $connection = mysqli_connect("localhost","root", "", "playplay");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $sex = $_POST['sex'];
    if($password == $confirm_password) {
        $sel = "SELECT * FROM user WHERE username = '$username'";
        $sel_query = mysqli_query($connection, $sel);
        if(mysqli_num_rows($sel_query) > 0){
            $err = 2;
        }else{
            if(!empty($username) && !empty($password) ){
                $enc_password = md5($password);
                $sel2 = "INSERT INTO user(username, password, sex) VALUES ('$username', '$enc_password','$sex')";
                $sel_query2 = mysqli_query($connection, $sel2);
                ?>
<?php
                $sel3 = "SELECT * FROM user WHERE username = '$username'";
                $sel_query3 = mysqli_query($connection, $sel3);
                while ($data = mysqli_fetch_assoc($sel_query3)) {
                    $_SESSION['uid'] = $data['id'];
                    header("location:home.php");
                }

            }else{
                $err = 3;
            }
        }

    }
    else{
        $err = 1;
    }

    if($err > 0){
        header("location: signup_form.php?err=".$err);
    }
}
else{
    header("location: signup_form.php");
}
?>