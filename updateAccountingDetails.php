<?php
    include("connection.php");
    if(!empty($_POST["edit_id"])){  
        $amtrec = $_POST["amt"];
        if($amtrec < 2501 && $amtrec > 0){
            $due = 2500 - $amtrec;
            $query2 = "UPDATE members SET Amount_received = '$amtrec', Due = '$due' WHERE Uid='".$_POST["edit_id"]."'";  
            mysqli_query($connect, $query2); 
        }
    }
    header("Location:accounting.php"); 
?>