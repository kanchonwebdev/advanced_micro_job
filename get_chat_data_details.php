<?php
    error_reporting(0);
    include_once 'lib/Select_Query.php';

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

    /*$html .= '<div class="chat_box_2_header">';
        if($s_data['active_status'] == 'active'){
            $html .= '<b>Online Now</b>';
        }else{
            $html .= '<p>Offline Now</p>';
        }
    $html .= '</div>';*/
    
    foreach($data as $data2){

        if ($data2['sent_by'] == $received_by) {
            $html .= '<div class="chat_box_2_block left">'.$data2['c_message'].'</div>';
        }else {
            $html .= '<div class="chat_box_2_block right">'.$data2['c_message'].'</div>';
        }
    }

    echo $html;
?>