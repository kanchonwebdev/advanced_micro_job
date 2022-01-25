<?php
    include_once 'lib/Main_Query.php';
    $que = new Main_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $que->sign_up();
    }else {
        header("Location: 404.php");
    }
?>