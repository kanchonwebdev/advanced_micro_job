<?php
    include_once 'lib/Select_Query.php';
    $s_que = new Select_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $j_status = $_POST['j_status'];

        if ($j_status != "none") {
            if ($j_status == "new") {
                $data = $s_que->select_job_seeker_by_status($j_status);
            }else {
                $data = $s_que->select_online_job_seeker();
            }
        }else{
            $data = $s_que->select_all_job_seeker();
        }

        $html = NULL;

        if ($j_status == "new") {
            if ($data != false) {
                foreach($data as $data2){
                    $html .= '<div class="all-job-seeker-block">';

                    $html .= '<div class="all-job-seeker-block-header">
                                <img src="all_img/'.$data2['u_img'].'" width="100%" height="100%" alt="">
                            </div>';
                    
                    $html .= '<div class="all-job-seeker-block-details">
                                <h1>'.$data2['f_name'].'</h1>
                                <div>'.$data2['u_age'].' - '.$data2['u_gender'].' - '.$data2['u_location'].'</div>
                            </div>';

                    $html .= '<div class="all-job-seeker-block-text">'.substr($data2['u_description'], 0, 100).'....'.'</div>';

                    $html .= '<a href="job_seeker_profile.php?u_id='.$data2['u_id'].'" target="blank" class="btn">View Profile</a>';

                    $html .= '</div>';
                }
            }else {
                echo '<p style="text-align: center">No Jobseeker Found</p>';
            }
        }else {
            if ($data != false) {
                foreach($data as $data3){

                    $data2 = $s_que->select_job_seeker_by_u_name($data3['u_name'])->fetch_assoc();

                    $html .= '<div class="all-job-seeker-block">';

                    $html .= '<div class="all-job-seeker-block-header">
                                <img src="all_img/'.$data2['u_img'].'" width="100%" height="100%" alt="">
                            </div>';
                    
                    $html .= '<div class="all-job-seeker-block-details">
                                <h1>'.$data2['f_name'].'</h1>
                                <div>'.$data2['u_age'].' - '.$data2['u_gender'].' - '.$data2['u_location'].'</div>
                            </div>';

                    $html .= '<div class="all-job-seeker-block-text">'.substr($data2['u_description'], 0, 100).'....'.'</div>';

                    $html .= '<a href="job_seeker_profile.php?u_id='.$data2['u_id'].'" target="blank" class="btn">View Profile</a>';

                    $html .= '</div>';
                }
            }else {
                echo '<p style="text-align: center">No Jobseeker Found</p>';
            }
        }

        echo $html;
    }
?>