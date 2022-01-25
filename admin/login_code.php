<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a_name = $_POST['a_name'];
        $a_pass = $_POST['a_pass'];

        Functions::data_validation($a_name, 'a_name', 'text', '2', '15','none_val');
        Functions::data_validation($a_pass, 'a_pass', 'pass', '2', '15','none_val');

        if (Functions::$ok_alert == "ok") {
            $mn->login($a_name, $a_pass);
        }else{
            header("Location: login.php");
        }
    }
?>