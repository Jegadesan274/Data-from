<?php
session_start();
include('./dbconnect.php');

$sql= "SELECT `user_id`,`fname`, `email`,  `gender`, `location`, `proof`,image_name FROM `user_tbl`";

$queryResult = $conn->query($sql);
// echo"<pre>";


$usersList = [];
if($queryResult){$_SESSION["uname"];
    $usersList = $queryResult->fetch_all(MYSQLI_ASSOC);
    // print_r($usersList);
}



$sqlSkills= "SELECT `user_id`,`skills`,`experience` FROM `user_skills`";

$queryResult1 = $conn->query($sqlSkills);

$usersList1=[];
if($queryResult1){$_SESSION["user_id"];
    $usersList1=$queryResult1->fetch_all(MYSQL_ASSOC);
}


?>

<!DOCTYPE html>
<html>
    <body>
    <a href="forms.php">Add User</a>
        <table border="1">
            <tr>
                <th>Image</th>
                <th>First name</th>
                <th>Email Id</th>
                <th>Gender</th>
                <th>Proof</th>
                <th>Location</th>
                <th>Action</th>
            </tr>

            <?php foreach($usersList as $value){ ?>
                <tr>
                    <td><img src="uploads/<?php echo $value['image_name'];?>" style="width:50px;height:50px;"></td>
                    <td><?php echo $value[fname];?></td>
                    <td><?php echo $value[email];?></td>
                    <td><?php echo $value[gender];?></td>
                    <td><?php echo $value[location];?></td>
                    <td><?php echo $value[proof];?></td>
                    
                    <td><a href="editUser.php?uid=<?php echo $value[user_id];?>">Edit</a>&nbsp<a href="deleteUser.php?uid=<?php echo $value[user_id];?>">Delete</a></td>
                </tr>
            
            <?php } ?>

            <div>
               <?php if(isset($_SESSION["username"])){ ?>
                <a href="logout.php">logout</a>
                <?php }else { ?>
                    <a href="login.php">login</a>
                
               <?php } ?>


               <!-- <?php
                    if(isset($_SESSION["username"])){
                        echo "<a href='logout.php'>logout</a>";
                    }else{
                        
                        echo "<a href='login.php'>login</a>";
                    }



                ?> -->
               </div>

        </table>
        
    </body>
</html>