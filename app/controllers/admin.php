<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: Govervment App
	 * @created 	: Nov 19, 2015
	 */

	public $_setting;

	public function __construct()
    {
        parent::__construct();
        $this->load->helper('menu');
        $this->load->model('general_model');
        $this->load->model('report_model');
        $this->_setting = $this->general->get_app_setting();
        $this->_priv 	= $this->general->get_privi_list();

    }

	public function initiate($data,$panel = 'dashboard'){
		
		$this->header  					= $this->load->view('bo/header',$data,true);
		$this->panel 					= $this->load->View('bo/panel',array(),true);
		$this->panel_left 				= $this->load->view('bo/panel_left',array('menu'=>$panel),true);
		#$this->footer  			= $this->load->view('fo/footer',array(),true);
		$this->js 						= $this->load->view('bo/js',$data,true);
		$this->js_dtable	= $this->load->view('bo/js_dtable',$data,true);
		$this->load->view('bo/home',$data);
		$this->general->writelog($data['mod'],$data['sub']);
	}

	public function index()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));

		$data['menu'] 		= anchor(base_url(), 'Home', 'title="Home"');
		$data['nav']		= 'Admin';
		$data['sub'] 		= 'Dashboard';

		$data['list']	= ''; # $this->mainlist();
	#	$list[]		=  $this->list1();
	#	$list[]		=  $this->list2();
	#	$list[]		=  $this->list3();		
	#	$list[]		=  $this->list4();	
	#	$list[]		=  $this->list5();
        $no = 1;
        foreach($list as $l => $r){
            $lis = 'list'.$no;
            if($r){
                 $data[$lis] = $r;
                 $no++;  
            }                                          
        } 

		$data['contain']	= $this->load->view('bo/admin/index',$data,true);
		$this->initiate($data);
	}

	function mainlist(){
		$d = array();
		return $this->load->view('bo/admin/list',$d,true);
	}
	function list1(){
		
		$d['data'] 	= $this->report_model->model_penduduk($this->session->userdata('village_code'));
		
		return $this->load->view('bo/admin/list1',$d,true);
	}
	function list2(){
		$d = array();
		return $this->load->view('bo/admin/list2',$d,true);
	}

	function berita(){
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		
		$data['title']	= 'Informasi Terbaru';
		$data['sql']	= $this->db->where('info_dateto',date('Y-m-d'))
								   ->or_where('info_dateto',NULL)
								   ->order_by('info_addtime DESC')
								   ->limit(4)
								   ->get('m_info');
		
		return $this->load->view('bo/admin/list2',$data,true);
	}
	
	public function info($key){
		$key 				= str_replace('%20', ' ', $key);
		$data['menu']		= anchor(base_url(),'Home','title="Home"');
		$data['nav']		= 'Berita';

		$sql 			= $this->db->select('a.*, b.village_name, c.user_fullname')
								   ->from('m_info a')
								   ->join('m_village b','a.village_code = b.village_code','left')
								   ->join('m_user c','a.info_addby = c.user_id','left')
								   ->like('info_id',$key)
								   ->get()->result();		
		
		foreach($sql as $row){
				foreach($row as $r => $w)
					$data[$r]	= $w;
				
		$data['link_berita']	= $this->db->limit(10)->get('m_info')->result();

		}
		
		$data['sub']	 	= ucwords(strtolower($data['info_title'])); // url human-friendly
		$data['contain']	= $this->load->view('bo/'.strtolower(__CLASS__).'/detail',$data,true);
		
		$this->db->set('info_visited','`info_visited`+1',FALSE)
					 ->where('info_id',$key)
					 ->update('m_info');

		$this->initiate($data);
	}


}

/* End of file home.php */
/* Location: ./application/controllers/admin.php */