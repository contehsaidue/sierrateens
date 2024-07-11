<?php


$dbhostname = 'localhost';
$dbusername = 'root';
$dbhostpass = '';
$dbname = 'dbsierrateens';

// connection variable
$conn = mysqli_connect ($dbhostname , $dbusername , $dbhostpass, $dbname);

if (!$conn){
echo 'Failed to connect to Database!';
}



?>
