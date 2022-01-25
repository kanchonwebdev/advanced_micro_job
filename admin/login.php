<?php
    include_once 'lib/Session.php';
    Session::session_start();
    error_reporting(0);

    if (Session::show_value("a_name") != "" || Session::show_value("a_name") != NULL) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>
<body>
    <div class="login">
        <div class="login-container">
            <div class="login-content">
                <div class="login-left">
                    <div class="login-left-text-block">
                        <div class="login-left-text-1">Post a Job <div class="hide-div"></div>
                        </div>
                        <div class="login-left-text-2">Get Applications <div class="hide-div-2"></div>
                        </div>
                        <div class="login-left-text-3">Hire, and Party! <div class="hide-div-3"></div>
                        </div>
                    </div>

                    <div class="login-left-footer">
                        <div class="women">
                            <img src="new_img/2.png" width="100%" height="100%" alt="">
                        </div>

                        <div class="plant">
                            <img src="new_img/3.png" width="100%" height="100%" alt="">
                        </div>
                    </div>
                </div>

                <form action="login_code.php" method="post" class="login-right">
                    <div class="login-right-header">
                        <h1>Welcome Back!</h1>
                        <span>Login to get access</span>
                    </div>

                    <div class="login-right-content">
                        <div class="login-right-block">
                            <img src="new_img/user.png" width="15px" height="100%" alt="" style="margin: 0px 15px">
                            <input type="text" name="a_name" placeholder="Admin Name" class="text-field">
                        </div>

                        <?php if(Session::show_value("a_name") != ""){ ?>
                            <?php echo Session::show_value("a_name"); ?>
                        <?php } ?>

                        <div class="login-right-block">
                            <img src="new_img/lock.png" width="15px" height="100%" alt="" style="margin: 0px 15px">
                            <input type="password" name="a_pass" placeholder="Admin Password" id="" class="text-field">
                        </div>

                        <?php if(Session::show_value("a_pass") != ""){ ?>
                            <?php echo Session::show_value("a_pass"); ?>
                        <?php } ?>
                        
                    </div>

                    <div class="login-right-footer">
                        <input type="submit" value="Login" name="login" class="btn" id="login">
                    </div>
                </form>
            </div>

            <div class="login-footer-text">
                <div>
                    <a href="#">Copyright Reserved @2021</a>
                </div>

                <div>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
