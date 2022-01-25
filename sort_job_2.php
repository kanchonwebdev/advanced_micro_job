<?php
    include_once 'lib/Select_Query.php';
    $s_que = new Select_Query();
    error_reporting(0);

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $type = $_POST['s_type'];

        $data = $s_que->select_job_post_by_type($type);

        $html = NULL;

        if ($data != false) {
            foreach($data as $data2){
                $x = explode("-", $data2['j_payment']);
                $y = $x[1];
                                        
                if (strlen($y) > 3) {
                    $z = str_split($y);

                    $xx = $x[0].' '.$z[0].','.$z[1].$z[2].$z[3];
                }else {
                    $xx = $x[0].' '.$y;
                }

                $html .= '
                    <div class="all-job-block">
                        <div class="all-job-block-left">
                            <div class="all-job-block-left-img">
                                <img src="img/14.png" width="100%" height="100%" alt="">
                            </div>
                        </div>

                        <div class="all-job-block-right">
                            <div class="all-job-block-right-header">
                                <h2>'.$data2['j_title'].'</h2>
                            </div>

                            <div class="all-job-block-right-content">
                                <div class="all-job-right-block">
                                    <img src="new_img/30.png" width="15px" alt="">

                                    <span>'.$data2['j_type'].'</span>
                                </div>

                                <div class="all-job-right-block">
                                    <img src="new_img/30.png" width="15px" alt="">

                                    <span>Posted by: <b>'.$data2['u_name'].'</b></span>
                                </div>

                                <div class="all-job-right-block">
                                    <img src="new_img/30.png" width="15px" alt="">

                                    <span>'.$data2['j_location'].'</span>
                                </div>

                                <div class="all-job-right-block">
                                    <span style="display: flex;align-items: center">'.$xx.'</span>
                                </div>
                            </div>

                            <div class="all-job-block-right-footer">
                                <div class="btn" onclick="show_modal('.$data2['j_id'].')">Read More</div>
                            </div>
                        </div>
                    </div>
                ';
            }
        }else {
            echo '<p style="text-align: center">No Jobseeker Found</p>';
        }

        echo $html;
    }
?>