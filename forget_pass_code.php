<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Functions.php';
    $m_que = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $u_email = $_POST['u_email'];

        Functions::data_validation($u_email, "u_email", "email", "0", "0", "0");

        if (Functions::$ok_alert == "ok") {
            $m_que->forget_password($u_email);
        }else {
            header("Location: forget_pass.php");
        }
    }else {
        header("Location: 404.php");
    }
?>