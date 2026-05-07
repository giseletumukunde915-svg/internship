<?php

$conn = mysqli_connect("localhost", "root", "", "crud_db");

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

echo "Database Connected Successfully";

?>