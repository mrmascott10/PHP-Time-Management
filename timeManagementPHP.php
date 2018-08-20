<?php
include 'db_connection.php';
    
//if(isset($_POST['project_title'])) { // If it's for adding a new project
    $project_title = Trim(stripslashes($_POST['project_title']));
    $client_name = Trim(stripslashes($_POST['client_name']));
    $cost_hour =  Trim(stripslashes($_POST['cost_hour']));
    $time_spent = Trim(stripslashes($_POST['time_spent']));
    $time_spent = Trim(stripslashes($_POST['time_spent']));
    $time_spent_min = Trim(stripslashes($_POST['time_spent_min']));
    $description = Trim(stripslashes($_POST['description']));
    
    
//    $usernameIdSql = mysqli_query($mysqli, "SELECT `id` FROM `users` WHERE `username` = `$username`");
//    while($row = mysqli_fetch_array($usernameIdSql)) {
//        $usernameId = $row['id'];
//    }
    
    $insertNewProject = mysqli_query($mysqli, "INSERT INTO `jobs`(project_title, client_name, cost_hour, description, time_spent, time_spent_min, username_id) VALUES ('$project_title', '$client_name', '$cost_hour', '$description', '$time_spent', '$time_spent_min', 1)");
    
//} else {
//$jobId = mysqli_real_escape_string($mysqli, Trim(stripslashes(preg_replace('/[^0-9]/', '', $_POST['jobId']))));
//
//$sqlInsertDetails = mysqli_query($mysqli, "UPDATE `jobs` SET `deleted`=1 WHERE `id` = '$jobId';");
//}
?>