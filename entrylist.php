<?php session_start();
include("menu.php");
include 'dbh.php';
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
?>
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
<div class="content">
<?php create_topmenu(6); ?>
<div class="blk">
	

<div class="content_body">
	<h3 class="top_heading">Entry List</h3>
	<table border="1" id="print">
		<tr><td>Participent code</td><td>Name</td><td>gender</td><td>Addres</td><td>Class</td><td>Phone no.</td><td>competition</td><td>State</td><td>District</td><td>Block</td></tr>
	<?php
		$sql="SELECT * FROM entry";
       //echo $sql;
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {  
        ?>    
             <tr>
             	<td><?= $row['p_code']; ?></td>
             	
             	<td><?= $row['p_name']; ?></td>
             	<td><?= $row['gender']; ?></td>
             	<td><?= $row['s_add']; ?></td>
             	<td><?= $row['class']; ?></td>
             	<td><?= $row['ph_no']; ?></td>
             	<td><?= $row['c_details']; ?></td>
             	<td><?= $row['state']; ?></td>
             	<td><?= $row['d_name']; ?></td>
             	<td><?= $row['b_name']; ?></td>
             	
             </tr>
        <?php  }       
              
        }

	?>
</table>
<button onclick="printData()" style="width: 20%; height: 30px;  background: #1E90FF;cursor: pointer; font-size: 18px; " >Print</button>
</div>
</div>
	</div>
</div>
	
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/slick.js"></script>
<script>
$(document).ready(function(){
      $('.slide').slick({
        autoplay: true,
        accessibility: false,
        arrows: false,
        autoplaySpeed: 3000
      });

    
    });

</script>

</body>
</html>