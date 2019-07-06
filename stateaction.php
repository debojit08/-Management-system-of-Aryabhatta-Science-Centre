<?php 

include 'dbh.php';

if(isset($_GET['pid'])){

$did= $_GET['pid'];

 $sql="SELECT * FROM `entry` WHERE p_code='".$did."' ";
       //echo $sql;
       //$result=$conn->query($sql);
        $result = mysqli_query($conn,$sql);
      //var_dump($result);



      $rows = mysqli_num_rows($result); 
            // get number of rows returned 
          //var_dump($rows);
        if ($rows) {     
          
        while ($row = mysqli_fetch_array($result)) {         
             echo json_encode($row);

          }       
              
        }

}
?> 


