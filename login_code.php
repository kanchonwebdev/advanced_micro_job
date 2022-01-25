
<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Ajax_Functions.php';

    $que = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $u_email = $_POST['u_email'];
        $u_pass = $_POST['u_pass'];

        Ajax_Functions::data_validation($u_email, "u_email", "email", "0", "0", "none");
        
        if (Ajax_Functions::$ok_alert == "ok") {
            Ajax_Functions::data_validation($u_pass, "u_pass", "pass", "5", "11", "none");
        }

        if (Ajax_Functions::$ok_alert == "ok") {
            $que->login($u_email, $u_pass);
        }

        echo Session::show_value("msg");
        
    }
?>

