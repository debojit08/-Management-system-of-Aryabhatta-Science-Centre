<?php


include 'dbh.php';
$name=$_POST['pname'];
$school=$_POST['sadddress'];
$class=$_POST['class'];
$phone=$_POST['pno'];
$competition=$_POST['cdetails'];
$state=$_POST['state'];
$district=$_POST['dname'];
$block=$_POST['bname'];
$gender=$_POST['r1'];


 $sql="INSERT INTO entry(p_name,s_add,class,ph_no,c_details,state,d_name,b_name,gender) 
 VALUES ('$name','$school','$class','$phone','$competition','$state','$district','$block','$gender')";
$result=$conn->query($sql);

header("location:enrty.php?success=true");

?>