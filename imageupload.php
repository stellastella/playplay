<?php
@ob_start();
session_start();
if(isset($_POST['submit'])) {
$connection = mysqli_connect("localhost", "root", "", "playplay");
    $username = $_GET['username'];
    $password = $_GET['password'];


$file_exts = array("jpg", "bmp", "jpeg", "gif", "png");
$upload_exts = end(explode(".", $_FILES["file"]["name"]));
    $file=($_FILES["file"]["name"]);
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/png")
        || ($_FILES["file"]["type"] == "image/jpg"))
    && ($_FILES["file"]["size"] < 2000000)
    && in_array($upload_exts, $file_exts))

    $sele = "INSERT INTO user (uploads)
            where id = '$id'
            VALUES ('$file')";
$sel_querye = mysqli_query($connection, $sele);

$sel3 = "SELECT * FROM user WHERE uploads = '$file'";
$sel_query3 = mysqli_query($connection, $sel3);
while ($data = mysqli_fetch_assoc($sel_query3)) {
    $_SESSION['uid'] = $data['id'];
    header("location:home.php");
}


{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        // Enter your path to upload file here
        if (file_exists("c:\wamp\www\playplay/uploads/" .
            $_FILES["file"]["name"]))
        {
            echo "<div class='error'>"."(".$_FILES["file"]["name"].")".
                " already exists. "."</div>";
        }
        else
        {
            move_uploaded_file($_FILES["file"]["tmp_name"],
                "c:\wamp\www\playplay/uploads/" . $_FILES["file"]["name"]);
            echo "<div class='sucess'>"."Stored in: " .
                "c:\wamp\www\playplay/uploads/" . $_FILES["file"]["name"]."</div>";
        }
    }
}}
else	{
    echo "<div class='error'>Invalid file</div>";
}



/*@ob_start();
session_start();
if(isset($_POST['submit'])) {
    $connection = mysqli_connect("localhost", "root", "", "playplay");

    $target_dir = "uploads/";
    $target_file = $target_dir;
    basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);


        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

        /* $sele = "INSERT INTO user(uploads) VALUES ($target_dir')";
         $sel_querye = mysqli_query($connection, $sele);
         ?>
         <?php
         $sel3 = "SELECT * FROM user WHERE uploads = '$target_dir'";
         $sel_query3 = mysqli_query($connection, $sel3);
         while ($data = mysqli_fetch_assoc($sel_query3)) {
             $_SESSION['uid'] = $data['id'];
             header("location:home.php");
              }
     }

    }if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
     echo "profile picture!<p><img border='1' width='50' height='50' src='uploads'><p>";
        $uploadOk = 1;
        //  header("location:home.php");
    }
 else {
    echo "File is not an image";
    $uploadOk = 0;
    } */

