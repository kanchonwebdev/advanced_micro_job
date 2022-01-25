<?php
    include_once 'lib/Main_Query.php';
    $m_que = new Main_Query();
    error_reporting(0);

    if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
        if (Session::show_value("u_type") == "employer") {
            $u_name = Session::show_value("u_name");
            $data = $m_que->check_employe_exist($u_name);

            if ($data != false) {
                header("Location: employe_dashboard.php");
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
    <title>Employe Profile Setup</title>
    <link rel="stylesheet" href="css/employe_profile_set_up.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>
<body>
    <div class="job-seeker">
        <form method="POST" action="employe_profile_set_up_code.php" class="job-seeker-container" enctype="multipart/form-data">
            <div class="job-seeker-header">
                <h1>Please Complete your Profile</h1>
                <p>Please complete your profile to use all the features of PartiPpl.</p>
            </div>

            <div class="job-seeker-content">
                <div class="job-seeker-left">
                    <div class="job-seeker-block">
                        <input type="text" name="f_name" placeholder="First Name" class="text-field" id="">
                    </div>

                    <?php if(Session::show_value("f_name") != "" || Session::show_value("f_name") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("f_name"); ?>
                        </div>
                    <?php } ?>

                    <div class="job-seeker-block">
                        <input type="text" name="l_name" placeholder="Last Name" class="text-field" id="">
                    </div>

                    <?php if(Session::show_value("l_name") != "" || Session::show_value("l_name") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("l_name"); ?>
                        </div>
                    <?php } ?>
                    
                    <div class="job-seeker-block">
                        <input type="file" name="u_img" placeholder="file" class="text-field" id="profile">
                    </div>
                    
                    <?php if(Session::show_value("u_img") != "" || Session::show_value("u_img") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("u_img"); ?>
                        </div>
                    <?php } ?>
                </div>

                <div class="job-seeker-right">
                    <div class="job-seeker-block">
                        <input type="text" name="u_nationality" placeholder="Nationality" class="text-field" id="">
                    </div>

                    <?php if(Session::show_value("u_nationality") != "" || Session::show_value("u_nationality") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("u_nationality"); ?>
                        </div>
                    <?php } ?>
                    
                    <div class="job-seeker-block">
                        <select name="u_location" id="" class="text-field">
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

                    <?php if(Session::show_value("u_location") != "" || Session::show_value("u_location") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("u_location"); ?>
                        </div>
                    <?php } ?>
                    
                    <div class="job-seeker-block">
                        <textarea name="u_text" id="" cols="10" rows="5" class="text-field" placeholder="About Me - Minimum 250 Characters" maxlength="400" onkeyup="count_character(this)"></textarea>
                        <div style="text-align: right"> <span id="count_char">0</span> / 400</div>
                    </div>
                    
                    <?php if(Session::show_value("u_text") != "" || Session::show_value("u_text") != NULL){ ?>
                        <div class="err_bg" onclick="this.style.display='none'">
                            <?php echo Session::show_value("u_text"); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <div class="job-seeker-footer">
                <input type="submit" value="Preview" class="btn" name="submit">
            </div>
        </form>
    </div>

    <script>
        function count_character(count_char){
            char_len = count_char.value;

            document.getElementById("count_char").innerHTML = char_len.length;
        }
    </script>
</body>
</html>

<?php
    Session::set_value("f_name", NULL);
    Session::set_value("l_name", NULL);
    Session::set_value("u_img", NULL);
    Session::set_value("u_nationality", NULL);
    Session::set_value("u_location", NULL);
    Session::set_value("u_text", NULL);
?>