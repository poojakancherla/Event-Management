<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel = "stylesheet" href = "css/style.css">
</head>
<body style = "background-color:#c0392b">
<div id = "main-wrapper">
<center><h2>Registration Page</h2>
<img src = "images/LoginAvatar.png" class = "avatar"/>
</center>



<form class = "myform" action = "register.php" method = "post">
<label><b>Username:</label><br>
<input name = "username" type = "text" class = "inputvalues" placeholder = "Type your username" required/><br>
<label><b>Password:</label><br>
<input name = "password" type = "password" class = "inputvalues" placeholder = "Your Password" required/><br>
<label><b>Confirm Password:</label><br>
<input name = "cpassword" type = "password" class = "inputvalues" placeholder = "Confirm Password" required/><br>
<input name ="submit_btn" type = "submit" id = "signup_button" value = "Sign Up"/><br>
<a href = "index.php"> <input type = "button" id = "back_button" value = "Back"/></a>
</form>

<?php

	if(isset($_POST['submit_btn']))
			{
				
				//echo '<script type = "text/javascript"> alert ("Sign up button clicked")</script>';
				
				$username=$_POST['username'];
				$password=$_POST['password'];
				$cpassword=$_POST['cpassword'];
				
				if($password==$cpassword)
				{
					$query = "select * from user WHERE username='$username'";
					$query_run = mysqli_query($con,$query);
					
				
						if(mysqli_num_rows($query_run)>0)
						{
							//there is already another user with the same username
							echo '<script type="text/javascript"> alert("This Username Already exists.. Please try another username!")</script>';
						}
						else 
						{
							$query = "insert into user values('$username','$password')";
							$query_run = mysqli_query($con, $query);
							if($query_run)
							{
								echo '<script type="text/javascript"> alert("User Registered.. Go to login page")</script>';
								
							}
							else
							{
								echo '<script type="text/javascript"> alert("Error!")</script>';
							}
						}
				}
						else{
							
						echo '<script type="text/javascript"> alert("Password and confirm password does not match")</script>';
				}				
				
				
			}
?>

</div>
</body>
</html>