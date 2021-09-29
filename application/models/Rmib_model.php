<?php
class Rmib_model extends CI_Model {
    public function get_rmib()
    {
        $query = $this->db->query("select * from soal where soal_kode = 'RMIB' order by soal_id asc");
        return $query->result();

    }
    
    public function total_rmib()
    {
        $query = $this->db->query("select * from soal where soal_kode = 'RMIB' order by soal_id asc");
        return $query->num_rows();
    }
    
    public function data($number, $offset)
    {
        $query = $this->db->query("select soal_jawaban_a, soal_jawaban_b, kd_tbl_rmib from soal where soal_kode = 'RMIB' order by soal_id asc LIMIT ".$offset.", ".$number."");
        return $query->result();
    }
    
    public function check_from_id($id, $alat)
    {
            $this->db->select('*');
            $this->db->from('riwayat_tes as A');
            $this->db->join('daftar_alat as B', 'A.id_alat_tes = B.id_alat');
            $this->db->where('A.id_user', $id);
            $this->db->where('B.nama_alat', $alat);
            $query = $this->db->get();
            
            return $query->row();
    }
    
    public function get_report($alat, $sekolah)
        {
            $this->db->select('*');
            $this->db->from('hasil_'.$alat.' as A');
            $this->db->join('peserta_rmib2 as B', 'A.id_user = B.id_user');
            $this->db->where('B.id_sekolah = '.$sekolah);
            $this->db->order_by('A.id_user ASC, sub_test ASC');
            $query = $this->db->get();
            
            return $query->result();
        }
        
    public function reset_rmib($user)
    {
        $this->db->delete('hasil_rmib', array('id_user' => $user));
        
        $this->db->where('id_alat_tes', 1);
        $this->db->where('id_user', $user);
        $this->db->delete('riwayat_tes');
    }
    
    public function reset_cfit($user)
    {
        $this->db->delete('hasil_cfit', array('id_user' => $user));
        
        $this->db->where('id_alat_tes', 2);
        $this->db->where('id_user', $user);
        $this->db->delete('riwayat_tes');
    }
    
}