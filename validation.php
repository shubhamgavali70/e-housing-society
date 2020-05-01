<?php 
        session_start();
        $con = mysqli_connect("localhost","root","root","society");
        $sql = 'SELECT * FROM login WHERE Uid="'.$_POST['Uid'].'" AND Password="'.$_POST['Password'].'"';
        $query = mysqli_query($con, $sql);
        $data = mysqli_num_rows($query);
        if($data > 0){
            while($row = mysqli_fetch_assoc($query)){
               
             $_SESSION['id'] = $row['Uid'];
             
            }
            echo "success";
        }
        
        else{
            echo "Id and password invalid";
        }
?>