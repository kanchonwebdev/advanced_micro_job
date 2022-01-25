<?php
   include_once 'lib/Main_Query.php';
   $m_que = new Main_Query();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank You</title>
    <link rel="stylesheet" href="css/thank_you.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Thank You Post New Job.Wait for Admin Approved.</h1>

    <?php if(Session::show_value("u_type") == "employer"){ ?>
        <a href="employe_dashboard.php" class="btn">Go Home</a>
    <?php }else{ ?>
        <a href="job_seeker_dashboard.php" class="btn">Go Home</a>
    <?php } ?>
</body>
</html>