<?php

$host='localhost';
$dbuser='root';
$dbpassword='';
$dbname='demo_db';

$conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);


if(!$conn)
{
    die("connection failed : ". mysqli_connect_error());
}else{

    //echo "connected ";
}



?>