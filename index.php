<?php session_start();
if(isset($_SESSION['id'])){
	header("location:welcome.php");
}
?>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
	.error{
		color:red;
	}	

    
	button:hover{
   cursor: pointer;
   background: #7FFFD4;
	color: #000;
			}
	</style>
</head>
<body>
<div class="login-box">
	<img src="images.png" class="images">
	<h1>Login</h1>
	<?php if(isset($_GET['loginerror']) && ($_GET['loginerror']==true)) { ?>
	<span class="error">Invalid Credentials</span>
	<?php } ?>
		<form action="login.php" method="post">
     <p>Username</p>
	<input id="input"  type="text" name="uid" placeholder="user name" required><br>
	 <p>Password</p>
	<input type="password" name="pwd" placeholder="password" required><br>
		<button id="sbmt" style="width: 100%; height: 30px;  border-radius: 20px; background: #1E90FF; font-size: 18px; " type="submit">Log In</button><br><br>
		<a href="signupform.php">SignUp</a>
	
	</form>
</div>
</body>
</html>


