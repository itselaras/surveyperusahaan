<?php
class Survey_model extends CI_Model {
    
        public function get_perusahaan_all()
        {
            $query = $this->db->select('*')
                                ->get('perusahaan');
                                
            return $query->result(); 
        }
        
        public function get_perusahaan_by_id($id)
        {
            $query = $this->db->select('*')
                                ->where('id', $id)
                                ->get('perusahaan');
                                
            return $query->row();
        }
        
        public function delete($id)
        {
            $this->db->delete('perusahaan', array('id' => $id));
        }
        
        public function user_by_perusahaan($id_perusahaan)
        {
                $this->db->select('*')
                                ->from('peserta_survey as A')
                                ->join('perusahaan as B', 'A.id_perusahaan = B.id')
                                ->where('A.id_perusahaan', $id_perusahaan);
                                $query = $this->db->get();

                return $query->result();                
        }
        
        public function get_perusahaan_by_kode($kode)
        {
            $query = $this->db->select('*')
                                ->where('kode_perusahaan', $kode)
                                ->get('perusahaan');
                                
            return $query->row();                    
        }
        
        public function get_user($usr)
        {
                $query = $this->db->select('*')
                                ->where('username', $usr)
                                ->get('peserta_survey');

                return $query->row();
        }
        
        public function check_from_id($id)
        {
            $query = $this->db->select('*')
                                ->where('id_user', $id)
                                ->get('hasil_survey');

            return $query->row();
        }
        
        public function get_time($id)
        {
            $query = $this->db->query("select * from timer_survey where id = ".$id);
            return $query->row();
        }
        
        public function get_soal($id)
        {
            $query = $this->db->query("select * from soal_survey where id_perusahaan = '".$id."'order by no_soal asc");
            return $query->result();
        }
        
        public function get_count($id)
        {
            $query = $this->db->query("select * from soal_survey where id_perusahaan = '".$id."'order by no_soal asc");
            return $query->num_rows();
        }
        
        public function get_hasil($id)
        {
            $query = $this->db->query("select * from hasil_survey where id_tes =".$id);
            return $query->row();
        }
        
        public function data($id, $number, $offset)
        {
            $query = $this->db->query("select * from soal_survey where id_perusahaan = '".$id."' order by no_soal asc LIMIT ".$offset.", ".$number."");
            return $query->row();
        }
        
        public function get_report($perusahaan)
        {
            $this->db->select('*');
            $this->db->from('hasil_survey as A');
            $this->db->join('peserta_survey as B', 'A.id_user = B.id_user');
            $this->db->where('B.id_perusahaan = '.$perusahaan);
            $this->db->order_by('A.id_user ASC, A.id_perusahaan ASC');
            $query = $this->db->get();
            
            
            return $query->result();
        }
        
        public function batch_by_perusahaan($id_perusahaan)
        {
                $this->db->select('*')
                                ->from('batch as A')
                                ->join('perusahaan as B', 'A.perusahaan_id = B.id')
                                ->where('A.perusahaan_id', $id_perusahaan);
                                $query = $this->db->get();

                return $query->result();                
        }
        
        public function get_batch_by_id($id)
        {
            $query = $this->db->select('*')
                                ->where('id_batch', $id)
                                ->get('batch');
                                
            return $query->row();
        }
        
        public function get_batch_by_kode($kode)
        {
            $query = $this->db->select('*')
                                ->where('enroll', $kode)
                                ->get('batch');
                                
            return $query->row();                    
        }
        
        public function user_by_time($user)
        {
                $this->db->select('*')
                                ->from('peserta_survey as A')
                                ->join('perusahaan as B', 'A.id_perusahaan = B.id')
                                ->join('batch as C', 'B.id = C.perusahaan_id')
                                ->where('A.id_user', $user);
                                $query = $this->db->get();

                return $query->row();                
        }

        public function get_user_range($id_peru, $start, $end)
        {
            $this->db->select('*')
                                ->from('peserta_survey')
                                ->where('id_perusahaan', $id_peru);
                                $query = $this->db->get();

                return $query->row(); 
        }
        
        public function get_question_survey($id_perusahaan)
        {
            $this->db->select('*');
            $this->db->from('soal_survey');
            $this->db->where('id_perusahaan', $id_perusahaan);
            $query = $this->db->get();
            
            return $query->result(); 
        }

        public function user_verification($nip){
            $this->db->select('*');
            $this->db->from('user_survey');
            $this->db->join('batch', 'user_survey.id_batch = batch.id_batch');
            $this->db->where('nip', $nip);
            $query = $this->db->get();
            
            return $query->row(); 
        }

        public function soal_by_perusahaan($id_perusahaan)
        {
                $this->db->select('*')
                                ->from('soal_survey as A')
                                ->join('perusahaan as B', 'A.id_perusahaan = B.id')
                                ->where('A.id_perusahaan', $id_perusahaan);
                                $query = $this->db->get();

                return $query->result();                
        }
        
}