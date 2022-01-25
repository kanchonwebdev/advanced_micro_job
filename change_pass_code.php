<?php
    include_once 'lib/Update_Query.php';
    include_once 'lib/Functions.php';

    $u_que = new Update_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $o_pass = $_POST['o_pass'];
        $n_pass = $_POST['n_pass'];
        
        Functions::data_validation($o_pass, 'o_pass', 'pass', '5', '11', 'none');
        Functions::data_validation($n_pass, 'n_pass', 'pass', '5', '11', 'none');

        if (Functions::$ok_alert == "ok") {
            $u_que->change_password($o_pass, $n_pass);
        }else {
            header("Location: change_password.php");
        }
    }else {
        header("Location: 404.php");
    }
?>