<?php
$conn=mysqli_connect('localhost','root','zaq12345','file-manager');

// $sql="SELECT * FROM files";
// $result=mysqli_query($conn,$sql);
// $files=mysqli_fetch_all($result,MYSQLI_ASSOC);

if(isset($_post['save'])){
    $filename=$_FILES['myfile']['name'];
    $desination='uploads/'.$filename;
    $extenstion=pathinfo($filename, PATHINFO_EXTENSION);
    $filetmpname=$_FILES['myfile']['tmp_name'];
    $filesize=$_FILES['myfile']['size'];

    if(!in_array($extension,['zip','pdf','docx'])){
        echo "file will be .zip,.pdf or .docs";
    }elseif($_FILES['myfile']['size']>5000000){
        echo"File is to big!";
    }else{
        if(move_uploaded_file($filetmpname,$desination)){
            $sql="INSERT INTO files(name,size,downloads)VALUES('$filename',$filesize,0)";
            if(mysql_query($conn,$sql)){
                echo "file uploaded";
            }
            else{
                echo "filed to upload";
            }
        }
    }
}
?>