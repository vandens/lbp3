<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_global extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: DinKes Kab Tangerang Government App
	 * @created 	: May 2016
	 */

	public $_setting;

	public function __construct()
  {
     parent::__construct();
     $this->load->model('sentra_model');
     $this->load->model('report_model');
     $this->load->model('puskes_model');
     $this->_setting 		= $this->general->get_app_setting();
     $this->_priv 			= $this->general->get_privi_list();
	 $this->_master_priv 	= $this->general->get_master_priv();
  }

	public function initiate($data)
	{
		$formid 			= ($data['id']) ? substr($data['id'],0,1) : substr($data['form_id'],0,1);
		$data['menu'] 		= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']		= 'Global-Report';

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
		$view 				= ($this->_priv->GLBR) ? strtolower('bo/'.__CLASS__.'/index') : 'bo/temp/no_access'; // cek privi READ
		
		$data['sub'] 		= 'Data Laporan Puskesmas per Modul';
		$data['mod']		= 'SENR';
		$data['parent']		= 'REP';

		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	public function detail()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		$period 			= str_replace('%20',' ', $data['period']);
		$detail 			= 'GLBT';

		$view 				= ($this->_priv->$detail) ? strtolower('bo/'.__CLASS__.'/detail') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= $this->sentra_model->get_title($data['id']);
		$data['sub'] 		= 'Detail Data '.$data['title'];
		$data['mod']		= $detail;

		$data['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
		

		if($data['period']){
		
			$get_modul 		= $this->report_model->get_modul_list();
			$get_header 	= $this->report_model->get_header_list($period);	
			$get_detail 	= $this->report_model->get_detail_list($period);
			
			foreach($get_detail as $inputed_data){
				$list_data[$inputed_data->pus_code][$inputed_data->form_id] 	= $inputed_data->total;
			}

			$get_puskes 	= $this->puskes_model->get_all_pus_code();
			foreach($get_puskes as $pus => $kes){
				foreach($get_modul as $get => $detil){
					$total 		= ($list_data[$kes->pus_code][$detil->modul_id]) ? 100 : 0;
					$x[] 		= array($detil->modul_name,$total);
				}				
				$xdetil[$kes->pus_code] = $x;
				unset($x);
			}



			if(count($get_header) > 0){
				foreach($get_header as $row => $val){
					#---------------------- Header  Grafik ---------------------#
					$json['name']		= $val->pus_name;
					$json['y']			= number_format(($val->total/count($get_modul)) * 100,2);
					$json['drilldown']	= $val->pus_name;
					$json_data[] 		= $json;

					unset($json);
					#---------------------- Detail  Grafik ---------------------#
					$json['name']		= $val->pus_name;
					$json['id']			= $val->pus_name;
					$json['data'] 		= $xdetil[$val->pus_code];
					$json_data2[] 		= $json;
				}
			}

			#---------------------- Header  Grafik ---------------------#
			$grafik1_header = json_encode($json_data);
			$grafik1_header = str_replace('"name"','name', $grafik1_header);
			$grafik1_header = str_replace('"y":"','y:', $grafik1_header);
			$grafik1_header = str_replace('","drilldown"',',drilldown', $grafik1_header);
			$grafik1_header = str_replace('"',"'", $grafik1_header);
			


			#---------------------- Detail  Grafik ---------------------#
			$grafik1_detail = json_encode($json_data2);
			$grafik1_detail = str_replace('"name"','name', $grafik1_detail);
			$grafik1_detail = str_replace('"id"','id', $grafik1_detail);
			$grafik1_detail = str_replace('"data"','data', $grafik1_detail);
			$grafik1_detail = str_replace('"',"'", $grafik1_detail);
		}
		
		$graf1['global']	= $grafik1_header;
		$graf1['detail']	= $grafik1_detail;

		$graf1['title']		= 'Laporan Pencapaian Global Report Periode bulan '.$period;
		$data['grafik_1']	= $this->load->view('bo/report_global/grafik_1',$graf1,true);

		$data['form']		= $this->load->view('bo/report_global/detail',$data,true);
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);


	}


	public function getdata(){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			if($this->_priv->GLBR){
					
				$columns 	= array(
									array( 'db' => 'data_period', 			'dt' => 0 ),
									array( 'db' => 'total_puskes', 			'dt' => 1 , 'formatter'	=> function($d,$baris){ return '<center>'.$d.'</center>'; }),
									array( 'db' => 'total_puskes_reported', 'dt' => 2 , 'formatter'	=> function($d,$baris){ return '<center>'.$d.'</center>'; }),
									array( 'db' => 'total_data_reported', 	'dt' => 3 , 'formatter'	=> function($d,$baris){ return '<center>'.$d.'</center>'; }),
									array(
										'db'        => 'data_status',
										'dt'        => 4,
										'formatter' => function( $d, $baris ) {
											return $this->config->item('global_'.$d);
										}
									),
									array( 'db' => 'data_updateby', 			'dt' => 5),
									array(
										'db'        => 'data_updatetime',
										'dt'        => 6,
										'formatter' => function( $d, $baris ) {
											return empty($d) ? '' : date('d M Y H:i:s',strtotime($d));
										}
									),
									array(
										'db'        => 'data_period',
										'dt'        => 7,
										'formatter' => function( $d, $baris ) {
											$button	= '';						
											$button	.= ($this->_priv->GLBT) ? str_replace('#',base_url('global-report/detail/period/'.$d),$this->config->item('detail')) : '';
										#	$button	.= ($this->_priv->GLBP) ? str_replace('#',base_url('global-report/pdf/'.$d),$this->config->item('print')) : '';
										#	$button	.= ($this->_priv->SEND) ? str_replace('#','JHapus(\''.base_url('sentra-data/delete/').'\',\'key='.$d.'\')',$this->config->item('delete')) : '';
											$button .= '';
											return $button;
										}
									),
								);	
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'v_global_report', 'data_period', $columns ));	
			}	
	}


}

/* End of file Grup.php */
/* Location: ./application/controllers/home.php */