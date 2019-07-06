<?php
include 'dbh.php';
$code=$_POST['pcode'];
$prize=$_POST['prize'];

 $sql="INSERT INTO award(p_code,prize) 
 VALUES ('$code','$prize')";
$result=$conn->query($sql);

header("location:print.php?pid=".$code);

?>