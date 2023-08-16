<?php
include "cira_connect_db_server.php";

if(isset($_POST['username'])){
   $username = mysqli_real_escape_string($conn_cira,$_POST['username']);

   $query = "select count(*) as cntUser from cia_login where log_mail='".$username."'";

   $result = mysqli_query($conn_cira,$query);
   $response = "<span style='color: green;'>Available.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>Not Available.</span>";
      }
   
   }

   echo $response;
   die;
}
?>