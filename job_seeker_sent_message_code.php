<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';

    $i_que = new Insert_Query();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $message = $_POST['message'];
        $received_by = $_POST['received_by'];
        $e_id = $_POST['e_id'];

        Functions::data_validation($message, 'message', 'mix_text', '2', '250', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->job_seeker_sent_message($received_by, $message);
        }else {
            header("Location: job_seeker_profile.php?u_id=$e_id");
        }
    }

?>