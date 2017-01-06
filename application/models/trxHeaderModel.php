<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxHeaderModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('trxheader', $value);
		
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
		
		$this->db->where('trxheader', $clause);
		
		$this->db->update('trxheader', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('trxheader',$clause);
		$delete = $this->db->delete('trxheader');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('trxheader');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('trxheader',$clause);
		$dep = $this->db->get('trxheader');
		return $dep;
	}
}