    <?php
        session_start();
        
        $con2 = mysqli_connect("localhost", "root", "root", "society");
        if(isset($_POST['send_complaint'])){
            $comp_text = $_POST['complaint_textarea'];
            $query2 = "SELECT Name FROM members WHERE Uid='".$_SESSION['id']."'";
            $res = mysqli_query($con2, $query2);
            while($r = mysqli_fetch_assoc($res)){
                $name = $r["Name"];
                if(!empty($comp_text)){
                    $sql = "INSERT INTO complaints (complaint_text, name) VALUES ('$comp_text','$name')";
                    mysqli_query($con, $sql);
                    header("Location:member.php");
                }
                
            }
            
        }
    ?>