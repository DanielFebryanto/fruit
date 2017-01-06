<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('supplier', $value);
		
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
		
		$this->db->where('supplier', $clause);
		
		$this->db->update('supplier', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('supplier',$clause);
		$delete = $this->db->delete('supplier');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('supplier');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('supplier',$clause);
		$dep = $this->db->get('supplier');
		return $dep;
	}
}