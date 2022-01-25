<?php
   include_once 'lib/Main_Query.php';
   $m_que = new Main_Query();
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
    <title>Post A New Job</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="stylesheet" href="css/job_post.css">
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

            <div class="overlay-menu-block" id="o_menu_active">
                <img src="new_img/18.png" width="20px" alt="" id="o_menu_active_img">
                <a href="send_offer_list.php" id="o_menu_active">Job Offers</a>
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

    <div class="job-post">
        <div class="job-post-container">
            <div class="job-post-left">
                <div class="job-post-left-logo">
                    <img src="new_img/20.png" width="100%" height="100%" alt="">
                </div>
                <div class="job-post-left-block">
                    <h1>Post a New Job</h1>
                    <p>
                        Use this form to post a new job. Remember when posting jobs to be as clear and specific as
                        possible.
                        Try to answer the questions of where, when, how much, what and how long.
                    </p>
                </div>
            </div>

            <form method="POST" action="job_post_code.php" class="job-post-right">
                <div class="job-post-right-block">
                    <input type="text" name="j_title" id="" placeholder="Job Title" class="text-field">
                </div>

                <?php if(Session::show_value("j_title") != "" || Session::show_value("j_title") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_title"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <select name="b_day" id="" class="text-field">
                        <option value="none">Day</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>

                    <select name="b_month" id="" class="text-field">
                        <option value="none">Month</option>
                        <option value="01">Jan</option>
                        <option value="02">Feb</option>
                        <option value="03">Mar</option>
                        <option value="04">Apr</option>
                        <option value="05">May</option>
                        <option value="06">Jun</option>
                        <option value="07">Jul</option>
                        <option value="08">Aug</option>
                        <option value="09">Sep</option>
                        <option value="10">Oct</option>
                        <option value="11">Nov</option>
                        <option value="12">Dec</option>
                    </select>

                    <select name="b_year" id="" class="text-field">
                        <option value="none">Year</option>
                        <option value="<?php echo Date('Y'); ?>"><?php echo Date('Y'); ?></option>
                    </select>
                </div>

                <?php if(Session::show_value("j_booking_date") != "" || Session::show_value("j_booking_date") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_booking_date"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <select name="b_hour" id="" class="text-field">
                        <option value="none">Hour</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>

                    <select name="b_minute" id="" class="text-field">
                        <option value="none">Minute</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="42">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                        <option value="46">46</option>
                        <option value="47">47</option>
                        <option value="48">48</option>
                        <option value="49">49</option>
                        <option value="50">50</option>
                        <option value="51">51</option>
                        <option value="52">52</option>
                        <option value="53">53</option>
                        <option value="54">54</option>
                        <option value="55">55</option>
                        <option value="56">56</option>
                        <option value="57">57</option>
                        <option value="58">58</option>
                        <option value="59">59</option>
                        <option value="60">60</option>
                    </select>

                    <select name="b_am" id="" class="text-field">
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>
                    </select>
                </div>

                <?php if(Session::show_value("j_booking_time") != "" || Session::show_value("j_booking_time") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_booking_time"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <select name="j_location" id="" class="text-field">
                        <option value="none">-- Select Location --</option>
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
                </div>

                <?php if(Session::show_value("j_location") != "" || Session::show_value("j_location") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_location"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <select name="j_type" id="" class="text-field">
                        <option value="none">-- Select Job Seeker Type --</option>
                        <option value="Waitress">Waitress</option>
                        <option value="Female Bartender">Female Bartender</option>
                        <option value="Female Promotions">Female Promotions</option>
                        <option value="Female Entertainer">Female Entertainer</option>
                        <option value="Waiter">Waiter</option>
                        <option value="Male Bartender">Male Bartender</option>
                        <option value="Male Promotions">Male Promotions</option>
                        <option value="Male Entertainer">Male Entertainer</option>
                    </select>
                </div>

                <?php if(Session::show_value("j_type") != "" || Session::show_value("j_type") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_type"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <input type="text" name="j_hour" id="" placeholder="Total Job Hours" class="text-field">
                </div>

                <?php if(Session::show_value("j_hour") != "" || Session::show_value("j_hour") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_hour"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <select name="j_pay_icon" id="" class="text-field">
                        <option value="₱">₱</option>
                    </select>

                    <input type="text" name="j_pay" id="" placeholder="Total Payment" class="text-field">
                </div>

                <?php if(Session::show_value("j_pay") != "" || Session::show_value("j_pay") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_pay"); ?>
                </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <textarea name="j_description" id="" cols="10" rows="5"
                        placeholder="Job Description here. Please be as detailed as possible."
                        class="text-field" maxlength="400" onkeyup="count_character(this)"></textarea>
                </div>

                <div style="text-align: right"> <span id="count_char">0</span> / 400</div>

                <?php if(Session::show_value("j_description") != "" || Session::show_value("j_description") != NULL){ ?>
                    <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("j_description"); ?>
                    </div>
                <?php } ?>

                <div class="job-post-right-block">
                    <input type="submit" value="Submit" class="btn">
                </div>
            </form>
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

    
   <?php  $data = $s_que->select_all_message(); ?>

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
    </script>
</body>

</html>

<?php
   Session::set_value("j_title", NULL);
   Session::set_value("j_booking_date", NULL);
   Session::set_value("j_booking_time", NULL);
   Session::set_value("j_location", NULL);
   Session::set_value("j_type", NULL);
   Session::set_value("j_hour", NULL);
   Session::set_value("j_pay", NULL);
   Session::set_value("j_description", NULL);
?>