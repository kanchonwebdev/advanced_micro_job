<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';

   $m_que = new Main_Query();
   $s_que = new Select_Query();

   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
       
   }else {
       header("Location: home.php");
   }

   $data = $s_que->select_all_message(); 
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Message List</title>
   <link rel="stylesheet" href="css/job_seeker_dashboard.css">
   <link rel="stylesheet" href="css/message_list.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>

<body>

   <?php if(Session::show_value("u_type") == "employer"){ ?>
      <div class="main-menu">
         <div class="main-menu-container">
            <div class="main-menu-left">
                  <div class="sign-header">
                     <div class="sign-logo">
                        <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
                     </div>
                  </div>
            </div>

            <div class="main-menu-right">
                  <a href="home.php">Home</a>
                  <a href="message_list.php">Inbox</a>
                  <a href="employe_dashboard.php">Dashboard</a>
                  <a href="logout.php"><span>Logout</span></a>
                  <div class="cursor-block" onclick="show_overlay_menu()">
                     <div></div>
                     <div></div>
                     <div></div>
                  </div>
            </div>
         </div>
      </div>

      <div class="overlay-menu" id="overlay_menu">
         <div class="overlay-menu-header">
            <div class="sign-logo">
                  <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
            </div>
         </div>

         <div class="overlay-menu-footer">
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="all_job_seeker.php">Browse Job Seekers</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="change_password.php">Reset Password</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="employe_edit_profile.php">Edit Profile</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="all_application.php">Active Applications</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="job_history.php">Job History</a>
            </div>

            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="send_offer_list.php">Job Offers</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="job_post.php" target="_blank">Post a Job</a>
            </div>
         </div>

         <div id="close_overlay" onclick="close_overlay_menu(this)">
            <div></div>
            <div></div>
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
         <a href="home.php">Home</a>
         <a href="message_list.php">Inbox</a>
         <a href="employe_dashboard.php">Dashboard</a>
         <a href="logout.php"><span>Logout</span></a>
         <a href="all_job_seeker.php">Browse Job Seekers</a>
         <a href="change_password.php">Reset Password</a>
         <a href="employe_edit_profile.php">Edit Profile</a>
         <a href="all_application.php">Active Applications</a>
         <a href="job_history.php">Job History</a>
         <a href="send_offer_list.php">Job Offers</a>
         <a href="job_post.php" target="_blank">Post a Job</a>
      </div>
   <?php }else{ ?>
      <div class="main-menu">
         <div class="main-menu-container">
            <div class="main-menu-left">
               <div class="sign-header">
                  <div class="sign-logo">
                     <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
                  </div>
               </div>
            </div>

            <div class="main-menu-right">
               <a href="home.php">Home</a>
               <a href="message_list.php">Inbox</a>
               <a href="job_seeker_dashboard.php">Dashboard</a>
               <a href="logout.php"><span>Logout</span></a>
               <div class="cursor-block" onclick="show_overlay_menu()">
                  <div></div>
                  <div></div>
                  <div></div>
               </div>
            </div>
         </div>
      </div>

      <div class="overlay-menu" id="overlay_menu">
         <div class="overlay-menu-header">
            <div class="sign-logo">
               <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
            </div>
         </div>

         <div class="overlay-menu-footer">
            <div class="overlay-menu-block">
               <img src="new_img/18.png" width="20px" alt="">
               <a href="all_employe.php">Browse Job Seekers</a>
            </div>

            <div class="overlay-menu-block">
               <img src="new_img/18.png" width="20px" alt="">
               <a href="all_job.php">Browse Jobs</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="change_password.php">Reset Password</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="job_seeker_edit_profile.php">Edit Profile</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="active_job.php">Active Applications</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="j_job_history.php">Job History</a>
            </div>

            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="job_offer_list.php">Job Offers</a>
            </div>
            
            <div class="overlay-menu-block">
                  <img src="new_img/18.png" width="20px" alt="">
                  <a href="job_post.php" target="_blank">Post a Job</a>
            </div>
         </div>

         <div id="close_overlay" onclick="close_overlay_menu(this)">
            <div></div>
            <div></div>
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
         <a href="home.php">Home</a>
         <a href="message_list.php">Inbox</a>
         <a href="job_seeker_dashboard.php">Dashboard</a>
         <a href="logout.php"><span>Logout</span></a>
         <a href="all_employe.php">Browse Job Seekers</a>
         <a href="change_password.php">Reset Password</a>
         <a href="job_seeker_edit_profile.php">Edit Profile</a>
         <a href="active_application.php">Active Applications</a>
         <a href="j_job_history.php">Job History</a>
      </div>
   <?php } ?>

   <div class="job-seeker">
      <div class="job-seeker-container">
         <div class="job-seeker-right">
            <div class="message">
               <?php if($data != false){ ?>
                  <div class="message-list-header">
                     <select name="" id="" class="text-field">
                        <option value="">All Conversations</option>
                        <option value="">Spam</option>
                        <option value="">Archived</option>
                        <option value="">Unread</option>
                     </select>
                  </div>
               <?php } ?>

               <div class="message-content">
                  <?php if($data != false){ ?>
                     <?php foreach($data as $data2){ ?>
                        
                        <?php
                           $data3 = $s_que->select_all_message_by_chat_id($data2['g_name'])->fetch_assoc();
                           
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

                           $p_date = $data3['c_date_time'];
                           $c_date = date("d-m-Y H:i:s");

                           $dtNow = new DateTime($p_date);
                           $dtToCompare = new DateTime($c_date);

                           $diff = $dtNow->diff($dtToCompare);

                           $m = (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i);
                           
                           $h = $diff->h + ($diff->days * 24);
                           $d = $diff->days;
                           
                        ?>

                        <?php if($data3['sent_by'] == Session::show_value("u_name")){ ?>
                           <a href="message_details.php?r_id=<?php echo $data3['received_by'] ?>" style="text-decoration: none;color: black;" class="message-block">
                        <?php } ?>

                        <?php if($data3['received_by'] == Session::show_value("u_name")){ ?>
                           <a href="message_details.php?r_id=<?php echo $data3['sent_by'] ?>" style="text-decoration: none;color: black;" class="message-block">
                        <?php } ?>
                        
                           <div class="message-block-header">
                              <div class="message-block-header-left">
                                 <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">
                              </div>

                              <div class="message-block-header-right">                                 
                                 <?php
                                    if($m > 60){
                                       if ($h > 24) {
                                          echo $d.' days ago';
                                       }else {
                                          echo $h.' hours ago';
                                       }
                                    }else{
                                       echo $m.' minutes ago';
                                    }
                                 ?>
                              </div>
                           </div>

                           <div class="message-block-footer">
                              <?php echo $data3['c_message'] ?>
                           </div>
                        </a>
                     <?php } ?>
                  <?php }else{ ?>
                     <h3 style="text-align: center">No Message Available Now</h3>
                  <?php } ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   <footer>
      <div class="footer-container">
         <div class="footer-block">
               <div class="footer-block-header">
                  <div class="sign-logo">
                     <a href="https://partippl.com"><img src="new_img/ppl.png" width="100%" height="100%"></a>
                  </div>
               </div>

               <div class="footer-block-footer">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi explicabo exercitationem, eos facere magnam earum, hic repellendus voluptatibus similique animi dicta
                  eos facere magnam earum, hic repellendus voluptatibus similique animi dicta
               </div>
         </div>

         <div class="footer-block">
               <div class="footer-block-header">
                  <h2>Popular Links</h2>
               </div>

               <div class="footer-block-footer">
                  <a href="home.php">Home</a>
                  <a href="message_list.php">Inbox</a>
                  <a href="employe_dashboard.php">Dashboard</a>
                  <a href="logout.php"><span>Logout</span></a>
                  <a href="#">Terms & Conditons</a>
                  <a href="#">Privacy Policy</a>
               </div>
         </div>

         <div class="footer-block">
               <div class="footer-block-header">
                  <h2>Contact Us</h2>
               </div>

               <div class="footer-block-footer">
                  <div>Email: partippl@gmail.com</div>

                  <div>Phone: +00 000 0000 00</div>
               </div>
         </div>
      </div>
   </footer>

   <div class="footer-last">
      <span>Copyright Reserved @2021 partippl.com</span>
   </div>

   <script>
      function show_menu(){
         var menu = document.getElementById("menu");

         if (menu.className === "menu-2-content") {
         menu.className = "display";
               
         }else{
         menu.className = "menu-2-content";
         }
      }

      function show_overlay_menu(){
         var menu = document.getElementById("overlay_menu");

         if (menu.className === "overlay-menu") {
               menu.className += " overlay-display";   
               document.getElementById("close_overlay").style.display = "flex";
         }
      }

      function close_overlay_menu(xx){
         var menu = document.getElementById("overlay_menu");

         menu.className = "overlay-menu";  
         xx.style.display = "none";
      }
   </script>
</body>

</html>