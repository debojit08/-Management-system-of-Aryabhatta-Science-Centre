<html>
<head>
	<title>SignUp Form </title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style>
		

    
	button:hover{
   cursor: pointer;
			}
	</style>
</head>
<body>
<div class="login-box">
	<img src="images.png" class="images">
	<h1>SignUp</h1>
	<form action="signup.php" method="POST">

		<input type="text" name="first" placeholder="first name" required><br>
	<input type="text" name="last" placeholder="last name" required><br>
	<input type="text" name="uid" placeholder="user name" required><br>
	<input type="password" name="pwd" placeholder="password" required><br>
	<button id="sbmt" style="width: 100%; height: 30px;  border-radius: 20px; background: #1E90FF; font-size: 18px; " type="submit">Sign Up</button>
		
	</form>
</div>
</body>
</html>

