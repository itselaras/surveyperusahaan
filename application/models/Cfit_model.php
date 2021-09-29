<?php
class Cfit_model extends CI_Model {
    
    public function get_cfit($kode)
    {
        $query = $this->db->query("select * from soal where soal_tipe = 'CFIT' and soal_kode = '".$kode."'order by soal_id asc");
        return $query->result();
    }
    
    public function data($kode, $number, $offset)
    {
        $query = $this->db->query("select * from soal where soal_tipe = 'CFIT' and soal_kode = '".$kode."' order by soal_id asc LIMIT ".$offset.", ".$number."");
        return $query->row();
    }
    
    public function data_contoh($kode, $number, $offset)
    {
        $query = $this->db->query("select * from soal where soal_tipe = 'CFIT' and soal_kode = '".$kode."' and soal_contoh = 1 order by soal_id asc LIMIT ".$offset.", ".$number."");
        return $query->row();
    }
    
    public function get_time($id)
    {
        $query = $this->db->query("select * from timer where id = ".$id);
        return $query->row();
    }
    
    public function get_hasil($id)
    {
        $query = $this->db->query("select * from hasil_cfit where id_tes =".$id);
        return $query->row();
    }
}