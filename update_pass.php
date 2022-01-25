<?php
    include_once 'lib/Session.php';
    Session::session_start();
    error_reporting(0);

    
    if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
        header("Location: home.php");
    }
?>

<!DOCTYPE html>
<html lang="en-ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forget Password</title>
    <link rel="stylesheet" href="css/sign_up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sign">
        <div class="sign-container">
            <div class="sign-header">
                <div class="sign-logo">
                    <a href="https://partippl.com">
                        <img src="new_img/partippl-blue.png" width="100%">
                    </a>
                </div>
            </div>

            <div class="sign-content" style="align-items: center">
                <div class="sign-left">
                    <div class="sign-left-header">
                        <h1>Change Password at PartiPpl?</h1>
                    </div>

                    <div class="sign-left-content">
                        <img src="new_img/1.png" width="100%" height="100%" alt="">
                    </div>

                    <div class="sign-left-footer">
                        PartiPpl is free for now, and will always be for
                        job seekers! Always find the best people for your
                        party, and find them now!
                    </div>
                </div>

                <form action="update_pass_code.php" method="post" class="sign-right">
                    <div class="sign-right-header">
                        <?php if(Session::show_value("forget_err_msg_2") != "" || Session::show_value("forget_err_msg_2") != NULL){ ?>
                            <div class="suc_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("forget_err_msg_2"); ?>
                            </div>
                        <?php } ?>

                        <?php if(Session::show_value("forget_err_msg_3") != "" || Session::show_value("forget_err_msg_3") != NULL){ ?>
                            <div class="suc_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("forget_err_msg_3"); ?>
                            </div>
                        <?php } ?>
                        
                        <div class="sign-right-header-block">
                            <input type="text" name="s_code" id="" placeholder="Security Code" class="text-field">
                        </div>

                        <?php if(Session::show_value("s_code") != "" || Session::show_value("s_code") != NULL){ ?>
                            <div class="err_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("s_code"); ?>
                            </div>
                        <?php } ?>
                        
                        <div class="sign-right-header-block">
                            <input type="password" name="n_pass" id="" placeholder="New Password" class="text-field">
                        </div>

                        <?php if(Session::show_value("n_pass") != "" || Session::show_value("n_pass") != NULL){ ?>
                            <div class="err_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("n_pass"); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="sign-right-footer">
                        <input type="submit" value="Submit Now" class="btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    Session::set_value("forget_err_msg_2", NULL);
    Session::set_value("forget_err_msg_3", NULL);
    Session::set_value("s_code", NULL);
    Session::set_value("n_pass", NULL);
?>