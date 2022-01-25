<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';
   include_once 'lib/Update_Query.php';

   $m_que = new Main_Query();
   $s_que = new Select_Query();
   $u_que = new Update_Query();

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

   $check_old_user = $s_que->select_old_job_seeker();

   if ($check_old_user != false) {
      
   }else {
      $select_join_date = $s_que->select_join_date()->fetch_assoc();
      $date = $select_join_date['join_date'];
      $publish_date = date('d-m-Y', strtotime($date. ' + 5 day'));
      $cur_date = date('d-m-Y');
      
      if ($cur_date >= $publish_date) {
         $u_que->update_job_seeker_type();
      }
   }
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Job Seeker Dashboard</title>
   <link rel="stylesheet" href="css/job_seeker_dashboard.css">
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
         <a href="change_password.php" class="menu-block" target="_blank">Reset Password</a>
         <a href="job_seeker_edit_profile.php" class="menu-block" target="_blank">Edit Profile</a>
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
            <a href="job_seeker_dashboard.php" class="job-seeker-left-block" id="job-seeker-left-block-active">
               <img src="new_img/18.png" width="20px" alt="" style="filter:unset">
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

            <a href="job_offer_list.php" class="job-seeker-left-block">
               <img src="new_img/14.png" width="18px" alt="">
               <span>Job Offers</span>
            </a>
            
            <a href="home" class="job-seeker-left-block">
               <img src="new_img/15.png" width="20px" alt="">
               <span>Home</span>
            </a>
         </div>

         <div class="job-seeker-right">
            <div class="job-seeker-right-header">
               <div class="job-seeker-hero-text">
                  Hi, <?php echo Session::show_value("u_name"); ?>, Welcome back to PartiPpl! <br>
                  You are logged in as a <b>Job Seeker</b>.
               </div>

               <?php
                  $a = 0;
                  $a_data = $s_que->select_all_applied_job();
                  if ($a_data != false) {
                     foreach($a_data as $a_data2){
                        $a++;
                     }
                  }


                  $b = 0;
                  $total_pay = 0;
                  $h_data = $s_que->select_all_applied_job2();
                  if ($h_data != false) {
                     foreach($h_data as $h_data2){
                        $total_earn = $s_que->select_all_job_by_id($h_data2['job_id'])->fetch_assoc();
                        
                        $x = explode("-", $total_earn['j_payment']);

                        $total_pay = $total_pay + $x[1];
                        $b++;
                     }
                  }
               ?>

               <div class="job-seeker-right-header-content">
                  <div class="job-seeker-right-header-block">
                     <div class="job-seeker-right-header-block-left">
                        <p>JOBS APPLIED</p>
                        <b><?php echo $a; ?></b>
                     </div>

                     <div class="job-seeker-right-header-block-right" style="background-color: #dc3545;">
                        <img src="new_img/16.png" width="45px" height="30px" alt="">
                     </div>
                  </div>

                  <div class="job-seeker-right-header-block">
                     <div class="job-seeker-right-header-block-left">
                        <p>JOBS HIRED FOR</p>
                        <b><?php echo $b; ?></b>
                     </div>

                     <div class="job-seeker-right-header-block-right" style="background-color: #007bff;">
                        <img src="new_img/16.png" width="45px" height="30px" alt="">
                     </div>
                  </div>

                  <div class="job-seeker-right-header-block">
                     <div class="job-seeker-right-header-block-left">
                        <p>REVENUE</p>
                        <b>₱ <?php echo $total_pay; ?></b>
                     </div>

                     <div class="job-seeker-right-header-block-right" style="background-color: #0d7cc6;">
                        <img src="new_img/17.png" width="34px" height="31px" alt="">
                     </div>
                  </div>
               </div>
            </div>

            <div class="job-seeker-right-footer">
               <div class="job-seeker-right-footer-hero-text">
                  <h1>Watch this space for announcements from PartiPpl. </h1>
                  <p>There are currently no announcements at this time.</p>
               </div>
               
               <div class="job-seeker-right-footer-text">
                  <a href="#">Copyright Reserved @2021</a>
                  <a href="#">Terms and Conditions</a>
                  <a href="#">Privacy Policy</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php   
      $data = $s_que->select_all_message(); 
   ?>

   <div style="position: sticky; bottom: 0px;right: 0px;">
      <div class="chat_box" id="chat_box">

         <div id="close_chat_list_menu" onclick="close_chat_list()">x</div>

         <?php if($data != false){ ?>
            <?php foreach($data as $data2){ ?>

               <?php 
                  $data3 = $s_que->select_all_message_by_chat_id($data2['c_id'])->fetch_assoc();
                           
                  if (Session::show_value("u_type") == "employer") {
                     if($data3['sent_by'] == Session::show_value("u_name")){
                        $data4 = $s_que->select_job_seeker_by_u_name($data3['received_by'])->fetch_assoc();
                     }else{
                        $data4 = $s_que->select_job_seeker_by_u_name($data3['sent_by'])->fetch_assoc();
                     }                              
                  }else {
                     if($data3['sent_by'] == Session::show_value("u_name")){
                        $data4 = $s_que->select_employe_by_u_name($data3['received_by'])->fetch_assoc();
                     }else{
                        $data4 = $s_que->select_employe_by_u_name($data3['sent_by'])->fetch_assoc();
                     }
                  }
               ?>

            <?php if($data3['received_by'] == Session::show_value("u_name")){ ?>
               <form class="chat_box_content" id="chat_form">
                  <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                  <input type="hidden" name="m_id" value="<?php echo $data3['sent_by']?>">

                  <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15).'...'; ?></span>
               </form>  
            <?php } ?>

            <?php if($data3['sent_by'] == Session::show_value("u_name")){ ?>
               <form class="chat_box_content" id="chat_form">
                  <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                  <input type="hidden" name="m_id" value="<?php echo $data3['received_by']?>">

                  <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15).'...'; ?></span>
               </form>  
            <?php } ?>

            <?php } ?>
         <?php }else{ ?>
            <span>No Message Available Now</span>  
         <?php } ?>        
      </div>

      <div class="chat_box_2" id="chat_box_2">
         <div id="chat_box_close" onclick="hide_menu()">x</div>

         <div class="chat_box_2_header" id="chat_box_2_header">
         </div>

         <div class="chat_box_2_content" id="chat_box_2_content">
         </div>

         <form role="form" id="submitForm" class="chat_box_2_footer">
            <textarea name="message" id="" cols="5" rows="3" placeholder="Write Message Here..." class="text-field"></textarea>
            <input type="hidden" name="received_by" value="<?php echo $_SESSION['received_by_2']; ?>">

            <input type="submit" value="Send" class="btn" id="submitbtn" name="j_message2">
         </form>
      </div>

      <div class="open_chat_list" id="open_chat_list" onclick="open_chat_menu()">Open Menu</div>
   </div>

   <script src="js/jquery.min.js"></script>
   <script type="text/javascript">

      $(document).ready(function() {
         $("#chat_form").click(function() { 
            var userForm = $(this).serialize();  

            $.ajax({    
               type: "POST",
               url: "get_chat_data.php", 
               data: userForm,                          
               success: function(response){                    
                  console.log(response);
               }
            });
         });

         $("#submitForm").on("submit", function(e){
            e.preventDefault();
            var userForm = $(this).serialize();
            $.ajax({
                url :"sent_message_code.php",
                type : "POST",
                data: userForm,
                success:function(response){
                    $("#submitForm")[0].reset();
                }
            });
        });
      });

      setInterval(function() {
         $("#chat_box_2_content").load("get_chat_data_details.php");
      }, 50);

      setInterval(function() {
         $("#chat_box_2_header").load("get_chat_message_status.php");
      }, 50);
      
      function show_menu(){
         var menu = document.getElementById("menu");

         if (menu.className === "menu-2-content") {
               menu.className = "display";
               
         }else{
               menu.className = "menu-2-content";
         }
      }

      function show_chat_box(){
         var chat_box_2 = document.getElementById("chat_box_2");

         if (chat_box_2.className === "chat_box_2") {
            chat_box_2.className = "chat_box_2_block_2";
         }else{
            chat_box_2.className = "chat_box_2";
         }
      }

      function hide_menu(){
         var chat_box_2 = document.getElementById("chat_box_2");

         chat_box_2.className = "chat_box_2";
      }

      function open_chat_menu(){
         var chat_box_2 = document.getElementById("chat_box");

         if (chat_box_2.className === "chat_box") {
            chat_box_2.className = "chat_box_block";
         }else{
            chat_box_2.className = "chat_box";
         }

         document.getElementById("open_chat_list").style.display = "none";
      }

      function close_chat_list(){
         document.getElementById("chat_box").className = "chat_box";
         document.getElementById("open_chat_list").style.display = "block";
      }
   </script>
</body>

</html>