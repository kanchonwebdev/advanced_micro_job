<?php
include_once 'lib/Insert_Query.php';
include_once 'lib/Functions.php';
$i_que = new Insert_Query();

if (isset($_POST["submit"])) {
    $u_img_1 = $_FILES['u_img_1']['name'];
    $size_1 = $_FILES['u_img_1']['size'] / 1024;
    $tmp_name_1 = $_FILES['u_img_1']['tmp_name'];

    $u_img_2 = $_FILES['u_img_2']['name'];
    $size_2 = $_FILES['u_img_2']['size'] / 1024;
    $tmp_name_2 = $_FILES['u_img_2']['tmp_name'];

    $u_img_3 = $_FILES['u_img_3']['name'];
    $size_3 = $_FILES['u_img_3']['size'] / 1024;
    $tmp_name_3 = $_FILES['u_img_3']['tmp_name'];
    
    Functions::image_validation($u_img_1, "u_img_1", $size_1, "5", "2048", $tmp_name_1);
    Functions::image_validation($u_img_2, "u_img_2", $size_2, "5", "2048", $tmp_name_2);
    Functions::image_validation($u_img_3, "u_img_3", $size_3, "5", "2048", $tmp_name_3);

    $u_alb_img_1 = NULL;
    $u_alb_img_2 = NULL;
    $u_alb_img_3 = NULL;

    if (Functions::$ok_alert == "ok") {
        if (is_array($_FILES)) {
            $file = $_FILES['u_img_1']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = time().'_'.rand();
            $folderPath = "all_img/";
            $ext = "webp";
            $imageType = $sourceProperties[2];

            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_1 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_1 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_1 = $fileNewName . "_thump." . $ext;
                    break;

                default:
                    echo "Invalid Image type.";
                    exit;
                    break;
            }
        }

        if (is_array($_FILES)) {
            $file = $_FILES['u_img_2']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = time()."_".rand();
            $folderPath = "all_img/";
            $ext = "webp";
            $imageType = $sourceProperties[2];

            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_2 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_2 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_2 = $fileNewName . "_thump." . $ext;
                    break;

                default:
                    echo "Invalid Image type.";
                    exit;
                    break;
            }
        } 

        if (is_array($_FILES)) {
            $file = $_FILES['u_img_3']['tmp_name'];
            $sourceProperties = getimagesize($file);
            $fileNewName = time()."_".rand();
            $folderPath = "all_img/";
            $ext = "webp";
            $imageType = $sourceProperties[2];

            switch ($imageType) {
                case IMAGETYPE_PNG:
                    $imageResourceId = imagecreatefrompng($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagepng($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_3 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_3 = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img_3 = $fileNewName . "_thump." . $ext;
                    break;

                default:
                    echo "Invalid Image type.";
                    exit;
                    break;
            }
        }

        $j_interest = NULL;

        for ($i=0; $i < count($_POST['j_interest']); $i++) { 
            $j_interest .= $_POST['j_interest'][$i].'_';
        }

        $i_que->job_seeker_profile_set_up($u_alb_img_1, $u_alb_img_2, $u_alb_img_3, $j_interest);
    } else {
        header("Location: job_seeker_preview.php");
    }


} else {
    header("Location: 404.php");
}

function imageResize($imageResourceId, $width, $height)
{
    $targetWidth = 400;
    $targetHeight = 400;

    $targetLayer = imagecreatetruecolor($targetWidth, $targetHeight);
    imagecopyresampled($targetLayer, $imageResourceId, 0, 0, 0, 0, $targetWidth, $targetHeight, $width, $height);

    return $targetLayer;
}
