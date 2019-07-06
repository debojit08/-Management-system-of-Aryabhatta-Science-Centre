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
<?php create_topmenu(4); ?>
<div class="clr">
	<h3>District Level Winners</h3>

<div class="container">
  <form action="districtsave.php" method="POST">

    District code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="districtcode" name="did" placeholder="--District code--"><br>

    Block code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="block" name="bid">
      <option value="--select--">--select--</option>
       <?php
        $sql="SELECT * FROM block ORDER BY b_id";
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {         
              echo '<option value="'.$row['b_id'].'">'.$row['b_id'].'</option>';
          }       
              
        }

      ?>
    </select><br>

    Participant code &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="pcode" name="pcode">
      <option value="--select--">--select--</option>
      <?php
        $sql="SELECT a.p_code FROM entry a,block b where a.p_code=b.p_code ORDER BY p_code";
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

     Rank &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="rank" name="rank">
      <option value="--select--">--select--</option>
       <option value="1st">First</option>
        <option value="2nd">Second</option>
        <option value="3rd">Third</option>
        
         <option value="Consolation">Consolation</option>
    </select><br>
    State &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="state" name="state" placeholder="--state--"><br>

    District &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="district" name="district" placeholder="--district--"><br>

    Block &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="bl" name="block" placeholder="--block--"><br>


<br> 
    <input type="submit" value="SAVE">&nbsp&nbsp
    
  </form>


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
              url  : 'blockaction.php',
              type : "GET",
              data : "pid="+did,
              cache: false,
              processData:false,
              mimeType:"multipart/form-data"
            }).done(function(res){ 
                if(res){
                  var data=jQuery.parseJSON(res);
                  console.log(data);
                  $("#fname").val(data[1]);
                  $("#school").val(data[2]);
                  $("#cls").val(data[3]);
                  $("#pno").val(data[4]);
                  $("#com").val(data[5]);
                  $("#state").val(data[6]);
                  $("#district").val(data[7]);
                  $("#bl").val(data[8]);
                  $("#gen").val(data[9]);
                }
            }); 

      });
    });

</script>

</body>
</html>