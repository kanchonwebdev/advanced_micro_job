<?php 
    include_once 'Session.php';
    Session::session_start();
    class Functions{
        public static $ok_alert = "ok";
        public $empty_err_msg = "";

        public static function data_validation($data, $name, $type, $min_len, $max_len, $val){
            if ($type == "text") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "text") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "text") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "email") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }
            
            if ($type == "pass") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "number") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_number") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_number") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_number") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "date") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "date") {
                $cur_date = date('d-m-Y');

                if ($data <= $cur_date) {
                    $empty_err_msg = "<b>Error!</b> Invalid Date";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "select") {
                if ($data == "none") {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if($data == "mix_text"){
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_text") {
                if (empty($data)) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_text") {
                if (strlen($data) > $max_len) {
                    $empty_err_msg = "<b>Error!</b> Maximum Length ".$max_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_text") {
                if (strlen($data) < $min_len) {
                    $empty_err_msg = "<b>Error!</b> Minimum Length ".$min_len;
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "checkbox") {
                if ($data == NULL) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "checkbox") {
                if (count($data) == 0) {
                    $empty_err_msg = "<b>Error!</b> This Field should not be Empty";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "checkbox") {
                if ($val == "1") {
                    if (count($data) > 1) {
                        $empty_err_msg = "<b>Error!</b> Select One Option";
                        Session::set_value($name, $empty_err_msg);
                        self::$ok_alert = "not ok";
                        return;
                    }
                }
            }

            self::filter_data($data, $type);
            self::other_validation($data, $name, $type);
        }

        public static function filter_data($data, $type){
            if($type != "checkbox"){
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
            }
            
            return $data;
        }

        public static function other_validation($data, $name, $type){
            if ($type == "text") {
                if (!preg_match("/^[a-zA-Z-' ]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Letters and White space Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "number") {
                if (!preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                }
            }

            if ($type == "pass") {
                if (!preg_match("/^[a-zA-Z0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number and Letters Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "pass") {
                if (preg_match("/^[0-9]*$/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number Not Allowed Please combine Number and Letter these";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            
            if ($type == "pass") {
                if ((preg_match("/^[a-zA-Z]*$/",$data))) {
                    $empty_err_msg = "<b>Error!</b> Only Letters Not Allowed Please combine Number and Letters";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_text") {
                if (preg_match("/[^\r\n a-zA-Z0-9.,? ]/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Letters Number Comma Fullstop Question Mark are Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }

            if ($type == "mix_number") {
                if (preg_match("/[^0-9, ]/",$data)) {
                    $empty_err_msg = "<b>Error!</b> Only Number and Comma Allowed";
                    Session::set_value($name, $empty_err_msg);
                    self::$ok_alert = "not ok";
                    return;
                }
            }
        }

        public static function email_validation($data, $name){
            $data = filter_var($data, FILTER_SANITIZE_EMAIL);
            $data = filter_var($data, FILTER_VALIDATE_EMAIL);

            if (!$data) {
                $empty_err_msg = "<b>Error!</b> invalid email address";
                Session::set_value($name, $empty_err_msg);
                self::$ok_alert = "not ok";
            }
        }
    }
?>