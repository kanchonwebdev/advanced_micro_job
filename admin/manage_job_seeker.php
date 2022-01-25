<?php
    include_once 'lib/Main_Query.php';
    
    if (Session::show_value("a_name") == "" || Session::show_value("a_name") == NULL) {
        header("Location: login.php");
    }

    $mn = new Main_Query();

    $data = $mn->display_all_job_seeker();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin_dashboard.css">
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
                <a href="manage.php">Manage Job</a>
            </div>
            
            <div class="overlay-menu-block">
                <img src="new_img/18.png" width="20px" alt="">
                <a href="manage_employe.php">Manage Employe</a>
            </div>
            
            <div class="overlay-menu-block">
                <img src="new_img/18.png" width="20px" alt="">
                <a href="manage_job_seeker.php">Manage Job Seeker</a>
            </div>
            
            <div class="overlay-menu-block">
                <img src="new_img/18.png" width="20px" alt="">
                <a href="manage_copy_right.php">Manage Copy Right</a>
            </div>
            
            <div class="overlay-menu-block">
                <img src="new_img/18.png" width="20px" alt="">
                <a href="logout.php">Logout</a>
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
        <a href="manage.php">Manage Job</a>
        <a href="manage_employe.php">Manage Employe</a>
        <a href="manage_job_seeker.php">Manage Job Seeker</a>
        <a href="manage_copy_right.php">Manage Copy Right</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="job-seeker">
        <div class="job-seeker-container">
            <div class="job-seeker-right">
                <div class="job-content">
                    <div class="job-content-block">Job Seeker Name</div>
                    <div class="job-content-block">Join Date Date</div>
                    <div class="job-content-block">Status</div>
                    <div class="job-content-block">Action</div>
                </div>

                <?php if($data != false){ ?>
                    <?php foreach($data as $result){ ?>
                        <form method="POST" action="manage_job_seeker_code.php" class="job-content">
                            <div class="job-content-block"><?php echo $result['j_name']; ?></div>
                            <div class="job-content-block"><?php echo $result['j_date']; ?></div>
                            <div class="job-content-block"><?php echo $result['j_status']; ?></div>
                            <input type="hidden" name="j_status" value="<?php echo $result['j_status']; ?>">
                            <input type="hidden" name="j_id" value="<?php echo $result['j_id']; ?>">
                            <input type="submit" value="update" class="btn">
                        </form>
                    <?php } ?>
                <?php }else{ ?>
                    <h2 style="text-align: center">No Employe Available For Approved</h2>
                <?php } ?>
                <br><br>
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

    <script type="text/javascript">
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

    </script>
</body>
</html>

