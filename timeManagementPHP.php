<?php
include 'db_connection.php';

if(isset($_POST['project_title'])) { // If it's for adding a new project
    $project_title = Trim(stripslashes($_POST['project_title']));
    $client_name = Trim(stripslashes($_POST['client_name']));
    $cost_hour =  Trim(stripslashes($_POST['cost_hour']));
    $time_spent = Trim(stripslashes($_POST['time_spent']));
    $time_spent = Trim(stripslashes($_POST['time_spent']));
    $time_spent_min = Trim(stripslashes($_POST['time_spent_min']));
    $description = Trim(stripslashes($_POST['new_proj_description']));

    $insertNewProject = mysqli_query($mysqli, "INSERT INTO `jobs`(project_title, client_name, cost_hour, description, time_spent, time_spent_min, username_id) VALUES ('$project_title', '$client_name', '$cost_hour', '$description', '$time_spent', '$time_spent_min', 1)");
} elseif ($_POST['deleteVar'] == "varSet") {
    $jobId = mysqli_real_escape_string($mysqli, Trim(stripslashes(preg_replace('/[^0-9]/', '', $_POST['jobId']))));
    $sqlInsertDetails = mysqli_query($mysqli, "UPDATE `jobs` SET `deleted`=1 WHERE `id` = '$jobId';");
} elseif ($_POST['addTimeVar'] == "addTimeVarSet") {
    $add_time_hours = Trim(stripslashes($_POST['add_time_hours']));
    $add_time_mins = Trim(stripslashes($_POST['add_time_mins']));
    $add_time_id = Trim(stripslashes($_POST['addTimeId']));
    $sqlGetTime = mysqli_query($mysqli, "SELECT `time_spent` + $add_time_hours FROM `jobs` WHERE `id` = $add_time_id");
    $sqlAddTime = mysqli_query($mysqli, "UPDATE `jobs` SET `time_spent` = $sqlGetTime");
}
?>
