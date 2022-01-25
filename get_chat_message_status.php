<?php
    include_once 'lib/Select_Query.php';
    error_reporting(0);
    
    $s_que = new Select_Query();

    $received_by = $_SESSION['received_by_2'];
    
    $html = NULL;

    $data = $s_que->select_all_message_u_name($received_by); 

    if (Session::show_value("u_type") == "employer") {
        $j_data = $s_que->select_job_seeker_by_u_name($received_by)->fetch_assoc();
    }else{
        $j_data = $s_que->select_employe_by_u_name($received_by)->fetch_assoc();
    }

    $s_data = $s_que->select_login_info($received_by)->fetch_assoc();

    $html .= '<div class="chat_box_2_header">';
        $html .= '<b>'.$received_by.'</b>';
        if($s_data['active_status'] == 'active'){
            $html .= 'ONLINE NOW';
        }else{
            $html .= 'OFFLINE NOW';
        }
    $html .= '</div>';

    echo $html;
?>