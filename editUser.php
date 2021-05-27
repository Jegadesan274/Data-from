<?php
include('./dbconnect.php');
 $id=$_GET[uid];
 //echo $id;

 $sql= "SELECT * FROM `user_tbl` WHERE user_id=$id";
 
 $query_result=$conn->query($sql);
 
 $value=$query_result->fetch_all(MYSQLI_ASSOC);
 //echo "<pre>";
 //print_r($value);
 //print_r($value[0][fname]);
 
 $sqlSkills = "SELECT * FROM `user_skills` WHERE user_id=$id";
 
 $skills_result=$conn->query($sqlSkills);
 $value_skills=$skills_result->fetch_all(MYSQLI_ASSOC);
 print_r($value_skills);
 //echo "<pre>";
 //die;
 



?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <title>Form Validation</title>
        <style>
            table,td{
                border: 1px solid black;
            }
            table{
                margin-top:80px;
                text-align: center;
            }
            body{
                background-color: antiquewhite;
            }
            /* button{
                background-color:green;
                color:white;
                padding: 15px 20px;
                text-align:center;
                display:inline-block;
                font-size:15px;
            } */
        </style>
    </head>
    
    <body>
        <center>
                <h4 align="center"><b>Update Profile</b></h4>
        <form name="form" id="userForm" action="update.php" method="post" autocomplete="off" enctype="multipart/form-data">
            <label for="fname"><b>First Name : </b></label>
            <input id="fname" name="fname" type="text" value="<?php echo $value[0]['fname'];?>"required/><br>
            <div id="fnameerr"></div>
            <label for="email"><b>Email Id : </b></label>
            <input id="email" type="text" name="email" value="<?php echo $value[0]['email'];?>" pattern="(/^[a-zA-Z0-9.!#$%'*+/=?^_{|}~-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9-]+)*$"required/><br>
            <div id="emailerr"></div>
            <label for="uname"><b>User Name : </b></label>
            <input id="uname" type="text" name="uname" value="<?php echo $value[0]['uname'];?>" required /><br>
            <div id="unameerr"></div>
            <label for="password"><b>Password : </b></label>
            <input type="password" id="password" name="pwd" value="<?php echo $value[0]['pwd']?>" required/><br>
            <div id="passworderr"></div>
            <!-- <label for="cfmpassword"><b>Confirm Password : </b></label>
            <input type="password" id="cfmpassword" name="cnfpwd" required/><br><br>
            <div id="cfmpassworderr"></div> -->
            <label for="gender"><b>Gender : </b></label>
            <input type="radio" id="male" name="gender" value="Male" <?php echo ($value[0]['gender']=='Male')?"checked='checked'":"";?> />Male
            <input type="radio" id="female" name="gender" value="Female" <?php echo ($value[0]['gender']=='Female')?"checked='checked'":"";?>/>Female
            <input type="radio" id="other" name="gender" value="other" <?php echo ($value[0]['gender']=='other')?"checked='checked'":"";?>/>other</br>
            <div id="gendererr"></div>
            <label for="select"><b> Select : </b></label>
            
            <select name="location" id="location">
                <option value="chennai" <?php echo ($value[0]['location']=='chennai')?"selected='selected'":"";?>>Chennai</option>
                <option value="bangalore" <?php echo ($value[0]['location']=='bangalore')?"selected='selected'":"";?>>Bangalore</option>
                <option value="pune" <?php echo ($value[0]['location']=='pune')?"selected='selected'":"";?>>Pune</option>
            </select>

            <div>
                <label for="upload"><b> Choose file : </b> </label>
                <input type="file" id="myfile" name="filename">
                <!-- <input type="submit"> -->
            </div><br/>

            <div>
                <img src="uploads/<?php echo $value[0]['image_name'];?>"style="width:80px;height:60px";>
            </div>
            <!-- <div>
            <a href="delete.php?name=uploads/< ?php echo $files[$a]; ?>" style="color: lightblue;">Delete</a>
            </div> -->


            <div>
                <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                <input type="hidden" name="img_url" id="img_url" value="<?php echo $row[''];?>">
                
            </div>
            <div></div>

            <div id="locationerr"></div>
            <label for="proof"><b>Proof : </b></label>

            <?php 
            $proofLists = explode(",",$value[0]['proof']);
           // print_r($proofLists);
            ?>
            <input type="checkbox" id="PAN" name="proof[]"value="PAN" <?php echo (in_array('PAN',$proofLists))?"checked='checked'":"";?>>
            <label for="PAN">PAN </label>
            <input type="checkbox" id="Aadhar" name="proof[]" value="Aadhar" <?php echo (in_array('Aadhar',$proofLists))?"checked='checked'":"";?>>
            <label for="Aadhar">Aadhar</label>
            <input type="checkbox" id="voterid" name="proof[]" value="voterid" <?php echo (in_array('voterid',$proofLists))?"checked='checked'":"";?>>
            <label for="voter id">Voter Id</label>
            <input type="checkbox" id="drivingliciense" name="proof[]" value="driving liciense"  <?php echo (in_array('driving liciense',$proofLists))?"checked='checked'":"";?>>
            <label for="drivingliciense">Driving Liciense</label>
            <div id="prooferr"></div>


            <input type="button" value="ADD" onclick="addRow('table')"/>
            <input type= "button" value= "DELETE" onclick="deleteRow('table')"/>
            
            <table id="table" width="50px" border="1">
                <tr>
                    <th><b>check</b></th>
                    <th><b>id</b></th>
                    <th><b>skils</b></th>
                    <th><b>Experience</b></th>
                </tr>
                <?php foreach($value_skills as $key=>$skill){?>
                <tr>
                    <td><input type="checkbox" name="chk"/></td>
                    <td><?php echo $key+1;?></td>
                    <td><input type="text" name="skills[]" value="<?php echo $skill['skills'];?>"/></td>
                    <td><input type="text" name="experience[]" value="<?php echo $skill['experience'];?>"/></td>
                </tr><?php } ?>
            </table>
            <input type="hidden" name="userId" value="<?php echo $value[0]['user_id']?>">
            <input type="button" id="button" value="submit" onclick="formvalidation()"><br><br>
            <span>Back to view</span> <a href="viewuserform.php"><b>back to users list </b></a>
        </form>  
        <script>
            function addRow(mytable){
                var table=document.getElementById(mytable);

                var rowCount=table.rows.length;
                var row=table.insertRow(rowCount);

                var cell1=row.insertCell(0);
                var element1=document.createElement("input");
                element1.type="checkbox";
                element1.name="chkbox[]";
                cell1.appendChild(element1);

                var cell2=row.insertCell(1);
                cell2.innerHTML=rowCount+1;

                var cell3=row.insertCell(2);
                var element2=document.createElement("input");
                element2.type="text";
                element2.name="skills[]";
                cell3.appendChild(element2);

                var cell4=row.insertCell(3);
                var element3=document.createElement("input");
                element3.type="text";
                element3.name="experience[]";
                cell4.appendChild(element3);

                // var cell5=row.insertCell(4);
                // var element4=document.getElementById("input");
                // element4.type="button";
                // element4.name="textbox[]";
                // element4.name="";
                // cell5.appendChild(element4);


            }
            function deleteRow(mytable){
                try{
                    var table=document.getElementById(mytable);
                    var rowCount=table.rows.length;

                    for(var i=1;i<rowCount;i++){
                        var row=table.rows[i];
                        var chkbox=row.cells[0].childNodes[0];
                        if(null !=chkbox && true == chkbox.checked){
                            table.deleteRow(i);
                            rowCount--;
                            i--;
                        }
                    }
                }catch(e){
                alert(e);}
            }
            function formvalidation(){
                var fname=document.getElementById('fname').value;
                var email=document.getElementById('email').value;
                var uname=document.getElementById('uname').value;
                var password=document.getElementById('password').value;
                // var cfmpassword=document.getElementById('cfmpassword').value;
                var male=document.getElementById('male').checked;
                var female=document.getElementById('female').checked;
                var other=document.getElementById('other').checked;
                var location=document.getElementById('location').value;
                var PAN=document.getElementById('PAN').checked;
                var Aadhar=document.getElementById('Aadhar').checked;
                var voterid=document.getElementById('voterid').checked;
                var drivingliciense=document.getElementById('drivingliciense').checked;
                if(fname.trim()=="")
                {
                    document.getElementById('fname').value=fname.trim();
                    document.getElementById('fnameerr').innerHTML="please enter the valid username";
                    //alert("req username");
                    fname.focus();
                    return false;
                }
                else if(email.trim()=="")
                {
                    document.getElementById('email').value=email.trim();
                    document.getElementById('emailerr').innerHTML="please enter the valid mail id";
                    //alert("email is req");
                    email.focus();
                    return false;
                }
                else if(uname.trim()=="")
                {
                    document.getElementById('unameerr').innerHTML="please enter the crt username";
                    //alert("username is req");
                    uname.focus();
                    return false;
                }
                else if(password=="")
                {
                    document.getElementById('passworderr').innerHTML="please enter the password";
                    //alert("password req");
                    password.focus();
                    return false;
                }
            // else if(cfmpassword=="")
            // {
            //     document.getElementById('cfmpassworderr').innerHTML="please enter the crt password again";
            //     //alert("cfmpassword");
            //     cfmpassword.focus();
            //     return false;
            // }
            // else if(password!==cfmpassword)
            // {
            //     alert("password not matching");
            //     return false;
            // }
            else if(male === false && female === false && other ===false)
            {
                document.getElementById('gendererr').innerHTML="please select the gender";
                gender.focus();
                return false;
            }
            else if(PAN === false && Aadhar === false && voterid === false && drivingliciense === false)
            {
                document.getElementById('prooferr').innerHTML="please select any proof";
                proof.focus();
                return false;
            }
            else{
                
                document.getElementById('userForm').submit();
            }
        }
        </script>
        </center>
    </body>
</html>