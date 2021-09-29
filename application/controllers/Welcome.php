<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('rmib_model');
		$this->load->model('user_model');
		$this->load->model('sekolah_model');
		$this->load->model('cfit_model');
	}
	
	public function index()
	{
		$this->load->view('index');
		$this->load->view('layout/footer');
	}

	public function admin()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
	    $sek = $this->sekolah_model->get_sekolah_all();
	    $alat = $this->sekolah_model->get_alat_dashboard();
	    $data['sek'] = $sek;
	    $data['alat'] = $alat;

		$this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('admin', $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function user_admin()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $sek = $this->input->post('sekolah'); 
	    $sekolah = $this->sekolah_model->get_sekolah_all();
	    
	    if(!empty($sekolah))
	    {
	        $alat = $this->sekolah_model->get_alat_dashboard();
	        $data['alat'] = $alat;
	        $user = $this->user_model->user_by_sekolah($sek);
	        $data['user'] = $user;
	    }
	    $user = $this->user_model->user_by_sekolah($sek);
	    $data['sek'] = $sek;
	    $data['sekolah'] = $sekolah;

		$this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('user_admin', $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function create_sekolah()
	{
	    $data['submit'] = 'create';
	    
	    $this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('create_sekolah', $data);
		$this->load->view('layout-admin/footer');
	}

		public function report()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
	    $id = $this->session->user_id;
	    $result = $this->rmib_model->user_from_id($id);
	    $data['result'] = $result;
	    
		$this->load->view('layout/header');
		$this->load->view('report', $data);
		$this->load->view('layout/footer');
	}

	public function dashboard()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
	    $id_sekolah = $this->session->id_sekolah;
	    $username = $this->session->user;
	    $id = $this->session->user_id;
	    $result = $this->user_model->get_user($username);
	    $check_rmib = $this->rmib_model->check_from_id($id, 'RMIB');
	    $check_cfit = $this->rmib_model->check_from_id($id, 'CFIT');
	    $alat = $this->sekolah_model->get_alat_by_sklh($id_sekolah);

	    $data['soal'] = $result;
	    $data['check_rmib'] = $check_rmib;
	    $data['check_cfit'] = $check_cfit;
	    $data['id'] = $id;
	    $data['alat'] = $alat;
	    
		$this->load->view('layout/header');
		$this->load->view('dashboard', $data);
		$this->load->view('layout/footer');
	}
	
	public function dashboard_admin()
	{
	    $this->load->view('layout/header');
		$this->load->view('dashboard_admin');
		$this->load->view('layout/footer');
	}

	public function login()
	{
		$this->load->view('login');
	}
	
	public function add_sekolah()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
	    $sekolah = $this->input->post("sekolah");
        $alamat = $this->input->post("alamat");
        $kode = $this->input->post("kode");
        $alat = $this->input->post("alat");
	}

	public function logout()
	{
	    $this->session->sess_destroy();
		redirect(site_url('welcome/index'));
	}
	
	public function rmib()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
	    $gender = $this->session->gender;
	    $rmib = $this->rmib_model->get_rmib();
	    $data['soal'] = $rmib;

		$jumlah_data = count($rmib);
		$this->load->library('pagination');
		$config['base_url'] = base_url().'index.php/welcome/rmib/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 2;
		$config["uri_segment"] = 3;
		
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center" style="margin: 0px">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->pagination->initialize($config);		
		$data['user'] = $this->rmib_model->data($config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);

		$this->load->view('layout/header');
		$this->load->view('rmib', $data);
		$this->load->view('layout/footer');
	}
	
	public function submit_rmib()
	{
	    $page = $this->input->post('page');
	    $arr1 = $this->input->post('array1-');
	    $arr2 = $this->input->post('array2-');
	    $user_id = $this->session->user_id;
	    if($page == 8)
	    {
	        $array1 = implode(",", $arr1);
	        $kode_rmib_1 = $this->input->post('kode_rmib_1');
	         $data1 = array(
                            'id_user' => $user_id,
                            'sub_test' => $kode_rmib_1,
                            'jawaban' => $array1,
                        );
            $result1 = $this->db->insert('hasil_rmib', $data1);
            $id_tes = $this->db->insert_id();
            
            $data2 = array(
                            'id_tes' => $id_tes,
                            'id_user' => $user_id,
                            'id_alat_tes' => 1,
                            'tanggal' => date('Y-m-d')
                        );
            $result2 = $this->db->insert('riwayat_tes', $data2);

             redirect(site_url('welcome/dashboard'));
	    }else
	    {
	        $pg = $page+2;
    	    $array1 = implode(",", $arr1);
    	    $array2 = implode(",", $arr2);
    	    
    	    $kode_rmib_1 = $this->input->post('kode_rmib_1');
    	    $kode_rmib_2 = $this->input->post('kode_rmib_2');

    	    $data1 = array(
                        array(
                            'id_user' => $user_id,
                            'sub_test' => $kode_rmib_1,
                            'jawaban' => $array1,
                        ),
                        array(
                        'id_user' => $user_id,
                        'sub_test' => $kode_rmib_2,
                        'jawaban' => $array2,
                        )
                );
            
            $result1 = $this->db->insert_batch('hasil_rmib', $data1);
            $id_tes_1 = $this->db->insert_id();
            $id_tes_2 = $id_tes_1 + 1;
            
            $data2 = array(
                        array(
                            'id_tes' => $id_tes_1,
                            'id_user' => $user_id,
                            'id_alat_tes' => 1,
                            'tanggal' => date('Y-m-d')
                        ),
                        array(
                            'id_tes' => $id_tes_2,
                            'id_user' => $user_id,
                            'id_alat_tes' => 1,
                            'tanggal' => date('Y-m-d')
                        )
                );
            
            $result2 = $this->db->insert_batch('riwayat_tes', $data2);
            
    	    
    	    redirect(site_url('welcome/rmib/'.$pg));
	    }
	}
	
	public function contoh_cfit_1()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $kode = 'CFIT (1)';
	   
		$config['per_page'] = 1;

		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['contoh'] = $this->cfit_model->data_contoh($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);

		$this->load->view('layout/header');
		$this->load->view('contoh_cfit_1', $data);
		$this->load->view('layout/footer');
	}
	
	public function contoh_cfit_2()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $kode = 'CFIT (2)';
	   
		$config['per_page'] = 1;

		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['contoh'] = $this->cfit_model->data_contoh($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);

		$this->load->view('layout/header');
		$this->load->view('contoh_cfit_2', $data);
		$this->load->view('layout/footer');
	}
	
	public function contoh_cfit_3()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $kode = 'CFIT (3)';
	   
		$config['per_page'] = 1;

		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['contoh'] = $this->cfit_model->data_contoh($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);

		$this->load->view('layout/header');
		$this->load->view('contoh_cfit_3', $data);
		$this->load->view('layout/footer');
	}
	
	public function contoh_cfit_4()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
        $kode = 'CFIT (4)';
	   
		$config['per_page'] = 1;

		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['contoh'] = $this->cfit_model->data_contoh($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);

		$this->load->view('layout/header');
		$this->load->view('contoh_cfit_4', $data);
		$this->load->view('layout/footer');
	}
	
	public function submit_contoh_cfit_1()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub2 = $this->input->post("sub2");
        $cfit_1 = $this->input->post("cfit_1");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	            redirect(site_url('welcome/contoh_cfit_1/'.$pg));
	   }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       redirect(site_url('welcome/contoh_cfit_1/'.$pg));
	    }
	    
	    else if(isset($sub2))
	    {
	        redirect(site_url('welcome/contoh_cfit_2'));
	    }
	    
	    
	}
	
	public function submit_contoh_cfit_2()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub2 = $this->input->post("sub3");
        $cfit_2 = $this->input->post("cfit_2");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	            redirect(site_url('welcome/contoh_cfit_2/'.$pg));
	   }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       redirect(site_url('welcome/contoh_cfit_2/'.$pg));
	    }
	    
	    else if(isset($sub2))
	    {
	        redirect(site_url('welcome/contoh_cfit_3'));
	    }
	    
	    
	}
	
	public function submit_contoh_cfit_3()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub2 = $this->input->post("sub4");
        $cfit_3 = $this->input->post("cfit_3");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	            redirect(site_url('welcome/contoh_cfit_3/'.$pg));
	        }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       redirect(site_url('welcome/contoh_cfit_3/'.$pg));
	    }
	    
	    else if(isset($sub2))
	    {
	        redirect(site_url('welcome/contoh_cfit_4'));
	    }
	    
	    
	}
	
	public function submit_contoh_cfit_4()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub2 = $this->input->post("sub4");
        $cfit_4 = $this->input->post("cfit_4");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	            redirect(site_url('welcome/contoh_cfit_4/'.$pg));
	        }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       redirect(site_url('welcome/contoh_cfit_4/'.$pg));
	    }
	    
	    else if(isset($sub2))
	    {
	        redirect(site_url('welcome/contoh_cfit_4'));
	    }
	    
	    
	}
	
	public function cfit_1()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
         $id_time = $this->session->id_timer;
         $time = $this->cfit_model->get_time($id_time);
         $data['end'] = $time->end;
         
        $kode = 'CFIT (1)';
	    $cfit = $this->cfit_model->get_cfit($kode);
	    
	    $jumlah_data = count($cfit);
	    $data['soal'] = $cfit;
	    $data['count'] = $jumlah_data;

		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/welcome/cfit_1/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
		$config["uri_segment"] = 3;
		
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['user'] = $this->cfit_model->data($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);
		
		
		if (!is_null($this->session->id_tes))
		{
		    $soal1 = '';
		    $soal2 = '';
		    $soal3 = '';
		    $soal4 = '';
		    $soal5 = '';
		    $soal6 = '';
		    $soal7 = '';
		    $soal8 = '';
		    $soal9 = '';
		    $soal10 = '';
		    $soal11 = '';
		    $soal12 = '';
		    $soal13 = '';
		    $soal14 = '';
		    $soal15 = '';
		    $soal16 = '';
		    $soal17 = '';
		    $soal18 = '';
		    $soal19 = '';
		    $soal20 = '';
		    
    		$cf = $this->cfit_model->get_hasil($this->session->id_tes);
    		
    		if($cf->soal_1)
    		{
    		$soal1 = $cf->soal_1;
    		}
    		if($cf->soal_2)
    		{
    		$soal2 = $cf->soal_2;
    		}
    		if($cf->soal_3)
    		{
    		$soal3 = $cf->soal_3;
    		}
    		if($cf->soal_4)
    		{
    		$soal4 = $cf->soal_4;
    		}
    		if($cf->soal_5)
    		{
    		$soal5 = $cf->soal_5;
    		}
    		if($cf->soal_6)
    		{
    		$soal6 = $cf->soal_6;
    		}
    		if($cf->soal_7)
    		{
    		$soal7 = $cf->soal_7;
    		}
    		if($cf->soal_8)
    		{
    		$soal8 = $cf->soal_8;
    		}
    		if($cf->soal_9)
    		{
    		$soal9 = $cf->soal_9;
    		}
    		if($cf->soal_10)
    		{
    		$soal10 = $cf->soal_10;
    		}
    		if($cf->soal_11)
    		{
    		$soal11 = $cf->soal_11;
    		}
    		if($cf->soal_12)
    		{
    		$soal12 = $cf->soal_12;
    		}
    		if($cf->soal_13)
    		{
    		$soal13 = $cf->soal_13;
    		}
    		if($cf->soal_14)
    		{
    		$soal13 = $cf->soal_14;
    		}
    		if($cf->soal_15)
    		{
    		$soal13 = $cf->soal_15;
    		}
    		if($cf->soal_16)
    		{
    		$soal13 = $cf->soal_16;
    		}
    		if($cf->soal_17)
    		{
    		$soal13 = $cf->soal_17;
    		}
    		if($cf->soal_18)
    		{
    		$soal13 = $cf->soal_18;
    		}
    		if($cf->soal_19)
    		{
    		$soal13 = $cf->soal_19;
    		}
    		if($cf->soal_20)
    		{
    		$soal13 = $cf->soal_20;
    		}
    		$navigasi = array($soal1, $soal2, $soal3, $soal4, $soal5, $soal6, $soal7, $soal8, $soal9, $soal10, $soal11, $soal12, $soal13, $soal14, $soal15, $soal16, $soal17, $soal18, $soal19, $soal20);
    		
    	    $data['navigasi'] = $navigasi;
		}

		$this->load->view('layout/header');
		$this->load->view('cfit_1', $data);
		$this->load->view('layout/footer');
	}
	
	public function cfit_2()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
         $id_time = $this->session->id_timer;
         $time = $this->cfit_model->get_time($id_time);
         $data['end'] = $time->end;
         
        $kode = 'CFIT (2)'; 
	    $cfit = $this->cfit_model->get_cfit($kode);
	    $jumlah_data = count($cfit);
	    $data['soal'] = $cfit;
	    $data['count'] = $jumlah_data;

		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/welcome/cfit_2/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
		$config["uri_segment"] = 3;
		
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['user'] = $this->cfit_model->data($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);
		
		if (!is_null($this->session->id_tes))
		{
    		$cf = $this->cfit_model->get_hasil($this->session->id_tes);
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
    		$navigasi = array($soal1, $soal2, $soal3, $soal4, $soal5, $soal6, $soal7, $soal8, $soal9, $soal10, $soal11, $soal12, $soal13, $soal14);
    		
    	    $data['navigasi'] = $navigasi;
		}

		$this->load->view('layout/header');
		$this->load->view('cfit_2', $data);
		$this->load->view('layout/footer');
	}
	
	public function cfit_3()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
         $id_time = $this->session->id_timer;
         $time = $this->cfit_model->get_time($id_time);
         $data['end'] = $time->end;
         
        $kode = 'CFIT (3)'; 
	    $cfit = $this->cfit_model->get_cfit($kode);
	    $jumlah_data = count($cfit);
	    $data['soal'] = $cfit;
	    $data['count'] = $jumlah_data;

		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/welcome/cfit_3/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
		$config["uri_segment"] = 3;
		
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['user'] = $this->cfit_model->data($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);
		
		if (!is_null($this->session->id_tes))
		{
    		$cf = $this->cfit_model->get_hasil($this->session->id_tes);
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
    		$navigasi = array($soal1, $soal2, $soal3, $soal4, $soal5, $soal6, $soal7, $soal8, $soal9, $soal10, $soal11, $soal12, $soal13);
    		
    	    $data['navigasi'] = $navigasi;
		}

		$this->load->view('layout/header');
		$this->load->view('cfit_3', $data);
		$this->load->view('layout/footer');
	}
	
	public function cfit_4()
	{
	    if($this->session->userdata("logged_in") !== true)
         {
         redirect(site_url(),'refresh');
         }
         
         $id_time = $this->session->id_timer;
         $time = $this->cfit_model->get_time($id_time);
         $data['end'] = $time->end;
         
        $kode = 'CFIT (4)'; 
	    $cfit = $this->cfit_model->get_cfit($kode);
	    $jumlah_data = count($cfit);
	    $data['soal'] = $cfit;
	    $data['count'] = $jumlah_data;

		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().'index.php/welcome/cfit_4/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 1;
		$config["uri_segment"] = 3;
		
		$from = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$data['user'] = $this->cfit_model->data($kode, $config['per_page'],$from);
		$data['page'] = $this->uri->segment(3);
		
		if (!is_null($this->session->id_tes))
		{
    		$cf = $this->cfit_model->get_hasil($this->session->id_tes);
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
    		$navigasi = array($soal1, $soal2, $soal3, $soal4, $soal5, $soal6, $soal7, $soal8, $soal9, $soal10);
    		
    	    $data['navigasi'] = $navigasi;
		}

		$this->load->view('layout/header');
		$this->load->view('cfit_4', $data);
		$this->load->view('layout/footer');
	}
	
	public function submit_cfit_1()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub2 = $this->input->post("sub2");
        $cfit_1 = $this->input->post("cfit_1");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	       
	                $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $cfit_1);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

	            
	            redirect(site_url('welcome/cfit_1/'.$pg));
	   }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       
	       $id_tes = $this->session->id_tes;
	                $this->db->set($soal, 'skip');
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
	       redirect(site_url('welcome/cfit_1/'.$pg));
	    }
	    
	    else if(isset($sub2))
	    {
	        $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $cfit_1);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
                    
                    $id_user = $this->session->user_id;
                    $data2 = array(
                            'id_tes' => $id_tes,
                            'id_user' => $id_user,
                            'id_alat_tes' => 2,
                            'tanggal' => date('Y-m-d')
                        );
            $result2 = $this->db->insert('riwayat_tes', $data2);
	        redirect(site_url('welcome/contoh_cfit_2'));
	    }
	    
	    
	}
	
	public function submit_cfit_2()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub3 = $this->input->post("sub3");
        $cfit_2 = $this->input->post("cfit_2");
        
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	                $array2 = implode("", $cfit_2);
	                $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $array2);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

	                redirect(site_url('welcome/cfit_2/'.$pg));
	   }else if(isset($skip))
	    {
	       $pg = $page + 1;
	       
	       $id_tes = $this->session->id_tes;
	                $this->db->set($soal, 'skip');
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
	       redirect(site_url('welcome/cfit_2/'.$pg));
	    }
	    
	    else if(isset($sub3))
	    {
	                $array2 = implode("", $cfit_2);
	                $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $array2);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
                    
                    
                    $id_user = $this->session->user_id;
                    $data2 = array(
                            'id_tes' => $id_tes,
                            'id_user' => $id_user,
                            'id_alat_tes' => 2,
                            'tanggal' => date('Y-m-d')
                        );
            $result2 = $this->db->insert('riwayat_tes', $data2);
	        redirect(site_url('welcome/contoh_cfit_3'));
	    }
	    
	}
	
	public function submit_cfit_3()
	{
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $sub4 = $this->input->post("sub4");
        $cfit_3 = $this->input->post("cfit_3");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
	                $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $cfit_3);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

	            redirect(site_url('welcome/cfit_3/'.$pg));
	        }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       
	       $id_tes = $this->session->id_tes;
	                $this->db->set($soal, 'skip');
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
	       redirect(site_url('welcome/cfit_3/'.$pg));
	    }
	    
	    else if(isset($sub4))
	    {
	        $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $cfit_3);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
                    
                    $id_user = $this->session->user_id;
                    $data2 = array(
                            'id_tes' => $id_tes,
                            'id_user' => $id_user,
                            'id_alat_tes' => 2,
                            'tanggal' => date('Y-m-d')
                        );
            $result2 = $this->db->insert('riwayat_tes', $data2);
	        redirect(site_url('welcome/contoh_cfit_4'));
	    }
	    
	}
	
	public function submit_cfit_4()
	{
	    
	    $page = $this->input->post("page");
	    $next = $this->input->post("next");
	    $skip = $this->input->post("skip");
        $finish = $this->input->post("finish");
        $cfit_4 = $this->input->post("cfit_4");
        $id_user = $this->session->user_id;
        $pg = $page + 1;
	   $soal = 'soal_'.$pg;
        
	    if(isset($next))
	    {
                $id_tes = $this->session->id_tes;
                $this->db->set($soal, $cfit_4);
                $this->db->where('id_tes', $id_tes);
                $this->db->update('hasil_cfit'); // gives UPDATE `mytable` SET `field` = 'field+1' WHERE `id` = 2

	            redirect(site_url('welcome/cfit_4/'.$pg));
	        }
	        
	    
	    else if(isset($skip))
	    {
	       $pg = $page + 1;
	       
	       $id_tes = $this->session->id_tes;
	                $this->db->set($soal, 'skip');
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
	       redirect(site_url('welcome/cfit_4/'.$pg));
	    }
	    
	    else if(isset($finish))
	    {
	        $id_tes = $this->session->id_tes;
	                $this->db->set($soal, $cfit_4);
                    $this->db->where('id_tes', $id_tes);
                    $this->db->update('hasil_cfit');
                    
                    $id_user = $this->session->user_id;
                    $data2 = array(
                            'id_tes' => $id_tes,
                            'id_user' => $id_user,
                            'id_alat_tes' => 2,
                            'tanggal' => date('Y-m-d')
                        );
            $result2 = $this->db->insert('riwayat_tes', $data2);
	        redirect(site_url('welcome/dashboard'));
	    }
	    
	}
	
	public function register()
	{
		$this->load->view('register');
		$this->load->view('layout/footer');
	}
	
	public function check()
	{
	    $this->load->view('check');
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
        $id_sekolah = $this->input->post('id_sekolah');
        
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'role_id' => 3,
            'id_sekolah' => $id_sekolah,
            'tgl_lahir' => $tgl_lahir,
            'jk' => $jk,
            'email' => $email,
            'telp' => $telp,
            'alamat' => $alamat
            );
        
        $result = $this->db->insert('peserta_rmib2', $data);
        
        if($result)
        {
            $this->session->set_flashdata('success', 'Registrasi Berhasil, silahkan masuk menu Login.');
			redirect(site_url('welcome/login'));
        }
	}
	
	public function check_user(){
	    $username = $this->input->post("username");
	    
	    
	    
	    if(!empty($username))
	    {
	       $user = $this->user_model->get_user($username); 
	    
    	    if($user)
    	    {
    	        echo '<span style="color: red;">Username sudah terdaftar</span>';
    	    }else
    	    {
    	        echo '<span style="color: blue;">Username tersedia</span>';
    	    }
	    }
	}
	
	public function login_attempt()
	{
		$username = $this->input->post("username");
        $password = $this->input->post("userpassword");

        $result = $this->user_model->get_user($username);
        

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
				$this->session->set_userdata(['id_sekolah' => $result->id_sekolah]);
				$this->session->set_userdata(['logged_in' => TRUE]);
				$this->session->set_userdata(['gender' => $gender]);
				
				//role authentication
				//role rule :
				// 1 = admin
				// 3 = user
				if ($result->role_id == 3)
                {
                    redirect(site_url('welcome/dashboard'));
                }
                else{
                    redirect(site_url('welcome/admin'));
                }
                
				
			}
			$this->session->set_flashdata('error', 'Username atau password yang anda masukkan salah.');
			redirect(site_url('welcome/login'));
		}
			$this->session->set_flashdata('error', 'Anda belum terdaftar sebagai user.');
			redirect(site_url('welcome/login'));
	}
	
	public function verif_attempt()
	{
	    $input = $this->input->post('kode_sekolah');
	    $result = $this->sekolah_model->get_sekolah($input);
	    
	    
	    
	    if(!empty($result))
        {
            $id_sekolah = $result->sekolah_id;
	        $nama_sekolah = $result->nama_sekolah;
            $this->session->set_userdata(['nama_sekolah' => $nama_sekolah]);
            $this->session->set_userdata(['id_sekolah' => $id_sekolah]);    		
            $this->load->view('register');
    		$this->load->view('layout/footer');
        }else
        {
            $this->session->set_flashdata('error', 'Kode sekolah yang anda masukkan salah.');
			redirect(site_url('welcome/login'));        
        }
	}
	
	public function edit_sekolah($id)
	{
	    $sekolah = $this->sekolah_model->get_sekolah_by_id($id);
	    $alat = $this->sekolah_model->get_alat_by_sklh($id);
	    $data['sekolah'] = $sekolah;
	    $data['alat'] = $alat;
	    $data['submit'] = 'update';
	    
	    $this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('create_sekolah', $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function update_sekolah($id)
	{
	    $sekolah = $this->input->post('sekolah');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('kode');
        $alat = $this->input->post('alat');
        $tanggal = $this->input->post('tanggal');
        $durasi = $this->input->post('durasi');
        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));
        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));

        $data = array(
                'nama_sekolah' => $sekolah,
                'alamat' => $alamat,
                'kode_sekolah' => $kode,
                'start' => $tgl1,
                'end' => $tgl2
            );
        $this->db->set($data);
        $this->db->where('sekolah_id', $id);
        $this->db->update('daftar_sekolah');
        redirect(site_url('welcome/admin'));
	}
	
	public function delete_sekolah($id)
	{
	    $this->sekolah_model->delete($id);
	    redirect(site_url('welcome/admin'));
	}

	public function submit_sekolah()
	{
	    $sekolah = $this->input->post('sekolah');
        $alamat = $this->input->post('alamat');
        $kode = $this->input->post('kode');
        $alat = $this->input->post('alat');
        $tanggal = $this->input->post('tanggal');
        $durasi = $this->input->post('durasi');
        $tgl1 = date('Y/m/d H:i:s', strtotime($tanggal));
        $tgl2 = date('Y/m/d H:i:s', strtotime('+'.$durasi.' hours', strtotime($tanggal)));

        $insert_sekolah = array(
                'nama_sekolah' => $sekolah,
                'alamat' => $alamat,
                'kode_sekolah' => $kode,
                'start' => $tgl1,
                'end' => $tgl2
            );
        $result1 = $this->db->insert('daftar_sekolah', $insert_sekolah);
        $id_sekolah = $this->db->insert_id();
        
        for ($a = 0; $a < count($alat); $a++)
        {
            $al = $alat[$a];
            $id_alat = $this->sekolah_model->get_alat($al);
            
            $insert_paket = array(
                'id_sklh' => $id_sekolah,
                'id_alat' => $id_alat
                );
            
            $result2 = $this->db->insert('paket_alat', $insert_paket);
        }
        
        redirect(site_url('welcome/admin'));
	}
	
	public function check_start()
	{
	    $result = $this->user_model->user_by_time($this->session->user_id);
	    
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
	    $result = $this->user_model->user_by_time($this->session->user_id);
	    
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
	
	public function report_admin()
	{
	    $sekolah = $this->sekolah_model->get_sekolah_all();
	    $data['sekolah'] = $sekolah;
	    
	    $sek = $this->input->post('sekolah');
	    $data['sek'] = $sek;
	    
	    if(!empty($sek))
	    {
	        $alat = $this->sekolah_model->get_alat_by_sklh($sek);
	        $data['alat'] = $alat;
	    }

		$this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('report_admin', $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function report_hasil($alat, $sekolah)
	{
	    $al = strtolower($alat);
	    
	    $report = $this->rmib_model->get_report($al, $sekolah);
	    
	    $data['report'] = $report;
	    
	    $this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('report_'.$al, $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function alat_by_sekolah()
	{
	    $i_sekolah= $this->input->post('sekolah');
	    $alat = $this->sekolah_model->get_alat_by_sklh($sekolah);
	    
	    $this->load->view('layout-admin/topbar');
		$this->load->view('layout-admin/sidebar');
		$this->load->view('report_admin', $data);
		$this->load->view('layout-admin/footer');
	}
	
	public function delete_rmib()
	{
	    $this->rmib_model->reset_rmib($this->session->user_id);
	}
	
	public function delete_cfit()
	{
	    $this->rmib_model->reset_cfit($this->session->user_id);
	}
	
	
	public function hapus_paksa_rmib($id)
	{
	    $this->rmib_model->reset_rmib($id);
	}
	
	public function hapus_paksa_cfit($id)
	{
	    $this->rmib_model->reset_cfit($id);
	}
	
	public function set_timer_1()
	{
           $id_user = $this->session->user_id;
        $data1 = array(
	                        'id_user' => $id_user,
	                        'sub_test' => 1
	                    );
       $result2 = $this->db->insert('hasil_cfit', $data1);
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
        
        $this->db->insert('timer', $data2);
        $id = $this->db->insert_id();
        
        $this->session->set_userdata('id_timer', $id);
        
        
	}
	
	public function set_timer_2()
	{
	    $id_user = $this->session->user_id;
        $data1 = array(
	                        'id_user' => $id_user,
	                        'sub_test' => 2
	                    );
       $result2 = $this->db->insert('hasil_cfit', $data1);
       $id_tes = $this->db->insert_id();
       $this->session->set_userdata(['id_tes' => $id_tes ]);
       
       $dateStart = new DateTime();
	    $start = $dateStart->getTimestamp();
        $dateEnd = $dateStart->modify('+ 241 seconds');
        $end = $dateEnd->getTimestamp();
        
        $data = array(
                'id_tes' => $id_tes,
                'id_user' => $id_user,
                'start' => $start,
                'end' => $end
            );
        
        $this->db->insert('timer', $data);
        $id = $this->db->insert_id();
        
        $this->session->set_userdata('id_timer', $id);
        
	}
	
	public function set_timer_3()
	{
	    $id_user = $this->session->user_id;
        $data1 = array(
	                        'id_user' => $id_user,
	                        'sub_test' => 3
	                    );
       $result2 = $this->db->insert('hasil_cfit', $data1);
       $id_tes = $this->db->insert_id();
       $this->session->set_userdata(['id_tes' => $id_tes ]);
	    
	    $dateStart = new DateTime();
	    $start = $dateStart->getTimestamp();
        $dateEnd = $dateStart->modify('+ 181 seconds');
        $end = $dateEnd->getTimestamp();
        
        $id = $this->session->user_id;
        
        $data = array(
                'id_tes' => $id_tes,
                'id_user' => $id_user,
                'start' => $start,
                'end' => $end
            );
        
        $this->db->insert('timer', $data);
        $id = $this->db->insert_id();
       
        $this->session->set_userdata('id_timer', $id);
	}
	
	public function set_timer_4()
	{
	    $id_user = $this->session->user_id;
        $data1 = array(
	                        'id_user' => $id_user,
	                        'sub_test' => 3
	                    );
       $result2 = $this->db->insert('hasil_cfit', $data1);
       $id_tes = $this->db->insert_id();
       $this->session->set_userdata(['id_tes' => $id_tes ]);
	    
	    $dateStart = new DateTime();
	    $start = $dateStart->getTimestamp();
        $dateEnd = $dateStart->modify('+ 152 seconds');
        $end = $dateEnd->getTimestamp();
        
        $id = $this->session->user_id;
        
        $data = array(
                'id_tes' => $id_tes,
                'id_user' => $id_user,
                'start' => $start,
                'end' => $end
            );
        
        $this->db->insert('timer', $data);
        $id = $this->db->insert_id();
        $this->session->set_userdata('id_timer', $id);
	}
}