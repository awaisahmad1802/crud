<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "form";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if($conn == true){
    #echo "connection ok"; 123
 }
else{
    echo "connection failed";
}





?>