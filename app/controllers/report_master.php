<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
class Report_master extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: Govervment App
	 * @created 	: Nov 19, 2015
	 */

	public $_setting;

	public function __construct()
  {
     parent::__construct();
     $this->load->model('report_model');
     $this->_setting 		= $this->general->get_app_setting();
     $this->_priv 			= $this->general->get_privi_list();
	 $this->_master_priv 	= $this->general->get_master_priv();
  }

	public function initiate($data)
	{
		$formid 			= ($data['id']) ? substr($data['id'],0,1) : substr($data['form_id'],0,1);
		$data['menu'] 		= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']		= 'Master-Report';

		$this->header  		= $this->load->view('bo/header',$data,true);
		$this->panel 		= $this->load->View('bo/panel',array(),true);
		$this->panel_left 	= $this->load->view('bo/panel_left',array('menu'=>'REP'),true);
		#$this->footer  		= $this->load->view('fo/footer',array(),true);
		$this->js 			= $this->load->view('bo/js',array(),true);
		$this->js_dtable	= $this->load->view('bo/js_dtable',$data,true);
		$this->load->view('bo/home',$data);
		$this->general->writelog($data['mod'],$data['sub'],$data['raw']);
	}

	public function index()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$view 				= ($this->_priv->MSRR) ? strtolower('bo/'.__CLASS__.'/index') : 'bo/temp/no_access'; // cek privi READ
		
		$data['sub'] 		= 'Data Master Laporan per Puskesmas';
		$data['mod']		= 'MSRR';

		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data);
	}


	public function pdf()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		$period 			= str_replace('%20',' ',$data['period']);

		$pus_code 			= ($this->session->userdata('user_grup') == 'GRP01') ? $data['pus_code'] : $this->session->userdata('pus_code');

		
		$data['pus']		= $this->db->where('pus_code',$pus_code)->get('m_puskes')->row();

		$view 				= ($this->_priv->MSRP) ? strtolower('bo/temp/pdf_header') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= strtoupper('Data Laporan Global <br> Puskesmas '.$data['pus']->pus_name.' Periode : '.$period);
		$data['sub'] 		= 'Cetak PDF Data '.$data['title'];
		$data['mod']		= $print;
		$list_master['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
		
		#error_reporting(E_ALL); 
		#ini_set('display_errors', 1);
		#date_default_timezone_set('Asia/Jakarta');
	
		if($data['period']){

			$get_modul 		= $this->report_model->get_modul_list('BPJ');

			$no = 1;
			foreach ($get_modul as $get => $modul) {

				unset($list_master);
				if(in_array($modul->modul_id,array('B02'))) continue;
				
				$sql 	= $this->db->get_where('m_sentra',array('form_id'=>$modul->modul_id,'pus_code'=>$pus_code,'data_period'=>$period))->row();
				foreach($sql as $key => $val)
					$list_master[$key] = $val;

				$sql 	= $this->db->get_where('m_sentra_detail',array('data_id'=>$list_master['data_id']))->result();
				foreach($sql as $k => $vals)
					foreach($vals as $v => $val)
						$list_master[$vals->data_key][$v]	= empty($val) ? 0 : $val;

				$list_master['title']		= $modul->modul_id;
				$list_master['dis']			= 'disabled';
				$list_master['form_detail']	= true;


			$form	.= $this->load->view('bo/sentra/form/'.$modul->modul_id,$list_master,true);

			}

			$data['form']		= $form; //$this->load->view('bo/sentra/form/'.$modul->modul_id,$data,true);
			$data['header']		= $this->load->view('bo/header',$data,true);
		}

		$html 				= $this->load->view($view,$data,true);	

		//load mPDF library
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		#$stylesheet = file_get_contents('media/css/bootstrap.css');
		#$pdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
		#$pdf->SetWatermarkText('');
		#$pdf->showWatermarkText = true;
		#$pdf->SetTitle(str_replace('<br>','',$data['title']));
		#$pdf->SetFooter(str_replace('<br>','',$data['title']).'|{PAGENO}|'.$this->_setting->app_author);
		$pdf->WriteHTML($html);
		ob_end_clean();
		#$pdf->Output($data['title'].'.pdf','D');
		$pdf->Output();

	}



	public function getdata(){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			if($this->_priv->MSRR){
					
				if(!$this->session->userdata('admin'))
				$_GET['columns'][0]['search']['value'] = $this->session->userdata('pus_code');
				$columns 	= array(
									array( 'db' => 'pus_code', 				'dt' => 0),
									array( 'db' => 'pus_name', 				'dt' => 1),
									array( 'db' => 'data_period', 			'dt' => 2 ),
									array( 'db' => 'total_data_reported', 	'dt' => 3, 'formatter'	=> function($d,$baris){ return '<center>'.$d.'</center>'; }),
									array( 'db' => 'data_updateby', 		'dt' => 4),
									array(
										'db'        => 'data_updatetime',
										'dt'        => 5,
										'formatter' => function( $d, $baris ) {
											return empty($d) ? '' : date('d M Y H:i:s',strtotime($d));
										}
									),
									array(
										'db'        => 'data_status',
										'dt'        => 6,
										'formatter' => function( $d, $baris ) {
											return $this->config->item('global_'.$d);
										}
									),
									array(
										'db'        => 'auto',
										'dt'        => 7,
										'formatter' => function( $d, $baris ) {
											$button	= '';						
											#$button	.= ($this->_priv->MSRT) ? str_replace('#',base_url('master-report/detail/'.$d),$this->config->item('detail')) : '';
											$button	.= ($this->_priv->MSRP) ? str_replace('#',base_url('master-report/pdf/'.$d),$this->config->item('print')) : '';
											$button .= '';
											return $button;
										}
									),
								);	
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'v_master_report', 'auto', $columns ));	
			}	
	}


}

/* End of file Grup.php */
/* Location: ./application/controllers/home.php */