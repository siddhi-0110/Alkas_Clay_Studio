<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
    <head>
        <title >ACS</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>



<body>
    <div id="home" class="back">
        <div class="overlay"></div>
    </div>
    
    <div class="midd">
        <h2> Elevate Your Decor With Handcrafted Pottery</h2>
        <h1 style="font-size: 3rem; color: black">Alka's Clay Studio</h1>
    </div>
    
    <div class="mid">
        <div class="btn">
            <a class="simple" href="login.php" style="margin-left: 80px"> LOGIN </a>
            <a class="border" href="signup.php"> SIGNUP </a>
        </div>

    </div>


</body>

</html>    