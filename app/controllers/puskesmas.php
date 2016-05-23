<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puskesmas extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: Govervment App
	 * @created 	: Nov 19, 2015
	 */

	public $_setting;

	public function __construct()
  {
        parent::__construct();
        $this->load->model('general_model');
        $this->load->model('puskes_model');
        $this->load->model('user_model');
        $this->_setting 		= $this->general->get_app_setting();
        $this->_priv 			= $this->general->get_privi_list();
		$this->_master_priv	 	= $this->general->get_master_priv();
		$this->_droplist 		= $this->user_model->drop_list();
  }

	public function initiate($data)
	{
			$data['menu'] 			= anchor(base_url(), 'Home', 'title="Home"');
			$data['nav']			= 'Puskesmas';
			
			$this->header  			= $this->load->view('bo/header',$data,true);
			$this->panel 			= $this->load->view('bo/panel',array(),true);
			$this->panel_left 		= $this->load->view('bo/panel_left',array('menu'=>'MAS'),true);
			#$this->footer  		= $this->load->view('fo/footer',array(),true);
			$this->js 				= $this->load->view('bo/js',array(),true);
			$this->js_dtable		= $this->load->view('bo/js_dtable',array(),true);
			$this->load->view('bo/home',$data);
			$this->general->writelog($data['mod'],$data['sub'],$data['raw']);
	}

	public function index()
	{  
			if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
			$view					= ($this->_priv->PUSR) ? strtolower('bo/'.__CLASS__.'/index') : 'bo/temp/no_access'; // cek privi READ
			
			$data['sub'] 			= 'Data Puskesmas';
			$data['mod']			= 'PUSR';
			$data['contain']		=  $this->load->view($view,$data,true);
			$this->initiate($data);
	}

	public function form($key)
	{  
			if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
	
			$view 				= ($this->_priv->PUSC) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
			$data['sub'] 		=  empty($key) ? 'Tambah Data Puskesmas' : 'Edit Data Puskesmas';
			$data['mod']		=  empty($key) ? 'PUSC' : 'PUSU';
	
			$data['val']		= 'confirm';
			$data['dlist']		= $this->general->droplist_setting(array('STA','KEC','KEL'));
	
			if($this->uri->segment(3)){
				#$data['privlist']= $this->general->get_privi_list(true);
				$sql			= $this->puskes_model->get_puskes_detail($key);
				foreach($sql as $key => $val)
						$data[$key]	= $val;
			}
	
			$data['contain']	= $this->load->view($view,$data,true);
			$this->initiate($data);
	}

	public function confirm()
	{
		(!$this->session->userdata('user_islogin')) ? redirect(base_url('login')) : '';
		$post 				= $this->input->post();	

		$data['sub']		= 'Konfirmasi Data Puskesmas';
		$data['mod']		= empty($post['pus_code']) ? 'PUSC' : 'PUSU';

		if(isset($post['priv']) && $post['user_isgroup'] == 'No')
			foreach($post['priv'] as $p => $val) $post['privlist'][] = $p;
		
		#$data['key'] 		= $post['key'];
		$data['val']		= $post['submit'];
		
		#unset($post['key']);
		unset($post['submit']);
		
		if($this->_priv->PUSC || $this->_priv->PUSU){
			if(empty($post['auto']))
			$unix 	= "|is_unique[m_puskes.pus_code]";
			$this->form_validation->set_rules('pus_code', 'Kode Puskesmas', 'required|max_length[20]'.$unix.'|xss_clean');
			$this->form_validation->set_rules('pus_name', 'Nama Puskesmas', 'required|max_length[50]|xss_clean');
			$this->form_validation->set_rules('pus_head', 'Kepala Puskesmas', 'required|max_length[200]|xss_clean');
			$this->form_validation->set_rules('pus_district', 'Kecamatan', 'required|xss_clean');
			$this->form_validation->set_rules('pus_village', 'Kelurahan', 'required|xss_clean');
			$this->form_validation->set_rules('pus_email', 'Email', 'required|valid_email|max_length[100]|xss_clean');
			
						
				if ($this->form_validation->run() == TRUE)
				{				
					if($data['val'] == 'confirm'){
						$data['val']		= 'simpan';					
						$data	 				= array_merge($data,$post);	
						$this->session->set_flashdata('data_puskes',$data);
						$view 	= strtolower('bo/'.__CLASS__.'/confirm');
					}
				
				}
				else
				{
					
					$data['dlist']			= $this->general->droplist_setting(array('STA','KEC','KEL'));

					$data = array_merge($data,$post);
					$view = strtolower('bo/'.__CLASS__.'/form');
				}
				
		}else{
			$view 	= 'bo/no_access';
			#$msg 	= 'Mengakses halaman tidak berizin';
		}

		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}


	public function simpan(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
				
		$data 				= $this->session->flashdata('data_puskes');
		$view 				= 'bo/temp/failed';
		if(!$data){
			$msg 	= 'Gagal Simpan Data,Terjadi Sessi Timeout atau Re-Post Data';
		}elseif(!$this->_priv->PUSC || !$this->_priv->PUSU){
			$msg 	= 'Mengakses halaman tidak berizin';
			$view 	= 'bo/temp/no_access';
		}else{

			try {
					$this->db->trans_begin();					
					
					$data['pus_status'] = strtolower($data['pus_status']);
					if(empty($data['auto']))
						$this->puskes_model->insert_master($data);
					else
						$this->puskes_model->update_master($data);
					
					if ($this->db->trans_status() === FALSE){
							$this->db->trans_rollback();						
							$msg 	= 'Gagal Simpan Data : '.$error_db;
					}else{
							$this->db->trans_commit();
							$view 	= 'bo/temp/success';
							$msg 	= 'Berhasil Simpan Data';
					
					}
					

							
			} catch (Exception $e) {
				$msg 	= $e;
			}		
						
		}
		$data['raw']		= json_encode($data);		
		$data['sub']		= $msg;
		$data['mod']		= empty($data['user_id']) ? 'PUSC' : 'PUSU';
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}


	public function delete(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
		
		if(!$this->_priv->PUSD){
			$msg = array('status'=>'danger','msg'=>'Gagal : Anda tidak punya akses pada menu ini');
		}else{

			try{
				$this->db->trans_begin();
				$key 		= $this->input->post('key',true);
				$raw 		= $this->db->where('auto',$key)->get('m_puskes')->row();
				$sql 		= $this->db->where('auto',$key)->delete('m_puskes');
				$error_db 	= (!$sql) ? $this->db->_error_message() : '';
										
				if ($this->db->trans_status() === FALSE){
					$this->db->trans_rollback();					
					$msg 	= array('status'=>'danger','msg'=>'Data gagal dihapus : '.$error_db);
				}else{
					$this->db->trans_commit();
					$msg 	= array('status'=>'success','msg'=>'Data berhasil dihapus');
				}
															
			} catch (Exception $msg) {
				$msg['msg']	= $msg;				
			}
			
		}
		
		$this->general->writelog('PUSD',$msg['msg'],json_encode($raw)); 
			
		echo json_encode($msg); 
		exit;
	}


	public function detail($key){		
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';	
		
		$view = 'bo/temp/no_access';
		if($this->_priv->PUST){
		
			$sql			= $this->puskes_model->get_puskes_detail($key);
			foreach($sql as $key => $val)
					$data[$key]	= $val;
			unset($sql);
			$view 			= strtolower('bo/'.__CLASS__.'/detail');
		}					
		
		$data['sub']		= 'Detail Puskesmas : '.$data['pus_name'];
		$data['mod']		= 'PUST';
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}
	
	public function getdata(){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			if($this->_priv->PUSR){
			#	if(!$this->session->userdata('admin'))
			#		$_GET['columns'][3]['search']['value'] = $this->session->userdata('pus_code');
					
			$columns 	= array(
					array( 'db' => 'pus_code', 		'dt' => 0 ),
					array( 'db' => 'pus_name', 		'dt' => 1 ),
					array( 'db' => 'pus_head', 	'dt' => 2 ),
					array( 'db' => 'pus_phone', 		'dt' => 3 ),
					array(
						'db'        => 'pus_address',
						'dt'        => 4,
						'formatter' => function( $d, $baris ) {
							return substr($d,0,50).'...';
						}
					),
					array(
						'db'        => 'pus_status',
						'dt'        => 5,
						'formatter' => function( $d, $baris ) {
							return $this->config->item('global_'.$d);
						}
					),	
					array(
						'db'        => 'auto',
						'dt'        => 6,
						'formatter' => function( $d, $baris ) {
							$button	= '';						
							$button	.= ($this->_priv->PUST) ? str_replace('#',base_url(strtolower(__CLASS__)).'/detail/'.$d,$this->config->item('detail')) : '';
							$button	.= ($this->_priv->PUSU) ? str_replace('#',base_url(strtolower(__CLASS__)).'/form/'.$d,$this->config->item('update')) : '';
							$button	.= ($this->_priv->PUSD) ? str_replace('#','JHapus(\''.strtolower(__CLASS__).'/delete/\',\'key='.$d.'\')',$this->config->item('delete')) : '';
							$button .= '';
							return $button;
						}
					)
				);		
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'lbp_m_puskes', 'auto', $columns ));	
			}	
	}


}

/* End of file home.php */
/* Location: ./application/controllers/home.php */