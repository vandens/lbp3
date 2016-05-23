<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Info extends CI_Controller {

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
        $this->_setting 		= $this->general->get_app_setting();
        $this->_priv 			= $this->general->get_privi_list();
		$this->_master_priv 	= $this->general->get_master_priv();
    }

	public function initiate($data)
	{
		
		$data['menu'] 			= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']			= 'Informasi';

		$this->header  			= $this->load->view('bo/header',$data,true);
		$this->panel 			= $this->load->View('bo/panel',array(),true);
		$this->panel_left 		= $this->load->view('bo/panel_left',array('menu'=>'MAS'),true);
		#$this->footer  		= $this->load->view('fo/footer',array(),true);
		$this->js 				= $this->load->view('bo/js',array(),true);
		$this->js_dtable		= $this->load->view('bo/js_dtable',array(),true);
		$this->load->view('bo/home',$data);
		$this->general->writelog($data['mod'],$data['sub']);
	}

	public function index()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$view 				= ($this->_priv->INFR) ? strtolower('bo/'.__CLASS__.'/index') : 'bo/temp/no_access'; // cek privi READ
		
		$data['sub'] 			= 'Data Informasi';
		$data['mod']			= 'INFR';
		$data['contain']	=  $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	public function form($key)
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));

		$view 				= ($this->_priv->INFC) ? strtolower('bo/'.__CLASS__.'/form') : 'bo/temp/no_access'; // cek privi READ
		$data['sub'] 		=  empty($key) ? 'Tambah Informasi' : 'Edit Informasi';
		$data['mod']		=  empty($key) ? 'INFC' : 'INFU';

		$data['val']		= 'simpan';
		#$data['dlist']		= $this->general->droplist_setting(array('CAT'));


		if(!empty($key))
		{
			$sql				= $this->db->select('*')
										   ->from('m_info a')
										   #->join('m_setting b','a.category=b.set_id')
										   ->where('a.info_id',$key)
										   ->get()->row();					
			foreach($sql as $key => $val){				
						$data[$key]	= $val;
				}
			
			$data['val']		= 'update';
			#$data 	= array_merge($data,$sql);			
		}
		
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);
	}


	public function simpan(){
		$post 			= $this->input->post();

					$data['key'] 	= $post['key'];
					$data['val']	= $post['submit'];
					unset($post['key']);
					unset($post['submit']);
				 	if(!$this->_priv->INFR || !$this->_priv->INFU){
						$this->general->writelog('INFC','Mengakses halaman tidak berizin');
						$view = 'bo/temp/no_access';
				 	}else{
				 		
						$this->form_validation->set_rules('info_title', 'Judul', 'required|max_length[100]');
						$this->form_validation->set_rules('info_content', 'Deskripsi', 'required');
						if ($this->form_validation->run() == TRUE)
						{
							
								$extension		= explode(".", $_FILES['info_filename']['name']);
								$ext 			= end($extension);
								$newfilename 	= date('YmdHis').'.'.$ext;
									
								if($_FILES['info_filename']['name'] !=''){    
									$post['info_filename']	= $newfilename;
									move_uploaded_file($_FILES["info_filename"]["tmp_name"],FCPATH."/media/info/".$newfilename);
										
									$config['image_library'] 	= 'gd2';
									$config['source_image']		= FCPATH.'/media/info/'.$newfilename;
									$config['create_thumb'] 	= TRUE;
									$config['maintain_ratio'] 	= TRUE;
									$config['width']			= 256;
									$config['height']			= 256;										
									$this->load->library('image_lib', $config); 										
									$this->image_lib->resize();
						  			    
								 }else{ 
								   	$post['info_filename'] = $post['img'];
								 }
								  unset($post['img']);

								if($data['val'] == 'simpan'){									
									$post['info_dateto']	= empty($post['info_dateto']) ? NULL : $post['info_dateto'];
								    $post['info_addby']		= $this->session->userdata('user_id');
								    $post['info_addtime']	= date('Y-m-d H:i:s');
								    #$post['info_status']	= 'active';
									$sql 	= $this->db->insert('m_info',$post);
									$msg 	= ($sql) ? 'Berhasil simpan informasi' : 'Gagal simpan info : '.$this->db->_error_number().' '.$this->db->_error_message();
									$view 	= ($sql) ? 'bo/temp/success' : 'bo/temp/failed';
									$this->general->writelog('INFC',$msg,json_encode($post));

								   
								}elseif($data['val'] == 'update'){
									
									$post['info_dateto'] 	= (empty($post['info_dateto'])) ? NULL : $post['info_dateto']  ;
									$post['info_updateby'] 	= $this->session->userdata('user_id');
									$post['info_updatetime']	= date('Y-m-d H:i:s');
									$sql 	= $this->db->where('info_id',$data['key'])->update('m_info',$post);
									$view	= ($sql) ? 'bo/temp/success' : 'bo/temp/failed';
									$msg 	= ($sql) ? 'Berhasil update informasi' : 'Gagal update info : '.$this->db->_error_number().' '.$this->db->_error_message();
									$this->general->writelog('INFU',$msg,json_encode($post));
								}
								
						}
						else
						{
							#$data['dlist']		= $this->general->droplist_setting(array('STA'));
							$data = array_merge($data,$post);
							$view = 'bo/'.  strtolower(__CLASS__.'/form');
						}
					}

		$data['sub']		= $msg;
		$data['mod']		= empty($data['user_id']) ? 'INFC' : 'INFU';
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);
	}

	
	public function delete(){
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';
		
		if(!$this->_priv->INFD){
			$msg = array('status'=>'danger','msg'=>'Gagal : Anda tidak punya akses pada menu ini');
		}else{

			try{
				$this->db->trans_begin();
				$key 		= $this->input->post('key',true);
				$raw 		= json_encode($this->db->where('info_id',$key)->get('m_info')->result());
				$sql 		= $this->db->where('info_id',$key)->delete('m_info');
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
		
		$this->general->writelog('INFD',$msg['msg'],$raw); 
			
		echo json_encode($msg); 
		exit;
	}


	public function detail($key){		
		(!$this->session->userdata('user_islogin')) ? redirect('login') : '';	
		
		$view = 'bo/temp/no_access';
		if($this->_priv->INFT){
		
			$sql				= $this->db->select('*')
										   ->from('m_info a')
										   #->join('m_setting b','a.category=b.set_id')
										   ->where('a.info_id',$key)
										   ->get()->row();					
			foreach($sql as $key => $val){
				$data[$key] = $val;
			}


			$view 			= strtolower('bo/'.__CLASS__.'/detail');
		}					
		
		$data['sub']		= 'Detail Informasi : '.$data['info_title'];
		$data['mod']		= 'INFT';
		$data['contain']	= $this->load->view($view,$data,true);
		$this->initiate($data);	
	}

	
	public function getdata(){
		(!$this->session->userdata('user_islogin')) ? redirect('home') : '';
			if($this->_priv->INFR){
				if(!$this->session->userdata('admin'))
					$_GET['columns'][0]['search']['value'] = $this->session->userdata('village_code');
					

				$columns 	= array(
									array( 'db' => 'info_title',	'dt' => 0 ),
									array(
										'db'        => 'info_dateto',
										'dt'        => 1,
										'formatter' => function( $d, $baris ) {
											return empty($d) ? '' : date('d M Y',strtotime($d));
										}
									),	
									array( 'db' => 'info_ispublish','dt' => 2 ),
									array( 'db' => 'info_visited',	'dt' => 3 ),
									array(
										'db'        => 'info_status',
										'dt'        => 4,
										'formatter' => function( $d, $baris ) {
											return $this->config->item('global_'.$d);
										}
									),
									array(
										'db'        => 'info_id',
										'dt'        => 5,
										'formatter' => function( $d, $baris ) {
											$button	= '';						
											$button	.= ($this->_priv->INFT) ? str_replace('#',base_url(strtolower(__CLASS__)).'/detail/'.$d,$this->config->item('detail')) : '';
											$button	.= ($this->_priv->INFU) ? str_replace('#',base_url(strtolower(__CLASS__)).'/form/'.$d,$this->config->item('update')) : '';
											$button	.= ($this->_priv->INFD) ? str_replace('#','JHapus(\''.strtolower(__CLASS__).'/delete/\',\'key='.$d.'\')',$this->config->item('delete')) : '';
											$button .= '';
											return $button;
										}
									)
				);		
				
				$this->load->library('datatable');
				echo json_encode($this->datatable->simple( $_GET, $this->config->item('db'), 'lbp_m_info', 'info_id', $columns ));	
			}	
	}


}

/* End of file kategori.php */
/* Location: ./application/controllers/kategori.php */