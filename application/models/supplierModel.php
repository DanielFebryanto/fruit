<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierModel extends CI_Model {
	function save($value){
		$insert = $this->db->insert('supplier', $value);

		if($insert){
			return true;
		}
		else{
			return false;
		}
	}

	function edit($clause, $value){
		$this->db->where('supplier', $clause);
		$edit = $this->db->update('supplier', $value);

		if($edit){
			return true;
		}
		else{
			return false;
		}
	}

	function delete($clause, $value){
		$this->db->where('supplier', $clause);
		$delete = $this->db->update('supplier', $value);

		if($delete){
			return true;
		}else{
			return false;
		}
	
	}

	function getAll(){
		$this->db->join('supplierType','supplierType.id = supplier.supplierType_id');
		$this->db->join('status','status.id = supplier.status_id');
		$suplier = $this->db->get('supplier');
		return $suplier;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('supplier', $clause);
		$this->db->join('supplierType','supplierType.id = supplier.supplierType_id');
		$this->db->join('status','status.id = supplier.status_id');
		$suplier = $this->db->get('');
		return $suplier;
	}
}