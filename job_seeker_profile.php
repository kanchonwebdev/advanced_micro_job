<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';

   $m_que = new Main_Query();
   $s_que = new Select_Query();

   error_reporting(0);

   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != null) {
      if (Session::show_value("u_type") == "employer") {
         $u_name = Session::show_value("u_name");
         $data = $m_que->check_employe_exist($u_name);

         if ($data != true) {
            header("Location: employe_profile_set_up.php");
         }
      } else {
         header("Location: 404.php");
      }
   } else {
      header("Location: home.php");
   }

   $u_id = $_GET['u_id'];
   $data = $s_que->select_job_seeker_by_id($u_id);

   if ($data != false) {
      $data2 = $data->fetch_assoc();
      $data3 = $s_que->select_active_status($data2['u_name'])->fetch_assoc();
      $s_data = $s_que->select_login_info($data2['u_name'])->fetch_assoc();
   } else {
      //header("Location: 404.php");
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Jobseeker Profile</title>
   <link rel="stylesheet" href="css/job_seeker_profile.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>

<body>
   <div class="job-seeker">
      <div class="job-seeker-header-container">
         <div class="job-seeker-header">
            <div class="job-seeker-header-left"></div>

            <div class="job-seeker-header-right">
               <div class="job-seeker-header-right-header">
                  <h1><?php echo $data2['f_name'] ?></h1>

                  <?php if ($data3['active_status'] == "active") {?>
                        <div class="online"><div class="active-dot"></div> Online</div>
                  <?php } else {?>
                        <div class="online"><div class="active-dot"></div> Ofline</div>
                  <?php }?>
               </div>

               <h2>Job Seeker</h2>

               <div style="padding-top: 5px"><?php echo $data2['u_age'] ?> - <?php echo $data2['u_gender'] ?> - <?php echo $data2['u_location'] ?></div>
            </div>
         </div>
      </div>

      <div class="job-seeker-container">
         <div class="job-seeker-content">
            <div class="job-seeker-content-left">
               <div class="job-seeker-content-left-header">
                  <img src="all_img/<?php echo $data2['u_img'] ?>" width="100%" height="100%" alt="">
               </div>

               <div class="job-seeker-content-left-content">
                  <h2>User Rating</h2>


                  <?php
                     $re_data = $s_que->select_all_review($data2['u_name']);
                     if ($re_data != false) {
                        $total_rating = 0;
                        foreach ($re_data as $data) {
                           $total_rating = $total_rating + $data['r_rating'];
                           $j++;
                        }

                        $total_rating = ($total_rating / $j);
                        $total_rating = (int) $total_rating;
                     ?>

                  <div class="rating-block">
                     <?php for ($i = 0; $i < $total_rating; $i++) {?>
                        <img src="new_img/37.png" alt="" class="rate">
                     <?php }?>
                  </div>

                  <?php } else {?>
                     <h2 style="text-align: center">No Review Yet</h2>
                  <?php }?>
               </div>

               <div class="job-seeker-content-left-footer">
                  <div class="job-seeker-content-left-footer-block">
                        <div class="icon"><img src="new_img/30.png" width="100%" height="100%" alt=""></div>

                        <?php
                           $date_arr = explode("-", $data2['join_date']);

                           $monthNum = $date_arr[1];
                           $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                        ?>

                              <span>Member Since <?php echo $date_arr[0]; ?> <?php echo $monthName; ?>, <?php echo $date_arr[2]; ?></span>
                        </div>

                        <div class="job-seeker-content-left-footer-block">
                              <div class="icon"><img src="new_img/31.png" width="100%" height="100%" alt=""></div>

                              <?php
                           $join_arr_2 = explode(" ", $s_data['last_activity']);
                           $x = $join_arr_2[0];
                           $join_arr = explode("-", $x);

                           $monthNum_2 = $join_arr[1];
                           $monthName_2 = date("F", mktime(0, 0, 0, $monthNum_2, 10));
                           ?>

                        <span>Last Logged in on <?php echo $join_arr[2]; ?> <?php echo $monthName_2; ?>, <?php echo $join_arr[0]; ?></span>
                  </div>

                  <div class="job-seeker-content-left-footer-block">
                        <div class="icon"><img src="new_img/32.png" width="100%" height="100%" alt=""></div>
                        <span><?php echo $data2['u_nationality'] ?></span>
                  </div>
               </div>
            </div>

            <div class="job-seeker-content-right">
               <form action="job_seeker_sent_message_code.php" method="post" class="job-seeker-content-right-header">
                  <input type="hidden" name="e_id" value="<?php echo $u_id; ?>">

                  <input type="hidden" name="received_by" value="<?php echo $data2['u_name'] ?>">

                  <textarea name="message" id="" cols="10" rows="5" placeholder="Write your message here."
                     class="text-field" maxlength="250" onkeyup="count_character(this)"></textarea>

                     <?php if (Session::show_value("message") != "" || Session::show_value("message") != null) {?>
                        <div class="err_bg" onclick="this.style.display='none'">
                           <?php echo Session::show_value("message"); ?>
                        </div>
                     <?php }?>

                  <div style="text-align: right"> <span id="count_char">0</span> / 250</div>

                  <input type="submit" value="Send Message" class="btn" name="j_message_3">
               </form>

               <div class="job-seeker-content-right-footer">
                  <div class="job-seeker-content-right-footer-block">
                     <img src="all_img/<?php echo $data2['u_album_one'] ?>" width="100%" height="100%" alt="">
                  </div>

                  <div class="job-seeker-content-right-footer-block">
                     <img src="all_img/<?php echo $data2['u_album_two'] ?>" width="100%" height="100%" alt="">
                  </div>

                  <div class="job-seeker-content-right-footer-block">
                     <img src="all_img/<?php echo $data2['u_album_three'] ?>" width="100%" height="100%" alt="">
                  </div>
               </div>
            </div>
         </div>

         <div class="job-seeker-work-block">
            <div class="job-seeker-work-block-left">
               <h2>Openness to Work</h2>
               <div class="job-seeker-work-block-left-block">

                  <?php
                     $j_skill = explode('_', $data2['u_skill']);
                     for ($i = 0; $i < count($j_skill); $i++) {
                        $j_skill_2 = explode('-', $j_skill[$i]);
                        ?>

                  <div>
                     <?php if ($j_skill[$i] != "") {?>
                        <img src="new_img/33.png" width="20px" height="100%" alt="">
                        <h4><?php echo $j_skill_2[0]; ?></h4>
                     <?php }?>
                  </div>

                  <?php }?>
               </div>
            </div>

            <div class="job-seeker-work-block-right">
               <h2><?php echo $data2['f_name'] ?> Skills</h2>

               <div class="job-seeker-work-block-right-block">

                  <?php
                     for ($i = 0; $i < count($j_skill); $i++) {
                        $j_skill_2 = explode('-', $j_skill[$i]);
                        ?>

                  <div><?php echo $j_skill_2[0]; ?> - <b><?php echo $j_skill_2[1]; ?></b></div>

                  <?php }?>
               </div>
            </div>
         </div>

         <div class="job-seeker-about">
            <div class="job-seeker-about-left">
               <h2>About <?php echo $data2['f_name'] ?></h2>
            </div>

            <div class="job-seeker-about-right">
               <?php echo $data2['u_description'] ?>
            </div>
         </div>

         <div class="job-seeker-review">
            <div class="job-seeker-review-header">
               <h1>Reviews about <?php echo $data2['f_name'] ?> </h1>
            </div>

            <?php
               $re_data = $s_que->select_all_review($data2['u_name']);
               if ($re_data != false) {
                  ?>

            <div class="job-seeker-review-content">
               <?php foreach ($re_data as $data) {?>
                  <?php $u_data = $s_que->select_employe_by_u_name($data['sent_by'])->fetch_assoc();?>

                  <div class="job-seeker-review-block">
                        <div class="job-seeker-review-block-header">
                           <img src="all_img/<?php echo $u_data['u_img'] ?>" width="100%" height="100%" alt="">
                        </div>

                        <div class="job-seeker-review-block-details">
                           <h2><?php echo $u_data['f_name'] ?></h2>
                           <div><?php echo $u_data['u_age'] ?>- <?php echo $u_data['u_gender'] ?> - <?php echo $u_data['u_location'] ?></div>
                        </div>

                        <div class="job-seeker-review-block-text">
                           <h2>Review</h2>

                           <span>
                              <?php echo $data['r_rating_text'] ?>
                           </span>

                           <div class="rating-block">
                              <?php for ($i = 0; $i < $data['r_rating']; $i++) {?>
                                    <img src="new_img/37.png" alt="" class="rate">
                              <?php }?>
                           </div>
                        </div>
                  </div>
               <?php }?>
            </div>

            <?php } else {?>
               <h2 style="text-align: center">No Review Yet</h2>
            <?php }?>
         </div>
      </div>

      <div class="job-seeker-footer-container">
         <div class="job-seeker-footer">
            <img src="new_img/9.png" width="100%" height="100%" alt="">
         </div>
      </div>
   </div>

   <script>
      function count_character(count_char){
         char_len = count_char.value;

         document.getElementById("count_char").innerHTML = char_len.length;
      }

      
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