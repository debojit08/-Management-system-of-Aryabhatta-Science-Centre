<?php session_start();

include 'dbh.php';

if(isset($_POST['uid']) && $_POST['uid']!=""){

$uid=$_POST['uid'];
$pwd=$_POST['pwd'];

 $sql="SELECT * FROM USER WHERE uid='".$uid."' AND pwd='".$pwd."'";
 //$result=$conn->query($sql);
  $result = mysqli_query($conn,$sql);
 //var_dump($result);



$rows = mysqli_num_rows($result); 
   		// get number of rows returned 
    
	if ($rows) {     
    
	while ($row = mysqli_fetch_array($result)) {         
		//echo 'ID: ' . $row['id'] . '<br>';         
		//echo 'Full Names: ' . $row['first'] . ' '.$row['last'].'<br>'; 
		$_SESSION['id']= $row['id'];
		$_SESSION['name']=$row['first'] . ' '.$row['last'];
		header("Location:welcome.php");
		}       
		    
	} else{

		header("Location:index.php?loginerror=true");
	}


}
?>