<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DepartemenModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('departemen', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
			$this->db->trans_commit();
			return  true;
	}

	function edit($clause, $value){
		$this->db->trans_begin();
		
		$this->db->where('departemen', $clause);
		
		$this->db->update('departemen', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('departemen',$clause);
		$delete = $this->db->delete('departemen');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('departemen');
		return $dep;
	}

	function getByClause($clause){
		$this->db->get('*');
		$this->db->where('departemen',$clause);
		$dep = $this->db->get('departemen');
		return $dep;
	}
}