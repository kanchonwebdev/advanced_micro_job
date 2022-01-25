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

    $j_data = $s_que->select_job_seeker_by_name()->fetch_assoc();
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
                  <h1><?php echo $j_data['f_name'] ?></h1>
               </div>
               <h2>Job Seeker</h2>
            </div>
         </div>
      </div>

      <div class="job-seeker-container">
         <form action="job_seeker_edit_profile_code.php" method="post" enctype="multipart/form-data" class="job-seeker-content">
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

                  <textarea name="u_description" id="" cols="10" rows="5" placeholder="Your Details" class="text-field" value="<?php echo $j_data['u_description'] ?>" maxlength="400"><?php echo $j_data['u_description'] ?></textarea>
                  
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

   <script>
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