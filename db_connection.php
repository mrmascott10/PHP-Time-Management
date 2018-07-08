<?php
//Could wrap in function then call function instead of $mysqli-query($var).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "time_management";

//create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

//Check Connection
if ($mysqli->connect_error) {
  die("Connection Failed " . $mysqli->connect_error);
}
?>
