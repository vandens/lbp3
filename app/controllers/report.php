<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: Govervment App
	 * @created 	: Nov 19, 2015
	 */

	public $_setting;

	public function __construct()
  {
     parent::__construct();
     $this->load->model('sentra_model');
     $this->_setting 	= $this->general->get_app_setting();
     $this->_priv 		= $this->general->get_privi_list();
	 $this->_master_priv = $this->general->get_master_priv();
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
		
		$data['sub'] 		= 'Data Puskesmas per Nama Laporan';
		$data['mod']		= 'SENR';
		$data['parent']		= 'REP';

		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	public function detail()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		#$data['url']		= ;
		$detail 			= 'GLBT';

		$view 				= ($this->_priv->$detail) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= $this->sentra_model->get_title($data['id']);
		$data['sub'] 		= 'Detail Data '.$data['title'];
		$data['mod']		= $detail;

		$data['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
		

		if($data['form']){
			$sql 	= $this->db->get_where('m_sentra',array('data_id'=>$data['data_id']))->row();
			foreach($sql as $key => $val)
				$data[$key] = $val;

			$sql 	= $this->db->get_where('m_sentra_detail',array('data_id'=>$data['data_id']))->result();
			foreach($sql as $k => $vals)
				foreach($vals as $v => $val)
					$data[$vals->data_key][$v]	= empty($val) ? 0 : $val;
			$data['dis']	= 'disabled';
			$data['form_detail']	= true;
		}

		$data['form']		= $this->load->view('bo/'.strtolower(__CLASS__).'/form/'.$data['id'],$data,true);
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);


	}


	public function getdata(){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			if($this->_priv->GLBR){
					
				$columns 	= array(
									array( 'db' => 'form_id', 			'dt' => 0 ),
									array( 'db' => 'modul_name', 			'dt' => 1),
									array( 'db' => 'data_period', 			'dt' => 2 ),
									array( 'db' => 'total', 		'dt' => 3 ),
									array(
										'db'        => 'data_status',
										'dt'        => 4,
										'formatter' => function( $d, $baris ) {
											return $this->config->item('global_'.$d);
										}
									),
									array(
										'db'        => 'auto',
										'dt'        => 5,
										'formatter' => function( $d, $baris ) {
											$button	= '';						
											$button	.= ($this->_priv->GLBT) ? str_replace('#',base_url('global-report/detail/'.$d),$this->config->item('detail')) : '';
											$button	.= ($this->_priv->GLBP) ? str_replace('#',base_url('global-report/pdf/'.$d),$this->config->item('print')) : '';
										#	$button	.= ($this->_priv->SEND) ? str_replace('#','JHapus(\''.base_url('sentra-data/delete/').'\',\'key='.$d.'\')',$this->config->item('delete')) : '';
											$button .= '';
											return $button;
										}
									),
								);	
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'v_global_report', 'auto', $columns ));	
			}	
	}


}

/* End of file Grup.php */
/* Location: ./application/controllers/home.php */