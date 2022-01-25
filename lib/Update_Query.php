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

    class Update_Query{
        public function __construct(){
            $this->db = new Database();
        }

        
        //update job
        public function update_job($j_title, $j_location, $j_type, $j_date, $j_payment2, $j_work_hour, $j_descripton, $j_id){
            $sql = "UPDATE `tbl_job_post` SET `j_title`='$j_title',`j_booking_location`='$j_location',`j_type`='$j_type',`j_booking_date`='$j_date',`j_payment`='$j_payment2',`j_work_hour`='$j_work_hour',`j_description`='$j_descripton' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
            
            if($result){
                header("Location: edit_profile.php");
            }
        }

        
        //update job applicant status
        public function update_job_applicant_status($apply_status, $apply_id){
            $sql = "UPDATE tbl_apply SET a_status = '$apply_status' WHERE a_id = '$apply_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                header("Location: job_application.php");
            }
        }

        //update job expire
        public function update_job_expire($j_id){
            $sql = "UPDATE tbl_job_post SET j_status = 'Expired' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
        }

        //update chat seen status
        public function update_seen_status($data){
            $u_name = Session::show_value("u_name");

            $sql = "UPDATE tbl_chat SET c_seen_status = 'seen' WHERE c_to = '$u_name' AND c_from = '$data' ";
            $result = $this->db->update($sql);
            
        }

        //new change password
        public function change_password($o_pass, $n_pass){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT u_name FROM tbl_sign WHERE u_name = '$u_name' AND u_pass = '$o_pass' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                $sql = "UPDATE tbl_sign SET u_pass = '$n_pass' WHERE u_name = '$u_name' ";
                $result = $this->db->update($sql);
                
                if ($result) {

                    $sql = "SELECT u_email FROM tbl_sign WHERE u_name = '$u_name' ";
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
                            <section>Hi '.$u_name.'!</section>
                    
                            <section class="line-height">
                                The password of your account has been changed.If you made this change in error or this was not your please 
                                immediately at info@partippl.com

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
                        
                    }else {
                        Session::set_value("u_email", $u_email);
                        Session::set_value("forget_err_msg_2", "<b>Success!</b>We Send a Email with Security Code.Please check that's.");
                        header("Location: update_pass.php");
                    }

                    Session::set_value("change_pass_msg", "Password Change Successfully");
                    header("Location: change_password.php");       
                }
            }else {
                Session::set_value("change_pass_msg", "Old Password Doesn't Match");
                header("Location: change_password.php");
            }
        }

        //new update job seeker profile
        public function update_job_seeker_profile($u_alb_img,$u_alb_img_1, $u_alb_img_2, $u_alb_img_3,$u_location,$u_description){
            $u_name = Session::show_value("u_name");

            $sql = "UPDATE tbl_job_seeker SET u_location = '$u_location', u_img = '$u_alb_img', u_album_one = '$u_alb_img_1', u_album_two = '$u_alb_img_2', u_album_three = '$u_alb_img_3', u_description = '$u_description' WHERE u_name = '$u_name' ";
            $result = $this->db->update($sql);

            if ($result) {
                header("Location: job_seeker_dashboard.php");
            }
        }

        //new update employe profile
        public function update_employe_profile($u_alb_img,$u_alb_img_1, $u_alb_img_2, $u_alb_img_3,$u_location,$u_description){
            $u_name = Session::show_value("u_name");

            $sql = "UPDATE tbl_employe SET u_location = '$u_location', u_img = '$u_alb_img', u_album_one = '$u_alb_img_1', u_album_two = '$u_alb_img_2', u_album_three = '$u_alb_img_3', u_description = '$u_description' WHERE u_name = '$u_name' ";
            $result = $this->db->update($sql);

            if ($result) {
                header("Location: employe_dashboard.php");
            }
        }

        //new update apply status
        public function update_apply_status($a_id, $j_id, $a_by){
            $u_name = Session::show_value("u_name");

            $sql = "UPDATE tbl_apply  SET a_status = 'Reject' WHERE job_id = '$j_id' AND apply_id = '$a_id' ";
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
                            You job application Reject from '.$u_name.'.Apply new job and stay connect with PartiPpl, please log into PartiPpl.

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

        //new update apply_status 
        public function update_apply_status2($j_id, $a_id){
            $sql = "UPDATE tbl_apply  SET a_status = 'Hired' WHERE job_id = '$j_id' AND apply_id = '$a_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                $sql = "UPDATE tbl_offer SET a_status = 'Hired' WHERE j_id = '$j_id' AND a_id = '$a_id' ";
                $result = $this->db->update($sql);

                if ($result) {
                    header("Location: job_seeker_dashboard.php");
                }
            }
        }

        //new update apply_status 
        public function update_apply_status3($j_id, $a_id){
            $sql = "UPDATE tbl_apply  SET a_status = 'Offer Reject' WHERE job_id = '$j_id' AND apply_id = '$a_id' ";
            $result = $this->db->update($sql);

            $sql = "UPDATE tbl_offer SET a_status = 'Offer Reject' WHERE j_id = '$j_id' AND a_id = '$a_id' ";
            $result = $this->db->update($sql);

            if ($result) {
                header("Location: job_seeker_dashboard.php");
            }
        }

        //new update job seeker u_type
        public function update_job_seeker_type(){
            $u_name = Session::show_value('u_name');

            $sql = "UPDATE tbl_job_seeker SET u_type = 'Old' WHERE u_name = '$u_name' ";
            $result = $this->db->update($sql);
        }

        //new update employe u_type
        public function update_employe_type(){
            $u_name = Session::show_value('u_name');

            $sql = "UPDATE tbl_employe SET u_type = 'Old' WHERE u_name = '$u_name' ";
            $result = $this->db->update($sql);
        }

        //new update employe u_type
        public function update_job_type($j_id){
            $u_name = Session::show_value('u_name');

            $sql = "UPDATE tbl_job_post SET j_post_status = 'Old' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
        }
    }
?>