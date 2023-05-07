<?php
    $servername = "localhost";
    $username = "hari";
    $password = "hari";
    $dbname = "shopping";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST['productid'])){
        //$fname=$_POST['fname'];
        $productid=$_POST['productid'];
        //$eid=$_POST['eid'];
        
        //$sql= 'UPDATE  '.$fname.'  SET att = 1 WHERE id ='.$productid.';';
        //echo $sql;
        //mysqli_query($conn,$sql);
        
        header('Location:done.php?msg=attendance taken, thank you&id='.$productid);
    }
    
?>