<?php
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $j_id = $_POST['j_id'];
        $j_status = $_POST['j_status'];

        $mn->update_job_seeker_status($j_id, $j_status);
    }
?>