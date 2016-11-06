<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxRejectModel extends CI_Model {
	function save($value){
		$insert = $this->db->insert('trxReject', $value);

		if($insert){
			return true;
		}
		else{
			return false;
		}
	}

	function edit($clause, $value){
		$this->db->where('trxReject', $clause);
		$edit = $this->db->update('trxReject', $value);

		if($edit){
			return true;
		}
		else{
			return false;
		}
	}

	function delete($clause, $value){
		$this->db->where('trxReject', $clause);
		$delete = $this->db->update('trxReject', $value);

		if($delete){
			return true;
		}else{
			return false;
		}
	
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('trxReject');
		$this->db->join('trxDetail','trxDetail.id = trxReject.trxDetail_id');
		$this->db->join('produk','produk.id = trxReject.produk_id');
		$this->db->order_by('produk.produkName','ASC');
		$reject = $this->db->get('trxReject');
		return $reject;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('supplier', $clause);
		$this->db->join('supplierType','supplierType.id = supplier.supplierType_id');
		$this->db->join('status','status.id = supplier.status_id');
		$this->db->order_by('produk.produkName','ASC');
		$reject = $this->db->get('');
		return $reject;
	}
}