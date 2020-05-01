<?php
$con = mysqli_connect("localhost", "root", "root", "society");
if(isset($_POST["comp"])){
        $query3 = "SELECT * FROM complaints WHERE id = '".$_POST["comp"]."'";
        $result2 = mysqli_query($con, $query3);
        while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
        
           echo $row2["name"];
           echo $_POST["comp"];
        
    }
    }

?>





