<?php
class Sekolah_model extends CI_Model {
    
        public function get_sekolah_all()
        {
            $query = $this->db->select('*')
                                ->get('daftar_sekolah');
                                
            return $query->result(); 
        }

        public function get_kode($kode)
        {
                $query = $this->db->query('select * from daftar_sekolah where kode_sekolah = '.$kode);
                                
                return $query->row();
        }
        
        public function get_alat($nama)
        {
            $query = $this->db->select('*')
                                ->where('nama_alat', $nama)
                                ->get('daftar_alat');
            
            return $query->first_row()->id_alat;
        }
        
        public function get_sekolah_by_id($id)
        {
            $query = $this->db->select('*')
                                ->where('sekolah_id', $id)
                                ->get('daftar_sekolah');
                                
            return $query->row();
        }
        
        public function get_sekolah($kode)
        {
            $query = $this->db->select('*')
                                ->where('kode_sekolah', $kode)
                                ->get('daftar_sekolah');
                                
            return $query->row();                    
        }
        
        public function get_alat_dashboard()
        {
            $this->db->select('*');
            $this->db->from('paket_alat as P');
            $this->db->join('daftar_alat as A', 'P.id_alat = A.id_alat');
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function get_alat_by_sklh($sekolah)
        {
            $this->db->select('*');
            $this->db->from('paket_alat as P');
            $this->db->join('daftar_alat as A', 'P.id_alat = A.id_alat');
            $this->db->where('P.id_sklh', $sekolah);
            $query = $this->db->get();
            
            return $query->result();
        }
        
        public function delete($id)
        {
            $this->db->delete('daftar_sekolah', array('sekolah_id' => $id));
        }
}