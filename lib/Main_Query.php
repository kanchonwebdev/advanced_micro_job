<?php
    include_once 'Session.php';
    Session::session_start();
    include_once 'Database.php';

    
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception;
    
    //$date = date("d-m-Y");
    //$date_time =  date('d-m-Y h:i:s A');
    //$u_name = Session::show_value('u_name');
    //$rand_id = rand();

    class Main_Query{

        public function __construct(){
            $this->db = new Database();
            $this->date = date("d-m-Y");
            $this->date_time =  date('d-m-Y h:i:s A');
            $this->rand_id = rand();
        }

        //new sign up
        public function sign_up(){
            $u_email = $_SESSION['sign_data'][0];
            $u_name = $_SESSION['sign_data'][1];
            $u_pass = $_SESSION['sign_data'][2];
            $b_date = $_SESSION['sign_data'][3];
            $u_gender = $_SESSION['sign_data'][4];
            $u_type = $_SESSION['sign_data'][5];

            $sql = "INSERT INTO `tbl_sign`(`u_email`, `u_name`, `u_pass`, `b_date`, `u_gender`, `u_type`, `block_status`, `active_status`, `last_activity`, `join_date`) VALUES ('$u_email','$u_name','$u_pass','$b_date','$u_gender','$u_type','unblock','active','$this->date_time','$this->date')";
            $result = $this->db->insert($sql);
            if ($result) {
                Session::set_value("u_name", $u_name);
                Session::set_value("u_type", $u_type);

                if (Session::show_value("u_type") == "employer") {
                    header("Location: employe_profile_set_up.php");
                }
                
                if (Session::show_value("u_type") == "jobseeker") {
                    header("Location: job_seeker_profile_set_up.php");
                }
                
            }else {
                header("Location: 404.php");
            }
        }

        //new login
        public function login($u_email, $u_pass){
            $sql = "SELECT * FROM tbl_sign WHERE u_email = '$u_email' AND u_pass = '$u_pass' ";
            $result = $this->db->select($sql);

            if ($result != false) {
                $data = $result->fetch_assoc();
                Session::set_value('u_name', $data['u_name']);
                Session::set_value('u_type', $data['u_type']);
            }
            
            if ($result) {
                $date_time = date('y-m-d h:i:s A');

                $sql = "UPDATE tbl_sign SET active_status = 'active', last_activity = '$date_time' WHERE u_email = '$u_email' ";
                $result = $this->db->update($sql);

                if (Session::show_value("u_type") == "employer") {    
                    Session::set_value("msg", 2);
                }

                if (Session::show_value("u_type") == "jobseeker") {    
                    Session::set_value("msg", 3);
                }
            }else {
                Session::set_value("msg", "<b>Error!</b> Email or Password Wrong");
            }
        }

        //new logout
        public function logout(){
            $u_name = Session::show_value("u_name");
            $date_time = date("Y-m-d h:i:s A");

            $sql = "UPDATE tbl_sign SET active_status = 'Deactive', last_activity = '$date_time' WHERE u_name = '$u_name' ";
            $result = $this->db->update($sql);
            
        }

        //new forget password
        public function forget_password($u_email){
            $sql = "SELECT u_email FROM tbl_sign WHERE u_email = '$u_email' ";
            $result = $this->db->select($sql);
            if ($result) {
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
                $mail->Subject = 'Password Recovery'; 

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
                        <section>Hi '.$u_email.'!</section>
                
                        <section class="line-height">
                            You are receiving this email because you indicated lost your password.If you would indeed like to
                            reset your password please use this recovery code '.$rand.'.If you do not need to reset your password.No action is needed at this time. 
                        
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


            }else {
                Session::set_value("forget_err_msg", "<b>Error!</b> Desn't Exist Any Account for this Email");
                header("Location: forget_pass.php");
            }
        }

        //new update password
        public function update_password($s_code, $n_pass){
            $u_email = Session::show_value("u_email");

            if ($s_code != Session::show_value("code")) {
                Session::set_value("forget_err_msg_3", "<b>Error!</b>Security Code Doesn't Match.");
            }else {
                $sql = "UPDATE tbl_sign SET u_pass = '$n_pass' WHERE u_email = '$u_email' ";
                $result = $this->db->update($sql);

                Session::set_value('u_email', NULL);
                Session::set_value('code', NULL);

                if ($result) {
                    header("Location: home.php");
                }
            }
        }

        //new check employe exist or not
        public function check_employe_exist($u_name){
            $sql = "SELECT * FROM tbl_employe WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //new check jobseeker exist or not
        public function check_jobseeker_exist($u_name){
            $sql = "SELECT * FROM tbl_job_seeker WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //change password
        public function change_password($old_pass, $new_pass){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT `email`, `pass` FROM `tbl_sign` WHERE email = '$u_name' AND pass = '$old_pass' ";
            $result = $this->db->select($sql);
            
            if ($result) {
                $sql = "UPDATE `tbl_sign` SET `pass`= '$new_pass' WHERE email = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    Session::set_value("pass_message", "<b>Info: </b> Password Change Successfully");
                    header("Location: change_password.php");
                }
            }else {
                Session::set_value("pass_message", "<b>Error: </b> Old Password doesn't Match ");
                header("Location: change_password.php");
            }
        }

        //set up profile for employee
        public function set_up_profile($e_name, $e_title, $e_type, $e_location, $basename, $e_nationality, $e_age, $e_gender, $e_descripton){
            $u_name = Session::show_value("u_name");
            $j_date =  date("Y-m-d");
            $rand_id = rand();

            $sql = "SELECT * FROM `tbl_employe` WHERE e_from = '$u_name' ";
            $result = $this->db->select($sql);

            if ($result) {
                $sql = "UPDATE `tbl_employe` SET `e_name`='$e_name',`e_title`='$e_title',`e_type`='$e_type',`e_location`='$e_location',`e_img`='$basename',`e_nationality`='$e_nationality',`e_age`='$e_age',`e_gender`='$e_gender',`e_description`='$e_descripton',`e_date`='$j_date' WHERE e_from = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    header("Location: edit_profile.php");
                }
            }else {
                $sql = "INSERT INTO `tbl_employe`(`e_name`, `e_title`, `e_type`, `e_location`, `e_img`, `e_nationality`, `e_age`, `e_gender`, `e_description`, `e_from`, `e_date`, `e_id`) VALUES ('$e_name','$e_title','$e_type','$e_location','$basename','$e_nationality','$e_age','$e_gender','$e_descripton','$u_name','$j_date','$rand_id')";
                $result = $this->db->insert($sql);
                
                if ($result) {
                    header("Location: edit_profile.php");
                }
            }
        }

        //set up profile for job seeker
        public function set_up_profile_job_seeker($j_name, $j_title, $j_interest, $j_location, $basename, $j_skill, $j_nationality, $j_age, $j_gender, $j_descripton){
            $u_name = Session::show_value("u_name");
            $rand_id = rand();
            $j_date =  date("Y-m-d");

            $sql = "SELECT j_from FROM tbl_job_seeker WHERE j_from = '$u_name' ";
            $result = $this->db->select($sql);

            if ($result) {
                $sql = "UPDATE `tbl_job_seeker` SET `j_name`='$j_name',`j_title`='$j_title',`j_interest`='$j_interest',`j_location`='$j_location',`j_nationality`='$j_nationality',`j_img`='$basename',`j_skill`='$j_skill',`j_age`='$j_age',`j_gender`='$j_gender',`j_description`='$j_descripton' WHERE j_from = '$u_name' ";
                $result = $this->db->update($sql);

                if ($result) {
                    header("Location: edit_profile.php");
                }
            }else {
                $sql = "INSERT INTO `tbl_job_seeker`(`j_name`, `j_title`, `j_interest`, `j_location`, `j_nationality`, `j_img`, `j_skill`, `j_age`, `j_gender`, `j_description`, `j_from`, `j_id`, `j_date`) VALUES ('$j_name','$j_title','$j_interest','$j_location','$j_nationality','$basename','$j_skill','$j_age','$j_gender','$j_descripton','$u_name','$rand_id','$j_date')";
                $result = $this->db->insert($sql);
                
                if ($result) {
                    header("Location: edit_profile.php");
                }
            }
        }

        //check email
        public function check_email($u_email){
            $sql = "SELECT email FROM tbl_sign WHERE email = '$u_email' ";
            $result = $this->db->select($sql);
            if ($result > 0) {
                Session::set_value("check_mail", "ok");
            }else {
                Session::set_value("check_mail", "not ok");
                Session::set_value("forget_message", "<b>Error!</b> Doesn't Found any Account");
                header("Location: forget.php");
            }
        }

        //reset password
        public function reset_password($u_pass){
            $u_email = Session::show_value("u_name");
            $sql = "UPDATE `tbl_sign` SET `pass`= '$u_pass' WHERE email = '$u_email' ";
            $result = $this->db->update($sql);
            
            Session::set_value("u_name", $u_email);
            header("Location: home.php");
        }
  
        public function select_rating2($rate){
            $u_name = Session::show_value('u_name');
            
            $sql = "SELECT * FROM tbl_rating WHERE sent_by = '$u_name' AND received_by = '$rate' ";
            $result = $this->db->select($sql);
            return $result;
        }

        /*

        //check profile
        public function check_profile(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT u_name FROM tbl_employee WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("check_ok","ok");
            }else {
                Session::set_value("check_ok","not ok");
            }
        }

        //check profile 2
        public function check_profile_2(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT u_name FROM tbl_job_seeker WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            if ($result) {
                Session::set_value("check_ok_2","ok");
            }else {
                Session::set_value("check_ok_2","not ok");
            }
        }

        //display employee data 
        public function display_employee_data(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_employee WHERE u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //display all job seeker
        public function display_all_job_seeker(){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_job_seeker WHERE NOT u_name = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //job seeker data by name
        public function display_job_seeker_data_by_name($u_id){
            $sql = "SELECT * FROM tbl_job_seeker WHERE u_name = '$u_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //insert_message
        public function insert_message_2($received_by, $chat_message){
            $u_name = Session::show_value("u_name");

            $sql = "INSERT INTO `tbl_chat`(`chat_message`, `sent_by`, `received_by`) VALUES ('$chat_message','$u_name','$received_by')";
            $result = $this->db->insert($sql);
            if ($result) {
                header("Location: dashboard.php");
            }
        }

        //select chat message
        public function select_chat_data_3($received_by){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_chat WHERE sent_by = '$received_by' AND received_by = '$u_name' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function select_chat_data_4($received_by){
            $u_name = Session::show_value("u_name");

            $sql = "SELECT * FROM tbl_chat WHERE received_by = '$u_name' AND sent_by = '$received_by' ";
            $result = $this->db->select($sql);
            return $result;
        }


        */
    }
?>