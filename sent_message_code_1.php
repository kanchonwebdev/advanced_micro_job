<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';

    $i_que = new Insert_Query();

    if (isset($_POST['j_message'])) {
        $message = $_POST['message'];
        $received_by = $_POST['received_by'];
        $e_id = $_POST['e_id'];

        Functions::data_validation($message, 'message', 'mix_text', '2', '250', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->employe_sent_message($received_by, $message);
        }else {
            header("Location: employe_profile.php?e_id=$e_id");
        }
    }

?>