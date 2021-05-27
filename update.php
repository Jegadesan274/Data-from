<?php
include('./dbconnect.php');
$userId = $_POST['userId'];
$name = $_POST['fname'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$password = $_POST['pwd'];
$gender = $_POST['gender'];
$location = $_POST['location'];
$skills = $_POST['skills'];
$experience = $_POST['experience'];
$proof = implode(',',$_POST['proof']);
// print_r($skills);
// print_r($experience);
// die;
$sql="UPDATE `user_tbl`
SET
`fname`='$name',
`email`='$email',
`uname`='$uname',
`pwd`='$password',
`gender`='$gender',
`location`='$location',
`proof`='$proof'
WHERE user_id = $userId";

$del= "DELETE FROM 'user_skills' WHERE user_id = $userId";
//print_r($del);

$sql="UPDATE `user_skills`
SET 
`skills` = '$skills',
`experience` = '$experience'
WHERE user_id=$userId";

//echo "<pre>";

$skills=$_POST['skills'];
$Count=Count[$skills];

for($i=0;$i<$Count;$i++)
{
    $insert="INSERT INTO user_skills (user_id,skills,experience) VALUES ($userId,$skills,$experience)";
    $skills[$i];
    $experience[$i]; 
}


if(isset($_FILES['filename']['name']) && trim($_FILES['filename']['name'])!=""){
    $fileName=$_FILES['filename']['name'];
    $ext=pathinfo($fileName,PATHINFO_EXTENSION);
    $renamedFile = 'file_'.rand(2000,10000).'.'.$ext;
    if(move_uploaded_file($filetmpname=$_FILES['filename']['tmp_name'],'uploads'.DIRECTORY_SEPARATOR.$renamedFile)){
        $updateSql = "UPDATE user_tbl SET image_name = '$renamedFile' WHERE user_id= $userId";
        $uResult = $conn->query($updateSql);
    }
}


// $sqlSkills="UPDATE `user_skills`
// SET
// `skills`='$skills',
// `experience`='$experience',

// ";


if( $conn->query($sql)){
    echo "Record Created";
    header("Location:viewuserform.php");
}else{
    echo "error:".$sql."<br>".$conn->error;
}

?>