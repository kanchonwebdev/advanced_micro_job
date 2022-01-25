<?php
    include_once 'lib/Select_Query.php';
    $s_que = new Select_Query();

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $type = $_POST['e_status'];

        if ($type != "none") {
            if ($type == "active") {
                $data = $s_que->select_login_info_2($type);
            }else {
                $data  = $s_que->select_employe_by_type($type);
            }
        }else{
            $data = $s_que->select_all_employe();
        }

        $html = NULL;

        if ($type = "active") {
            if ($data != false) {
                foreach($data as $data3){
                    $data4 = $s_que->select_employe_by_u_name($data3['u_name']);

                    //if ($data4 != false) {
                        $data2 = $data4->fetch_assoc();

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
                    //}
                }
            }else {
                echo '<p style="text-align: center">No Jobseeker Found</p>';
            }
        }

        if ($type == "new") {
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
        }
        
        echo $html;
    }
?>