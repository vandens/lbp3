<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Puskes_model extends CI_Model{
	
	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: DinKes Kab Tangerang Government App
	 * @created 	: May 2016
	 */

		
	public function __construct(){
		parent::__construct();			
	}
	
	public function insert_master($data){
		
			unset($data['sub']);
			unset($data['mod']);
			unset($data['val']);
			unset($data['auto']);
			$data['pus_addby']	= $this->session->userdata('user_id');
			$data['pus_addtime']= date('Y-m-d H:i:s');
			$sql 	= $this->db->insert('m_puskes',$data);
			
			return $sql;
	}
	
	public function update_master($data){
			
			unset($data['sub']);
			unset($data['mod']);
			unset($data['val']);
			unset($data['auto']);			
			$data['pus_updateby']	= $this->session->userdata('user_id');
			$data['pus_updatetime']= date('Y-m-d H:i:s');

			$sql 	= $this->db->where('pus_code',$data['pus_code'])->update('m_puskes',$data);
			
			return $sql;
	}

	public function get_puskes_detail($key){
		$sql 	= $this->db->select('*')->from('m_puskes')->where('auto',$key)->get()->row();
		return $sql;
	}

	public function get_all_pus_code(){
		return $this->db->select('pus_code')->from('m_puskes')->where('pus_status','active')->get()->result();
	}
	
	
}
