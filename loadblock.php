<?php session_start();

include 'dbh.php';

if(isset($_GET['did'])){


	$did= $_GET['did'];

 $sql="SELECT * FROM block_master  WHERE did='".$did."' ";
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {         
              echo '<option value="'.$row['bname'].'">'.$row['bname'].'</option>';
          }       
              
        }

}
?>