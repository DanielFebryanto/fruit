<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JabatanModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('jabatan', $value);
		
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
		
		$this->db->where('jabatan', $clause);
		
		$this->db->update('jabatan', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('jabatan',$clause);
		$delete = $this->db->delete('jabatan');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('jabatan');
		$this->db->order_by('jabatanName','ASC');
		$this->db->join('departemen','departemen.id = jabatan.departemen_id');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->from('jabatan');
		$this->db->where($clause);
// 		$this->db->join('departemen','departemen.id = jabatan.departemen_id');
		$this->db->order_by('jabatanName','ASC');
		$dep = $this->db->get();
		return $dep;
	}
}