<?php
    include_once 'Session.php';
    Session::session_start();
    include 'Database.php';

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\Exception; 

    class Basic_Query{
        public function __construct(){
            $this->db = new Database();
        }

        //sign up basic validation
        public function sign_up($u_email, $u_name, $u_pass, $b_date, $gender, $type){
            $sql = "SELECT u_email  FROM tbl_sign WHERE u_email = '$u_email' ";
            $result = $this->db->select($sql);

            if ($result) {
                $err_msg = "<b>Error! </b> This Email Already Registered Try new One.";
                Session::set_value("sign_err_msg", $err_msg);
                header("Location: sign_up.php");
            }else{
                $sql = "SELECT u_name  FROM tbl_sign WHERE u_name = '$u_name' ";
                $result = $this->db->select($sql);

                if ($result) {
                    $err_msg = "<b>Error! </b> This Username Already Registered Try new One.";
                    Session::set_value("sign_err_msg", $err_msg);
                    header("Location: sign_up.php");
                }else {
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
                    Session::set_value("verify", $rand);
                    $_SESSION['sign_data'] = array($u_email, $u_name, $u_pass, $b_date, $gender, $type);
                    // Mail subject 
                    $mail->Subject = 'Vefiy Your Email to Finish Registering'; 

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
                                Awesome, we are so happy you have joined PartiPpl.In order to finish your registration please <a href="http://localhost/PARTY%20-%204/partippl.com/verify.php?verify_id='.$rand.'" target="_blank">Click Here</a></p>
                                to confirm your email.Once you have confirmed your email you will need to complete your profile in order to get full use PartiPpl platform.
                            
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
                        
                        $err_msg = "<b>Error! </b> Someting wrong We doesn't Send Email";
                        Session::set_value("sign_err_msg", $err_msg);
                        header("Location: sign_up.php");
                    }else {
                        $suc_msg = "<b>Success!</b> An Email Send.Check your Mail and Verify Identity";
                        Session::set_value("sign_suc_msg", $suc_msg);
                        header("Location: sign_up.php");
                    }
                }
            }
        }
    }
?>