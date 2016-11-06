<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StatusTypeModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('statusType', $value);
		
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
		
		$this->db->where('statusType', $clause);
		
		$this->db->update('statusType', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->trans_begin();
		
		$this->db->where('statusType', $clause);
		
		$this->db->update('statusType', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function getAll(){
		$this->db->get('*');
		$this->db->join('statusType', 'statusType.id = status.statusType_id');
		$this->db->order_by('statusTypeName','ASC');
		$status = $this->db->get();
		return $status;
	}

	function getByClause($clause){
		$this->db->get('*');
		$this->db->where('statusType',$clause);
		$this->db->join('statusType', 'statusType.id = status.statusType_id');
		$this->db->order_by('statusTypeName','ASC');
		$status = $this->db->get();
		return $status;
	}
}