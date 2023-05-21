<?php
$servername='localhost';
$username='root';
$password='';
$dbname="ProjectFiles";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn){
    echo 'Error: ' . mysqli_connect_error();  
}

?>