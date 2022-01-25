<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Past Jobs</title>
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="stylesheet" href="css/past_job.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
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

    <div class="job-seeker">
        <div class="job-seeker-container">
            <div class="job-seeker-left">
                <a href="https://partippl.com" class="job-seeker-left-block" id="invert-img">
                    <img src="new_img/16.png" width="20px" alt="PartiPpl Logo">
                    <span>Overview</span>
                </a>

                <a href="#" class="job-seeker-left-block">
                    <img src="new_img/11.png" width="20px" alt="PartiPpl Logo">
                    <span>Inbox</span>
                </a>

                <a href="#" class="job-seeker-left-block">
                    <img src="new_img/12.png" width="20px" alt="PartiPpl Logo">
                    <span>Active Applications</span>
                </a>

                <a href="#" class="job-seeker-left-block">
                    <img src="new_img/13.png" width="20px" alt="">
                    <span>Job History</span>
                </a>

                <a href="#" class="job-seeker-left-block">
                    <img src="new_img/14.png" width="20px" alt="">
                    <span>Job Offers</span>
                </a>

                <a href="#" class="job-seeker-left-block">
                    <img src="new_img/15.png" width="20px" alt="">
                    <span>Home</span>
                </a>
            </div>

            <div class="job-seeker-right">
                <div class="past-job">
                    <div class="past-job-header">
                        <h1>Past Jobs for User</h1>
                    </div>

                    <div class="past-job-content">
                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>

                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>

                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>

                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>

                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>

                        <div class="past-job-block">
                            <div class="past-job-block-header">
                                <h3>Female Bartender Needed</h3>
                            </div>

                            <div class="past-job-block-content">
                                <div class="past-job-block-content-right">
                                    <img src="new_img/24.png" width="100%" height="100%" alt="">

                                    <div>
                                        <b>Kiran</b>
                                        <p>28 - Male - Cebu City</p>
                                    </div>
                                </div>
                            </div>

                            <div class="past-job-block-footer">
                                <div class="past-job-block-footer-block">
                                    <b>Application Status:</b>
                                    <span>Completed</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <b>Booking Date:</b>
                                    <span>June 26, 2021 8 PM</span>
                                </div>

                                <div class="past-job-block-footer-block">
                                    <a href="#" class="btn">Write a Thank You</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
    </script>
</body>

</html>