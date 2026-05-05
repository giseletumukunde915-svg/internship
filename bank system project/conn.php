<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bank_system";

$ conn = mysql_connect($host,$user,$password,$database);
if(!conn){
    echo"failed to connect to your database"
}

?>