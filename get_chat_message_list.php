<?php   
    include_once 'lib/Select_Query.php';

    $s_que = new Select_Query();

    $data = $s_que->select_all_message(); 
?>

<?php if($data != false){ ?>
    <?php foreach($data as $data2){ ?>
        
        <?php 
            $data3 = $s_que->select_all_message_by_chat_id($data2['g_name'])->fetch_assoc();
                    
            if (Session::show_value("u_type") == "employer") {
                if($data3['sent_by'] == Session::show_value("u_name")){
                $data4 = $s_que->select_job_seeker_by_u_name($data3['received_by'])->fetch_assoc();
                }else{
                $data4 = $s_que->select_job_seeker_by_u_name($data3['sent_by'])->fetch_assoc();
                }                              
            }
            
            if (Session::show_value("u_type") == "jobseeker"){
                if($data3['sent_by'] == Session::show_value("u_name")){
                $data4 = $s_que->select_employe_by_u_name($data3['received_by'])->fetch_assoc();
                }else{
                $data4 = $s_que->select_employe_by_u_name($data3['sent_by'])->fetch_assoc();
                }
            }
        ?>

        <?php if(Session::show_value("u_name") == $data3['sent_by']){ ?>
            <form class="chat_box_content" id="chat_form">
                <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                <input type="hidden" name="m_id" value="<?php echo $data3['received_by']?>">

                <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15); ?></span>
            </form>  
        <?php }else { ?>
            <form class="chat_box_content" id="chat_form">
                <img src="all_img/<?php echo $data4['u_img'] ?>" width="100%" height="100%" alt="">

                <input type="hidden" name="m_id" value="<?php echo $data3['sent_by']?>">

                <span onclick="show_chat_box()"><?php echo substr( $data3['c_message'], 0, 15); ?></span>
            </form>  
        <?php } ?>

    <?php } ?>
    <?php }else{ ?>
    <span>No Message Available Now</span>  
<?php } ?>