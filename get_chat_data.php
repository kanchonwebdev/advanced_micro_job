<?php
    include_once 'lib/Session.php';
    Session::session_start();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        echo $m_id = $_POST['m_id'];
    
        $_SESSION['received_by_2'] = $m_id;
        
    }
?>