<html>
<head>
    <title>playplay</title>
</head>
<link href="style.css" type="text/css" rel="stylesheet" />
<body>
    <div id="body">
        <h2>Welcome to PlayPlay</h2>
             <div id="form">
                 <form action="login.php" method="post">
               <input type="text" name="username" value="" maxlength="20" placeholder="ENTER USERNAME" >
                    <input type="password" name="password" value=""  placeholder="ENTER PASSWORD" ><br/>
                     <input type="submit" name="submit" value="LOGIN" placeholder="LOGIN"> <br/>

                </form>
                 <div id="register"> if new   <a href="signup_form.php"><?php echo " register";?> </a></div>
             </div>
    </div>
</body>
</html>
