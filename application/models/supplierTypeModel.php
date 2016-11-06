<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SupplierTypeModel extends CI_Model {
	function save($value){
		$insert = $this->db->insert('supplierType', $value);

		if($insert){
			return true;
		}
		else{
			return false;
		}
	}

	function edit($clause, $value){
		$this->db->where('supplierType', $clause);
		$edit = $this->db->update('supplierType', $value);

		if($edit){
			return true;
		}
		else{
			return false;
		}
	}

	function delete($clause, $value){
		$this->db->where('supplierType', $clause);
		$delete = $this->db->update('supplierType', $value);

		if($delete){
			return true;
		}else{
			return false;
		}
	
	}

	function getAll(){
		$suplierType = $this->db->get('supplierType');
		return $suplierType;
	}

	function getByClause($clause){
		$this->db->where('supplier', $clause);
		$suplierType = $this->db->get('supplierType');
		return $suplierType;
	}
}