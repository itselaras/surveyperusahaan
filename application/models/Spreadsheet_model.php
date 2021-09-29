<?php
class Spreadsheet_model extends CI_Model {
    
    function insert($table, $data)
    {
    	$this->db->insert($table,$data);
    	return $this->db->insert_id();
    }
    
    function get($tabel, $where)
    {
    	$this->db->select("*");
    	$this->db->from($tabel);
    	$this->db->where($where);
    	return $this->db->get();
    }
}