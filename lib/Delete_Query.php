<?php
    include_once 'Session.php';
    Session::session_start();
    include 'Database.php';

    class Delete_Query{
        public function __construct(){
            $this->db = new Database();
        }

        
    }
?>