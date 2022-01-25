<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    $m_que = new Main_Query();
    $s_que = new Select_Query();

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Active Applications</title>
   <link rel="stylesheet" href="css/job_seeker_dashboard.css">
   <link rel="stylesheet" href="css/employer_active_job.css">
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
         
         <div class="overlay-menu-block">
               <img src="new_img/18.png" width="20px" alt="">
               <a href="employe_edit_profile.php">Edit Profile</a>
         </div>
         
         <div class="overlay-menu-block" id="o_menu_active">
               <img src="new_img/18.png" width="20px" alt="" id="o_menu_active_img">
               <a href="all_application.php" id="o_menu_active">Active Applications</a>
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
      <div class="job-seeker-container">
         <div class="job-seeker-right">
            <div class="active-job">
               <div class="active-job-header">
                  <h1>Bartender for Wedding</h1>

                  <div class="active-job-btn-block">
                     <div class="active-btn">Job Posting</div>
                     <div class="active-btn" id="active-status">Applicants Status</div>
                  </div>
               </div>

               <div class="active-job-content">
                  <div class="active-job-block">
                     <div class="active-job-block-header">
                        <div class="active-job-block-header-left" style="background-color: #ff5242;"></div>
                        <div class="active-job-block-header-right">Applied - 5</div>
                     </div>

                     <div id="offer_sent" style="min-height: 20px;display: flex;flex-direction: column;row-gap: 20px;"></div>

                     <?php
                        $j_id = $_GET['j_id'];
                        $data = $s_que->select_all_apply_by_id($j_id);
                        if ($data != false) {
                           foreach($data as $data2){
                              $data3 = $s_que->select_job_seeker_by_u_name($data2['apply_by'])->fetch_assoc();
                     ?>

                        <div>   
                           <?php
                              $a_id = $data2['apply_id'];

                              $j_id_4 = $s_que->select_job_id_from_apply($a_id);
                              $j_id_2 = $j_id_4->fetch_assoc();
                           
                              $j_id = $j_id_2['job_id'];
                              $a_by = $j_id_2['apply_by'];
                              $p_by = $j_id_2['post_by'];
                           ?>

                           <form href="view_application.php?a_id=<?php echo $data2['apply_id'] ?>" id="<?php echo $data2['apply_id'] ?>" draggable="true" ondragstart="drag(event,'<?php echo $a_id ?>','<?php echo $j_id ?>','<?php echo $a_by ?>','<?php echo $p_by ?>')"  style="text-decoration: none;color: black" target="_blank" class="active-job-block-content">
                              <input type="hidden" name="a_id" id="a_id" value="<?php echo $a_id; ?>">
                              <input type="hidden" name="j_id" id="j_id" value="<?php echo $j_id; ?>">
                              <input type="hidden" name="a_by" id="a_by" value="<?php echo $a_by; ?>">

                              <div class="active-job-block-content-left">
                                 <img src="all_img/<?php echo $data3['u_img'] ?>" width="100%" height="100%" alt="">
                              </div>

                              <div class="active-job-block-content-right">
                                 <h2><?php echo $data3['f_name'] ?></h2>
                                 <p><?php echo $data3['u_age'] ?> <?php echo $data3['u_gender'] ?> <?php echo $data3['u_location'] ?></p>
                              </div>
                           </form>
                        </div>

                     <?php }} ?>
                  </div>

                  <div class="active-job-block">
                     <div class="active-job-block-header">
                        <div class="active-job-block-header-left" style="background-color: #ffee00;"></div>
                        <div class="active-job-block-header-right">Phone Screen - 3</div>
                     </div>

                     <div id="offer_sent" ondrop="drop(event, this.id)" ondragover="allowDrop(event)" style="min-height: 20px;display: flex;flex-direction: column;row-gap: 20px;"></div>

                     <?php
                        $j_id = $_GET['j_id'];
                        $o_data = $s_que->select_all_apply_by_id_2($j_id);
                        if ($o_data != false) {
                           foreach($o_data as $o_data2){
                              $o_data3 = $s_que->select_job_seeker_by_u_name($o_data2['apply_by'])->fetch_assoc();
                     ?>

                        <a href="view_application.php?a_id=<?php echo $o_data2['apply_id'] ?>" style="text-decoration: none;color: black" target="_blank" class="active-job-block-content">
                           <div class="active-job-block-content-left">
                              <img src="all_img/<?php echo $o_data3['u_img'] ?>" width="100%" height="100%" alt="">
                           </div>

                           <div class="active-job-block-content-right">
                              <h2><?php echo $o_data3['f_name'] ?></h2>
                              <p><?php echo $o_data3['u_age'] ?> <?php echo $o_data3['u_gender'] ?> <?php echo $o_data3['u_location'] ?></p>
                           </div>
                        </a>

                     <?php }} ?>
                  </div>

                  <div class="active-job-block">
                     <div class="active-job-block-header">
                        <div class="active-job-block-header-left" style="background-color: #ffa740;"></div>
                        <div class="active-job-block-header-right">Rejected - 2</div>
                     </div>

                     <div id="reject" ondrop="drop(event, this.id)" ondragover="allowDrop(event)" style="min-height: 20px;display: flex;flex-direction: column;row-gap: 20px;"></div>

                     <?php
                        $j_id = $_GET['j_id'];
                        $r_data = $s_que->select_all_apply_by_id_3($j_id);
                        if ($r_data != false) {
                           foreach($r_data as $r_data2){
                              $r_data3 = $s_que->select_job_seeker_by_u_name($r_data2['apply_by'])->fetch_assoc();
                     ?>

                        <a href="view_application.php?a_id=<?php echo $r_data2['apply_id'] ?>" style="text-decoration: none;color: black" target="_blank" class="active-job-block-content">
                           <div class="active-job-block-content-left">
                              <img src="all_img/<?php echo $r_data3['u_img'] ?>" width="100%" height="100%" alt="">
                           </div>

                           <div class="active-job-block-content-right">
                              <h2><?php echo $r_data3['f_name'] ?></h2>
                              <p><?php echo $r_data3['u_age'] ?> <?php echo $r_data3['u_gender'] ?> <?php echo $r_data3['u_location'] ?></p>
                           </div>
                        </a>

                     <?php }} ?>
                  </div>
                  
                  <div class="active-job-block">
                     <div class="active-job-block-header">
                        <div class="active-job-block-header-left" style="background-color: #50e289;"></div>
                        <div class="active-job-block-header-right">Hired</div>
                     </div>

                     <?php
                        $j_id = $_GET['j_id'];
                        $h_data = $s_que->select_all_apply_by_id_4($j_id);
                        if ($h_data != false) {
                           foreach($h_data as $h_data2){
                              $h_data3 = $s_que->select_job_seeker_by_u_name($h_data2['apply_by'])->fetch_assoc();
                     ?>

                        <a href="view_application.php?a_id=<?php echo $h_data2['apply_id'] ?>" style="text-decoration: none;color: black" target="_blank" class="active-job-block-content">
                           <div class="active-job-block-content-left">
                              <img src="all_img/<?php echo $h_data3['u_img'] ?>" width="100%" height="100%" alt="">
                           </div>

                           <div class="active-job-block-content-right">
                              <h2><?php echo $h_data3['f_name'] ?></h2>
                              <p><?php echo $h_data3['u_age'] ?> <?php echo $h_data3['u_gender'] ?> <?php echo $h_data3['u_location'] ?></p>
                           </div>
                        </a>

                     <?php }} ?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="offer" id="offer">
      <form action="send_offer_code.php" method="post" class="offer-container">
         <input type="text" name="j_location" placeholder="Job Location" class="text-field" id="">
         
         <?php if(Session::show_value("j_location") != "" || Session::show_value("j_location") != NULL){ ?>
               <div class="err_bg" onclick="this.style.display='none'">
                  <?php echo Session::show_value("j_location"); ?>
               </div>
         <?php } ?>
         
         <input type="text" name="d_code" placeholder="Dress Code" class="text-field" id="">

         <?php if(Session::show_value("d_code") != "" || Session::show_value("d_code") != NULL){ ?>
               <div class="err_bg" onclick="this.style.display='none'">
                  <?php echo Session::show_value("d_code"); ?>
               </div>
         <?php } ?>

         <input type="hidden" name="j_id" id="j_id_45">

         <input type="hidden" name="a_id" id="a_id_45">

         <input type="hidden" name="post_by" id="p_by_45">
         
         <input type="hidden" name="apply_by" id="a_by_45">

         <input type="submit" value="Send Offer" class="btn">
      </form>
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
      var a_id, j_id, a_by, p_by;
      
      function show_menu() {
         var menu = document.getElementById("menu");

         if (menu.className === "menu-2-content") {
            menu.className = "display";

         } else {
            menu.className = "menu-2-content";
         }
      }

      function allowDrop(ev) {
         ev.preventDefault();
      }

      function drag(ev, a_id2, j_id2, a_by2, p_by2) {
         ev.dataTransfer.setData("text", ev.target.id);
         var a_id = a_id2;
         var j_id = j_id2;
         var a_by = a_by2;
         var p_by = p_by2;

         document.getElementById("a_id_45").value = a_id;
         document.getElementById("j_id_45").value = j_id;
         document.getElementById("a_by_45").value = a_by;
         document.getElementById("p_by_45").value = p_by;
      }

      function drop(ev, x) {
         ev.preventDefault();
         var data = ev.dataTransfer.getData("text");
         
         var node = document.createElement("DIV");
         var textnode = document.getElementById(data);
         node.appendChild(textnode);
         document.getElementById(x).appendChild(node);

         if (x == "reject") {
            var app_id_22 = '#';
            var app_id_21 = document.getElementById("a_id_45").value;
            app_id_23 = app_id_22.concat(app_id_21);

            $(document).on('dragend', app_id_23, function() { 
               var userForm = $(this).serialize();
               $.ajax({
                  url :"reject_code.php",
                  type : "POST",
                  data: userForm,
                  success:function(response){
                     console.log(response);
                  }
               });
            });
            
         }

         if (x == "offer_sent") {
            document.getElementById("offer").style.display = "flex";
         }
      }



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
   </script>
</body>

</html>