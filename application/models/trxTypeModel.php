<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxTypeModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('trxType', $value);
		
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
		
		$this->db->where('trxType', $clause);
		
		$this->db->update('trxType', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('trxType',$clause);
		$delete = $this->db->delete('trxType');
		return null;
	}

	function getAll(){
		$this->db->order_by('typeName','ASC');
		$dep = $this->db->get('trxType');
		return $dep;
	}

	function getByClause($clause){
		$this->db->order_by('typeName','ASC');
		$this->db->where('departemen',$clause);
		$dep = $this->db->get('departemen');
		return $dep;
	}
}