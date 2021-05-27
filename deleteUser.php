<?php
include('./dbconnect.php');
$userId = $_GET['uid'];

$sql="DELETE FROM `user_tbl` WHERE user_id=$userId";


if( $conn->query($sql)){
   
    header("Location:viewuserform.php");
}else{
    echo "error:".$sql."<br>".$conn->error;
}
