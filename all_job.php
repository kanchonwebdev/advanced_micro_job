<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';

   error_reporting(0);

   $m_que = new Main_Query();
   $s_que = new Select_Query();

   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
       if (Session::show_value("u_type") == "jobseeker") {
           
       }else {
           header("Location: 404.php");
       }
   }else {
       header("Location: home.php");
   }

   $data = $s_que->select_all_job();

   

?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Jobs</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="stylesheet" href="css/all_job.css">
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
            <a href="all_employe.php">Browse Employers</a>
            </div>

            <div class="overlay-menu-block" id="o_menu_active">
            <img src="new_img/18.png" width="20px" alt="" id="o_menu_active_img">
            <a href="all_job.php" id="o_menu_active">Browse Jobs</a>
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

    <div class="all-job">
        <div class="all-job-container">
            <?php if ($data != false) { ?>
                <div class="all-job-header">
                    <h1>All Posted Jobs</h1>

                    <div class="filter-block">
                        <div class="filter-block-left">
                            <p>Filter by:</p>
                        </div>

                        <div class="filter-block-right">
                            <form>
                                <b>Most Recent</b>

                                <select name="s_other" id="sort_job" class="text-field">
                                    <option value="none">Select Option</option>
                                    <option value="new emp">New Employer</option>
                                    <option value="new">Recently Posted</option>
                                </select>
                            </form>

                            <form>
                                <b>Job Type</b>

                                <select name="s_type" id="sort_job_2" class="text-field">
                                    <option value="none">Select Option</option>
                                    <option value="Waiter">Waiter Jobs</option>
                                    <option value="Waitress">Waitress Jobs</option>
                                    <option value="Male Bartenders">Male Bartenders</option>
                                    <option value="Female Bartenders">Female Bartenders</option>
                                    <option value="Male Promotions">Male Promotions</option>
                                    <option value="Female Promotions">Female Promotions</option>
                                    <option value="Male Entertainer">Male Entertainer</option>
                                    <option value="Female Entertainer">Female Entertainer</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="all-job-content" id="all_job">
                <?php if ($data != false) { ?>
                    <?php foreach($data as $data2){ ?>
                        <div class="all-job-block">
                            <div class="all-job-block-left">
                                <div class="all-job-block-left-img">
                                    <img src="img/14.png" width="100%" height="100%" alt="">
                                </div>
                            </div>

                            <div class="all-job-block-right">
                                <div class="all-job-block-right-header">
                                    <h2><?php echo $data2['j_title'] ?></h2>
                                </div>

                                <div class="all-job-block-right-content">
                                    <div class="all-job-right-block">
                                        <img src="new_img/30.png" width="15px" alt="">

                                        <span><?php echo $data2['j_type'] ?></span>
                                    </div>

                                    <div class="all-job-right-block">
                                        <img src="new_img/30.png" width="15px" alt="">

                                        <span>Posted by: <b><?php echo $data2['u_name'] ?></b></span>
                                    </div>

                                    <div class="all-job-right-block">
                                        <img src="new_img/30.png" width="15px" alt="">

                                        <span><?php echo $data2['j_location'] ?></span>
                                    </div>

                                    <div class="all-job-right-block">

                                        <span style="display: flex;align-items: center">
                                            <?php 
                                                $x = explode("-", $data2['j_payment']);
                                                $y = $x[1];
                                            

                                                if (strlen($y) > 3) {
                                                    $z = str_split($y);

                                                    echo $x[0].' '.$z[0].','.$z[1].$z[2].$z[3];
                                                }else {
                                                    echo $x[0].' '.$y;
                                                }
                                            ?>
                                        </span>
                                    </div>
                                </div>

                                <div class="all-job-block-right-footer">
                                    <div class="btn" onclick="show_modal('<?php echo $data2['j_id'] ?>')">Read More</div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>

    <?php if ($data != false) { ?>
        <?php foreach($data as $data2){ ?>
            <?php $e_data = $s_que->select_employe_by_u_name($data2['u_name'])->fetch_assoc();?>

            <div class="single-job" id="<?php echo $data2['j_id'] ?>">
                <div class="single-job-container">
                    <div class="single-job-left">
                        <div class="single-job-left-header">
                            <h2>About the Job Poster</h2>

                            <div class="single-job-left-img">
                                <img src="all_img/<?php echo $e_data['u_img'] ?>" width="100%" height="100%" alt="">
                            </div>

                            <?php
                                $re_data = $s_que->select_all_review($data2['u_name']);
                                if ($re_data != false) {
                                $total_rating = 0;
                                $j = 0;
                                foreach($re_data as $data){
                                    $total_rating = $total_rating + $data['r_rating'];
                                    $j++;
                                }

                                $total_rating = ($total_rating / $j);
                                $total_rating = (int)$total_rating;
                            ?>
                            
                            <div class="rating-block">
                                <?php for($i = 0; $i < $total_rating; $i++){ ?>
                                    <img src="new_img/37.png" alt="" class="rate">
                                <?php } ?>
                            </div>
                                    
                                <div>Rated <?php echo $total_rating; ?> out of 5 Stars (<?php echo $j; ?> Ratings)</div>
                            <?php }else{ ?>
                                <p style="text-align: center">No Review Yet</p>
                            <?php } ?>

                            <div class="single-job-left-text">
                                <b><?php echo $e_data['f_name'] ?></b>
                                <div><?php echo $e_data['u_age'] ?> - <?php echo $e_data['u_gender'] ?> - <?php echo $e_data['u_location'] ?></div>
                            </div>
                        </div>

                        <div class="single-job-left-content">
                            <?php echo substr($e_data['u_description'], 0, 100).'.....'; ?>
                        </div>

                        <div class="single-job-left-footer">
                            <a href="employe_profile.php?e_id=<?php echo $e_data['u_id'] ?>" class="btn" target="_blank">View Profile</a>
                        </div>
                    </div>

                    <div class="single-job-right">
                        <div class="single-job-right-header">
                            <h1><?php echo $data2['j_title'] ?></h1>

                            <div class="single-job-right-header-content">
                                <div class="single-job-right-header-block">
                                    <img src="new_img/17.png" width="20px" height="100%" alt="">
                                    <p><?php echo $data2['j_location'] ?></p>
                                </div>

                                <?php
                                    $p_date = $data2['j_post_date'];
                                    $c_date = date("d-m-Y H:i:s");
        
                                    $dtNow = new DateTime($p_date);
                                    $dtToCompare = new DateTime($c_date);
        
                                    $diff = $dtNow->diff($dtToCompare);
        
                                    $m = (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i);
                                    $h = $diff->h + ($diff->days * 24);
                                    $d = $diff->days;
                                ?>

                                <div class="single-job-right-header-block">
                                    <img src="new_img/17.png" width="20px" height="100%" alt="">
                                    <p>
                                        Posted 
                                        <?php
                                            if($m > 60){
                                            echo $h.' hours ago';
                                            }elseif ($m > 1440) {
                                            echo $d.' days ago';
                                            }else{
                                            echo $m.' minutes ago';
                                            }
                                        ?> 
                                        by <b><?php echo $data2['u_name'] ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="single-job-right-content">
                            <div class="single-job-right-content-header">
                                <div class="single-job-right-content-header-block">
                                    <img src="new_img/17.png" width="20px" alt="">
                                    
                                    <?php
                                        $join_date = explode("-", $data2['j_booking_date']);
                                            
                                        $monthNum = $join_date[1];
                                        $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));

                                        $join_time = explode("-", $data2['j_booking_time']);
                                    ?>

                                    <p><?php echo $monthName; ?> <?php echo $join_date[0] ?>, at <?php echo $join_time[0] ?>:<?php echo $join_time[1] ?> <?php echo $join_time[2] ?></p>
                                </div>

                                <div class="single-job-right-content-header-block">
                                    <img src="new_img/17.png" width="20px" alt="">
                                    <p>Finished at 11:00 PM</p>
                                </div>

                                <div class="single-job-right-content-header-block">
                                    <img src="new_img/17.png" width="20px" alt="">
                                    <p><?php echo $data2['j_type'] ?></p>
                                </div>

                                <div class="single-job-right-content-header-block">
                                    <img src="new_img/17.png" width="20px" alt="">
                                    <p><?php echo $data2['j_work_hour'] ?> Hours of total work</p>
                                </div>

                                <div class="single-job-right-content-header-block">
                                    <img src="new_img/17.png" width="20px" alt="">

                                    <p>
                                        <?php 
                                            $x = explode("-", $data2['j_payment']);
                                            $y = $x[1];
                                        

                                            if (strlen($y) > 3) {
                                                $z = str_split($y);

                                                echo $x[0].' '.$z[0].','.$z[1].$z[2].$z[3];
                                            }else {
                                                echo $x[0].' '.$y;
                                            }
                                        ?>

                                        Total Payment
                                    </p>
                                </div>
                            </div>

                            <div class="single-job-right-content-footer">
                                <?php echo $data2['j_description'] ?>
                            </div>
                        </div>

                        <div class="single-job-right-footer">
                            
                            <?php
                                $a_data = $s_que->check_job_apply($data2['j_id']);
                                if ($a_data !=  false) {
                                    $a_data_2 = $a_data->fetch_assoc();
                            ?>

                            <p style="text-align: center">You Already Applied this Job.Your Apply <b><?php echo $a_data_2['a_status'] ?></b></p>

                            <?php }else { ?>

                                <form method="POST" action="job_apply_code.php" class="single-job-right-footer-header">
                                    <input type="hidden" name="j_id" value="<?php echo $data2['j_id'] ?>">


                                    <input type="hidden" name="post_by" value="<?php echo $data2['u_name'] ?>">

                                    <textarea name="a_description" id="" cols="10" rows="5" class="text-field-2" placeholder="In order to apply please explain your experience, and why you feel you are the best candidate for this job." maxlength="400" onkeyup="count_character(this)"></textarea>
                                    
                                    <div style="text-align: right"> <span id="count_char">0</span> / 400</div>

                                    <?php if(Session::show_value("a_description") != "" || Session::show_value("a_description") != NULL){ ?>
                                        <div class="err_bg" onclick="this.style.display='none'">
                                            <?php echo Session::show_value("a_description"); ?>
                                        </div>
                                    <?php } ?>
                                    
                                    <input type="submit" value="APPLY" class="btn">
                                </form>

                                <div class="single-job-right-footer-footer">
                                    <b>NB. </b> For your safety please do not share your personal information, eg. email, phone or address  
                                </div>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="close" onclick="close_modal('<?php echo $data2['j_id'] ?>')">x</div>
                </div>
            </div>
        <?php } ?>
    <?php }else{ ?> 
        <h2 style="text-align: center;margin-top: 50px;">Opp! No Job Found</h2> 
    <?php } ?>
    
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

        $(document).ready(function(){
            $("#sort_job").change(function() { 
                var userForm = $(this).serialize();  

                $.ajax({    
                type: "POST",
                url: "sort_job.php", 
                data: userForm,                          
                success: function(response){                    
                    $("#all_job").html(response);
                }
                });
            });

            $("#sort_job_2").change(function() { 
                var userForm = $(this).serialize();  

                $.ajax({    
                type: "POST",
                url: "sort_job_2.php", 
                data: userForm,                          
                success: function(response){                    
                    $("#all_job").html(response);
                }
                });
            });
        });

        var modal = document.getElementsByClassName("single-job");

        var span = document.getElementById("close");

        function show_modal(id) {
            for (let i = 0; i < modal.length; i++) {
                modal[i].style.display = 'none';
                document.getElementById(id).style.display = "flex";
            }
        }

        function close_modal(id){
            document.getElementById(id).style.display = "none";
        }

        function show_menu() {
            var menu = document.getElementById("menu");

            if (menu.className === "menu-2-content") {
                menu.className = "display";

            } else {
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

        function count_character(count_char){
            char_len = count_char.value;

            document.getElementById("count_char").innerHTML = char_len.length;
        }
    </script>
</body>

</html>

<?php
    Session::set_value("a_description", NULL);
?>