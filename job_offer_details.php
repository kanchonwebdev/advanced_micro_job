<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    $m_que = new Main_Query();
    $s_que = new Select_Query();

    error_reporting(0);

    if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
        if (Session::show_value("u_type") == "jobseeker") {
            $u_name = Session::show_value("u_name");
            $data = $m_que->check_jobseeker_exist($u_name);

            if ($data != true) {
                header("Location: job_seeker_profile_set_up.php");
            }
        }else {
            header("Location: 404.php");
        }
    }else {
        header("Location: home.php");
    }

    $j_id = $_GET['j_id'];

    $data = $s_que->select_all_job_by_id($j_id)->fetch_assoc();
    $o_data = $s_que->select_job_offer_by_id($j_id)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Job Offer</title>
   <link rel="stylesheet" href="css/job_seeker_dashboard.css">
   <link rel="stylesheet" href="css/job_offer.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>
   <div class="main-menu">
      <div class="main-menu-container">
         <div class="main-menu-left">
            <div class="sign-header">
               <div class="sign-logo">
                  <a href="https://partippl.com"><img src="new_img/ppl.png" width="250px" height="75px"></a>
               </div>
            </div>
         </div>

         <div class="main-menu-right">
            <ul>
               <li><a href="home.php">Home</a></li>
               <li><a href="message_list.php" id="active">Inbox</a></li>
               <li><a href="job_seeker_dashboard.php">Dashboard</a></li>
               <li><a href="logout.php"><span>Logout</span> <img src="new_img/10.png" width="20px" height="100%" alt=""></a></li>
            </ul>
         </div>
      </div>
   </div>

   <div class="menu">
      <div class="menu-container">
         <a href="all_employe.php" class="menu-block">Browse Employers</a>
         <a href="all_job.php" class="menu-block">Browse Jobs</a>
         <a href="change_password.php" class="menu-block">Reset Password</a>
         <a href="job_seeker_edit_profile.php" class="menu-block">Edit Profile</a>
      </div>
   </div>

   <div class="menu-2">
      <div class="menu-2-container">
         <div class="menu-2-left">
            <div class="logo">
               <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
            </div>
         </div>

         <div class="menu-2-right">
            <span onclick="show_menu()" class="menu-icon-block">
               <div class="menu-icon"></div>
               <div class="menu-icon"></div>
               <div class="menu-icon"></div>
            </span>
         </div>
      </div>
   </div>

   <div class="menu-2-content" id="menu">
      <a href="" class="menu-2-block">Home</a>
      <a href="" class="menu-2-block">Inbox</a>
      <a href="" class="menu-2-block">Dashboard</a>
      <a href="" class="menu-2-block">Browse Employers</a>
      <a href="" class="menu-2-block">Browse Jobs</a>
      <a href="" class="menu-2-block">Reset Password</a>
      <a href="" class="menu-2-block">Edit Profile</a>
      <a href="" class="menu-2-block">Active Applications</a>
      <a href="" class="menu-2-block">Job History</a>
      <a href="" class="menu-2-block">Job Offers</a>
   </div>

   <div class="job-seeker">
      <div class="job-seeker-container">
         <div class="job-seeker-left">
            <a href="job_seeker_dashboard.php" class="job-seeker-left-block" id="invert-img">
            <img src="new_img/18.png" width="20px" alt="">
            <span>Overview</span>
            </a>

            <a href="message_list.php" class="job-seeker-left-block">
            <img src="new_img/11.png" width="20px" alt="">
            <span>Inbox</span>
            </a>

            <a href="active_job.php" class="job-seeker-left-block">
            <img src="new_img/12.png" width="20px" alt="">
            <span>Active Applications</span>
            </a>

            <a href="j_job_history.php" class="job-seeker-left-block">
            <img src="new_img/13.png" width="20px" alt="">
            <span>Job History</span>
            </a>

            <a href="job_offer_list.php" class="job-seeker-left-block" id="job-seeker-left-block-active">
            <img src="new_img/14.png" width="18px" alt="" style="filter: invert(100%);">
            <span>Job Offers</span>
            </a>
            
            <a href="home" class="job-seeker-left-block">
            <img src="new_img/15.png" width="20px" alt="">
            <span>Home</span>
            </a>
         </div>

         <div class="job-seeker-right">
            <div class="job-offer">
               <div class="job-offer-header">
                  <h1>JOB OFFER: <?php echo $data['j_type'] ?></h1>
                  
                  <p>
                     Congratulations! All that hard work has paid off and you have been offered
                     a job. Please read the details of the job offer carefully, and if you agree please
                     click accept. Please keep in mind once you click accept our expectation is you go to
                     the booking, and in the event you don't it could lead to action up to and including
                     removal of your user account.
                  </p>
               </div>

               <div class="job-offer-content">
                  <div class="job-offer-content-left">
                     <div class="job-offer-content-left-block">
                        <b>Job Location:</b>
                        <span><?php echo $o_data['j_location'] ?></span>
                     </div>

                     <div class="job-offer-content-left-block">
                        <b>Offered By:</b>
                        <span><?php echo $data['u_name'] ?></span>
                     </div>

                     <div class="job-offer-content-left-block">
                        <b>Dress Code:</b>
                        <span><?php echo $o_data['d_code'] ?></span>
                     </div>
                  </div>

                  <div class="job-offer-content-left">
                     <div class="job-offer-content-left-block">
                        <b>Total Payment:</b>
                        <span><?php echo $data['j_payment'] ?></span>
                     </div>
                     <div class="job-offer-content-left-block">
                        <b>Total Hours:</b>
                        <span><?php echo $data['j_work_hour'] ?> Hours</span>
                     </div>
                     <div class="job-offer-content-left-block">
                        <b>Time and Date:</b>
                        <span><?php echo $data['j_booking_date'] ?> <?php echo $data['j_booking_time'] ?></span>
                     </div>
                  </div>
               </div>

               <div class="job-offer-footer">
                  <b>Job Description:</b>
                  <p>
                     <?php echo $data['j_description'] ?>
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      function show_menu() {
         var menu = document.getElementById("menu");

         if (menu.className === "menu-2-content") {
            menu.className = "display";

         } else {
            menu.className = "menu-2-content";
         }
      }
   </script>
</body>

</html>