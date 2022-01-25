<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();
    $m_que = new Main_Query();

    error_reporting(0);

    if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
        if (Session::show_value("u_type") == "jobseeker") {
            $u_name = Session::show_value("u_name");
            $data = $m_que->check_jobseeker_exist($u_name);

            if ($data != false) {
                header("Location: job_seeker_dashboard.php");
            }

            if ($_SESSION['job_seeker_data'] == "" || $_SESSION['job_seeker_data'] == NULL) {
                header("Location: 404.php");
            }
        }else {
            header("Location: 404.php");
        }
    }else {
        header("Location: home.php");
    }

    $data = $s_que->select_jobseeker_sign_info();
    if ($data != false) {
        $result = $data->fetch_assoc();

        $cur_date = date('Y-m-d');
        $b_date = explode("-", $result['b_date']);
        $prev_date = $b_date[2].'-'.$b_date[1].'-'.$b_date[0];
        $changeDate = date("Y-m-d", strtotime($prev_date));

        //echo $changeDate;

        $diff = abs(strtotime($cur_date) - strtotime($changeDate));
        $age = floor($diff / (365*60*60*24));
        $gender = $result['u_gender'];
        $last_active = $result['last_activity'];
        $join_date = $result['join_date'];


        $_SESSION['login_info'] = array($age, $gender, $last_active, $join_date);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Seeker Profile</title>
    <link rel="stylesheet" href="css/employe_profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>
<body>
    <div class="job-seeker">
        <div class="job-seeker-header-container">
            <div class="job-seeker-header">
                <div class="job-seeker-header-left"></div>

                <div class="job-seeker-header-right">
                    <div class="job-seeker-header-right-header">
                        <h1><?php echo $_SESSION['job_seeker_data'][0]; ?></h1> 
                        <div class="online"><div class="active-dot"></div> Online</div>
                    </div>

                    <h2>Job Seeker</h2>

                    <div style="padding-top: 5px"><?php echo $_SESSION['login_info'][0] ?> - <?php echo $_SESSION['login_info'][1] ?> - <?php echo $_SESSION['job_seeker_data'][4] ?></div>
                </div>
            </div>
        </div>

        <div class="job-seeker-container">
            <div class="job-seeker-content">
                <div class="job-seeker-content-left">
                    <div class="job-seeker-content-left-header">
                        <img src="all_img/<?php echo $_SESSION['job_seeker_data'][2] ?>" width="100%" height="100%" alt="">
                    </div>

                    <div class="job-seeker-content-left-footer">
                        <div class="job-seeker-content-left-footer-block">
                            <div class="icon"><img src="new_img/30.png" width="100%" height="100%" alt=""></div>
                            
                            <?php
                                $date_arr = explode("-", $_SESSION['login_info'][3]);
                                
                                $monthNum = $date_arr[1];
                                $monthName = date("F", mktime(0, 0, 0, $monthNum, 10));
                            ?>

                            <span>Member Since <?php echo $date_arr[0]; ?> <?php echo $monthName; ?>, <?php echo $date_arr[2]; ?></span>
                        </div>

                        <div class="job-seeker-content-left-footer-block">
                            <div class="icon"><img src="new_img/31.png" width="100%" height="100%" alt=""></div>
                            
                            <?php
                                $join_arr_2 = explode(" ", $_SESSION['login_info'][2]);
                                $x = $join_arr_2[0];
                                $join_arr = explode("-", $x);

                                $monthNum_2 = $join_arr[1];
                                $monthName_2 = date("F", mktime(0, 0, 0, $monthNum_2, 10));
                            ?>
                            
                            <span>Last Logged in on <?php echo $join_arr[2]; ?> <?php echo $monthName_2; ?>, <?php echo $join_arr[0]; ?></span>
                        </div>

                        <div class="job-seeker-content-left-footer-block">
                            <div class="icon"><img src="new_img/32.png" width="100%" height="100%" alt=""></div>
                            <span><?php echo $_SESSION['job_seeker_data'][3] ?></span>
                        </div>
                    </div>
                </div>

                <div class="job-seeker-content-right">
                    <form action="job_seeker_preview_code.php" method="post" class="job-seeker-content-right-header" style="row-gap: 10px;" enctype="multipart/form-data">
                        <?php
                            for ($i=0; $i < count($_SESSION['job_seeker_data'][6]); $i++) { 
                        ?>
                            <div style="font-size: 28px;display: flex;column-gap: 50px;align-items: center;row-wrap: wrap;margin-bottom: 20px">
                                <?php echo $_SESSION['job_seeker_data'][6][$i] ?> - 
                                
                                <select name="j_interest[]" id="" class="text-field">
                                    <option value="<?php echo $_SESSION['job_seeker_data'][6][$i] ?> - Level 1">Level 1</option>
                                    <option value="<?php echo $_SESSION['job_seeker_data'][6][$i] ?> - Level 2">Level 2</option>
                                    <option value="<?php echo $_SESSION['job_seeker_data'][6][$i] ?> - Level 3">Level 3</option>
                                    <option value="<?php echo $_SESSION['job_seeker_data'][6][$i] ?> - Level 4">Level 4</option>
                                </select>
                            </div>
                        <?php } ?>
                        
                        <p>
                            <h3>Album One Picture</h3>
                            <input type="file" name="u_img_1" id="" class="text-field" onchange="preview()">

                            <?php if(Session::show_value("u_img_1") != "" || Session::show_value("u_img_1") != NULL){ ?>
                                <div class="err_bg" onclick="this.style.display='none'">
                                    <?php echo Session::show_value("u_img_1"); ?>
                                </div>
                            <?php } ?>
                        </p>

                        <p>
                            <h3>Album Two Picture</h3>
                            <input type="file" name="u_img_2" id="" class="text-field" onchange="preview2()">
                            
                            <?php if(Session::show_value("u_img_2") != "" || Session::show_value("u_img_2") != NULL){ ?>
                                <div class="err_bg" onclick="this.style.display='none'">
                                    <?php echo Session::show_value("u_img_2"); ?>
                                </div>
                            <?php } ?>
                        </p>

                        <p>
                            <h3>Album Three Picture</h3>
                            <input type="file" name="u_img_3" id="" class="text-field" onchange="preview3()">
                            
                            <?php if(Session::show_value("u_img_3") != "" || Session::show_value("u_img_3") != NULL){ ?>
                                <div class="err_bg" onclick="this.style.display='none'">
                                    <?php echo Session::show_value("u_img_3"); ?>
                                </div>
                            <?php } ?>
                        </p>

                        <input type="submit" value="Submit" class="btn" name="submit">
                    </form>

                    <div class="job-seeker-content-right-footer">
                        <div class="job-seeker-content-right-footer-block">
                            <img id="frame" src="" width="100%" height="100%"/>
                        </div>

                        <div class="job-seeker-content-right-footer-block">    
                            <img id="frame2" src="" width="100%" height="100%"/>
                        </div>

                        <div class="job-seeker-content-right-footer-block">    
                            <img id="frame3" src="" width="100%" height="100%"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="job-seeker-about">
                <div class="job-seeker-about-left">
                    <h2>About <?php echo $_SESSION['job_seeker_data'][0] ?></h2>
                </div>

                <div class="job-seeker-about-right">
                    <?php echo $_SESSION['job_seeker_data'][5] ?>
                </div>
            </div>
        </div>
        
        <script>
            function show_menu() {
                var menu = document.getElementById("menu");
    
                if (menu.className === "menu-2-content") {
                    menu.className = "display";
    
                } else {
                    menu.className = "menu-2-content";
                }
            }

            function preview() {
                frame.src=URL.createObjectURL(event.target.files[0]);
            }

            function preview2() {
                frame2.src=URL.createObjectURL(event.target.files[0]);
            }

            function preview3() {
                frame3.src=URL.createObjectURL(event.target.files[0]);
            }
        </script>
    </div>
</body>
</html>

<?php
    Session::set_value("u_img_1", NULL);
    Session::set_value("u_img_2", NULL);
    Session::set_value("u_img_3", NULL);
?>