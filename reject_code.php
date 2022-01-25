<?php
    include_once 'lib/Update_Query.php';
    $u_que = new Update_Query();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $a_id = $_POST['a_id'];
        $j_id = $_POST['j_id'];
        $a_by = $_POST['a_by'];

        $u_que->update_apply_status($a_id, $j_id, $a_by);
    }
?>