<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';
   include_once 'lib/Update_Query.php';

   $m_que = new Main_Query();
   $s_que = new Select_Query();
   $u_que = new Update_Query();

   error_reporting(0);

   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
      if (Session::show_value("u_type") == "employer") {
            $u_name = Session::show_value("u_name");
            $data = $m_que->check_employe_exist($u_name);

            if ($data != true) {
               header("Location: employe_profile_set_up.php");
            }
      }else {
            header("Location: 404.php");
      }
   }else {
      header("Location: home.php");
   }

    $j_data = $s_que->select_employe_by_name()->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Jobseeker Profile</title>
   <link rel="stylesheet" href="css/job_seeker_dashboard.css">
   <link rel="stylesheet" href="css/job_seeker_profile.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>

<body>
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
         
         <div class="overlay-menu-block" id="o_menu_active">
            <img src="new_img/18.png" width="20px" alt="" id="o_menu_active_img">
            <a href="employe_edit_profile.php" id="o_menu_active">Edit Profile</a>
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

   <div class="job-seeker">
      <div class="job-seeker-header-container">
         <div class="job-seeker-header">
            <div class="job-seeker-header-left"></div>
            <div class="job-seeker-header-right">
               <div class="job-seeker-header-right-header">
                  <h1><?php echo $j_data['f_name'] ?></h1>
               </div>
               <h2>Employer</h2>
            </div>
         </div>
      </div>

      <div class="job-seeker-container">
         <form action="employe_edit_profile_code.php" method="post" enctype="multipart/form-data" class="job-seeker-content">
            <div class="job-seeker-content-left">
               <div class="job-seeker-content-left-header">
                  <img id="frame" src="all_img/<?php echo $j_data['u_img'] ?>" width="100%" height="100%" alt="">
               </div>

               <div class="job-seeker-content-left-footer">
                  <div class="job-seeker-content-left-footer-block">
                     <div class="icon"><img src="new_img/32.png" width="100%" height="100%" alt=""></div>
                     <span>
                        <select name="u_location" id="" class="text-field">
                           <option value="none">-- Select Location --</option>
                           <option value="<?php echo $j_data['u_location'] ?>" selected><?php echo $j_data['u_location'] ?></option>
                           <option value="CarCar">CarCar</option>
                           <option value="Carmen">Carmen</option>
                           <option value="Cebu City">Cebu City</option>
                           <option value="Consolation">Consolation</option>
                           <option value="Compostella">Compostella</option>
                           <option value="Cordova">Cordova</option>
                           <option value="Danao">Danao</option>
                           <option value="Lapu Lapu">Lapu Lapu</option>
                           <option value="Liloan">Liloan</option>
                           <option value="Mandaue City">Mandaue City</option>
                           <option value="Minglanilla">Minglanilla</option>
                           <option value="Naga">Naga</option>
                           <option value="San Fernando">San Fernando</option>
                           <option value="Talisay">Talisay</option>
                           <option value="Toldedo">Toldedo</option>
                        </select>
                     </span>
                  </div>
               </div>
            </div>

            <div class="job-seeker-content-right">
               <br>
               <div class="job-seeker-content-right-footer">
                  <div class="job-seeker-content-right-footer-block">
                     <img id="frame1" src="all_img/<?php echo $j_data['u_album_one'] ?>" width="100%" height="100%" alt="">
                  </div>

                  <div class="job-seeker-content-right-footer-block">
                     <img id="frame2" src="all_img/<?php echo $j_data['u_album_two'] ?>" width="100%" height="100%" alt="">
                  </div>

                  <div class="job-seeker-content-right-footer-block">
                     <img id="frame3" src="all_img/<?php echo $j_data['u_album_three'] ?>" width="100%" height="100%" alt="">
                  </div>
               </div>

               <div class="job-seeker-content-right-header">
                  <input type="file" name="u_img" placeholder="Profile Picture" id="" class="text-field" onchange="preview()">
                  
                  <?php if(Session::show_value("u_img") != "" || Session::show_value("u_img") != NULL){ ?>
                     <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("u_img"); ?>
                     </div>
                  <?php } ?>

                  <input type="file" name="u_img_1" placeholder="Profile Picture" id="" class="text-field" onchange="preview2()">
                  
                  <?php if(Session::show_value("u_img_1") != "" || Session::show_value("u_img_1") != NULL){ ?>
                     <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("u_img_1"); ?>
                     </div>
                  <?php } ?>

                  <input type="file" name="u_img_2" placeholder="Profile Picture" id="" class="text-field" onchange="preview3()">
                  
                  <?php if(Session::show_value("u_img_2") != "" || Session::show_value("u_img_2") != NULL){ ?>
                     <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("u_img_2"); ?>
                     </div>
                  <?php } ?>

                  <input type="file" name="u_img_3" placeholder="Profile Picture" id="" class="text-field" onchange="preview4()">
                  
                  <?php if(Session::show_value("u_img_3") != "" || Session::show_value("u_img_3") != NULL){ ?>
                     <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("u_img_3"); ?>
                     </div>
                  <?php } ?>

                  <textarea name="u_description" id="" cols="10" rows="5" placeholder="Your Details" class="text-field" value="<?php echo $j_data['u_description'] ?>" maxlength="400" onkeyup="count_character(this)"><?php echo $j_data['u_description'] ?></textarea>
                  
                  <div style="text-align: right"> <span id="count_char">0</span> / 400</div>

                  <?php if(Session::show_value("u_description") != "" || Session::show_value("u_description") != NULL){ ?>
                     <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("u_description"); ?>
                     </div>
                  <?php } ?>
                 
                  <input type="submit" value="Edit Profile" class="btn" name="submit">
               </div>
            </div>
         </form>

         <br><br><br>
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

   <?php   
      $data = $s_que->select_all_message(); 
   ?>

   <div id="pop_up_chat">
      <div class="chat_box" id="chat_box">

         <div id="close_chat_list_menu" onclick="close_chat_list()">x</div>

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
                  }
                  
                  if (Session::show_value("u_type") == "jobseeker"){
                     if($data3['sent_by'] == Session::show_value("u_name")){
                     $data4 = $s_que->select_employe_by_u_name($data3['received_by'])->fetch_assoc();
                     }else{
                     $data4 = $s_que->select_employe_by_u_name($data3['sent_by'])->fetch_assoc();
                     }
                  }
               ?>

               <?php if(Session::show_value("u_name") == $data3['sent_by']){ ?>
                  <form class="chat_box_content" id="chat_form">
                     <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                     <input type="hidden" name="m_id" value="<?php echo $data3['received_by']?>">

                     <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15); ?></span>
                  </form>  
               <?php }else { ?>
                  <form class="chat_box_content" id="chat_form">
                     <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                     <input type="hidden" name="m_id" value="<?php echo $data3['sent_by']?>">

                     <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15); ?></span>
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
         <input type="hidden" name="received_by" id="chat_received_by" value="none">

         <input type="submit" value="Send" id="submitbtn" name="j_message2">
         </form>
      </div>
      <div class="open_chat_list" style="display: block" id="open_chat_list" onclick="open_chat_menu()">Open Chat Menu</div>
   </div>

   <script src="js/jquery.min.js"></script>
   <script type="text/javascript">
      $(document).ready(function() { 
         $("body").delegate("#chat_form", "click", function() {
               var userForm = $(this).serialize();  

               $.ajax({    
                  type: "POST",
                  url: "get_chat_data.php", 
                  data: userForm,                          
                  success: function(response){                    
                     $("#chat_received_by").val(response);
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

      function show_chat_box(){
         var chat_box_2 = document.getElementById("chat_box_2");

         if (chat_box_2.className === "chat_box_2") {
         chat_box_2.className = "chat_box_2_block_2";
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

      function preview() {
         frame.src=URL.createObjectURL(event.target.files[0]);
      }
      function preview2() {
         frame1.src=URL.createObjectURL(event.target.files[0]);
      }

      function preview3() {
         frame2.src=URL.createObjectURL(event.target.files[0]);
      }

      function preview4() {
         frame3.src=URL.createObjectURL(event.target.files[0]);
      }

      function count_character(count_char){
         char_len = count_char.value;

         document.getElementById("count_char").innerHTML = char_len.length;
      }
   </script>
</body>

</html>

<?php
   Session::set_value("u_img", NULL);
   Session::set_value("u_img_1", NULL);
   Session::set_value("u_img_2", NULL);
   Session::set_value("u_img_3", NULL);
   Session::set_value("u_description", NULL);
?>