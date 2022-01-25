<?php
    include_once 'lib/Select_Query.php';
    error_reporting(0);
    
    $s_que = new Select_Query();

    $received_by = $_SESSION['received_by'];
    $data = $s_que->select_all_message_u_name($received_by);

    $html = NULL;
    if ($data != false) {
        foreach($data as $data2){
            $p_date = $data2['c_date_time'];
            $c_date = date("y-m-d H:i:s");

            $dtNow = new DateTime($p_date);
            $dtToCompare = new DateTime($c_date);

            $diff = $dtNow->diff($dtToCompare);

            $m = (($diff->days * 24 * 60) + ($diff->h * 60) + $diff->i);
            $h = $diff->h + ($diff->days * 24);
            $d = $diff->days;

            $x = NULL;

            if($m > 24){
                $x = $h.' hours ago';
            }elseif ($m > 60) {
                $x = $d.' days ago';
            }else{
                $x = $m.' minutes ago';
            }

            if ($data2['sent_by'] == $received_by) {
                $html .= '<div class="message-details-left-block left">'.$data2['c_message'].'<br><br><p><i><small></small>'.$x.'</i></p></div>';
            }else {
                $html .= '<div class="message-details-left-block right">'.$data2['c_message'].'<br><br><p><i>'.$x.'</i></p></div>';
            }
        }
    }

    echo $html;
?>