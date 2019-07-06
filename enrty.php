<?php session_start();
include "menu.php";

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
	<link rel="stylesheet" type="text/css" href="form.css">
	<link rel="stylesheet" type="text/css" href="js/slick.css">
	
</head>
<body>
<div class="content">
<?php create_topmenu(2); ?>
<div class="clr">

<h3>Entry Form</h3>

<div class="container">
  
    <form action="entryaction.php" method="POST">

    Participant Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="fname" name="pname" placeholder="--Enter Participant name--" required><br>

    Gender &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    Male<input type="Radio" name="r1" value="Male" required> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    Female<input type="Radio" name="r1" value="Female" required><br>


    School Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="school" name="sadddress" placeholder="--Enter School address--" required><br>

     Class &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="class" name="class" required>
      <option value="--select--">--select--</option>
      <option value="five">V</option>
      <option value="six">VI</option>
      <option value="seven">VII</option>
      <option value="eight">VIII</option>
      <option value="nine">IX</option>
      <option value="ten">X</option>
    </select><br>


    Phone no. &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" id="phone" name="pno" placeholder="--Enter Your phone no.--" required><br>



    Competition Details &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="Competition" name="cdetails" required>
      <option value="--select--">--select--</option>
      <option value="Science and technology based model making">Science and technology based model making</option>
      <option value="Science based extempore speech">Science based extempore speech</option>
      <option value="Science based Poster Drawing">Science based Poster Drawing</option>
    </select><br>
    State &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="" name="state" required>
      <option value="--select--">--select--</option>
      <option value="assam">Assam</option>
    </select><br>
    District Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="dname" name="dname" required>
      <option value="--select--">--select--</option>
      <?php
        $sql="SELECT * FROM district_master ORDER BY dname";
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {         
              echo '<option value="'.$row['dname'].'" data-id="'.$row['did'].'">'.$row['dname'].'</option>';
          }       
              
        }

      ?>
      
    </select><br>
    Block Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
    <select id="bname" name="bname" required>
      <option value="--select--">--select--</option>
    </select><br>

    <br> 
    <input type="submit" value="Submit">&nbsp&nbsp
   
  </form>
</div>


	</div>

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

      $("#dname").change(function(){
          var did=$("#dname option:selected").attr("data-id");
          //alert(did);

            $.ajax({
              url  : 'loadblock.php',
              type : "GET",
              data : "did="+did,
              cache: false,
              processData:false,
              mimeType:"multipart/form-data"
            }).done(function(res){ 

              $("#bname").html(res);
            });

      });
    });

</script>

</body>
</html>