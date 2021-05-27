<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
        <title>Register</title>
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
                <h4 align="center"><b>Registration Form</b></h4>
        <form name="form" id="userForm" action="getUsersInfo.php" method="post" enctype="multipart/form-data">
            <label for="fname"><b>First Name : </b></label>
            <input id="fname" name="fname" type="text"required /><br>
            <div id="fnameerr"></div>
            <label for="email"><b>Email Id : </b></label>
            <input id="email" type="text" name="email" pattern="(/^[a-zA-Z0-9.!#$%'*+/=?^_{|}~-]+@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9-]+)*$"required/><br>
            <div id="emailerr"></div>
            <label for="uname"><b>User Name : </b></label>
            <input id="uname" type="text" name="uname" required /><br>
            <div id="unameerr"></div>
            <label for="password"><b>Password : </b></label>
            <input type="password" id="password" name="pwd" required/><br>
            <div id="passworderr"></div>
            <label for="cfmpassword"><b>Confirm Password : </b></label>
            <input type="password" id="cfmpassword" name="cnfpwd" required/><br><br>
            <div id="cfmpassworderr"></div>
            <label for="gender"><b>Gender : </b></label>
            <input type="radio" id="male" name="gender" value="Male"/>Male
            <input type="radio" id="female" name="gender" value="Female"/>Female
            <input type="radio" id="other" name="gender" value="other"/>other</br>
            <div id="gendererr"></div>


            <div>
                <label for="upload"><b> Choose file : </b> </label>
                <input type="file" id="myfile" name="filename">
                <!-- <input type="submit"> -->
            </div>
            <div id="myfileerr"></div> 




            <label for="select"><b> Select : </b></label>
            
            <select name="location" id="location">
                <option value="chennai">Chennai</option>
                <option value="bangalore">Bangalore</option>
                <option value="pune">Pune</option>
            </select>
            <div id="locationerr"></div>
            <label for="proof"><b>Proof : </b></label>
            <input type="checkbox" id="PAN" name="proof[]"value="PAN">
            <label for="PAN">PAN </label>
            <input type="checkbox" id="Aadhar" name="proof[]" value="Aadhar">
            <label for="Aadhar">Aadhar</label>
            <input type="checkbox" id="voterid" name="proof[]" value="voterid">
            <label for="voter id">Voter Id</label>
            <input type="checkbox" id="drivingliciense" name="proof[]" value="driving liciense">
            <label for="drivingliciense">Driving Liciense</label>
            <div id="prooferr"></div>



            <!-- <div><table id="myTable">
                <tr>
                    <th><b>skills</b></th>
                    <th><b>Experience</b></th>
                    <th><b>Action</b></th>
                </tr>
                <tr>
                    <td> hi </td>
                    <td> how are you </td>
                    <td> hello </td>
                </tr>
                </table>

                <button onclick="createtable()"> ++</button>&nbsp;<button onclick="deletetable()"> -- </button></div> -->

            <input type="button" value="ADD" onclick="addRow('table')"/>

            <input type= "button" value= "DELETE" onclick="deleteRow('table')"/>
            <table id="table" width="50px" border="1" >
                <tr>
                    <th><b>check</b></th>
                    <th><b>id</b></th>
                    <th><b>skils</b></th>
                    <th><b>Experience</b></th>

                </tr>
                <tr>
                    <td><input type= "checkbox" name="chk"/></td>
                    <td>1</td>
                    <td><input type="text" name="skills[]"/></td>
                    <td><input type="text" name="experience[]"/></td>
                    <!-- <td><input value="++"&nbsp value="--"/></td> -->
                    <!-- <td><input type="button" value="++" onclick="addRow('table')"/> &nbsp <input type= "button" value= "--" onclick="deleteRow('table')"/></td>-->
                </tr>
            </table>
            



            <input type="button" id="button" value="submit" onclick="formvalidation()"><br><br>
            <span>If you already registered?</span> <a href="signin.php"><b>Login</b></a>
        </form>  
        <script>


            // function createtable(){
            //     var table=document.getElementById("mytable");
            //     var row=table.insetRow(0);
            //     var cell1
            //     row.innerHTML="";
            // }
            // function deletetable(){
            //     document.getElementById("mytable").deleterow(0);
            // }



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


            }
            function deleteRow(mytable){
                try{
                    var table=document.getElementById(mytable);
                    var rowCount=table.rows.length;

                    for(var i=0;i<rowCount;i++){
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
            var cfmpassword=document.getElementById('cfmpassword').value;
            var male=document.getElementById('male').checked;
            var female=document.getElementById('female').checked;
            var other=document.getElementById('other').checked;
            var location=document.getElementById('location').value;
            // var myfile=docment.getElementById('myfile').value;
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
            else if(cfmpassword=="")
            {
                document.getElementById('cfmpassworderr').innerHTML="please enter the crt password again";
                //alert("cfmpassword");
                cfmpassword.focus();
                return false;
            }
            else if(password!==cfmpassword)
            {
                alert("password not matching");
                return false;
            }
            else if(male === false && female === false && other ===false)
            {
                document.getElementById('gendererr').innerHTML="please select the gender";
                gender.focus();
                return false;
            }
            // else if(myfile=""){
            //     document.getElementById('myfileerr').innerHTML="Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB";
            //     myfile.focus();
            //     return false;
            // }
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