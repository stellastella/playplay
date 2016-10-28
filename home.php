<html>
<head>
    <title>playplay</title>
</head>
    <link href="style.css" type="text/css" rel="stylesheet" />
<body>
    <?php
        @ob_start();
        session_start();
            if (isset($_SESSION['uid'])){
                $connection = mysqli_connect("localhost","root", "", "playplay");
                $id = $_SESSION['uid'];
                $sel = "SELECT *
                        FROM user
                        WHERE id = '$id'";
                $sel_query = mysqli_query($connection, $sel);
                while( $data = mysqli_fetch_assoc($sel_query)){
                    echo "WELCOME, " .$data['username'];
                }

            }else{
                header("location:login_form.php");
            }
    ?>
<div id="content">

	<div id="message">
	</div>

    <a href="upload.php">Upload image </a><br/>
    <?php echo "profile picture!<p><img border='1' width='50' height='50' src='uploads'><p>";?>

    <form action="" method="post" id="messageform">
		<textarea name="message" id="message_chat"> </textarea>
		<input name="submit_chat" type="submit" id="submit_chat"/>
	</form>
    <?php echo "</br>";
    echo '<a href="logout.php"> LOGOUT</a>';?>
</div>

</body>
</html>