<?php
    include_once 'lib/Session.php';
    Session::session_start();
    include 'lib/Database.php';

    class Main_Query{
        public function __construct(){
            $this->db = new Database();
        }

        //display all job
        public function display_all_job(){
            $sql = "SELECT * FROM tbl_job_post WHERE j_status  = 'Not Approved' ";
            $result = $this->db->select($sql);
            return $result;
        }

        //display all employe
        public function display_all_employe(){
            $sql = "SELECT * FROM tbl_employe ";
            $result = $this->db->select($sql);
            return $result;
        }

        //update employe status
        public function update_employe_status($e_id, $e_status){
            
            if ($e_status == "unblock") {
                $sql = "UPDATE tbl_employe SET e_status = 'block' WHERE e_id = '$e_id' ";
                $result = $this->db->update($sql);
            }else {
                $sql = "UPDATE tbl_employe SET e_status = 'unblock' WHERE e_id = '$e_id' ";
                $result = $this->db->update($sql);
            }

            if ($result) {
                header("Location: manage_employe.php");
            }
        }

        //display all job_seeker
        public function display_all_job_seeker(){
            $sql = "SELECT * FROM tbl_job_seeker ";
            $result = $this->db->select($sql);
            return $result;
        }

        //update employe status
        public function update_job_seeker_status($j_id, $j_status){
            
            if ($j_status == "unblock") {
                $sql = "UPDATE tbl_job_seeker SET j_status = 'block' WHERE j_id = '$j_id' ";
                $result = $this->db->update($sql);
            }else {
                $sql = "UPDATE tbl_job_seeker SET j_status = 'unblock' WHERE j_id = '$j_id' ";
                $result = $this->db->update($sql);
            }

            if ($result) {
                header("Location: manage_job_seeker.php");
            }
        }

        //display single job
        public function display_single_job($j_id){
            $sql = "SELECT * FROM tbl_job_post WHERE j_id  = '$j_id' ";
            $result = $this->db->select($sql);
            return $result;
        }

        public function approved_job($j_id){
            $sql = "UPDATE tbl_job_post SET j_status = 'Approved' WHERE j_id = '$j_id' ";
            $result = $this->db->update($sql);
            if ($result) {
                header("Location: manage.php");
            }
        }

        public function select_copy_right(){
            $sql = "SELECT * FROM tbl_copy_rights";
            $result = $this->db->select($sql);
            return $result;
        }

        public function update_copy_right($text_name){
            $sql = "UPDATE tbl_copy_rights SET copy_text_name = '$text_name' ";
            $result = $this->db->update($sql);
            
            if ($result) {
                header("Location: manage_copy_right.php");
            }
        }

        public function login($a_name, $a_pass){
            $sql = "SELECT * FROM tbl_admin WHERE a_name = '$a_name' AND a_pass = '$a_pass' ";
            $result = $this->db->select($sql);

            if ($result) {
                Session::set_value("a_name", $a_name);
                header("Location: index.php");
            }else {
                Session::set_value("admin_err","Login fail");
                header("Location: login.php");
            }
        }
    }
?>