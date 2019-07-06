<?php
include 'dbh.php';
$district=$_POST['did'];
$block=$_POST['bid'];
$code=$_POST['pcode'];
$rk=$_POST['rank'];

 $sql="INSERT INTO district(d_id,b_id,p_code,rank) 
 VALUES ('$district','$block','$code','$rk')";
$result=$conn->query($sql);

header("location:district.php?success=true");

?>