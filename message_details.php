<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    $m_que = new Main_Query();
    $s_que = new Select_Query();

    if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
        
    }else {
        header("Location: home.php");
    }

    $received_by = $_GET['r_id'];
    $_SESSION['received_by'] = $received_by;

    $data = $s_que->select_all_message_u_name($received_by); 

    if ($data != false) {
        # code...
    }else {
        header("Location: 404.php");   
    }

    if (Session::show_value("u_type") == "employer") {
        $j_data = $s_que->select_job_seeker_by_u_name($received_by)->fetch_assoc();
    }else{
        $j_data = $s_que->select_employe_by_u_name($received_by)->fetch_assoc();
    }

    $s_data = $s_que->select_login_info($received_by)->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Message Details</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="stylesheet" href="css/message_details.css">
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
                <div class="message-details">
                    <div class="message-details-header">
                        <h2><?php echo $received_by; ?></h2>
                        
                        <?php if($s_data['active_status'] == 'active'){ ?>
                            <p>Active Now</p>
                        <?php }else{ ?>
                            <?php
                                $p_date = $s_data['last_activity'];
                                $c_date = date("y-m-d H:i:s");
     
                                $dtNow = new DateTime($p_date);
                                $dtToCompare = new DateTime($c_date);
     
                                $diff = $dtNow->diff($dtToCompare);
     
                                $m = (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i);
                                $h = $diff->h + ($diff->days * 24);
                                $d = $diff->days;
                            ?>

                            <p>
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
                            </p>
                        <?php } ?>
                    </div>

                    <div class="message-details-content">
                        <div class="message-details-left">
                            <div class="message-details-left-header" id="chat_message">
                            </div>

                            <div class="message-detials-left-footer">
                                <form role="form" id="submitForm" class="message-block">
                                    <input type="hidden" name="received_by" value="<?php echo $received_by; ?>">

                                    <textarea name="message" id="" cols="5" rows="2" placeholder="Write Here..."
                                        class="text-field-2"></textarea>

                                    <button type="submit" class="btn" id="submitbtn" name="j_message2">
                                        <div class="icon"><img src="new_img/27.png" alt=""></div>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="message-details-right">
                            <div class="message-details-right-header">
                                <img src="all_img/<?php echo $j_data['u_img'] ?>" width="60px" height="60px" alt="">
                            </div>

                            <div class="message-details-right-content">
                                <h2><?php echo $j_data['u_name'] ?></h2>
                                <p><?php echo $j_data['u_age'] ?> - <?php echo $j_data['u_gender'] ?> - <?php echo $j_data['u_location'] ?></p>
                            </div>

                            <div class="rating-block">
                                <img src="new_img/37.png" alt="" class="rate">
                                <img src="new_img/37.png" alt="" class="rate">
                                <img src="new_img/37.png" alt="" class="rate">
                                <img src="new_img/37.png" alt="" class="rate">
                                <img src="new_img/37.png" alt="" class="rate">
                            </div>

                            <div class="job-seeker-content-left-footer">
                                <?php
                                    $date_arr = explode("-", $j_data['join_date']);
                                    
                                    $monthNum = $date_arr[1];
                                    $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                                ?>

                                <div class="job-seeker-content-left-footer-block">
                                    <div class="icon"><img src="new_img/30.png" width="100%" height="100%" alt=""></div>
                                    <span>Member Since <?php echo $date_arr[0] ?> <?php echo $monthName ?>, <?php echo $date_arr[2] ?></span>
                                </div>
                            
                                <?php
                                    $join_arr_2 = explode(" ", $s_data['last_activity']);
                                    $x = $join_arr_2[0];
                                    $join_arr = explode("-", $x);

                                    $monthNum_2 = $join_arr[1];
                                    $monthName_2 = date("F", mktime(0, 0, 0, $monthNum_2, 10));
                                ?>
                                
                                <div class="job-seeker-content-left-footer-block">
                                    <div class="icon"><img src="new_img/31.png" width="100%" height="100%" alt=""></div>
                                    <span>Last Logged in on <?php echo $join_arr[2] ?> <?php echo $monthName_2 ?>, <?php echo $join_arr[0] ?></span>
                                </div>

                                <div class="job-seeker-content-left-footer-block">
                                    <div class="icon"><img src="new_img/32.png" width="100%" height="100%" alt=""></div>
                                    <span><?php echo $j_data['u_nationality'] ?></span>
                                </div>
                            </div>
                        </div>
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
                    <a href="job_seeker_dashboard.php">Dashboard</a>
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

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
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

        setInterval(function() {
            $("#chat_message").load("get_chat_message.php");
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
    </script>
</body>

</html>