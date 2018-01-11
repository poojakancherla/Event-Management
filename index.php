<?php
	session_start();
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel = "stylesheet" href = "css/style.css">
</head>
<body style = "background-color:#c0392b">
<div id = "main-wrapper">
<center><h2>Login Page</h2>
<img src = "images/LoginAvatar.png" class = "avatar"/>
</center>



<form class = "myform" action = "index.php" method = "post">
<label><b>Username:</label><br>
<input name = "username" type = "text" class = "inputvalues" placeholder = "Type your username"/><br>
<label><b>Password:</label><br> 
<input name = "password" type = "password" class = "inputvalues" placeholder = "Type your Password"/><br>
<input name = "login" type = "submit" id = "login_button" value = "Login"/><br>
<a href = "register.php"><input type = "button" id = "register_button" value = "Register"/></a>
</form>

<?php
if(isset($_POST['login']))
			{
				
				//echo '<script type = "text/javascript"> alert ("Sign up button clicked")</script>';
				
				$username=$_POST['username'];
				$password=$_POST['password'];
				
				$query = "select * from user WHERE username='$username' AND password = '$password'";
				$query_run = mysqli_query($con, $query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					//valid
					$_SESSION['username'] = $username;
					echo '<script type="text/javascript"> alert("valid credentials!")</script>';
					header('location:homepage.php');
				}
				else
				{
					//invalid
					echo '<script type="text/javascript"> alert("Invalid credentials!")</script>';
				}
			}
?>

</div>
</body>
</html>