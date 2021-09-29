<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require ('../../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Spreadsheet_controller extends CI_Controller {

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
		$this->load->model('spreadsheet_model');
	}
	
	public function import()
	{
	    $id_perusahaan = $this->session->id_import;
		$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            
			if(isset($_FILES['excel']['name']) && in_array($_FILES['excel']['type'], $file_mimes)) {
			    
			    
			    $arr_file = explode('.', $_FILES['excel']['name']);
			    $extension = end($arr_file);
			 
			    if('csv' == $extension) {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
			    } else {
			        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			    }
			 
			    $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);
			     
			    $sheetData = $spreadsheet->getActiveSheet()->toArray();
			    

			    for($i = 1;$i < count($sheetData);$i++)
			    {
			        $no_soal = $sheetData[$i]['0'];
				    $soal = $sheetData[$i]['1'];

				    $ar = array(							
							'no_soal' => $no_soal,
							'id_perusahaan' => $id_perusahaan,
							'soal' => $soal
				    	);			    	
				  		$this->spreadsheet_model->insert('soal_survey', $ar);
			    }
			    

			}
			redirect(site_url('survey_controller/user_survey'));
	}
}