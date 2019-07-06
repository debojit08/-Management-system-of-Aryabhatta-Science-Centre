<?php
/*$con=mysql_connect("localhost","root") or die("Unable to Connect");
mysql_select_db($con, 'login');
if(isset($_POST['users']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$query_run = mysql_query($con, $query);
			if(mysql_num_rows($query_run)>0)
			{
				$_SESSION['username'] = $username;
				header("location: masterform.php");
			}
			else
			{
				echo '<script type = "text/javascript">alert("Invalid credentials")</script>';
			}

	*/}
			include 'index.php';

			$username=$_POST['username'];
			$password=$_POST['password'];

			$sql="SELECT * FROM users WHERE username='$username' AND password='$password'";
			$result=$conn- >query($sql);


			header("LOcation:masterform.php");


?>