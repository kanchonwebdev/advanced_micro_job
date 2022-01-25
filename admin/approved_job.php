<?php
    include_once 'lib/Main_Query.php';
    
    if (Session::show_value("a_name") == "" || Session::show_value("a_name") == NULL) {
        header("Location: login.php");
    }
    $mn = new Main_Query();

    $j_id =  $_GET['j_id'];
    $data = $mn->display_single_job($j_id)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">
</head>
<body>
    <div class="menu">
        <a href="manage.php">Manage Job</a>
        <a href="manage_employe.php">Manage Employe</a>
        <a href="manage_job_seeker.php">Manage Job Seeker</a>
        <a href="manage_copy_right.php">Manage Copy Right</a>
        <a href="logout.php">Logout</a>
    </div>
    
    <div class="single-job">
        <div class="signle-job-block"><b>Name:</b> <?php echo $data['j_title'] ?></div>
        <div class="signle-job-block"><b>Booking Location:</b> <?php echo $data['j_booking_location'] ?></div>
        <div class="signle-job-block"><b>Job Type:</b> <?php echo $data['j_type'] ?></div>
        <div class="signle-job-block"><b>Join Date & Time:</b> <?php echo $data['j_booking_date'] ." ". $data['j_booking_time'] ?> <?php $data['j_booking_time'] ?> </div>
        <div class="signle-job-block"><b>Total Payment:</b> <?php echo $data['j_payment'] ?></div>
        <div class="signle-job-block"><b>Work Hour:</b> <?php echo $data['j_work_hour'] ?></div>
        <div class="signle-job-block"><b>Job Description:</b> <?php echo $data['j_description'] ?></div>
        <div class="signle-job-block"><b>Posted By:</b> <?php echo $data['j_post_by'] ?></div>
        <div class="signle-job-block"><b>Posted on:</b> <?php echo $data['j_date'] ?></div>
        
        <form method="post" action="" class="single-job-block">
            <input type="submit" value="Approved Job" class="btn">
        </form>
    </div>

    <br><br>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mn->approved_job($j_id);
        }
    ?>

</body>
</html>

