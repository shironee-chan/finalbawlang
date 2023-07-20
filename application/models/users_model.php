<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class users_model extends CI_Model {

    public function __construct() {
        parent:: __construct();
    }

        function authentication($email , $password){
            $query = $this->db->query("SELECT *  FROM `admin` where email='$email' AND password = '$password' ");
            if ($query->num_rows() > 0) {
                return $query->result();
            }
                return 0;

        }

        public function delete_user($resident_id) {
            $this->db->delete('resident', array('resident_id' => $resident_id));
    
            if ($this->db->affected_rows() > 0) {
                return true; // Deletion successful
            } else {
                return false; // No rows deleted
            }
        }


        function fetch_all($table){
            $query = $this->db->query("SELECT * FROM $table ");
            return $query->result();

        }

/*
        function fetch_info() {
            $query = $this->db->query("SELECT * FROM `admin` ");
            return $query->result();

        }

        function fetch_webinfo() {
            $query = $this->db->query("SELECT * FROM `barangay_infos` ");
            return $query->result();

        }

        function insert_data($data) {
            $this->db->insert('admin', $data);
            $afftectedRows = $this->db->affected_rows();
            if (afftectedRows > 0) {
                return TRUE;
            }else {
                return FALSE;
            }
        }

        function insert_webdata($data) {
            $this->db->insert('barangay_infos', $data);
            $afftectedRows = $this->db->affected_rows();
            if (afftectedRows > 0) {
                return TRUE;
            }else {
                return FALSE;
            }
        }
*/
        function set_update($table,$id,$data) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update($table);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows > 0) {
                return TRUE;
            }else {
                return FALSE;
            }

        }

        public function getSettings() {
            $query = $this->db->get_where('resident', array('resident_id' => 1));
            return $query->row_array();
        }




        public function deleteuser($complains_id) {
            $this->db->delete('complainant_info', array('complains_id' => $complains_id));
    
            if ($this->db->affected_rows() > 0) {
                return true; // Deletion successful
            } else {
                return false; // No rows deleted
            }
        }

        function fetchall($table){
            $query = $this->db->query("SELECT * FROM $table ");
            return $query->result();

        }


        function setupdate($table,$id,$data) {
            $this->db->set($data);
            $this->db->where('id', $id);
            $this->db->update($table);
            $afftectedRows = $this->db->affected_rows();
            if ($afftectedRows > 0) {
                return TRUE;
            }else {
                return FALSE;
            }

        }
   
        public function get_Settings() {
            $query = $this->db->get_where('complainant_info', array('complains_id' => 1));
            return $query->row_array();
        }


}

?>