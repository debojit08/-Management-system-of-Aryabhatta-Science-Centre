<!DOCTYPE html>
<html>
<head>
  <title>navbar</title>
  <link rel="stylesheet" type="text/css" href="innerstyle.css?version=1.0.1">
  <link rel="stylesheet" type="text/css" href="js/slick.css">
  <script>
  
  function printData()
    {
       var divToPrint=document.getElementById("print");
       newWin= window.open("");
       newWin.document.write(divToPrint.outerHTML);
       newWin.print();
       newWin.close();
    }
</script>
</head>
<body>
<table border="1" id="print">
<?php 

include 'dbh.php';

if(isset($_GET['pid'])){

$did= $_GET['pid'];

 $sql="SELECT a.*,b.prize,c.rank FROM `entry` a,award b,state c WHERE a.p_code=b.p_code AND a.p_code=c.p_code AND a.p_code='".$did."'";
       //echo $sql;
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {      ?>   
        <tr><td>Participant Code </td><td><?= $row['p_code']; ?></td></tr>
        <tr><td>Participant Name </td><td><?= $row['p_name']; ?></td></tr>
        <tr><td>gender </td><td><?= $row['gender']; ?></td></tr>
        <tr><td>Address </td><td><?= $row['s_add']; ?></td></tr>
        <tr><td>Class </td><td><?= $row['class']; ?></td></tr>
        <tr><td>Phone no. </td><td><?= $row['ph_no']; ?></td></tr>
        <tr><td>competition </td><td><?= $row['c_details']; ?></td></tr>
        <tr><td>Rank </td><td><?= $row['rank']; ?></td></tr>
        <tr><td>State </td><td><?= $row['state']; ?></td></tr>
        <tr><td>District </td><td><?= $row['d_name']; ?></td></tr>
        <tr><td>Block </td><td><?= $row['b_name']; ?></td></tr>
        <tr><td>Prize </td><td><?= $row['prize']; ?></td></tr>
        <?php  }       
              
        }

}
?> 
</table>
<button onclick="printData()" style="width: 20%; height: 30px;  background: #1E90FF; cursor: pointer; font-size: 18px; " >Print</button>
</body>
</html>