<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Functions.php';
    $m_que = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $s_code = $_POST['s_code'];
        $n_pass = $_POST['n_pass'];

        Functions::data_validation($s_code, "s_code", "number", "5", "12", "0");
        Functions::data_validation($n_pass, "n_pass", "pass", "5", "12", "0");

        if (Functions::$ok_alert == "ok") {
            $m_que->update_password($s_code, $n_pass);
        }else {
            header("Location: update_pass.php");
        }
    }else {
        header("Location: 404.php");
    }
?>