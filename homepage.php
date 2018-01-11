<?php
	session_start();
	//require 'dbconfig/config.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel = "stylesheet" href = "css/style.css">
</head>
<body style = "background-color:#c0392b">
<div id = "main-wrapper">
<center><h2>Home Page</h2>
<h3>Welcome 
	<?php echo $_SESSION['username']?>
</h3>
<img src = "images/LoginAvatar.png" class = "avatar"/>
</center>



<form class = "myform" action = "homepage.php" method = "post">

<input name = "logout" type = "submit" id = "logout_button" value = "Log Out"/><br>

</form>
<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		header('location:index.php');
	}
?>

</div>
</body>
</html>  