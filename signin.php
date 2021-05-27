<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <style>
        /* form{
            border:1px solid #f2f3f1;
        } */
        input[type=text],
        input[type=password]{
            width:25%;
            padding: 12px 20px;
        }
        button{
            background-color: green;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
        }
        .img{
            height: 100%;
            width: 100%;
            background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.3)),url(/img/banner.jpg);
            background-position: center;
            background-size:cover;
            position:absolute;
        }
        /* .cancelbutton{
            width: auto;
            padding: 10px 18px;
            background-color: red;
        } */
    </style>
    <script>
    // function trim(space){
    //     return space.replace(/^\s+|\s+$/gm,'');
    // }
        function validate(){
            var username=document.getElementById('username').value;
            var password=document.getElementById('password').value;

            if(username.trim()=="")
            {
                document.getElementById('username').value=username.trim();
                document.getElementByID('usernameerr').innerHTML="please enter your name";
                username.focus();
                return false;
            }
            if(password.trim()==""){
                document.getElementById('password').value=password.trim();
                document.getElementById('password').innerHTML="please enter the password";
                password.focus();
                return false;
            }
        }
    </script>
    <body>
    <div class="img">
        <center>
            <h4>Login Form</h4>
            <form name="sigin" onclick="validate()" method="post">
            <div>
                <label><b>Username : </b></label>
                <input id="username"type="text" placeholder="enter Username" required><br><br>
                <label><b>Password : </b><label>
                <input id="password"type="password" placeholder="enter password"required><br>
                <button type="submit"><b> Login </b></button>
                <input type="checkbox" checked="checked"> Remind me
            </div>
            <div>
                <span><b>Forgot </b><a href="#"> password</a><b> ? </b></span><br><br>
                <span><b>If you not reg ? </b></span><a href="forms.php"><b>Signup</b></a>
            </div>
        </center>
    </div>
    </body>
</html>