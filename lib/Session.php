<?php
    Class Session{
        public function session_start(){
            if (!isset($_SESSION)) {
                session_start();
            }
        }

        public function set_value($key, $val){
            $_SESSION[$key] = $val;
        }

        public function show_value($key){
            return $_SESSION[$key];
        }

        public function remove_value($key){
            unset($_SESSION[$key]);
        }

        public function session_end(){
            session_destroy();
        }
    }
?>