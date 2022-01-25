<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';


    $i_que = new Insert_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $j_location = $_POST['j_location'];
        $d_code = $_POST['d_code'];
        $a_id = $_POST['a_id'];
        $j_id = $_POST['j_id'];
        $a_by = $_POST['apply_by'];
        $p_by = $_POST['post_by'];

        Functions::data_validation($j_location, 'j_location', 'text', '5', '55', 'none');
        Functions::data_validation($d_code, 'd_code', 'text', '5', '11', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->send_offer($j_location, $d_code, $a_id, $j_id, $a_by, $p_by);
        }else {
            header("Location: employer_active_job.php?j_id=".$j_id);
        }
    }
?>