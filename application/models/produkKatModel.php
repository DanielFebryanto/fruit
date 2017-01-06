<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukKatModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('produkkat', $value);
		
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
		
		$this->db->where('produkkat', $clause);
		
		$this->db->update('produkkat', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('produkkat',$clause);
		$delete = $this->db->delete('produkkat');
		return null;
	}

	function getAll(){
		$dep = $this->db->get('produkkat');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('produkkat',$clause);
		$dep = $this->db->get('produkkat');
		return $dep;
	}
}