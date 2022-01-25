<?php
    include_once 'lib/Main_Query.php';

    $mn = new Main_Query();


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $e_id = $_POST['e_id'];
        $e_status = $_POST['e_status'];

        $mn->update_employe_status($e_id, $e_status);
    }
?>