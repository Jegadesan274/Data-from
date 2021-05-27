<?php
session_start();
$name=$_POST["userName"];
$pwd=$_POST["password"];
$message="";
// print_r($_POST);
// echo count($_POST);
// die;
if(count($_POST)>0){
    include('./dbconnect.php');
    // $sql= "SELECT * FROM `user_tbl` WHERE uname='".$_POST["uname"]." and pwd='".$_POST["pwd"]."'";
    $sql= "SELECT * FROM `user_tbl` WHERE uname='$name' and pwd='$pwd'";
    // echo $sql;die;
    $queryResult=$conn->query($sql);
    $row  = mysqli_fetch_array($queryResult);
// echo "<pre>";
    // var_dump($row);die;
    
    if(is_array($row) && count($row) > 0) {
        // var_dump($row['uname']);die;
            //$_SESSION["user_id"]=$row["user_id"];
            $_SESSION["username"] = $row['uname'];
            $_SESSION["password"] = $row['pwd'];
            
            header("Location:viewuserform.php");
        } else {
         $message = "Invalid Username or Password!";
        }
    }
    if(!isset($_SESSION["username"])){
        header("Location:login.php");
    }
?>