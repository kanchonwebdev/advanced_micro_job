<?php
    include_once 'lib/Update_Query.php';

    $u_que = new Update_Query();

    if (isset($_POST['accept'])) {
        $j_id = $_POST['j_id'];
        $a_id = $_POST['a_id'];

        $u_que->update_apply_status2($j_id, $a_id);
    }

    if (isset($_POST['reject'])) {
        $j_id = $_POST['j_id'];
        $a_id = $_POST['a_id'];
        
        $u_que->update_apply_status3($j_id, $a_id);
    }
?>