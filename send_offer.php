<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();
    $m_que = new Main_Query();

    error_reporting(0);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Employer Profile</title>
    <link rel="stylesheet" href="css/employe_profile.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>
<body>

    <br><br><br><br><br>
    <div class="job-seeker-container">
        <form action="send_offer_code.php" method="post">
            <input type="text" name="j_location" placeholder="Job Location" class="text-field" id="">
            
            <?php if(Session::show_value("j_location") != "" || Session::show_value("j_location") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("j_location"); ?>
                </div>
            <?php } ?>
            
            <input type="text" name="d_code" placeholder="Dress Code" class="text-field" id="">

            <?php if(Session::show_value("d_code") != "" || Session::show_value("d_code") != NULL){ ?>
                <div class="err_bg" onclick="this.style.display='none'">
                    <?php echo Session::show_value("d_code"); ?>
                </div>
            <?php } ?>

            <input type="submit" value="Send Offer" class="btn">
        </form>
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
</body>
</html>

<?php
    Session::set_value("u_img_1", NULL);
    Session::set_value("u_img_2", NULL);
    Session::set_value("u_img_3", NULL);
?>