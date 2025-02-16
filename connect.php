<?php
$host="localhost";
$user="root";
$password="";
$db="login";
$conn= new mysqli($host,$user,$password,$database);
if($conn->connect_error){
    echo"Connection failed: ".$conn->connect_error;
}
?>