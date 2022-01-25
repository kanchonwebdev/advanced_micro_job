<?php
    include_once 'lib/Main_Query.php';
    $mn = new Main_Query();
    $mn->logout();
    

    Session::session_end();
    header("Location: home.php");
?>