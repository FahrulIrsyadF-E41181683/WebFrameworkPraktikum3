<?php 

class M_login extends CI_Model{	
	//mengambil data tabel admin dalam database
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	
}