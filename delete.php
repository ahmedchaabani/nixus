<?php
include 'config.php';
if(isset($_GET['deleteid'])){
    $reference=$_GET['deleteid'];

    $sql="delete from offres where reference=$reference";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('display.php');
    }else{
        die(mysqli_error($con));
    }
}
?>