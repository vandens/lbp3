<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cron extends CI_Controller {

	public function __construct()
	{
	 		parent::__construct();
			$this->load->model('model_pengguna');
			$this->load->model('model_general');
		  	$this->load->library('email');
	 		$this->_setting			= $this->model_general->get_app_setting();
			$this->_master_priv 	= $this->model_general->get_master_priv();
	}

	public function index($to = 'World')
	{
		//if(!$this->input->is_cli_request()) die('Nothing Processed');
		echo "Hello {$to}!".PHP_EOL;
		
	}


	// cron backup database
	public function backup_db(){ // jalan sehari sekali jam 6 sore
		if(!$this->input->is_cli_request()) die('Nothing Processed!');
		
		$path 					= APPPATH.'logs/backup_db/';
		$filename 				= 'backup_'.date('Y_m_d');
		

		$prefs = array(
                'tables'      => array('m_album','m_album_detail','m_class','m_debt','m_employee','m_group','m_gugus','m_info','m_info_cat','m_io','m_major','m_modul','m_notif','m_payment_category','m_pegawai','m_priv','m_priv_group','m_school','m_setting','m_statistik','m_student','m_user','t_activity','t_attendance','t_payment','t_saving','t_schedule','t_student_history'),  			// Array of tables to backup.
                'ignore'      => array(),           // List of tables to omit from the backup
                'format'      => 'zip',             // gzip, zip, txt
                'filename'    => $filename.'.sql',  // File name - NEEDED ONLY WITH ZIP FILES
                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file
                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file
                'newline'     => "\n"               // Newline character used in backup file
              );
		
		$this->load->dbutil();
		$backup =& $this->dbutil->backup($prefs); // $prefs

		if(!write_file($path.$filename.'.zip', $backup,'w+')){
		     $result = 'Unable to write the file';
		}else{
		     $result = 'File written!';
		}
		

		$config['useragent']	= $this->_setting->app_name;
		$config['wordwrap'] 	= TRUE;

		$this->email->initialize($config);
		$this->email->from($this->_setting->app_email2, $this->_setting->app_name);
		$this->email->to('topan.pandenis@gmail.com','putrasaputra.sp@gmail.com');
		$this->email->subject('DB Backup Processed');
		$this->email->message('Hi Vandens mc Maddens, your Daily DB Backup has been processed within filename '.$filename.'.zip'.' : '.$result);
		$this->email->send();

		echo $result; 
	}
	
	/*
	-	notifikasi report transaksi harian
	- include :
	- Total Trx Created
	- Total Trx Deleted
	- Total Income Amount
	*/
	public function notif_daily_trx(){
		if(!$this->input->is_cli_request()) die('Nothing Processed!');
		$this->load->model('model_payment');
		
		$data['trx'] 	= $this->model_payment->get_data_notif_daily_trx();
		
		$data['[[BASE_URL]]'] 	= base_url();
		$data['[[HEADER]]']	 	= $this->load->view('general/header_email',array(),true);
		$data['[[APP_NAME]]']	= $this->_setting->app_name;
		$data['[[EMAIL]]']		= $this->_setting->app_email;
		$data['[[YEARS]]']		= '2015 - '.date('Y');
		
		
		$data['[[TRX_DATE]]']	= date('d M Y');
		$data['[[CONTENT]]']	= $this->load->view('cron/auto_notif_daily_trx',$data,true);
		
		
		
		$sql 	  = $this->model_general->get_user_email();
			 		 
		$config['useragent']	= $this->_setting->app_name;
		$config['wordwrap'] 	= TRUE;
		$config['mailtype']		= 'html';
			
		foreach($sql as $row){
			
			if(!empty($row->user_email)){
				$data['[[RECEIVER]]']	= $row->user_name;
				$string = read_file(APPPATH.'helpers/email/auto_notif_daily_trx.html');
				$string = strtr($string,$data);			
				$this->email->initialize($config);
				$this->email->from($this->_setting->app_email2, $this->_setting->app_name);
				$this->email->to($row->user_email);
				$this->email->subject('Laporan Transaksi Harian '.$data['[[TRX_DATE]]']);
				$this->email->message($string);
				$this->email->send();
				echo '<br>'.$string;	
			}
		}
	}


	public function notif_monthly_trx(){
		#if(!$this->input->is_cli_request()) die('Nothing Processed!');
		$this->load->model('model_payment');
		
		$data['trx'] 	= $this->model_payment->get_data_notif_monthly_trx();
		
		$data['[[BASE_URL]]'] 	= base_url();
		$data['[[HEADER]]']	 	= $this->load->view('general/header_email',array(),true);
		$data['[[APP_NAME]]']	= $this->_setting->app_name;
		$data['[[EMAIL]]']		= $this->_setting->app_email;
		$data['[[YEARS]]']		= '2015 - '.date('Y');
		
		
		$data['[[TRX_DATE]]']	= date('M Y',strtotime(date('Y-m-d'). '-1 months'));
		$data['[[CONTENT]]']	= $this->load->view('cron/auto_notif_monthly_trx',$data,true);
		
		
		$sql 	  = $this->model_general->get_user_email();		
										 						 		 
		$config['useragent']	= $this->_setting->app_name;
		$config['wordwrap'] 	= TRUE;
		$config['mailtype']		= 'html';
			
		foreach($sql as $row){
			if(!empty($row->user_email)){
				$data['[[RECEIVER]]']	= $row->user_name;
				$string = read_file(APPPATH.'helpers/email/auto_notif_monthly_trx.html');
				
				$string = strtr($string,$data);		
				$this->email->initialize($config);
				$this->email->from($this->_setting->app_email2, $this->_setting->app_name);
				$this->email->to($row->user_email);
				$this->email->subject('Laporan Bulan '.$data['[[TRX_DATE]]']);
				$this->email->message($string);
				$this->email->send();
				#$this->email->print_debugger();
				echo '<br>'.$string;	
			}
		}
	}


}
