<?php
include 'dbh.php';
$block=$_POST['bid'];
$code=$_POST['pcode'];
$rk=$_POST['rank'];

 $sql="INSERT INTO block(b_id,p_code,rank) 
 VALUES ('$block','$code','$rk')";
$result=$conn->query($sql);

header("location:block.php?success=true");

?>