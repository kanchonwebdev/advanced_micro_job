<?php
include_once 'lib/Update_Query.php';
include_once 'lib/Functions.php';
$u_que = new Update_Query();

if (isset($_POST["submit"])) {
    $u_img = $_FILES['u_img']['name'];
    $size = $_FILES['u_img']['size'] / 1024;
    $tmp_name = $_FILES['u_img']['tmp_name'];

    $u_img_1 = $_FILES['u_img_1']['name'];
    $size_1 = $_FILES['u_img_1']['size'] / 1024;
    $tmp_name_1 = $_FILES['u_img_1']['tmp_name'];

    $u_img_2 = $_FILES['u_img_2']['name'];
    $size_2 = $_FILES['u_img_2']['size'] / 1024;
    $tmp_name_2 = $_FILES['u_img_2']['tmp_name'];

    $u_img_3 = $_FILES['u_img_3']['name'];
    $size_3 = $_FILES['u_img_3']['size'] / 1024;
    $tmp_name_3 = $_FILES['u_img_3']['tmp_name'];
    
    $u_location = $_POST['u_location'];
    $u_description = $_POST['u_description'];

    Functions::image_validation($u_img, "u_img", $size, "20", "2048", $tmp_name);
    Functions::image_validation($u_img_1, "u_img_1", $size_1, "20", "2048", $tmp_name_1);
    Functions::image_validation($u_img_2, "u_img_2", $size_2, "20", "2048", $tmp_name_2);
    Functions::image_validation($u_img_3, "u_img_3", $size_3, "20", "2048", $tmp_name_3);
    Functions::data_validation($u_description, "u_description", 'mix_text', "250", "400", 'none');

    $u_alb_img = NULL;
    $u_alb_img_1 = NULL;
    $u_alb_img_2 = NULL;
    $u_alb_img_3 = NULL;

    if (Functions::$ok_alert == "ok") {
        if (is_array($_FILES)) {
            $file = $_FILES['u_img']['tmp_name'];
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

                    $u_alb_img = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_GIF:
                    $imageResourceId = imagecreatefromgif($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagegif($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img = $fileNewName . "_thump." . $ext;
                    break;

                case IMAGETYPE_JPEG:
                    $imageResourceId = imagecreatefromjpeg($file);
                    $targetLayer = imageResize($imageResourceId, $sourceProperties[0], $sourceProperties[1]);
                    imagejpeg($targetLayer, $folderPath . $fileNewName . "_thump." . $ext);

                    $u_alb_img = $fileNewName . "_thump." . $ext;
                    break;

                default:
                    echo "Invalid Image type.";
                    exit;
                    break;
            }
        }

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
            $fileNewName = time().'_'.rand();
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

        $u_que->update_employe_profile($u_alb_img,$u_alb_img_1, $u_alb_img_2, $u_alb_img_3,$u_location,$u_description);
    } else {
        header("Location: employe_edit_profile.php");
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
