<?php
    include_once 'Session.php';
    Session::session_start();
    include_once 'Database.php';
    
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;

    //$date = date("Y-m-d");
    //$date_time =  date('Y-m-d h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Insert_Query{
        public function __construct(){
            $this->db = new Database();

            $this->date = date("d-m-Y");
            $this->date_time =  date('d-m-Y h:i:s A');
            $this->u_name = Session::show_value('u_name');
            $this->rand_id = rand();
        }

        //post a job
        public function post_job($j_title, $j_location, $j_type, $j_date, $j_hour, $j_miute, $j_am, $j_payment2, $j_work_hour, $j_descripton){
            $u_name = Session::show_value("u_name");
            $j_time = $j_hour.":".$j_miute.":".$j_am;
            $rand_id = rand();
            $j_post_date =  date("Y-m-d");

            $sql = "INSERT INTO `tbl_job_post`(`j_title`, `j_booking_location`, `j_type`, `j_booking_date`, `j_booking_time`, `j_payment`, `j_work_hour`, `j_description`, `j_post_by`, `j_id`, `j_date`, `j_status`) VALUES ('$j_title','$j_location','$j_type','$j_date','$j_time','$j_payment2','$j_work_hour','$j_descripton','$u_name','$rand_id','$j_post_date','Not Approved')";
            $result = $this->db->insert($sql);
            if ($result) {
                Session::set_value("job_message", "Job Post Store Successfully");
            }
        }
        
        //collect email
        public function collect_email_code($c_email){
            $c_date = date("Y-m-d");

            $sql = "SELECT c_email FROM tbl_collect_email WHERE c_email = '$c_email' ";
            $result = $this->db->select($sql);
            if ($result > 0) {
                Session::set_value("c_mail_message","Email already Exist");
                header("Location: home.php");
            }else {
                $sql = "SELECT j_from FROM tbl_job_seeker WHERE j_from = '$c_email' ";
                $result = $this->db->select($sql);
                if ($result > 0) {
                    Session::set_value("c_mail_message","Email already Exist");
                    header("Location: home.php");
                }else {
                    $sql = "INSERT INTO `tbl_collect_email`(`c_email`,`c_date_time`) VALUES ('$c_email','$c_date')";
                    $result = $this->db->insert($sql);
                    if ($result) {
                        Session::set_value("c_mail_message","Email Register Successfully");
                        header("Location: home.php");
                    }
                }
            }
        }
        
        //job apply
        public function job_apply($job_id, $posted_by){
            $u_name = Session::show_value("u_name");
            $rand_id = rand();
            $a_date = date('Y-m-d');

            $sql = "INSERT INTO `tbl_apply`(`j_id`, `a_from`, `a_status`, `a_to`, `a_id`, `a_date`) VALUES ('$job_id','$u_name','Submitted','$posted_by','$rand_id','$a_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: new_job.php");
            }
        }

        //insert employe rating
        public function insert_rating($j_id,$r_to,$rating_text,$rating){
            $u_name = Session::show_value('u_name');
            $r_date = date('Y-m-d');
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_rating`(`r_comment`, `r_from`, `r_to`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`) VALUES ('$rating_text','$u_name','$r_to','$rating','$rand_id','$r_date','$j_id','$r_publish_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: job_application.php");
            }
        }

        //insert employe rating
        public function insert_rating2($j_id,$r_to,$rating_text,$rating){
            $u_name = Session::show_value('u_name');
            $r_date = date('Y-m-d');
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_rating`(`r_comment`, `r_from`, `r_to`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`) VALUES ('$rating_text','$u_name','$r_to','$rating','$rand_id','$r_date','$j_id','$r_publish_date')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: job_application_job_seeker.php");
            }
        }

        //insert_message
        public function insert_message($received_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: dashboard.php");
            }
        }

        //insert_message
        public function insert_message_2($received_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: dashboard.php");
            }
        }
        
        //insert chat message for employe
        public function insert_chat_message_2($sent_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$sent_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details.php?chat_id=".$sent_by);
            }
        }

        //insert chat message for employe
        public function insert_chat_message_3($sent_by, $chat_message){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$sent_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details2.php?chat_id=".$sent_by);
            }
        }
        
        //insert chat_message
        public function insert_chat_message($chat_message, $received_by){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details.php?chat_id=".$received_by);
            }
        }

        //insert chat_message from outbox
        public function insert_chat_message_from_outbox($chat_message, $received_by){
            $u_name = Session::show_value("u_name");
            $date_time =  date('Y-m-d h:i:s A');
            $rand_id = rand();

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `c_from`, `c_to`, `c_date_time`, `c_id`) VALUES ('$chat_message','$u_name','$received_by','$date_time','$rand_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: chat_details2.php?chat_id=".$received_by);
            }
        }

        //new employe profile set up
        public function employe_profile_set_up($u_alb_img_1, $u_alb_img_2, $u_alb_img_3){
            $f_name = $_SESSION['employe_data'][0];
            $l_name = $_SESSION['employe_data'][1];
            $u_name = $this->u_name;
            $u_location = $_SESSION['employe_data'][4];
            $u_img = $_SESSION['employe_data'][2];
            $u_alb_img_1;
            $u_alb_img_2;
            $u_alb_img_3;
            $u_nationality = $_SESSION['employe_data'][3];
            $age = $_SESSION['login_info'][0];
            $gender = $_SESSION['login_info'][1];
            $u_description = $_SESSION['employe_data'][5];
            $join_date = $_SESSION['login_info'][3];
            $last_active = $_SESSION['login_info'][2];
            $u_id = $this->rand_id;

            $sql = "INSERT INTO `tbl_employe`(`f_name`, `l_name`, `u_name`, `u_location`, `u_img`, `u_album_one`, `u_album_two`, `u_album_three`, `u_nationality`, `u_age`, `u_gender`, `u_description`, `join_date`, `last_activity`, `u_id`) VALUES ('$f_name','$l_name','$u_name','$u_location','$u_img','$u_alb_img_1','$u_alb_img_2','$u_alb_img_3','$u_nationality','$age','$gender','$u_description','$join_date','$last_active','$u_id')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: employe_dashboard.php");
            }
        }

        //new post a new job 
        public function post_a_job($j_title, $j_booking_date, $j_booking_time, $j_location, $j_type, $j_hour, $j_payment, $j_description){
            $sql = "INSERT INTO `tbl_job_post`(`j_title`, `j_location`, `j_type`, `j_booking_date`, `j_booking_time`, `j_payment`, `j_work_hour`, `j_description`, `u_name`, `j_id`, `j_post_date`) VALUES ('$j_title','$j_location','$j_type','$j_booking_date','$j_booking_time','$j_payment','$j_hour','$j_description','$this->u_name','$this->rand_id','$this->date_time')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: thank_you.php");
            }
        }
        
        //new job seeker profile set up
        public function job_seeker_profile_set_up($u_alb_img_1, $u_alb_img_2, $u_alb_img_3, $j_interest){
            $f_name = $_SESSION['job_seeker_data'][0];
            $l_name = $_SESSION['job_seeker_data'][1];
            $u_name = $this->u_name;
            $u_location = $_SESSION['job_seeker_data'][4];
            $u_img = $_SESSION['job_seeker_data'][2];
            $u_alb_img_1;
            $u_alb_img_2;
            $u_alb_img_3;
            $u_nationality = $_SESSION['job_seeker_data'][3];
            $age = $_SESSION['login_info'][0];
            $gender = $_SESSION['login_info'][1];
            $u_description = $_SESSION['job_seeker_data'][5];
            $join_date = $_SESSION['login_info'][3];
            $last_active = $_SESSION['login_info'][2];
            $u_id = $this->rand_id;

            $sql = "INSERT INTO `tbl_job_seeker`(`f_name`, `l_name`, `u_name`, `u_location`, `u_nationality`, `u_img`, `u_album_one`, `u_album_two`, `u_album_three`, `u_skill`, `u_age`, `u_gender`, `u_description`, `u_id`, `join_date`, `last_activity`) VALUES ('$f_name','$l_name','$u_name','$u_location','$u_nationality','$u_img','$u_alb_img_1','$u_alb_img_2','$u_alb_img_3','$j_interest','$age','$gender','$u_description','$u_id','$join_date','$last_active')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: job_seeker_dashboard.php");
            }
        }

        //new apply new job
        public function apply_job($j_id, $post_by, $a_description){
            $u_name = Session::show_value("u_name");

            $sql = "INSERT INTO `tbl_apply`(`job_id`, `apply_by`, `a_description`, `a_status`, `post_by`, `apply_id`, `a_date`) VALUES ('$j_id','$u_name','$a_description','Submitted','$post_by','$this->rand_id','$this->date')";
            $result = $this->db->insert($sql);

            if ($result) {
                $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$post_by' ";
                $result = $this->db->select($sql);
                $x = $result->fetch_assoc();
                $u_email = $x['u_email'];

                if (!class_exists('PHPMailer\PHPMailer\Exception')){
                    require './PHPMailer/Exception.php'; 
                    require './PHPMailer/PHPMailer.php'; 
                    require './PHPMailer/SMTP.php'; 
                }

                $mail = new PHPMailer; 
            
                $mail->isSMTP();                      // Set mailer to use SMTP 
                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                $mail->Password = 'kanchonkumar';   // SMTP password 
                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                $mail->Port = 587;                    // TCP port to connect to 
                
                // Sender info 
                $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                
                // Add a recipient 
                $mail->addAddress($u_email);  
                
                // Set email format to HTML 
                $mail->isHTML(true); 

                $rand = rand();
                Session::set_value("code", $rand);
                // Mail subject 
                $mail->Subject = 'Password Change'; 

                $bodyContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/email.css">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                </head>
                <body>
                    <div class="header">
                        <div class="header-img">
                            <img src="img/ppl.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                
                    <div class="content">
                        <section>Hi '.$post_by.'!</section>
                
                        <section class="line-height">
                            You have a new job application from '.$u_name.'.In order to view the application and take action, please log into PartiPpl.

                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                        </section>
                
                        <section class="line-height-2">
                            <p style="margin: unset">Good luck, have fun and party hard!</p>
                            <span>The PartiPpl Team</span>
                        </section>
                    </div>
                
                    <div class="footer">
                        <span>www.partippl.com</span>
                        <p style="margin: unset">We Know How to Party!</p>
                    </div>
                </body>
                </html>
                ';

                $mail->Body    = $bodyContent; 
                
                if(!$mail->send()) {      
                    
                }

                header("Location: thank_you.php");
            }
        }

        //new send offer
        public function send_offer($j_location, $d_code, $a_id, $j_id, $a_by, $p_by){

            $sql = "INSERT INTO `tbl_offer`(`j_location`, `d_code`, `j_id`, `a_id`, `post_by`, `apply_by`, `a_status`) VALUES ('$j_location','$d_code','$j_id','$a_id','$p_by','$a_by','Offer Send')";
            $result = $this->db->insert($sql);

            if ($result) {
                $sql = "UPDATE tbl_apply SET a_status = 'Offer Send' WHERE apply_id = '$a_id' AND job_id = '$j_id' ";
                $result = $this->db->update($sql);

                if ($result) {
                    $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$a_by' ";
                    $result = $this->db->select($sql);
                    $x = $result->fetch_assoc();
                    $u_email = $x['u_email'];

                    if (!class_exists('PHPMailer\PHPMailer\Exception')){
                        require './PHPMailer/Exception.php'; 
                        require './PHPMailer/PHPMailer.php'; 
                        require './PHPMailer/SMTP.php'; 
                    }

                    $mail = new PHPMailer; 
                
                    $mail->isSMTP();                      // Set mailer to use SMTP 
                    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                    $mail->SMTPAuth = true;               // Enable SMTP authentication 
                    $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                    $mail->Password = 'kanchonkumar';   // SMTP password 
                    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                    $mail->Port = 587;                    // TCP port to connect to 
                    
                    // Sender info 
                    $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                    
                    // Add a recipient 
                    $mail->addAddress($u_email);  
                    
                    // Set email format to HTML 
                    $mail->isHTML(true); 

                    $rand = rand();
                    Session::set_value("code", $rand);
                    // Mail subject 
                    $mail->Subject = 'Password Change'; 

                    $bodyContent = '
                    <!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <link rel="stylesheet" href="css/email.css">
                        <link rel="preconnect" href="https://fonts.googleapis.com">
                        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                        <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                    </head>
                    <body>
                        <div class="header">
                            <div class="header-img">
                                <img src="img/ppl.png" width="100%" height="100%" alt="">
                            </div>
                        </div>
                    
                        <div class="content">
                            <section>Hi '.$apply_by.'!</section>
                    
                            <section class="line-height">
                                Great news '.$u_name.' has offered you a job.In order to accept the job please login to PartiPpl and click accept.
                                Once you have done so the job will been added to your calender and we will send you a reminder the day of.

                                <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                                <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                                <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                                <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                                <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                            </section>
                    
                            <section class="line-height-2">
                                <p style="margin: unset">Good luck, have fun and party hard!</p>
                                <span>The PartiPpl Team</span>
                            </section>
                        </div>
                    
                        <div class="footer">
                            <span>www.partippl.com</span>
                            <p style="margin: unset">We Know How to Party!</p>
                        </div>
                    </body>
                    </html>
                    ';

                    $mail->Body    = $bodyContent; 
                    
                    if(!$mail->send()) {      
                        
                    }
                }
                
                header("Location: employer_active_job.php?j_id=".$j_id);
            }
        }

        //new insert employe rating
        public function insert_employe_rating($r_rating, $r_rating_text){
            $j_id = $_SESSION['apply_info'][0];
            $a_id = $_SESSION['apply_info'][1];
            $post_by = $_SESSION['apply_info'][2];
            $apply_by = $_SESSION['apply_info'][3];
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));


            $sql = "INSERT INTO `tbl_rating`(`r_rating_text`, `sent_by`, `received_by`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`, `a_id`) VALUES ('$r_rating_text','$post_by','$apply_by','$r_rating','$this->rand_id','$this->date','$j_id','$r_publish_date','$a_id')";
            $result = $this->db->insert($sql);
            if ($result) {

                $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$apply_by' ";
                $result = $this->db->select($sql);
                $x = $result->fetch_assoc();
                $u_email = $x['u_email'];

                if (!class_exists('PHPMailer\PHPMailer\Exception')){
                    require './PHPMailer/Exception.php'; 
                    require './PHPMailer/PHPMailer.php'; 
                    require './PHPMailer/SMTP.php'; 
                }

                $mail = new PHPMailer; 
            
                $mail->isSMTP();                      // Set mailer to use SMTP 
                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                $mail->Password = 'kanchonkumar';   // SMTP password 
                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                $mail->Port = 587;                    // TCP port to connect to 
                
                // Sender info 
                $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                
                // Add a recipient 
                $mail->addAddress($u_email);  
                
                // Set email format to HTML 
                $mail->isHTML(true); 

                $rand = rand();
                Session::set_value("code", $rand);
                // Mail subject 
                $mail->Subject = 'Password Change'; 

                $bodyContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/email.css">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                </head>
                <body>
                    <div class="header">
                        <div class="header-img">
                            <img src="img/ppl.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                
                    <div class="content">
                        <section>Hi '.$apply_by.'!</section>
                
                        <section class="line-height">
                            You have received a new review at PartiPpl, in order to view the review please 
                            go to partippl.com and login.

                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                        </section>
                
                        <section class="line-height-2">
                            <p style="margin: unset">Good luck, have fun and party hard!</p>
                            <span>The PartiPpl Team</span>
                        </section>
                    </div>
                
                    <div class="footer">
                        <span>www.partippl.com</span>
                        <p style="margin: unset">We Know How to Party!</p>
                    </div>
                </body>
                </html>
                ';

                $mail->Body    = $bodyContent; 
                
                if(!$mail->send()) {      
                    
                }
                
                header("Location: employe_dashboard.php");
            }
        }

        //new insert job seeker rating
        public function insert_job_seeker_rating($r_rating, $r_rating_text){
            $j_id = $_SESSION['apply_info'][0];
            $a_id = $_SESSION['apply_info'][1];
            $post_by = $_SESSION['apply_info'][2];
            $apply_by = $_SESSION['apply_info'][3];
            $r_publish_date = date("Y-m-d", strtotime("+17 day"));


            $sql = "INSERT INTO `tbl_rating`(`r_rating_text`, `received_by`, `sent_by`, `r_rating`, `r_id`, `r_date`, `j_id`, `r_publish_date`, `a_id`) VALUES ('$r_rating_text','$post_by','$apply_by','$r_rating','$this->rand_id','$this->date','$j_id','$r_publish_date','$a_id')";
            $result = $this->db->insert($sql);
            if ($result) {

                $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$post_by' ";
                $result = $this->db->select($sql);
                $x = $result->fetch_assoc();
                $u_email = $x['u_email'];

                if (!class_exists('PHPMailer\PHPMailer\Exception')){
                    require './PHPMailer/Exception.php'; 
                    require './PHPMailer/PHPMailer.php'; 
                    require './PHPMailer/SMTP.php'; 
                }

                $mail = new PHPMailer; 
            
                $mail->isSMTP();                      // Set mailer to use SMTP 
                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                $mail->Password = 'kanchonkumar';   // SMTP password 
                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                $mail->Port = 587;                    // TCP port to connect to 
                
                // Sender info 
                $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                
                // Add a recipient 
                $mail->addAddress($u_email);  
                
                // Set email format to HTML 
                $mail->isHTML(true); 

                $rand = rand();
                Session::set_value("code", $rand);
                // Mail subject 
                $mail->Subject = 'Password Change'; 

                $bodyContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/email.css">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                </head>
                <body>
                    <div class="header">
                        <div class="header-img">
                            <img src="img/ppl.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                
                    <div class="content">
                        <section>Hi '.$post_by.'!</section>
                
                        <section class="line-height">
                            You have received a new review at PartiPpl, in order to view the review please 
                            go to partippl.com and login.
                            
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                        </section>
                
                        <section class="line-height-2">
                            <p style="margin: unset">Good luck, have fun and party hard!</p>
                            <span>The PartiPpl Team</span>
                        </section>
                    </div>
                
                    <div class="footer">
                        <span>www.partippl.com</span>
                        <p style="margin: unset">We Know How to Party!</p>
                    </div>
                </body>
                </html>
                ';

                $mail->Body    = $bodyContent; 
                
                if(!$mail->send()) {      
                    
                }

                header("Location: job_seeker_dashboard.php");
            }
        }

        //new sent message code
        public function sent_message($received_by, $message){
            $u_name = $this->u_name;

            if (Session::show_value("u_type") == "jobseeker") {
                $g_name = $received_by.'_'.$u_name;
            }else {
                $g_name = $u_name.'_'.$received_by;
            }

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `sent_by`, `received_by`, `c_date_time`, `c_id`, `c_seen_status`, `g_name`) VALUES ('$message','$this->u_name','$received_by','$this->date_time','$this->rand_id','unseen','$g_name')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: message_list.php");
            }
        }

        //new job seeker sent message code
        public function job_seeker_sent_message($received_by, $message){
            $u_name = $this->u_name;

            if (Session::show_value("u_type") == "jobseeker") {
                $g_name = $received_by.'_'.$u_name;
            }else {
                $g_name = $u_name.'_'.$received_by;
            }

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `sent_by`, `received_by`, `c_date_time`, `c_id`, `c_seen_status`, `g_name`) VALUES ('$message','$this->u_name','$received_by','$this->date_time','$this->rand_id','unseen','$g_name')";
            $result = $this->db->insert($sql);
            if ($result) {

                $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$received_by' ";
                $result = $this->db->select($sql);
                $x = $result->fetch_assoc();
                $u_email = $x['u_email'];

                if (!class_exists('PHPMailer\PHPMailer\Exception')){
                    require './PHPMailer/Exception.php'; 
                    require './PHPMailer/PHPMailer.php'; 
                    require './PHPMailer/SMTP.php'; 
                }

                $mail = new PHPMailer; 
            
                $mail->isSMTP();                      // Set mailer to use SMTP 
                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                $mail->Password = 'kanchonkumar';   // SMTP password 
                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                $mail->Port = 587;                    // TCP port to connect to 
                
                // Sender info 
                $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                
                // Add a recipient 
                $mail->addAddress($u_email);  
                
                // Set email format to HTML 
                $mail->isHTML(true); 

                $rand = rand();
                Session::set_value("code", $rand);
                // Mail subject 
                $mail->Subject = 'Password Change'; 

                $bodyContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/email.css">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                </head>
                <body>
                    <div class="header">
                        <div class="header-img">
                            <img src="img/ppl.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                
                    <div class="content">
                        <section>Hi '.$received_by.'!</section>
                
                        <section class="line-height">
                            You have a private message from '.$u_name.'.In order to view the message and reply, please log into PartiPpl.

                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                        </section>
                
                        <section class="line-height-2">
                            <p style="margin: unset">Good luck, have fun and party hard!</p>
                            <span>The PartiPpl Team</span>
                        </section>
                    </div>
                
                    <div class="footer">
                        <span>www.partippl.com</span>
                        <p style="margin: unset">We Know How to Party!</p>
                    </div>
                </body>
                </html>
                ';

                $mail->Body    = $bodyContent; 

                if(!$mail->send()) {      
                    
                }
                
                header("Location: message_list.php");
            }
        }

        //new job seeker sent message code
        public function employe_sent_message($received_by, $message){
            $u_name = $this->u_name;

            if (Session::show_value("u_type") == "jobseeker") {
                $g_name = $received_by.'_'.$u_name;
            }else {
                $g_name = $u_name.'_'.$received_by;
            }

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `sent_by`, `received_by`, `c_date_time`, `c_id`, `c_seen_status`, `g_name`) VALUES ('$message','$this->u_name','$received_by','$this->date_time','$this->rand_id','unseen','$g_name')";
            $result = $this->db->insert($sql);
            if ($result) {

                $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$received_by' ";
                $result = $this->db->select($sql);
                $x = $result->fetch_assoc();
                $u_email = $x['u_email'];

                if (!class_exists('PHPMailer\PHPMailer\Exception')){
                    require './PHPMailer/Exception.php'; 
                    require './PHPMailer/PHPMailer.php'; 
                    require './PHPMailer/SMTP.php'; 
                }

                $mail = new PHPMailer; 
            
                $mail->isSMTP();                      // Set mailer to use SMTP 
                $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
                $mail->SMTPAuth = true;               // Enable SMTP authentication 
                $mail->Username = 'tulipkumar81@gmail.com';   // SMTP username 
                $mail->Password = 'kanchonkumar';   // SMTP password 
                $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
                $mail->Port = 587;                    // TCP port to connect to 
                
                // Sender info 
                $mail->setFrom('tulipkumar81@gmail.com', 'PartiPpl Admin'); 
                
                // Add a recipient 
                $mail->addAddress($u_email);  
                
                // Set email format to HTML 
                $mail->isHTML(true); 

                $rand = rand();
                Session::set_value("code", $rand);
                // Mail subject 
                $mail->Subject = 'Password Change'; 

                $bodyContent = '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    <link rel="stylesheet" href="css/email.css">
                    <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
                </head>
                <body>
                    <div class="header">
                        <div class="header-img">
                            <img src="img/ppl.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                
                    <div class="content">
                        <section>Hi '.$received_by.'!</section>
                
                        <section class="line-height">
                            You have a private message from '.$u_name.'.In order to view the message and reply, please log into PartiPpl.

                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-1">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-2">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-3">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-4">
                            <img src="img/6.png" width="100%" height="100%" alt="" class="img-5">
                        </section>
                
                        <section class="line-height-2">
                            <p style="margin: unset">Good luck, have fun and party hard!</p>
                            <span>The PartiPpl Team</span>
                        </section>
                    </div>
                
                    <div class="footer">
                        <span>www.partippl.com</span>
                        <p style="margin: unset">We Know How to Party!</p>
                    </div>
                </body>
                </html>
                ';

                $mail->Body    = $bodyContent; 

                if(!$mail->send()) {      
                    
                }
                
                header("Location: message_list.php");
            }
        }

        //new sent message code
        public function sent_message2($received_by, $message){
            $u_name = $this->u_name;
            
            if (Session::show_value("u_type") == "jobseeker") {
                $g_name = $received_by.'_'.$u_name;
            }else {
                $g_name = $u_name.'_'.$received_by;
            }

            $sql = "INSERT INTO `tbl_chat`(`c_message`, `sent_by`, `received_by`, `c_date_time`, `c_id`, `c_seen_status`, `g_name`) VALUES ('$message','$this->u_name','$received_by','$this->date_time','$this->rand_id','unseen','$g_name')";
            $result = $this->db->insert($sql);

            if ($result) {
                header("Location: message_list.php");
            }
        }
    }
?>