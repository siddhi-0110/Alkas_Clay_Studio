<?php 
session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

			//save to database
			$user_id = random_num(20);
			$query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

			mysqli_query($con, $query);

			header("Location: login.php");
			die;
		}else
		{
			echo "Please enter some valid information!";
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
<title>SIGNUP</title>
        <link rel="stylesheet" href="registrationform.css" type="text/css">
        <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 35px;
		border-radius: 5px;
		padding: 8px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
        border-radius: 5px;
		background-color: #468e89;
		border: none;
	}

	#box{

		background-color: rgba(0,0,0,0);
		margin: auto;
		width: 500px;
        align: right;
		padding: 200px 100px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 45px ;margin: 10px;color: white;">Signup</div>

			<input id="text" type="text" name="user_name" placeholder="Enter Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Enter Password"><br><br>

			<input id="button" type="submit" value="SIGNUP"><br><br>

			<a href="login.php" style="color: white">Click to LOGIN</a><br><br>
		</form>
	</div>
</body>
</html>