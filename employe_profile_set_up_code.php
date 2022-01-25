<?php
    include_once 'lib/Functions.php';

    if (isset($_POST["submit"])) {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $u_img = $_FILES['u_img']['name'];
        $size = $_FILES['u_img']['size'] / 1024;
        $tmp_name = $_FILES['u_img']['tmp_name'];
        $u_nationality = $_POST['u_nationality'];
        $u_location = $_POST['u_location'];
        $u_text = $_POST['u_text'];
        $u_pro_img = NULL;


        Functions::data_validation($f_name, "f_name", "text", "3", "15", "none");
        Functions::data_validation($l_name, "l_name", "text", "3", "11", "none");
        Functions::data_validation($u_nationality, "u_nationality", "text", "2", "15", "none");
        Functions::data_validation($u_location, "u_location", "select", "0", "0", "none");
        Functions::data_validation($u_text, "u_text", "mix_text", "250", "400", "none");

        Functions::image_validation($u_img, "u_img", $size, "5", "2048", $tmp_name);

        if (Functions::$ok_alert == "ok") {
            if(is_array($_FILES)) {
                $file = $_FILES['u_img']['tmp_name']; 
                $sourceProperties = getimagesize($file);
                $fileNewName = time().'_'.rand();
                $folderPath = "all_img/";
                $ext = pathinfo($_FILES['u_img']['name'], PATHINFO_EXTENSION);
                $imageType = $sourceProperties[2];
        
        
                switch ($imageType) {
                    case IMAGETYPE_PNG:
                        $imageResourceId = imagecreatefrompng($file); 
                        $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                        imagepng($targetLayer,$folderPath. $fileNewName. "_thump.". "webp");

                        $u_pro_img = $fileNewName. "_thump."."webp";
                        break;
        
        
                    case IMAGETYPE_GIF:
                        $imageResourceId = imagecreatefromgif($file); 
                        $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                        imagegif($targetLayer,$folderPath. $fileNewName. "_thump.". "webp");
                        
                        $u_pro_img = $fileNewName. "_thump.". "webp";
                        break;
        
        
                    case IMAGETYPE_JPEG:
                        $imageResourceId = imagecreatefromjpeg($file); 
                        $targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                        imagejpeg($targetLayer,$folderPath. $fileNewName. "_thump.". "webp");
                        
                        $u_pro_img = $fileNewName. "_thump.". "webp";
                        break;
        
        
                    default:
                        echo "Invalid Image type.";
                        exit;
                        break;

                    Session::set_value("u_pro_img", $u_pro_img);
                }
            }

            $_SESSION['employe_data'] = array($f_name, $l_name, $u_pro_img, $u_nationality, $u_location, $u_text);
            header("Location: employe_preview.php");
        }else {
           header("Location: employe_profile_set_up.php");
        }
    }else{
        header("Location: 404.php");
    }

    function imageResize($imageResourceId,$width,$height) {
        $targetWidth =400;
        $targetHeight =400;
    
    
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
    
    
        return $targetLayer;
    }
?>