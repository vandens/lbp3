<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sentra extends CI_Controller {

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
		
		$parent 			= in_array($formid, array('A','B','C','D','E','F','G')) ? 'PPP' : (in_array($formid,array('H','I','J','K')) ? 'PPW' : (in_array($formid,array('L')) ? 'BPJ' : 'REP'));
		$data['menu'] 		= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']		= 'Sentra-Data';

		$this->header  		= $this->load->view('bo/header',$data,true);
		$this->panel 		= $this->load->View('bo/panel',array(),true);
		$this->panel_left 	= $this->load->view('bo/panel_left',array('menu'=>$parent),true);
		#$this->footer  		= $this->load->view('fo/footer',array(),true);
		$this->js 			= $this->load->view('bo/js',array(),true);
		$this->js_dtable	= $this->load->view('bo/js_dtable',$data,true);
		$this->load->view('bo/home',$data);
		$this->general->writelog($data['mod'],$data['sub'],$data['raw']);
	}

	public function index()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$view 				= ($this->_priv->GROR) ? strtolower('bo/'.__CLASS__.'/index') : 'bo/temp/no_access'; // cek privi READ
		
		$data['sub'] 		= 'Data Utama';
		$data['mod']		= 'SENR';
		$data['parent']		= 'REP';
		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	public function form()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		$data['create'] 	= $data['id'].'C';
		$data['update'] 	= $data['id'].'U';
		$data['form_id']	= $data['id'];

		$view 				= ($this->_priv->$data['create']) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= $this->sentra_model->get_title($data['id']);
		$data['sub'] 		=  empty($data['data_id']) ? 'Tambah Data '.$data['title'] : 'Edit Data '.$data['title'];
		$data['mod']		=  empty($data['data_id']) ? $data['create'] : $data['update'];

		$data['val']		= 'confirm';
		$data['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
		if($data['data_id']){
			$sql 	= $this->db->get_where('m_sentra',array('data_id'=>$data['data_id']))->row();
			foreach($sql as $key => $val)
				$data[$key] = $val;

			$sql 	= $this->db->get_where('m_sentra_detail',array('data_id'=>$data['data_id']))->result();
			foreach($sql as $k => $vals)
				foreach($vals as $v => $val)
					$data[$vals->data_key][$v]	= $val;
		}

		$data['form']		= $this->load->view('bo/'.strtolower(__CLASS__).'/form/'.$data['id'],$data,true);
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	public function validasi($str){
		$post 	= $this->input->post();
		
		if($post['form_id'] == 'K09'){
			foreach($post['selection'] as $key => $val)
				if(empty($val)) $incomplete = true;

			foreach ($post['selection'] as $key => $val) {
				if(in_array($val, $checked))
				 	$exist_list = true;
				 else
				 	$checked[] = $val;
			}
		}

		$exist 	= $this->sentra_model->cek_data_exist($post);
		$msg 	= '';
		if($exist && empty($post['data_id'])) 
			$msg 	= 'Data Periode '.$post['data_period'].' sudah ada!';
		elseif($incomplete) 
			$msg 	= 'Data 10 penyakit terbanyak tidak lengkap';
		elseif($exist_list)
			$msg 	= 'Data 10 penyakit harus unik';		

		if(!empty($msg)) $this->form_validation->set_message('validasi', $msg);	
		return empty($msg) ? true : false;
	}

	public function confirm()
	{
		(!$this->session->userdata('user_islogin')) ? redirect(base_url('login')) : '';
		$post 				= $this->input->post();	
		
		$data['create'] 	= $post['form_id'].'C';
		$data['update'] 	= $post['form_id'].'U';

		$data['sub']		= 'Konfirmasi Data '.$post['title'];
		$data['mod']		= empty($post['form_id']) ? $data['create'] : $data['update'];
		$data['val']		= $post['submit'];
		unset($post['submit']);
		$data['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
					
				
		$data	 = array_merge($data,$post);
		if($this->_priv->$data['create'] || $this->_priv->$data['update']){
					
			$this->form_validation->set_rules('data_period', 'Periode Data', 'required|max_length[35]|xss_clean|callback_validasi');
			
				if ($this->form_validation->run() == TRUE)
				{										
					$data['val']			= 'simpan';						
					$data['dis'] 			= 'disabled';

					$this->session->set_userdata('data_'.$data['form_id'],$data);
					$view 	= strtolower('bo/'.__CLASS__.'/form');	
				}
				else
				{						
					foreach($data['detail'] as $key => $val)
					$data[$key]			= $val;
					$view = strtolower('bo/'.__CLASS__.'/form');
				}
		}else{
			$view = 'bo/temp/no_access';
			$msg 	= 'Mengakses halaman tidak berizin';
		}

		foreach($data['detail'] as $d_key => $d_val)
			foreach($d_val as $keys => $value)
				foreach($value as $key => $val)
					$data[$d_key][$keys.$key] = (empty($val)  && $data['val'] == 'simpan') ? 0 : $val;
				
		
		$data['form']		= $this->load->view('bo/'.strtolower(__CLASS__).'/form/'.$data['form_id'],$data,true);
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}


	public function simpan(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';	
		$post 				= $this->input->post();	

		$data 				= $this->session->userdata('data_'.$post['form_id']);
		#$this->session->unset_userdata('data_'.$post['form_id']);
		$data['create'] 	= $post['form_id'].'C';
		$data['update'] 	= $post['form_id'].'U';

		$view 				= 'bo/temp/failed';
		if(!$data){
			$msg 	= 'Gagal Simpan Data,Terjadi Sessi Timeout atau Re-Post Data';
		}elseif(!$this->_priv->$data['create'] || !$this->_priv->$data['update']){
			$msg 	= 'Mengakses halaman tidak berizin';
			$view 	= 'bo/temp/no_access';
		}else{

			try {
				
					$this->db->trans_begin();
					$key 		= empty($data['data_id']) ? date('my',strtotime($data['data_period'])).substr(microtime(),-9,9) : $data['data_id'];


					#echo '<pre>'; print_r($data); die;
					foreach($data['detail'] as $d_key => $d_val){
						unset($detil);
						$detil['data_id']		= $key;
						$detil['data_key']		= $d_key;
						foreach($d_val as $keys => $value)
							foreach($value as $ky => $val)
							$detil[$keys.$ky] = !empty($val) ? $val : '';				
							
							
							if(in_array($data['form_id'],array('K09','L02'))) $detil['data_key0']	= !empty($data['selection'][$d_key]) ? $data['selection'][$d_key] : '';

							$detail[]		    = $detil;
						
					}
					#echo '<pre>'; print_r($detail); die;

					if(empty($data['data_id'])){

							$master['data_id']		= $key;
							$master['form_id']		= $data['form_id'];
							$master['pus_code']		= $this->session->userdata('pus_code');
							$master['data_period']	= $data['data_period'];
							$master['data_status']	= 'active';
							$master['data_addby']	= $this->session->userdata('user_id');
							$master['data_addtime']	= date('Y-m-d H:i:s');
												
							$sql 		= $this->db->insert('m_sentra',$master);
							$error_db 	= (!$sql) ? $this->db->_error_message() : '';
								


							foreach($detail as $det => $tail)
								$sql2 	 = $this->db->insert('m_sentra_detail',$tail);
								$error_db 	.= (!$sql2) ? $this->db->_error_message() : '';			
					}else{		


							$master['form_id']			= $data['form_id'];
							$master['pus_code']			= $this->session->userdata('pus_code');
							$master['data_period']		= $data['data_period'];
							$master['data_status']		= 'active';
							$master['data_updateby']	= $this->session->userdata('user_id');
							$master['data_updatetime']	= date('Y-m-d H:i:s');

								
							$sql 		= $this->db->where('data_id',$key)->update('m_sentra',$master);					
							$error_db 	= (!$sql) ? $this->db->_error_message() : '';	
							
							$this->db->where('data_id',$key)->delete('m_sentra_detail');

							foreach($detail as $det => $tail)
								$sql2 	 = $this->db->insert('m_sentra_detail',$tail);
								$error_db 	.= (!$sql2) ? $this->db->_error_message() : '';	
				
					}
								
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
		$data['raw']		= json_encode($data['detail']);	
		$data['sub']		= $msg;
		$data['mod']		= empty($key) ? $data['create'] : $data['update'];
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}


	
	public function delete(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
		$data 	 = explode('/',$this->input->post('key'));
		$delete	 = $data[1].'D';
		if(!$this->_priv->$delete){
			$msg = array('status'=>'danger','msg'=>'Gagal : Anda tidak punya akses pada menu ini');
		}else{

			try{
				$this->db->trans_begin();
				$key 	 = end($data);
							
				$cek = $this->db->where('data_id',$key)
								 ->where('data_status','deleted')->get('m_sentra')->num_rows();
				if($cek > 0)
					$msg 		= array('status'=>'danger','msg'=>'Data sudah di hapus');
				else{

					$raw 		= json_encode($this->db->where('data_id',$key)->get('m_sentra')->result());

					$sql 		= $this->db->where('data_id',$key)->delete('m_sentra');
					$sql1		= $this->db->where('data_id',$key)->delete('m_sentra_detail');
					$error_db 	= (!$sql || !$sql1) ? $this->db->_error_message() : '';
											
					if ($this->db->trans_status() === FALSE){
						$this->db->trans_rollback();					
						$msg 	= array('status'=>'danger','msg'=>'Data gagal dihapus : '.$error_db);
					}else{
						$this->db->trans_commit();
						$msg 	= array('status'=>'success','msg'=>'Data berhasil dihapus');
					}
					
				}
			     												
			} catch (Exception $msg) {
				$msg['msg']	= $msg;						
			}
			
		}
		
		$this->general->writelog($delete,$msg['msg'],$raw); 
			
		echo json_encode($msg); 
		exit;
	}


	public function detail()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		#$data['url']		= ;

		$data['create'] 	= $data['id'].'C';
		$data['update'] 	= $data['id'].'U';
		$detail 			= $data['id'].'T';

		$view 				= ($this->_priv->$detail) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= $this->sentra_model->get_title($data['id']);
		$data['sub'] 		= 'Detail Data '.$data['title'];
		$data['mod']		= $detail;

		$data['dlist']		= $this->general->droplist_setting(array('STA','DIS'));
		

		if($data['data_id']){
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
			if($this->_priv->SENR){
				if($this->session->userdata('user_grup') != 'GRP01')
					$_GET['columns'][0]['search']['value'] = $this->session->userdata('pus_code');
					
				$columns 	= array(
									array( 'db' => 'pus_code', 			'dt' => 0 ),
									array( 'db' => 'pus_name', 			'dt' => 1),
									array( 'db' => 'data_id', 			'dt' => 2 ),
									array( 'db' => 'modul_name', 		'dt' => 3 ),
									array( 'db' => 'data_period', 		'dt' => 4 ),
									array(
										'db'        => 'data_status',
										'dt'        => 5,
										'formatter' => function( $d, $baris ) {
											return $this->config->item('global_'.$d);
										}
									),
									array(
										'db'        => 'uri',
										'dt'        => 6,
										'formatter' => function( $d, $baris ) {
											$button	= '';						
											$button	.= ($this->_priv->SENT) ? str_replace('#',base_url('sentra-data/detail/'.$d),$this->config->item('detail')) : '';
											$button	.= ($this->_priv->SENU) ? str_replace('#',base_url('sentra-data/form/'.$d),$this->config->item('update')) : '';
											$button	.= ($this->_priv->SEND) ? str_replace('#','JHapus(\''.base_url('sentra-data/delete/').'\',\'key='.$d.'\')',$this->config->item('delete')) : '';
											$button .= '';
											return $button;
										}
									),
								);		
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'v_sentra_data', 'uri', $columns ));	
			}	
	}


}

/* End of file Grup.php */
/* Location: ./application/controllers/home.php */