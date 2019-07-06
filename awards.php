<?php session_start();
include("menu.php");
include("dbh.php");
if(!isset($_SESSION['id'])){
	header("location:index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>navbar</title>
	<link rel="stylesheet" type="text/css" href="innerstyle.css?version=1.0.1">
	<link rel="stylesheet" type="text/css" href="form.css">
	<link rel="stylesheet" type="text/css" href="js/slick.css">
	
</head>
<body>
<div class="content">
<?php create_topmenu(11); ?>
<div class="clr">
	<h3>Awards For State Level Winners</h3>

<div class="container">
  <form action="awardsave.php" method="POST">
    
    Participant code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="pcode" name="pcode">
      <option value="--select--">--select--</option>
      <?php
        $sql="SELECT a.p_code FROM entry a,state b where a.p_code=b.p_code ORDER BY p_code";
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {         
              echo '<option value="'.$row['p_code'].'">'.$row['p_code'].'</option>';
          }       
              
        }

      ?>
    </select><br>

    Participant Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="fname" name="pname" placeholder="--Enter Participant name--"><br>

    Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <input type="text" id="gen" name="gender" placeholder="--gender--"><br>

    School Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="school" name="sadddress" placeholder="--Enter School address--"><br>

    Class &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="cls" name="class" placeholder="--Enter Class--"><br>

    Phone no. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="pno" name="pno" placeholder="--Enter Your phone no.--"><br>

    Competition Details &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="com" name="cdetails" placeholder="--Enter Competition Details--"><br>

    Rank &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="rank" name="rank" placeholder="--Rank--"><br>

    Prize &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="prize" name="prize">
      <option value="--select--">--select--</option>
      <option value="Rs15000">Rs15000</option>
      <option value="Rs10000">Rs10000</option>
      <option value="Rs5000">Rs5000</option>
      <option value="Rs3000">Rs3000</option>
      <option value="Rs2000">Rs2000</option>
    </select><br>

    <br> 
    <input type="submit" value="Submit">
    

</div>

</div>
	
</div>
	
<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="js/slick.js"></script>
<script>
  <?php if(isset($_GET['success']) && $_GET['success']=="true"){
    ?>
    alert("Data Saved");
 <?php } ?>
$(document).ready(function(){
      $('.slide').slick({
        autoplay: true,
        accessibility: false,
        arrows: false,
        autoplaySpeed: 3000
      });
       $("#pcode").change(function(){
          var did=$(this).val();
          //alert(did);

            $.ajax({
              url  : 'awardaction.php',
              type : "GET",
              data : "pid="+did,
              cache: false,
              processData:false,
              mimeType:"multipart/form-data"
            }).done(function(res){ 
              console.log(res);
                if(res){
                  var data=jQuery.parseJSON(res);
                  
                  $("#fname").val(data[1]);
                  $("#school").val(data[2]);
                  $("#cls").val(data[3]);
                  $("#pno").val(data[4]);
                  $("#com").val(data[5]);
                  $("#state").val(data[6]);
                  $("#district").val(data[7]);
                  $("#bl").val(data[8]);
                  $("#gen").val(data[9]);
                  $("#rank").val(data[10]);
                }
            }); 

      });
    });

</script>

</body>
</html>