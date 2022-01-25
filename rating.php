<?php
   include_once 'lib/Main_Query.php';
   include_once 'lib/Select_Query.php';

   error_reporting(0);
   
   $m_que = new Main_Query();
   $s_que = new Select_Query();

   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
       if (Session::show_value("u_type") == "employer") {

    $data = $s_que->select_job_offer_by_id_2($_SESSION['apply_info'][0])->fetch_assoc();
    $data2 = $s_que->select_all_job_by_id($_SESSION['apply_info'][0])->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating Page</title>
    <link rel="stylesheet" href="css/rating.css">
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Reem+Kufi&display=swap" rel="stylesheet">
</head>

<body>
    <div class="rating">
        <div class="rating-container">
            <div class="rating-left">
                <div class="rating-left-header">
                    <h1>Rate <?php echo $data['apply_by'] ?></h1>
                </div>

                <div class="rating-left-image">
                    <img src="new_img/40.png" width="100%" height="100%" alt="">
                </div>
            </div>

            <form method="POST" action="rating_code.php" class="rating-right">
                <div class="rating-right-block">
                    <?php echo $data2['j_title'] ?>
                </div>

                <div class="rating-right-block">
                    <?php echo $data2['j_booking_date'] ?> And <?php echo $data2['j_location'] ?>
                </div>

                <div class="ratig-right-block">
                    <select name="r_rating" id="" class="text-field">
                        <option value="none">Select Rating</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                    </select>
                </div>

                <?php if(Session::show_value("r_rating") != "" || Session::show_value("r_rating") != NULL){ ?>
                    <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("r_rating"); ?>
                    </div>
                <?php } ?>
                
                <div class="ratig-right-block">
                    <textarea name="r_rating_text" id="" cols="10" rows="5" class="text-field"
                        placeholder="Please write your review of 'NAME' here.  Please tell everyone what you liked and why the job was awesome."></textarea>
                </div>

                <?php if(Session::show_value("r_rating_text") != "" || Session::show_value("r_rating_text") != NULL){ ?>
                    <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("r_rating_text"); ?>
                    </div>
                <?php } ?>

                <div class="rating-block">
                    <input type="submit" value="Submit" class="btn" name="e_rating">
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
        }
    }else {
        header("Location: 404.php");
    }
?>

<?php
   if (Session::show_value("u_name") != "" || Session::show_value("u_name") != NULL) {
       if (Session::show_value("u_type") == "jobseeker") {
           
    $data = $s_que->select_job_offer_by_id_2($_SESSION['apply_info'][0])->fetch_assoc();
    $data2 = $s_que->select_all_job_by_id($_SESSION['apply_info'][0])->fetch_assoc();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rating Page</title>
    <link rel="stylesheet" href="css/rating.css">
    <link rel="stylesheet" href="css/job_seeker_dashboard.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&display=swap" rel="stylesheet">
</head>

<body>
    <div class="rating">
        <div class="rating-container">
            <div class="rating-left">
                <div class="rating-left-header">
                    <h1>Rate <?php echo $data['post_by'] ?></h1>
                </div>

                <div class="rating-left-image">
                    <img src="new_img/40.png" width="100%" height="100%" alt="">
                </div>
            </div>

            <form method="POST" action="rating_code.php" class="rating-right">
                <div class="rating-right-block">
                    <?php echo $data2['j_title'] ?>
                </div>

                <div class="rating-right-block">
                    <?php echo $data2['j_booking_date'] ?> And <?php echo $data2['j_location'] ?>
                </div>

                <div class="rating-right-block">
                    <p>Did "NAME" show up on time?</p>

                    <div>
                        <label for="yes">Yes</label> <input type="checkbox" name="" id="yes" class="checkbox">
                        <label for="no">No</label> <input type="checkbox" name="" id="no" class="checkbox">
                    </div>
                </div>

                <div class="rating-right-block">
                    <p>Rate "Name" based on five stars.</p>
                </div>

                <div class="ratig-right-block">
                    <select name="r_rating" id="" class="text-field">
                        <option value="none">Select Rating</option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                    </select>
                </div>

                <?php if(Session::show_value("r_rating") != "" || Session::show_value("r_rating") != NULL){ ?>
                    <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("r_rating"); ?>
                    </div>
                <?php } ?>
                
                <div class="ratig-right-block">
                    <textarea name="r_rating_text" id="" cols="10" rows="5" class="text-field"
                        placeholder="Please write your review of 'NAME' here.  Please tell everyone what you liked and why the job was awesome."></textarea>
                </div>

                <?php if(Session::show_value("r_rating_text") != "" || Session::show_value("r_rating_text") != NULL){ ?>
                    <div class="err_bg" onclick="this.style.display='none'">
                        <?php echo Session::show_value("r_rating_text"); ?>
                    </div>
                <?php } ?>

                <div class="rating-block">
                    <input type="submit" value="Submit" class="btn" name="j_rating">
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
        }
    }else {
        header("Location: 404.php");
    }
?>