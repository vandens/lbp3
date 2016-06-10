<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report_model extends CI_Model{

	/**
	 * @author 		: Vandens Mc Maddens
	 * @credit 		: DinKes Kab Tangerang Government App
	 * @created 	: May 2016
	 */

	public function __construct(){
		parent::__construct();			
	}

	public function get_header_list($period){
		$sql = $this->db->query("SELECT a.pus_code, a.pus_name, SUM(b.total) as total
										FROM lbp_m_puskes a
										LEFT JOIN (
											SELECT pus_code, count(data_id) as total
											FROM lbp_m_sentra 
											WHERE data_period = '{$period}'
											GROUP by pus_code
										) as b ON a.pus_code = b.pus_code
										GROUP BY a.pus_code
										ORDER BY pus_name ASC")->result();
		return $sql;
	}

	public function get_modul_list($where){

		if($where) $this->db->where('parent_id !=',$where);
		$sql 	= $this->db->where('SUBSTR(modul_url,-2,3) REGEXP "[0-9]+"')
						   ->order_by('modul_order ASC')
						   #->limit(6)
						   ->get('m_modul')
						   ->result();

		return $sql;
	}

	public function get_detail_list($period){
		$sql 	= $this->db->select('pus_code, form_id, count(data_id) as total')
						   ->from('m_sentra')
						   ->where('data_period',$period)
						   ->group_by('form_id,pus_code')
						   ->get()->result();

		#$sql 	= $this->db->query("SELECT pus_code, form_id, count(data_id) as total FROM lbp_m_sentra WHERE data_period = '{$period}' GROUP BY form_id, pus_code")->result();

		return $sql;
	}
	
}
