<?php
    include_once 'lib/Main_Query.php';
    include_once 'lib/Functions.php';


    $mn = new Main_Query();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $text_name = $_POST['text_name'];

        Functions::data_validation($text_name, "text_name", "mix_text");

        if (Functions::$ok_alert == "ok") {
            $mn->update_copy_right($text_name);
        }else {
            header("Location: manage_copy_right.php");
        }
    }
?>