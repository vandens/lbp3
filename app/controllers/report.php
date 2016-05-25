<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
ob_start();
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


	public function pdf()
	{  
		if(!$this->session->userdata('user_islogin')) redirect(base_url('login'));
		$data 				= $this->uri->uri_to_assoc(3);
		
		$data['create'] 	= $data['id'].'C';
		$data['update'] 	= $data['id'].'U';
		$detail 			= $data['id'].'T';

		$view 				= ($this->_priv->$detail) ? strtolower('bo/temp/pdf_header') : 'bo/temp/no_access'; // cek privi READ
		$data['title']		= $this->sentra_model->get_title($data['id']);
		$data['sub'] 		= 'Detail Data '.$data['title'];
		$data['mod']		= $detail;
		$data['pus']		= $this->db->where('pus_code',$this->session->userdata('pus_code'))->get('m_puskes')->row();
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

		#$data['header']		= $this->load->view('bo/header',$data,true);
		$data['form']		= $this->load->view('bo/sentra/form/'.$data['id'],$data,true);
		$html 				= $this->load->view($view,$data,true);		

		//load mPDF library
		$this->load->library('m_pdf');
		$pdf = $this->m_pdf->load();
		$stylesheet = file_get_contents('media/css/bootstrap.css');
		$pdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
		$pdf->SetWatermarkText('');
		$pdf->showWatermarkText = true;
		$pdf->SetTitle($data['title']);
		$pdf->SetFooter($data['title'].'|{PAGENO}|'.$this->_setting->app_author);
		$pdf->WriteHTML($html);
		ob_end_clean();
		$pdf->Output();

	}








	public function test(){
		
		//this data will be passed on to the view
		$data['the_content']='mPDF and CodeIgniter are cool!';

		//load the view, pass the variable and do not show it but "save" the output into $html variable
        $html=$this->load->view('bo/sentra/form/A03', $data, true);

		//this the the PDF filename that user will get to download
		$pdfFilePath = "the_pdf_output.pdf";

		//load mPDF library
		$this->load->library('m_pdf');
		//actually, you can pass mPDF parameter on this load() function
		$pdf = $this->m_pdf->load();

		//generate the PDF!
		$pdf->WriteHTML($html);
		ob_end_clean();
		$pdf->Output();
		//offer it to user via browser download! (The PDF won't be saved on your server HDD)
		#$pdf->Output($pdfFilePath,"D");
	}







}

/* End of file Wilayah.php */
/* Location: ./application/controllers/home.php */