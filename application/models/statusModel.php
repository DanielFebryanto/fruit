<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('status', $value);
		
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
		
		$this->db->where('status', $clause);
		
		$this->db->update('status', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('status',$clause);
		$delete = $this->db->delete('status');
		return null;
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('status');
		$this->db->join('statusType');
		$this->db->order_by('statusName','ASC');
		return $dep;
	}

	function getByClause($clause){
		$this->db->get('*');
		$this->db->where('status',$clause);
		$this->db->order_by('statusName','ASC');
		$dep = $this->db->get('status');
		return $dep;
	}
}