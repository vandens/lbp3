<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: Govervment App
	 * @created 	: Nov 19, 2015
	 */

	public $_setting;

	public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->_setting 	= $this->general->get_app_setting();
        $this->_priv 		= $this->general->get_privi_list();
		$this->_master_priv = $this->general->get_master_priv();
    }

	public function initiate($data)
	{
		
		$data['menu'] 		= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']		= 'Wilayah';

		$this->header  		= $this->load->view('bo/header',$data,true);
		$this->panel 		= $this->load->View('bo/panel',array(),true);
		$this->panel_left 	= $this->load->view('bo/panel_left',array('menu'=>'MAS'),true);

		$this->js 			= $this->load->view('bo/js',array(),true);
		$this->js_dtable	= $this->load->view('bo/js_dtable',$data,true);
		$this->load->view('bo/home',$data);
		$this->general->writelog($data['mod'],$data['sub']);
	}

	public function index($key)
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		#$view 				= ($this->_priv->KECR) ? strtolower('bo/'.__CLASS__.'/wilayah') : 'bo/temp/no_access'; // cek privi READ
		$view 				= strtolower('bo/'.__CLASS__.'/index') ;
		$data['nav']		= 'Wilayah';
		$data['sub'] 		= 'Data '.$key;

		$data['_uri']		=  'master/get_data/'.$key;
		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data,'MAS');

	}

	public function form($key)
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$code 				= ($key == 'kecamatan') ? 'KECC' : 'KELC';
		$view 				= ($this->_priv->$code) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
		$data['sub'] 		=  empty($this->input->get('key')) ? 'Tambah Data '.ucwords($key) : 'Edit Data '.ucwords($key);
		$data['mod']		=  $code; //empty($key) ? 'GROC' : 'GROU';

		if($this->input->post('key')){
			$sql 	= $this->db->where('auto',$this->input->post('key'))->get('m_setting')->row();
			foreach($sql as $key => $val)
				$data[$key] = $val;
		}

		$this->load->view('bo/master/form',$data);
		$this->general->writelog($code,$data['sub']);
	}

	public function simpan(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
		$data['mod']		= ($key == 'kecamatan') ? 'KECC' : 'KELC';
		$post 				= $this->input->post();
		$view 				= 'bo/temp/failed';
		$return['status']	= 'danger';

		if(empty($post['set_id']) || empty($post['set_value']))
			$msg 	= 'Semua field wajib diisi';
		elseif(!$this->_priv->$data['mod'] || !$this->_priv->$data['mod'])
			$msg	= 'Mengakses halaman tidak berizin';
		elseif($this->db->where('set_id',$post['set_id'])->get('m_setting')->num_rows())
			$msg	= 'Kode sudah terdaftar';
		else{

			try {
				
					$this->db->trans_begin();
					$key 		= $post['key'];
					unset($post['key']);
																	
					if(empty($key))	$this->db->insert('m_setting',$post);
					else			$this->db->where('auto',$key)->update('m_setting',$post);											
					
								
					if ($this->db->trans_status() === FALSE){
						$this->db->trans_rollback();						
						$msg 	= 'Gagal Simpan Data ';
					}else{
						$this->db->trans_commit();
						$view 	= 'bo/temp/success';
						$msg 	= 'Berhasil Simpan Data';
					}
							
			} catch (Exception $e) {
				$msg	= $e;
			}
		}

		$data['sub']	 = $msg;
		$return['msg']	 = $msg;
		$this->general->writelog($data['mod'],$data['sub'],json_encode($post));
		echo json_encode($return);
	}


	
	public function delete(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
		
		$key 	 = $this->input->post('key',true);
		$val 	 = $this->input->post('val',true);

		if((!$this->_priv->KECD && $val=='kecamatan') ^  (!$this->_priv->KELD) && $val='kelurahan'){
			$msg = array('status'=>'danger','msg'=>'Gagal : Anda tidak punya akses pada menu ini');
		}else{

			try{
				$this->db->trans_begin();

				$wil 	 = ($val == 'kecamatan') ? 'pus_district' : 'pus_village';
				$pus 	 = $this->db->select('a.*')
									->from('m_setting a')
									->join('m_puskes b','a.set_value = b.'.$wil)
									->where('a.auto',$key)->get()
									->row();

				if(count($pus) > 0)
					$msg 		= array('status'=>'danger','msg'=>'Gagal : '.ucwords($val.' '.$pus->set_value).' masih digunakan');
				else{

					$raw 		= json_encode($this->db->where('auto',$key)->get('m_setting')->result());

					$sql 		= $this->db->where('auto',$key)->delete('m_setting');

					$error_db 	= (!$sql) ? $this->db->_error_message() : '';
											
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
		$mod 	= ($val == 'kecamatan') ? 'KECD' : 'KELD';
		$this->general->writelog('GROD',$msg['msg'],$raw); 
			
		echo json_encode($msg); 
		exit;
	}


	public function detail($key){		
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';	
		
		$view = 'bo/temp/no_access';
		if($this->_priv->GROT){
		
			$sql			= $this->db->where('group_id',$key)->get('m_group')->result();

			foreach($sql as $row){
				foreach($row as $r => $w)
					$data[$r]	= $w;
			}

			$data['privlist'] 		= $this->user_model->get_exist_priv($key);

			$data['confirm_priv']	= $this->user_model->confirm_priv($this->_master_priv,$data['privlist']);
			
					// echo '<pre>'; print_r($this->_master_priv);
					// echo '<pre>'; print_R($data['privlist']); 
					// echo '<pre>'; print_r($data['confirm_priv']); die;
					

			$view 			= strtolower('bo/'.__CLASS__.'/detail');
		}		
	
		
		$data['sub']		= 'Detail Wilayah : '.$data['group_name'];
		$data['mod']		= 'GROT';
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}
	
	public function get_data($key){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			#if($this->_priv->KECR || $this->_priv->KELR){
				$_GET['columns'][3]['search']['value'] = $key;
				$columns 	= array(
									array( 'db' => 'set_id', 			'dt' => 0 ),
									array( 'db' => 'set_value', 		'dt' => 1 ),
									array( 'db' => 'set_order', 		'dt' => 2 ),
									array( 'db' => 'set_desc', 			'dt' => 3 ),
									array(
										'db'        => 'set_status',
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
											#$button	.= ($this->_priv->KECT) ? str_replace('#',base_url(strtolower(__CLASS__)).'/detail/'.$d,$this->config->item('detail')) : '';
											#$button	.= ($this->_priv->KECU) ? str_replace('#',base_url(strtolower(__CLASS__)).'/form/'.$d,$this->config->item('update')) : '';
											$button	.= ($this->_priv->KECD) ? str_replace('#','JHapus(\''.base_url(strtolower(__CLASS__)).'/delete/\',\'key='.$d.'&val='.$this->uri->segment(3).'\')',$this->config->item('delete')) : '';
											$button .= '';
											return $button;
										}
									),
								);		
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'lbp_m_setting', 'auto', $columns ));	
			#}	
	}


}

/* End of file Wilayah.php */
/* Location: ./application/controllers/home.php */