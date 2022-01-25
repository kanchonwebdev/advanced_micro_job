<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';
    $i_que = new Insert_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $j_title = $_POST['j_title'];
        $b_day = $_POST['b_day'];
        $b_month = $_POST['b_month'];
        $b_year = $_POST['b_year'];
        $b_hour = $_POST['b_hour'];
        $b_minute = $_POST['b_minute'];
        $b_am = $_POST['b_am'];
        $j_location = $_POST['j_location'];
        $j_type = $_POST['j_type'];
        $j_hour = $_POST['j_hour'];
        $j_pay_icon = $_POST['j_pay_icon'];
        $j_pay = $_POST['j_pay'];
        $j_description = $_POST['j_description'];

        Functions::data_validation($j_title, 'j_title', 'text', '10', '65', 'none');
        Functions::data_validation($b_day, 'j_booking_date', 'select', '0', '0', 'none');
        Functions::data_validation($b_month, 'j_booking_date', 'select', '0', '0', 'none');
        Functions::data_validation($b_year, 'j_booking_date', 'select', '0', '0', 'none');
        Functions::data_validation($b_hour, 'j_booking_time', 'select', '0', '0', 'none');
        Functions::data_validation($b_minute, 'j_booking_time', 'select', '0', '0', 'none');
        Functions::data_validation($b_am, 'j_booking_time', 'select', '0', '0', 'none');
        Functions::data_validation($j_location, 'j_location', 'select', '0', '0', 'none');
        Functions::data_validation($j_type, 'j_type', 'select', '0', '0', 'none');
        Functions::data_validation($j_hour, 'j_hour', 'number', '1', '2', 'none');
        Functions::data_validation($j_pay, 'j_pay', 'number', '2', '5', 'none');
        Functions::data_validation($j_description, 'j_description', 'mix_text', '250', '400', 'none');

        $j_booking_date = $b_day.'-'.$b_month.'-'.$b_year;
        $j_booking_time = $b_hour.'-'.$b_minute.'-'.$b_am;
        $j_payment = $j_pay_icon.'-'.$j_pay;

        
        Functions::data_validation($j_booking_date, 'j_booking_date', 'date', '0', '0', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->post_a_job($j_title, $j_booking_date, $j_booking_time, $j_location, $j_type, $j_hour, $j_payment, $j_description);
        }else {
            header("Location: job_post.php");
        }


    }else {
        header("Location: 404.php");
    }
?>