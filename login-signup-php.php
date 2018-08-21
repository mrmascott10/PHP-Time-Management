<?php
session_start();
include 'db_connection.php';

if ($_POST['loginSignupVar'] == "signup") {
    
    
    
//Variables
$name = Trim(stripslashes($_POST['name']));

//If username has alphanumeric characters. prevents XSS.
if (ctype_alnum(Trim(stripslashes($_POST['username'])))) {      
    $username = Trim(stripslashes($_POST['username']));
} 
$email = Trim(stripslashes($_POST['email']));
$password = Trim(stripslashes($_POST['password']));

$encryptedPass = password_hash($password, PASSWORD_DEFAULT);
//$encryptedPass = $password;

$sqlUsrCheck = "SELECT username FROM users WHERE username = '$username'";

//REMEMBER THE 'I'.
if (filter_var($email, FILTER_VALIDATE_EMAIL) && MYSQLI_NUM_ROWS($mysqli->query($sqlUsrCheck)) == 0) {
  //valid email
  $sqlInsertDetails = "INSERT INTO users (name, username, email, password) VALUES ('$name', '$username', '$email', '$encryptedPass')";
  $sqlInsertDetailsResult = $mysqli->query($sqlInsertDetails);
    $_SESSION['login_user'] = $username;
    $_SESSION['login_name'] = $name;
  header("Location: dashboard.php");
} else {
  //invalid email
  header("Location: index.php");
}    
} else if ($_POST['loginSignupVar'] == "login") {
  
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
}