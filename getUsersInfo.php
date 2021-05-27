<?php
include('./dbconnect.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);die;
$firstname = $_POST['fname'];
$email = $_POST['email'];
$username = $_POST['uname'];
$password = $_POST['pwd'];
$gender=$_POST['gender'];
$location=$_POST['location'];
$proof=implode(',',$_POST['proof']);
// $Skills=$_POST['Skills'];
// $Experience=$_POST['Experience'];

$filename = $_FILES['filename']['name'];
$tmpName = $_FILES['filename']['tmp_name'];


$sql="INSERT INTO `user_tbl` (firstname, email, username, password, gender, location, proof)
VALUES ('$firstname','$email','$username','$password','$gender','$location','$proof')";

$lastinsertid=0;
$qResult = $conn->query($sql);
$ext=pathinfo($filename,PATHINFO_EXTENSION);
$renamedFile = 'file_'.rand(2000,10000).'.'.$ext;


if($qResult){
   $lastinsertid= mysqli_insert_id($conn);
   $skills=$_POST['skills'];
   $experience=$_POST['experience'];

    $totalSkills = count($skills);
    for($counter = 0;$counter<$totalSkills;$counter++){
        echo $sqlSkills="INSERT INTO `user_skills` (user_id,skills,experience) VALUES ($lastinsertid,'$skills[$counter]','$experience[$counter]')";
       $skillsResult = $conn->query($sqlSkills);
    }
    // die;
    if(move_uploaded_file($tmpName,'uploads'.DIRECTORY_SEPARATOR.$renamedFile)){
        $updateSql = "UPDATE user_tbl SET image_name = '$renamedFile' WHERE user_id= $lastinsertid";
        $uResult = $conn->query($updateSql);
    }
    echo "Record Created";
    header("Location:viewuserform.php");
}else{
    echo "error:".$sql."<br>".$conn->error;
}
$conn->close();
?>