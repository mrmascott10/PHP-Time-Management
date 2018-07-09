<?php
//Enable sessions
session_start();
// Connect to database
include 'db_connection.php';
// Variables taken from form
// TODO: add mysqlirealescapestring
$username = Trim(stripslashes($_POST['username']));
$password = Trim(stripslashes($_POST['password']));
// Accessing account from database
$sql = "SELECT * FROM users WHERE username='$username'";
// Getting result from database
$result = mysqli_query($mysqli, $sql);
// Counting amount of records
$count = mysqli_num_rows($result);
// If theres one record carry on
if ($count == 1) {
  // Convert DB result array into text
  while ($row = mysqli_fetch_array($result)) {
    // Assigning variable to password record
    $dbPass = $row['password'];
    $dbUsername = $row['username'];
  }
  // Verifying password and username against database
  if (password_verify($password, $dbPass) && $username == $dbUsername) {
    $_SESSION['login_user'] = $username;
      $_SESSION['login_name'] = $name;
    header("location: dashboard.php");
  } else {
    header("location: index.php");
  }
}

 ?>
