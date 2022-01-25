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

    $check_old_user = $s_que->select_old_employe();

    if ($check_old_user != false) {
        
    }else {
        $select_join_date = $s_que->select_join_date2()->fetch_assoc();

        $date = $select_join_date['join_date'];
        $publish_date = date('d-m-Y', strtotime($date. ' + 5 day'));
        $cur_date = date('d-m-Y');
        
        if ($cur_date >= $publish_date) {
            $u_que->update_employe_type();
        }
    }

    $new_job = $s_que->select_new_job();
    
    if ($new_job != false) {
        foreach($new_job as $data){
            $x = explode(" ", $data['j_post_date']);
            $date = $x[0];
            $publish_date = date('d-m-Y', strtotime($date. ' + 2 day'));
            $cur_date = date('d-m-Y');
            
            if ($cur_date >= $publish_date) {
                $u_que->update_job_type($data['j_id']);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employe Dashboard</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
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
        <div class="job-seeker-container">
            <div class="job-seeker-right">
                <div class="job-seeker-right-header">
                    <div class="job-seeker-hero-text">
                        Hi, <?php echo Session::show_value("u_name"); ?>, Welcome back to PartiPpl! <br>
                        You are logged in as an <b>Employer</b>.
                    </div>

                    <?php
                        $i = 0;
                        $job_count = $s_que->select_all_job_by_u_name();
                        if ($job_count != false) {
                            foreach($job_count as $job_count2){
                                $i++;
                            }
                        }

                        $j = 0;
                        $hire_count = $s_que->select_all_hire_apply();
                        if ($hire_count != false) {
                            foreach($hire_count as $hire_count2){
                                $j++;
                            }
                        }

                        $k = 0;
                        $app_count = $s_que->select_all_job_application();
                        if ($app_count != false) {
                            foreach($app_count as $app_count2){
                                $k++;
                            }
                        }
                    ?>

                    <div class="job-seeker-right-header-content">
                        <div class="job-seeker-right-header-block">
                            <div class="job-seeker-right-header-block-left">
                                <p>Live Job Postings</p>
                                <b><?php echo $i; ?></b>
                            </div>

                            <div class="job-seeker-right-header-block-right" style="background-color: #dc3545;">
                                <img src="new_img/16.png" width="45px" height="30px" alt="">
                            </div>
                        </div>

                        <div class="job-seeker-right-header-block">
                            <div class="job-seeker-right-header-block-left">
                                <p>Jobs Hired For</p>
                                <b><?php echo $j; ?></b>
                            </div>

                            <div class="job-seeker-right-header-block-right" style="background-color: #007bff;">
                                <img src="new_img/16.png" width="45px" height="30px" alt="">
                            </div>
                        </div>

                        <div class="job-seeker-right-header-block">
                            <div class="job-seeker-right-header-block-left">
                                <p>Applications</p>
                                <b><?php echo $k; ?></b>
                            </div>

                            <div class="job-seeker-right-header-block-right" style="background-color: #0d7cc6;">
                                <img src="new_img/17.png" width="34px" height="31px" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="job-seeker-right-footer">
                    <div class="job-seeker-right-footer-hero-text">
                        <h1>Watch this space for announcements from PartiPpl. </h1>
                        <p>There are currently no announcements at this time.</p>
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

    <div id="pop_up_chat">
        <div class="chat_box" id="chat_box">
            <div id="close_chat_list_menu" onclick="close_chat_list()">x</div>

            <div id="chat_message_list"></div>        
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

        setInterval(function() {
            $("#chat_message_list").load("get_chat_message_list.php");
        }, 500);

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