<?php
    include_once 'lib/Functions.php';
    include_once 'lib/Insert_Query.php';

    $i_que = new Insert_Query();
    
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $j_id = $_POST['j_id'];
        $post_by = $_POST['post_by'];
        $a_description = $_POST['a_description'];

        Functions::data_validation($a_description, "a_description", "mix_text", "150", "400", "0");

        if (Functions::$ok_alert == "ok") {
            $i_que->apply_job($j_id, $post_by, $a_description);
        }else {
            header("Location: all_job.php");
        }
    }else {
        header("Location: 404.php");
    }
?>