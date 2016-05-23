<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model{
		
	public function __construct(){
		parent::__construct();			
	}
	
	function drop_list(){
		$list 					= new stdClass();
		
		#if($this->session->userdata('admin') === FALSE) $this->db->where('pus_code',$this->session->userdata('pus_code'));
		
		$list->list_puskes		= $this->db->where('pus_status','active')
										   ->order_by('pus_name ASC')
										   ->get('m_puskes')->result();
		$list->list_group		= $this->db->where('group_status','active')->get('m_group')->result();
		
		return $list;
	}


	
	function confirm_priv($master,$selected){
		
		$priv_confirm = array();
		
		foreach($master as $vals)
			foreach($vals as $key => $val){
				if($selected && in_array($val->priv_code,$selected))
					$priv_confirm[$val->modul_name][] = $val;
				else
					continue;
			}
		
		return $priv_confirm;
		
	}
	
	
	
	function master_process($data){
    	$mdata 		= array('pus_code'			=> current(explode('_',$data['pus_code'])),
							'user_fullname'		=> $data['user_fullname'],
							'user_isgroup'		=> $data['user_isgroup'],
							'group_id'			=> $data['group_id'],
							'user_isadmin'		=> $data['user_isadmin'],
						//	'user_email'		=> $data['user_email'],
						//	'user_isbo'			=> NULL,
							'user_phone'		=> $data['user_phone'],
							'user_status'		=> strtolower($data['user_status']));
		
		if($data['user_isgroup'] == 'No')
			unset($mdata['group_id']);
		
		
		if($data['pass_ismail']){													
			$clr_text 					= substr(md5(date('Y-m-d H:i:s')),0,8);
			$mdata['user_pass']			= sha1($data['user_id'].md5($data['user_id'].$clr_text));
			$mdata['user_clrtext']		= $clr_text;
		}

		if(empty($data['auto'])){	
			$mdata['user_id']		= $data['user_id'];						
			$mdata['user_addby']	= $this->session->userdata('user_id');
			$mdata['user_addtime']	= date('Y-m-d H:i:s');												
			$this->db->insert('m_user',$mdata);
							
		}else{

			$mdata['user_fullname'] = $data['user_fullname'];						
			$mdata['user_updateby']	= $this->session->userdata('user_id');
			$mdata['user_updatetime']	= date('Y-m-d H:i:s');
			unset($data['user_id']);	
			$this->db->where('auto',$data['auto'])->update('m_user',$mdata);
		}
		
		return $mdata;
		
	}
	
	function insert_priv($data){	
			
		$grup_id = ($data['user_isgroup'] == 'No') ? $data['user_id'] : $data['group_id'];
		
		# -- privilege default --
		$priv 		= array();
		$priv[]		= array('user_priv_id'=>$grup_id,'priv_code'=>'HELR');
		$priv[]		= array('user_priv_id'=>$grup_id,'priv_code'=>'KAMR');
		
		if($data['user_isgroup'] == 'No'){ // if custom user privilege
		
			$this->db->where('user_priv_id',$grup_id)->delete('m_priv_user');
			foreach($data['privlist'] as $keys => $val){
				$priv[]	= array('user_priv_id'		=> $grup_id,
								'priv_code'			=> $val);
			}	
			
			$this->db->insert_batch('m_priv_user',$priv);
			
		}else{ // if group user privilege
		
			
		}
		
	}
	
	function get_exist_priv($key){
		
		$sql = $this->db->select('a.priv_code')
											->from('m_priv a')
											->join('m_priv_user b','a.priv_code = b.priv_code')
											->order_by('a.priv_desc asc')
											->where('b.user_priv_id',$key)
											->get()->result();
		$return = array();
		foreach($sql as $row){
			$return[] = $row->priv_code;
		}
		
		return $return;
	}

	function get_user_detail($key){
		$sql 	= $this->db->select('a.*, b.pus_code, b.pus_name, c.group_name')
							->from('m_user a')
							->join('m_puskes b','a.pus_code = b.pus_code','left')
							->join('m_group c','a.group_id = c.group_id','left')
							->where('a.auto',$key)
							->or_where('a.user_id',$key)->get()->row();
		return $sql;
	}
	
	
}
