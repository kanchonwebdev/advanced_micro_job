<?php
    include_once 'lib/Main_Query.php';
    $mn = new Main_Query();
    
    Session::session_end();
    header("Location: login.php");
?>