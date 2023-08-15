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

			//read from database
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{

						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.html");
						die;
					}
				}
			}
			
            echo '<script type="text/JavaScript">
            alert("Enter valid information");
            </script>';
		}else
		{
            echo '<script type="text/JavaScript">
            alert("Enter valid information");
            </script>';
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
<title>LOGIN</title>
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
			<div style="font-size: 45px ;margin: 10px;color: white;">LOGIN</div>

			<input id="text" type="text" name="user_name" placeholder="Enter Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Enter Password"><br><br>

			<input id="button" type="submit" value="LOGIN"><br><br>

			<a href="signup.php" style="color: white">Click to SIGNUP</a><br><br>
		</form>
	</div>
</body>
</html>