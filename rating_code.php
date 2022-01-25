<?php
    include_once 'lib/Insert_Query.php';
    include_once 'lib/Functions.php';

    $i_que = new Insert_Query();

    if (isset($_POST['e_rating'])) {
        $r_rating = $_POST['r_rating'];
        $r_rating_text = $_POST['r_rating_text'];

        Functions::data_validation($r_rating, 'r_rating', 'select', '0', '0', 'none');
        Functions::data_validation($r_rating_text, 'r_rating_text', 'mix_text', '10', '150', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_employe_rating($r_rating, $r_rating_text);
        }else {
            header("Location: rating.php");
        }
    }

    if (isset($_POST['j_rating'])) {
        $r_rating = $_POST['r_rating'];
        $r_rating_text = $_POST['r_rating_text'];

        Functions::data_validation($r_rating, 'r_rating', 'select', '0', '0', 'none');
        Functions::data_validation($r_rating_text, 'r_rating_text', 'mix_text', '10', '150', 'none');

        if (Functions::$ok_alert == "ok") {
            $i_que->insert_job_seeker_rating($r_rating, $r_rating_text);
        }else {
            header("Location: rating.php");
        }
    }
?>