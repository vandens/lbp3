<?php 

class menu{

	protected $_ci;
	public function __construct(){
		$this->_ci 		=& get_instance(); 
	}


	function get_list_menu(){

		$sql 	= $this->_ci->db->where('modul_status','active')->order_by('modul_order')->get('m_modul')->result();
		
		$y = array();
		foreach( $sql as $row ){
			if($row->modul_id == $row->parent_id){
				$x[$row->modul_id] 	= array('menu_id'	=> $row->modul_id,
											'menu_name'	=> $row->modul_name,
											'menu_url'	=> $row->modul_url,
											'menu_icon' => $row->modul_icon,
											'menu_sub'	=> $row->modul_id,);//$this->get_parent_menu($row);
				
				
			}else{
					$y[$row->parent_id][$row->modul_id] 	= array('menu_id'	=> $row->modul_id,
																	'menu_name'	=> $row->modul_name,
																	'menu_url'	=> $row->modul_url,
																	'menu_icon' => $row->modul_icon,
																	'menu_sub'	=> $row->modul_id);
				
			}			

		}


		// ambil child nya
		foreach($x as $id => $child){
			$x[$id]['menu_sub'] = $y[$id];
		}

		foreach ($x as $key => $val) {
			foreach($y as $yid => $ychild)
				if($val['menu_sub'][$yid])
					$x[$key]['menu_sub'][$yid]['menu_sub'] = $ychild;

		}
		$this->menu_string($x);
	}

	function menu_string($data){
		$x 	= $this->_ci->general->get_privi_list();
		foreach($x as $key => $val)	$privilege[] 	= $key;
		$parent = '';
		foreach($data as $key => $val){
			$parent .= $this->get_parent_menu_odd($val);
			if(is_array($val['menu_sub'])){
				foreach($val['menu_sub'] as $sub => $menu){
					if(is_array($menu['menu_sub'])){
						$submenu_odd['['.$key.']'] .= $this->get_parent_menu_odd($menu);						
						foreach ($menu['menu_sub'] as $keys => $even)
							$submenu_old['['.$sub.']'] .= $this->get_child_menu_odd($even);
					}else
						$submenu_odd['['.$key.']'] .= $this->get_child_menu_odd($menu);
				}
			}			
		}
		$parent = strtr($parent,$submenu_odd);
		$parent = strtr($parent,$submenu_old);
		echo $parent;

	}


	function get_parent_menu_odd($row){
		$parent = 	'<li id="'.$row['menu_id'].'" class="hover">
						<a href="'.base_url($row['menu_url']).'" class="dropdown-toggle">
							<i class="menu-icon fa fa-'.$row['menu_icon'].'"></i>
							<span class="menu-text">'.$row['menu_name'].'</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>
						<b class="arrow"></b>
						<ul class="submenu" style="width:350px">
						['.$row['menu_id'].']
						</ul>';
		return (in_array($row['menu_id'],array('MAS','TOO')) && $this->_ci->session->userdata('user_grup') == 'GRP01' || !in_array($row['menu_id'],array('MAS','TOO'))) ? $parent : '';
		
	}

	function get_child_menu_odd($row){
			$child = 		'<li class="hover">
								<a href="'.base_url($row['menu_url']).'">
									<i class="menu-icon fa fa-caret-right"></i>
									'.$row['menu_name'].'
								</a>
								<b class="arrow"></b>
							</li>';
		return $child;
	}




}

