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
                        <h1>Forget Password at PartiPpl?</h1>
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

                <form action="forget_pass_code.php" method="post" class="sign-right">
                    <div class="sign-right-header">
                        <?php if(Session::show_value("forget_err_msg") != "" || Session::show_value("sign_err_msg") != NULL){ ?>
                            <div class="err_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("forget_err_msg"); ?>
                            </div>
                        <?php } ?>
                        
                        <div class="sign-right-header-block">
                            <input type="email" name="u_email" id="" placeholder="Email" class="text-field">
                        </div>

                        <?php if(Session::show_value("u_email") != "" || Session::show_value("u_email") != NULL){ ?>
                            <div class="err_bg" onclick="this.style.display='none'">
                                <?php echo Session::show_value("u_email"); ?>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="sign-right-footer">
                        <input type="submit" value="Submit Now" class="btn">
                        <a href="home.php">Already a Member?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php 
    Session::set_value("forget_err_msg", NULL);
    Session::set_value("u_email", NULL);
?>