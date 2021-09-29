<?php
class User_model extends CI_Model {

        public function get_user($usr)
        {
                $query = $this->db->select('*')
                                ->where('username', $usr)
                                ->get('peserta_rmib2');

                return $query->row();
        }
        
        public function all_user()
        {
            $query = $this->db->select('*')
                            ->get('peserta_rmib2');
                            
            return $query->result();                
        }
        
        public function user_by_sekolah($id_sekolah)
        {
                $this->db->select('*')
                                ->from('peserta_rmib2 as A')
                                ->join('daftar_sekolah as B', 'A.id_sekolah = B.sekolah_id')
                                ->where('A.id_sekolah', $id_sekolah);
                                $query = $this->db->get();

                return $query->result();                
        }
        
        public function user_by_time($user)
        {
                $this->db->select('*')
                                ->from('peserta_rmib2 as A')
                                ->join('daftar_sekolah as B', 'A.id_sekolah = B.sekolah_id')
                                ->where('id_user', $user);
                                $query = $this->db->get();

                return $query->row();                
        }
}