<!DOCTYPE html>
<html> 
    <head>
        <title>User Login</title>
    </head>
    <body>
        <form name="frmUser" method="post" action="sample.php" align="center" id="loginform">
            <h3 align="center">Enter Login Details</h3>
            <b> Username: </b><input type="text" name="userName"><br><br>
            <b> Password: </b><input type="password" name="password"><br><br>
            <input type="button" name="button" value="submit" onclick="validation()">
            <input type="reset">
        </form>
        <script>
            function validation(){
                document.getElementById('loginform').submit();
                //alert("login successfully");
            }
        </script>
    </body>
</html>