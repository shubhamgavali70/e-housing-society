<?php  
include("connection.php");
if(isset($_POST["edit_id"]))  
 {  
      $query = "SELECT * FROM members WHERE Uid = '".$_POST["edit_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);
      echo json_encode($row);
       
 } 

?>