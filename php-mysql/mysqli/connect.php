<?php
// configuration
$host="localhost";      //  host or ip
$username="root";	//  username
$pass="root";      //  password
$db="mydb";          //  dbname

$con = mysqli_connect($host,$username,$pass,$db);
// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>