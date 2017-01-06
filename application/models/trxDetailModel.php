<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxDetailModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('trxdetail', $value);
		
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
		
		$this->db->where('trxdetail', $clause);
		
		$this->db->update('trxdetail', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('trxdetail',$clause);
		$delete = $this->db->delete('trxdetail');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('trxdetail');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('trxdetail',$clause);
		$dep = $this->db->get('trxdetail');
		return $dep;
	}
}