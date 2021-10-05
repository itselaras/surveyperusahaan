<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Survey_controller extends CI_Controller {

    

	public function __construct()

	{

		parent::__construct();

		$this->load->helper('url');

		$this->load->model('survey_model');

	}

	

	public function index()

	{

	    $this->load->view('layout/header');

		$this->load->view('index');

		$this->load->view('layout/footer');

	}

	

	public function import_perusahaan()

	{

	    if($this->session->userdata("logged_in") !== true)

         {

         redirect(site_url(),'refresh');

         }

         

	    $perusahaan = $this->survey_model->get_perusahaan_all();

	    

	    $data['id_perusahaan'] = $perusahaan;

	    $data['perusahaan'] = $perusahaan;

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('import_perusahaan.php', $data);

		$this->load->view('layout-admin/footer');  

	}

	

	public function import()

	{

	    $id_perusahaan = $this->input->post('perusahaan');

	    $this->session->set_userdata(['id_import' => $id_perusahaan]);

	    $data['id_perusahaan'] = $id_perusahaan;

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('import.php', $data);

		$this->load->view('layout-admin/footer');  

	}

	

	public function perusahaan()

	{

	    if($this->session->userdata("logged_in") !== true)

         {

         redirect(site_url(),'refresh');

         }

	    $sek = $this->survey_model->get_perusahaan_all();

	    $data['sek'] = $sek;



		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('perusahaan', $data);

		$this->load->view('layout-admin/footer');

	}

	

	public function create_perusahaan()

	{

	    $data['submit'] = 'create';

	    

		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('create_perusahaan', $data);

		$this->load->view('layout-admin/footer');

	}

	

		public function submit_perusahaan()

	{

	    $perusahaan = $this->input->post('perusahaan');

        $alamat = $this->input->post('alamat');

        $alat = $this->input->post('alat');

        $tanggal = $this->input->post('tanggal');

        $durasi = $this->input->post('durasi');

        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));

        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));



        $insert_perusahaan = array(

                'nama_perusahaan' => $perusahaan,

                'alamat' => $alamat
            );

        $this->db->insert('perusahaan', $insert_perusahaan);

        

        redirect(site_url('survey_controller/perusahaan'));

	}

	

	public function edit($id)

	{

	    $perusahaan = $this->survey_model->get_perusahaan_by_id($id);

	    $data['perus'] = $perusahaan;

	    $data['submit'] = 'update';

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('create_perusahaan', $data);

		$this->load->view('layout-admin/footer');

	}

	

		public function update_perusahaan($id)

	{

	    $perusahaan = $this->input->post('perusahaan');

        $alamat = $this->input->post('alamat');

        $kode = $this->input->post('kode');

        $tanggal = $this->input->post('tanggal');

        $durasi = $this->input->post('durasi');

        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));

        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));



        $data = array(

                'nama_perusahaan' => $perusahaan,

                'alamat' => $alamat,

                'kode_perusahaan' => $kode,

                'start' => $tgl1,

                'end' => $tgl2

            );

        $this->db->set($data);

        $this->db->where('id', $id);

        $this->db->update('perusahaan');

        redirect(site_url('survey_controller/perusahaan'));

	}

	

	public function delete($id)

	{

	    $this->survey_model->delete($id);

	    redirect(site_url('survey_controller/perusahaan'));

	}

	

	/*User*/

	public function user_survey()

	{

	    if($this->session->logged_in !== true)

         {

         redirect(site_url(),'refresh');

         }

         

        $sek = $this->input->post('perusahaan'); 

	    $perusahaan = $this->survey_model->get_perusahaan_all();

	    

	    if(!empty($perusahaan))

	    {

	        $user = $this->survey_model->user_by_perusahaan($sek);

	        $data['user'] = $user;

	    }

	    $user = $this->survey_model->user_by_perusahaan($sek);

	    $data['sek'] = $sek;

	    $data['perusahaan'] = $perusahaan;



		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('user_survey', $data);

		$this->load->view('layout-admin/footer');

	}

	

	/*Authentication*/

	public function login()

	{

		$this->load->view('login');

	}

	

		public function verif_attempt()

	{

	    $input = $this->input->post('kode_perusahaan');

	    $result = $this->survey_model->get_perusahaan_by_kode($input);



	    if(!empty($result))

        {

            $id_perusahaan = $result->id;

	        $nama_perusahaan = $result->nama_perusahaan;

            $this->session->set_userdata(['nama_perusahaan' => $nama_perusahaan]);

            $this->session->set_userdata(['id_perusahaan' => $id_perusahaan]);    		

            $this->load->view('register_survey');

    		$this->load->view('layout/footer');

        }else

        {

            $this->session->set_flashdata('error', 'Kode perusahaan yang anda masukkan salah.');

			redirect(site_url('survey_controller/login'));        

        }

	 }

	 

	 	public function login_attempt()

	{

		$username = $this->input->post("username");

        $password = $this->input->post("userpassword");



        $result = $this->survey_model->get_user($username);

        



        //apakah user terdaftar

		if ($result)

		{

			//periksa password

			$isPasswordTrue = $password == $result->password;



			if ($isPasswordTrue){

				//login sukses

			

                

                $gender = $result->jk;

				//simpan session

				$this->session->set_userdata(['user' => $username]);

				$this->session->set_userdata(['user_id' => $result->id_user]);

				$this->session->set_userdata(['id_perusahaan' => $result->id_perusahaan]);

				$this->session->set_userdata(['logged_in' => TRUE]);

				$this->session->set_userdata(['gender' => $gender]);

				

				//role authentication

				//role rule :

				// 1 = admin

				// 3 = user

				if ($result->role_id == 3)

                {

                    redirect(site_url('survey_controller/dashboard_survey'));

                }

                else{

                    redirect(site_url('survey_controller/user_survey'));

                }

                

				

			}

			$this->session->set_flashdata('error', 'Username atau password yang anda masukkan salah.');

			redirect(site_url('survey_controller/login'));

		}

			$this->session->set_flashdata('error', 'Anda belum terdaftar sebagai user.');

			redirect(site_url('survey_controller/login'));

	}

	 

	 public function check_user()

	{

	    $username = $this->input->post("username");

	    

	    

	    

	    if(!empty($username))

	    {

	       $user = $this->survey_model->get_user($username); 

	    

    	    if($user)

    	    {

    	        echo '<span style="color: red;">Username sudah terdaftar</span>';

    	    }else

    	    {

    	        echo '<span style="color: blue;">Username tersedia</span>';

    	    }

	    }

	}

	

	public function register_attempt()

	{

	    $username = $this->input->post("username");

        $password = $this->input->post("password");

        $nama = $this->input->post("nama");

        $tgl_lahir = $this->input->post("tgl_lahir");

        $jk = $this->input->post("jk");

        $email = $this->input->post("email");

        $telp = $this->input->post("telp");

        $alamat = $this->input->post("alamat");

        $id_perusahaan = $this->input->post('id_perusahaan');

        

        $data = array(

            'username' => $username,

            'password' => $password,

            'nama' => $nama,

            'role_id' => 3,

            'id_perusahaan' => $id_perusahaan,

            'tgl_lahir' => $tgl_lahir,

            'jk' => $jk,

            'email' => $email,

            'telp' => $telp,

            'alamat' => $alamat

            );

        

        $result = $this->db->insert('peserta_survey', $data);

        

        if($result)

        {

            $this->session->set_flashdata('success', 'Registrasi Berhasil, silahkan masuk menu Login.');

			redirect(site_url('survey_controller/login'));

        }

	}

	

	public function dashboard_survey()

	{

	    if($this->session->userdata("logged_in") !== true)

         {

         redirect(site_url(),'refresh');

         }

         

	    $id_sekolah = $this->session->id_sekolah;

	    $username = $this->session->user;

	    $id = $this->session->user_id;

	    $result = $this->survey_model->get_user($username);

	    $check_attempt = $this->survey_model->check_from_id($id);



	    $data['soal'] = $result;

	    $data['check_attempt'] = $check_attempt;

	    $data['id'] = $id;



		$this->load->view('layout/header');

		$this->load->view('dashboard_survey', $data);

		$this->load->view('layout/footer');

	}

	

	public function dashboard_survey_user()

	{

	    $this->load->view('layout/header');

		$this->load->view('dashboard_survey_user');

		$this->load->view('layout/footer');

	}

	public function logout()

	{

	    $this->session->sess_destroy();

		redirect(site_url('survey_controller/index'));

	}

	

	public function set_timer()

	{

        $id_user = $this->session->user_id;

        $id_perusahaan = $this->session->id_perusahaan;

        $data1 = array(

	                        'id_user' => $id_user,

	                        'id_perusahaan' => $id_perusahaan,

	                    );

       $result1 = $this->db->insert('hasil_survey', $data1);

       $id_tes = $this->db->insert_id();

       $this->session->set_userdata(['id_tes' => $id_tes ]);

        

        $dateStart = new DateTime();

	    $start = $dateStart->getTimestamp();

        $dateEnd = $dateStart->modify('+ 181 seconds');

        $end = $dateEnd->getTimestamp();

        

        $data2 = array(

                'id_tes' => $id_tes,

                'id_user' => $id_user,

                'start' => $start,

                'end' => $end

            );

        

        $this->db->insert('timer_survey', $data2);

        $id = $this->db->insert_id();

        

        $this->session->set_userdata('id_timer', $id);

	}

	

	public function start()

	{

	    if($this->session->userdata("logged_in") !== true)

         {

         redirect(site_url(),'refresh');

         }

         

         $id_time = $this->session->id_timer;

         $time = $this->survey_model->get_time($id_time);

         $data['end'] = $time->end;

         

        $id_perusahaan = $this->session->id_perusahaan;

	    $soal = $this->survey_model->get_soal($id_perusahaan);



	    $jumlah_data = count($soal);

	    $data['soal'] = $soal;

	    $data['count'] = $jumlah_data;



		

		$this->load->library('pagination');

		

		$config['base_url'] = base_url().'index.php/survey_controller/start/';

		$config['total_rows'] = $jumlah_data;

		$config['per_page'] = 1;

		$config["uri_segment"] = 3;

		

		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

		$data['user'] = $this->survey_model->data($id_perusahaan, $config['per_page'],$from);

		$data['page'] = $this->uri->segment(3);

		

		$soal1 = null;

		    $soal2 = null;

		    $soal3 = null;

		    $soal4 = null;

		    $soal5 = null;

		    $soal6 = null;

		    $soal7 = null;

		    $soal8 = null;

		    $soal9 = null;

		    $soal10 = null;

		    $soal11 = null;

		    $soal12 = null;

		    $soal13 = null;

		    $soal14 = null;

		    $soal15 = null;

		    $soal16 = null;

		    $soal17 = null;

		    $soal18 = null;

		    $soal19 = null;

		    $soal20 = null;

		if (!is_null($this->session->id_tes))

		{



    		$cf = $this->survey_model->get_hasil($this->session->id_tes);

    		

    		$soal1 = $cf->soal_1;

    		$soal2 = $cf->soal_2;

    		$soal3 = $cf->soal_3;



    		$soal4 = $cf->soal_4;



    		$soal5 = $cf->soal_5;



    		$soal6 = $cf->soal_6;



    		$soal7 = $cf->soal_7;



    		$soal8 = $cf->soal_8;



    		$soal9 = $cf->soal_9;



    		$soal10 = $cf->soal_10;



    		$soal11 = $cf->soal_11;



    		$soal12 = $cf->soal_12;



    		$soal13 = $cf->soal_13;



    		$soal14 = $cf->soal_14;



    		$soal15 = $cf->soal_15;



    		$soal16 = $cf->soal_16;



    		$soal17 = $cf->soal_17;



    		$soal18 = $cf->soal_18;



    		$soal19 = $cf->soal_19;



    		$soal20 = $cf->soal_20;

    		$navigasi = array($soal1, $soal2, $soal3, $soal4, $soal5, $soal6, $soal7, $soal8, $soal9, $soal10, $soal11, $soal12, $soal13, $soal14, $soal15, $soal16, $soal17, $soal18, $soal19, $soal20);

    		

    	    $data['navigasi'] = $navigasi;

		}



		$this->load->view('layout/header');

		$this->load->view('survey_page', $data);

		$this->load->view('layout/footer');

	}

	

		public function submit_answer()

	{

	    $page = $this->input->post("page");

	    $next = $this->input->post("next");

	    $skip = $this->input->post("skip");

        $sub2 = $this->input->post("sub2");

        $answer = $this->input->post("answer");

        $id_user = $this->session->user_id;

        $pg = $page + 1;

	    $soal = 'soal_'.$pg;

        

	    if(isset($next))

	    {

	       

	                $id_tes = $this->session->id_tes;

	                $this->db->set($soal, $answer);

                    $this->db->where('id_tes', $id_tes);

                    $this->db->update('hasil_survey'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2



	            

	            redirect(site_url('survey_controller/start/'.$pg));

	   }

	        

	    

	    else if(isset($skip))

	    {

	       $pg = $page + 1;

	       

	       $id_tes = $this->session->id_tes;

	                $this->db->set($soal, 'skip');

                    $this->db->where('id_tes', $id_tes);

                    $this->db->update('hasil_survey');

	       redirect(site_url('survey_controller/start/'.$pg));

	    }

	    

	    else if(isset($sub2))

	    {

	        $id_tes = $this->session->id_tes;

	                $this->db->set($soal, $answer);

                    $this->db->where('id_tes', $id_tes);

                    $this->db->update('hasil_survey');

                    

                    $id_user = $this->session->user_id;

                    $data2 = array(

                            'id_tes' => $id_tes,

                            'id_user' => $id_user,

                            'tanggal' => date('Y-m-d')

                        );

            $result2 = $this->db->insert('riwayat_survey', $data2);

	        redirect(site_url('survey_controller/dashboard_survey'));

	    }

	}

	

		public function report_admin()

	{

	    $perusahaan = $this->survey_model->get_perusahaan_all();

	    $data['perusahaan'] = $perusahaan;



		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('report_survey', $data);

		$this->load->view('layout-admin/footer');

	}

	

	public function report_hasil()

	{

	    $perusahaan = $this->input->post('perusahaan');

	    $report = $this->survey_model->get_report($perusahaan);

	    

	    $data['report'] = $report;

	    $data['perusahaan'] = $perusahaan;

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('report_hasil', $data);

		$this->load->view('layout-admin/footer');

	}

	

	/*Batch*/

	public function batch()

	{

	    if($this->session->userdata("logged_in") !== true)

         {

         redirect(site_url(),'refresh');

         }

         

        $id_peru = $this->input->post('perusahaan'); 

	    $perusahaan = $this->survey_model->get_perusahaan_all();

	    

	    if(!empty($perusahaan))

	    {

	        $user = $this->survey_model->batch_by_perusahaan($id_peru);

	        $data['peru'] = $user;

	    }

	    $user = $this->survey_model->batch_by_perusahaan($id_peru);

	    $data['id_peru'] = $id_peru;

	    $data['perusahaan'] = $perusahaan;



		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('batch_survey', $data);

		$this->load->view('layout-admin/footer');

	}

	

		public function create_batch($id_peru)

	{

	    $data['submit'] = 'create';

	    $data['id_peru'] = $id_peru;

	    

		$this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('create_batch', $data);

		$this->load->view('layout-admin/footer');

	}



	public function submit_batch($id_peru)

	{




		$peru = $this->survey_model->get_perusahaan_by_id($id_peru);

		$peru = $peru->nama_perusahaan;

		$kode_peru = substr($peru,0,4);

		$last_batch = $this->survey_model->get_last_batch();

		$last_batch = $last_batch->id_batch;

		$id_batch = '';



		if($last_batch)

		{

			$id_batch = $last_batch + 1;

		}else

		{

			$id_batch = 1;

		}



		$nama_batch = $kode_peru . "-" . $id_peru . "" . $id_batch;




        $tanggal = $this->input->post('tanggal');

        $durasi = $this->input->post('durasi');

        $tgl = date('Y-m-d', strtotime($tanggal));

        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));

        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));

        $link = $this->input->post('link');



        $insert_batch = array(

                'perusahaan_id' => $id_peru,

                'tanggal' => $tgl,

                'enroll' => $enroll,

                'start' => $tgl1,

                'end' => $tgl2,

                'link' => $link

            );

        $this->db->insert('batch', $insert_batch);



		$insert_id = $this->db->insert_id();



		$start = $this->input->post('start');

		$end = $this->input->post('end');

		$range = $this->survey_model->get_range_user($start, $end);



		foreach($range as $ra)

		{

			$id_user = $ra->id_user;

			$insert_batch_user = array(

                'id_batch' => $insert_id,

				'id_user' => $id_user

            );

        	$this->db->insert('batch_user', $insert_batch_user);

		}

        

        redirect(site_url('survey_controller/batch'));

	}

	

	public function update_batch($id_peru)

	{

	    $enroll = $this->input->post('kode');

        $tanggal = $this->input->post('tanggal');

        $durasi = $this->input->post('durasi');

        $tgl = date('Y-m-d', strtotime($tanggal));

        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));

        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));

        $link = $this->input->post('link');



        $insert_batch = array(

                'tanggal' => $tgl,

                'enroll' => $enroll,

                'start' => $tgl1,

                'end' => $tgl2,

                'link' => $link

            );

        $this->db->set($insert_batch);

        $this->db->where('id_batch', $id_peru);

        $this->db->update('batch');

        redirect(site_url('survey_controller/batch/'));

	}

	

	public function edit_batch($id_batch)

	{

	    $batch = $this->survey_model->get_batch_by_id($id_batch);

	    $data['batch'] = $batch;

	    $data['submit'] = 'update';

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('create_batch', $data);

		$this->load->view('layout-admin/footer');

	}

	

	public function delete_batch($id)

	{

	    $this->db->delete('batch', array('id_batch' => $id));

	    redirect(site_url('survey_controller/perusahaan'));

	}

	

	public function generate($id_perusahaan)

	{

	    $data['id_perusahaan'] = $id_perusahaan;

	    

	    $this->load->view('layout-admin/topbar');

		$this->load->view('layout-admin/sidebar');

		$this->load->view('generate_user', $data);

		$this->load->view('layout-admin/footer');

	}

	

	public function gen_user()

	{

	    $id_perusahaan = $this->input->post('id_perusahaan');

	    $data['id_perusahaan'] = $id_perusahaan;

	    $count = $this->input->post('count');

	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	    

	    for ($i=0;$i<$count;$i++)

	    {

    	    $username = substr(str_shuffle($chars),0,6);

    	    $password = substr(str_shuffle($chars),0,8);

    	    

    	    $insert_user = array(

    	            'username' => $username,

    	            'password' => $password,

    	            'id_perusahaan' => $id_perusahaan

    	        );

    	    $this->db->insert('peserta_survey', $insert_user);

    	  }

            $perusahaan = $this->survey_model->get_perusahaan_all();

            $user = $this->survey_model->user_by_perusahaan($id_perusahaan);

            

            $data['perusahaan'] = $perusahaan;

            $data['sek'] = $id_perusahaan;

	        $data['user'] = $user;

    	  

    	    $this->load->view('layout-admin/topbar');

    		$this->load->view('layout-admin/sidebar');

    		$this->load->view('user_survey', $data);

    		$this->load->view('layout-admin/footer');

	}

	

	public function enroll_attempt()

	{

	    $input = $this->input->post('enroll');

	    $result = $this->survey_model->get_batch_by_kode($input);



	    if(!empty($result))

        {

            $link = $result->link;

            redirect(prep_url($link));

        }else

        {

            $this->session->set_flashdata('error', 'Kode Batch yang anda masukkan salah.');

			redirect(site_url('survey_controller/dashboard_survey'));        

        }

	 }

	 

	 public function check_start()

	{

	    $result = $this->survey_model->user_by_time($this->session->user_id);

	    

	    $start = strtotime($result->start);

	    

	    $now = strtotime(date('Y/m/d H:i:s'));



	    if($start <= $now)

	    {

	        echo json_encode(true);

	    }else

	    {

	        echo json_encode(false);

	    }

	}

	

	public function check_end()

	{

	    $result = $this->survey_model->user_by_time($this->session->user_id);

	    

	    $end = strtotime($result->end);

	    

	    $now = strtotime(date('Y/m/d H:i:s'));



	    if($end <= $now)

	    {

	        echo json_encode(false);

	    }else

	    {

	        echo json_encode(true);

	    }

	}

	

	public function pdam_start()

	{

	    $this->load->view('layout/header');

	    $this->load->view('pdam_start_tes');

	    $this->load->view('layout/footer');

	}



	public function user_verification(){

		$nip = $this->input->post('nip');

		$on_batch = $this->survey_model->user_verification($nip);

		if($on_batch){
			$start = date_parse($on_batch->start);
	
			$end = date_parse($on_batch->end);
	
			$startBatch = $start["year"].''.$start["month"].''.$start["day"].''.$start["hour"].''.$start["minute"].''.$start["second"];
	
			$endBatch = $end["year"].''.$end["month"].''.$end["day"].''.$end["hour"].''.$end["minute"].''.$end["second"];
	
			$dateNow = date("YmjHis");
	
			if((int)$dateNow<=(int)$endBatch && (int)$dateNow>=(int)$startBatch){
	
				$this->session->set_userdata(['id_user' => $on_batch->id]);
				$this->session->set_userdata(['nip' => $nip]);
				$this->session->set_userdata(['id_perusahaan' => $on_batch->id_perusahaan]);
				$this->session->set_userdata(['id_batch' => $on_batch->id_batch]);
	
				redirect(site_url('survey_controller/pdam_test/1'));
			}else{
				$this->session->set_flashdata('error', 'Maaf, anda bukan peserta batch saat ini');
				redirect(site_url('survey_controller/pdam_start'));
			}
		}else{
			$this->session->set_flashdata('error', 'Maaf, NIP anda tidak terdaftar');
			redirect(site_url('survey_controller/pdam_start'));
		}


	}

	

	public function pdam_test($type)

	{
		$id_perusahaan = $this->session->userdata("id_perusahaan");
		switch($type){

			case 1:

				$data['pertanyaan'] = $this->survey_model->get_question_survey($id_perusahaan, $type);

				$data['jenis'] = $type;

	    		$this->load->view('pdam_test', $data);

				break;

			case 2:

				$data['pertanyaan'] = $this->survey_model->get_question_survey($id_perusahaan, $type);

				$data['jenis'] = $type;

	    		$this->load->view('pdam_test', $data);

				break;

			case 3:

				$data['pertanyaan'] = $this->survey_model->get_question_survey($id_perusahaan, $type);

				$data['jenis'] = $type;

	    		$this->load->view('pdam_test', $data);

				break;

			case 4:

				$data['pertanyaan'] = $this->survey_model->get_question_survey($id_perusahaan, $type);

				$data['jenis'] = $type;

	    		$this->load->view('pdam_test', $data);

				break;

		}

	    

	}

	

	public function user_batch()

	{

	    $range_a = $this->input->post('range_a');

	    

	    $range_b = $this->input->post('range_b');

	    

	    $range = $this->survey_model->get_user_range($range_a, $range_b);

	    

	    

	}

	

	public function submit_survey()

    {

        $id_user = $this->input->post('id_user');

        $jawaban = $this->input->post('answer');

        $id_batch = $this->input->post('id_batch');

        $jenis = $this->input->post('jenis');

        $insert_answer = [

            'id_user' => $id_user,

            'jawaban' => $jawaban,

            'id_batch' => $id_batch,

            'jenis' => $jenis

        ];

        $this->db->insert('jawaban_survey', $insert_answer);

        $response = [

            'success' => true,

            'msg' => "success send user answer",

        ];

        echo json_encode( $response );

    }



	public function thanks_page()

	{
		$month = date("n");

		$bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

		$data['date'] = date("j") .' '. $bulan[(int)$month-1] .' '. date("Y");

		$this->load->view('thanks_page', $data);

	    $this->load->view('layout/footer');

	}

	public function soal_survey()
	{
		if($this->session->logged_in !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $peru = $this->input->post('perusahaan'); 
	    $perusahaan = $this->survey_model->get_perusahaan_all();
	    
	    if(!empty($perusahaan))
	    {
	        $soal = $this->survey_model->soal_by_perusahaan($peru);
	        $data['soal'] = $soal;
	    }
	    $user = $this->survey_model->user_by_perusahaan($peru);
	    $data['sek'] = $peru;
	    $data['perusahaan'] = $perusahaan;

		$this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('soal_survey', $data);
		$this->load->view('layout-admin/footer');
	}
}
