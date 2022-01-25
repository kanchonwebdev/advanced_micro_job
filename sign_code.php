<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Basic_Query.php';

    $b_que = new Basic_Query();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $u_email = $_POST['u_email'];
        $u_name = $_POST['u_name'];
        $u_pass = $_POST['u_pass'];
        $b_day = $_POST['b_day'];
        $b_month = $_POST['b_month'];
        $b_year = $_POST['b_year'];
        $u_gender = $_POST['u_gender'];
        $u_type = $_POST['u_type'];

        Functions::data_validation($u_email, "u_email", "email", "0", "0", "0");
        Functions::data_validation($u_name, "u_name", "mix_text", "4", "11", "0");
        Functions::data_validation($u_pass, "u_pass", "pass", "5", "11", "0");
        Functions::data_validation($b_day, "b_date", "select", "0", "0", "0");
        Functions::data_validation($b_month, "b_date", "select", "0", "0", "0", "0");
        Functions::data_validation($b_year, "b_date", "select", "0", "0", "0");
        Functions::data_validation($u_gender, "u_gender", "checkbox", "0", "0", "1");
        Functions::data_validation($u_type, "u_type", "checkbox", "0", "0", "1");

        if (Functions::$ok_alert == "ok") {
            $gender = $u_gender[0];
            $type = $u_type[0];
            $b_date = $b_day."-".$b_month."-".$b_year;

            $b_que->sign_up($u_email, $u_name, $u_pass, $b_date, $gender, $type);
        }else {
            header("Location: sign_up.php");
        }
    }else {
        header("Location: 404.php");
    }
?>