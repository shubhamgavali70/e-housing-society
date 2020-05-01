<?php
 include("connection.php");
    if(isset($_POST["pqrs"])){
        $t = $_POST["abcd"];
        $d = $_POST["date"];
        if (!empty($t) && !empty($d)) {
            $sql = "INSERT INTO mom (textArea,dateInput) VALUES ('$t','$d')";
             mysqli_query($connect, $sql);
             header("Location:admin.php");
        }
       
    }
?>
