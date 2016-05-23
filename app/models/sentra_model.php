<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sentra_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();			
	}
	
	public function get_title($key){
			$sql 	= $this->db->where('modul_id',$key)->get('m_modul')->row();

			return (count($sql) > 0) ? $sql->modul_name : '';
	}
	
	public function cek_data_exist($data){
		$sql 	= $this->db->where('pus_code',$this->session->userdata('pus_code'))
						   ->where('data_period',$data['data_period'])
						   ->where('form_id',$data['form_id'])
						   ->where('data_status','active')
						   ->get('m_sentra')
					      ->num_rows();
		if($sql > 0) return true;
		else return false;
	}

	public function get_puskes_detail($key){
		$sql 	= $this->db->select('*')->from('m_puskes')->where('auto',$key)->get()->row();
		return $sql;
	}
	
	
}
