<?php
session_start();
include('db_connection.php');
 ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css">
        <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script async src="javascript.js"></script>
        <title>Dashboard</title>
    </head>

    <body>
        <!-- Navigation bar -->
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>
        <!-- Navigation bar end -->
        <div class="header-logo-banner">
            <div class="logo-banner-left">
                <h3>Header &amp; Logo</h3>
            </div>
            <div class="logo-banner-right">
                <h4>Login | Signup</h4>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="nav-bar-background" id="top">
            <div class="alignmentTwo">
                <ul class="topnav" id="myTopnav">
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">HOME</a></li>
                    <li><a href="#">HOME</a></li>
                    <li class="icon"> <a href="javascript:void(0);" class="dropdown" onclick="myFunction()">Main Menu&nbsp;&nbsp;<em class="fa fa-bars"></em></a> </li>
                </ul>
            </div>
        </div>
        <div class="dashboard-content-outline main-area-align">
            <div class="dashboard-header">
                <div class="dash-header-left">
                    <h2 class="welcome-text">Dashboard</h2>
                </div>
                <div class="dash-header-right">
                    <button class="free-signup-button dashboard-project" id="new_project_btn">NEW PROJECT</button>
                    <a href="logout.php"><div class="dashboard-project free-signup-button ">Log Out</div>
                </div></a>
                <div style="clear:both;"></div>
                <hr>
                <div class="dash-header-left">
                    <h2 class="welcome-text">
                        Hello
                        <?php echo $login_user = $_SESSION['login_user']; ?>! Welcome to time management.</h2>
                    <br>
                    <h3 class="welcome-text">Projects</h3>
                </div>
                <div class="dash-header-right">
                    <h2>Total Time:
                        <?php 
                        $total_time_sql = mysqli_query($mysqli, "SELECT SUM(time_spent) AS 'time_spent_hrs' FROM jobs WHERE deleted = '0';");
                        while($row = mysqli_fetch_array($total_time_sql)) {
                            $total_time_hrs = $row['time_spent_hrs'];
                        }
                        $total_time_min_sql = mysqli_query($mysqli, "SELECT SUM(time_spent_min) AS 'time_spent_min' FROM jobs WHERE deleted = '0';");
                        while($row = mysqli_fetch_array($total_time_min_sql)) {
                            $total_time_min = $row['time_spent_min'];
                        }
                        
                        if($total_time_min > 60) {
                            $total_time_min_60 = ceil(($total_time_min - 60)/60);
                            $total_time_hrs += $total_time_min_60;
                            $total_time_min -= 60;
                        }
                        
                        echo $total_time_hrs . " hrs " . $total_time_min . " min";
                        ?>
                    </h2>
                </div>
                <div style="clear:both;"></div>
                <table class="projects-table">
                    <tr>
                        <th>Complete?</th>
                        <th>Paid?</th>
                        <th>Project Name</th>
                        <th>£ / hr</th>
                        <th>End Date</th>
                        <th>Hours Logged</th>
                        <th>Add Time</th>
                        <th><i class="fa fa-trash"></i></th>
                    </tr>
                    <?php 
                    // NOTE: complete, done and deleted -> if they are 0 then they're not true, if they're a 1 then they're true.
                            $select_id_jobs = mysqli_query($mysqli, "SELECT id FROM users WHERE username='$login_user'");
                        while($row = mysqli_fetch_array($select_id_jobs)) {
                            $id_jobs = $row['id'];
                        }
                        $select_jobs_with_usrid = mysqli_query($mysqli, "SELECT * FROM jobs WHERE username_id = '$id_jobs' AND deleted = '0';");
                        while($row = mysqli_fetch_array($select_jobs_with_usrid)) {
                    ?>
                    
                    <tr id='tr-<?php echo $row["id"];?>'>
                        <td>
                            <!-- Complete Checkbox -->
                            <!--TODO: change to be subtle circle with tick inside. hover turns it green-->
                            <div class="checkbox-outer">
                            <label class="label">
                            <input class="label__checkbox" type="checkbox" id='complete-<?php echo $row["id"];?>' onclick="compTask('<?php echo $row["id"]; ?>');">
                            <span class="label__text">
                                <span class="label__check">
                                    <i class="fa fa-check icon"></i>
                                </span>
                            </span>
                        </label>
                        </div>
                        </td>
                        <td>
                            <!-- Paid checkbox -->
                            <div class="checkbox-outer">
                            <label class="label">
                            <input class="check label__checkbox" type="checkbox" id="paid-<?php echo $row['id'];?>" onclick="paidTask( '<?php echo $row['id'];?>' );">
                            <span class="label__text">
                                <span class="label__check">
                                    <i class="fa fa-check icon"></i>
                                </span>
                            </span>
                        </label>
                        </div>
                        </td>
                        <td>
                            <?php echo $row['project_title']; ?>
                        </td>
                        <td>
                            <?php echo $row['cost_hour']; ?>
                        </td>
                        <td>
                            <?php echo $row['completion_date']; ?>
                        </td>
                        <td>
                            <?php echo $row['time_spent'] . "hrs " . $row['time_spent_min']; ?>
                        </td>
                        <td>
                            <!--TODO: Add modal for adding new time-->
                            <!--TODO: Change blue-->
                            <div class="add-time-btn" id=""><i class="fa fa-plus"></i></div>
                        </td>
                        <td>
                            <div class="delete-btn" id="<?php echo $row['id']; ?>"><div class="fa fa-trash"></div></div>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>


        <!--    MODALS    -->
        <!--  NEW PROJECT MODAL START  -->
        <!--TODO: Make modal thinner-->
        <div id="newProjectModal" class="new_project_modal">
            <div class="new_project_modal_content">
                <span class="new_project_close">&times;</span>
                <!--FUTURE: change to ajax-->
                <form action="timeManagementPHP.php" method="post" class="signup-form">
                    Project Title <br>
                    <input type="text" name="project_title" placeholder="Project Title"><br> Client Name <br>
                    <input type="text" name="client_name" placeholder="Client Name"><br> Hourly Cost <br>
                    <input type="text" name="cost_hour" placeholder="Hourly Cost"><br> Target Completion Date <br>
                    <input type="text" rows="10" cols="10" name="completion_date" placeholder="Target Completion Date"><br> Time Spent Hrs <br>
                    <input type="text" name="time_spent" placeholder="Time Spent Hrs"><br> Time Spent Mins <br>
                    <input type="text" name="time_spent_min" placeholder="Time Spent Mins"><br> Project Description <br>
                    <textarea type="text" name="description" placeholder="Project Description"></textarea>
                    <input type="submit" value="ADD PROJECT" class="submit-form" name="submit">
                </form>
            </div>
        </div>
        <!--  NEW PROJECT MODAL END  -->
    </body>
<script>
</script>
    </html>