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
		
		$this->db->where($clause);
		
		$this->db->update('supplier', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause, $value){
		$this->db->trans_begin();
		
		$this->db->where($clause);
		
		$this->db->update('supplier', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function getAll(){
		$this->db->join('suppliertype','suppliertype.idsuppliertype = supplier.idsuppliertype');
		$this->db->join('status','status.idstatus = supplier.idstatus');
		$dep = $this->db->get('supplier');
		return $dep;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->join('suppliertype','suppliertype.idsuppliertype = supplier.idsuppliertype');
		$this->db->join('status','status.idstatus = supplier.idstatus');
		$this->db->where($clause);
		$dep = $this->db->get('supplier');
		return $dep;
	}


	//////////////for ddl trx ////////////////////////////
	function loadDdlPembelitrx(){
		$this->db->select('*');
		$this->db->where('idsuppliertype = 112');
		$dep = $this->db->get('supplier');
		return $dep;
	}
}