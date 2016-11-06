<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxHeaderModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('trxHeader', $value);
		
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
		
		$this->db->where('trxHeader', $clause);
		
		$this->db->update('trxHeader', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('trxHeader',$clause);
		$delete = $this->db->delete('trxHeader');
		return null;
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('trxHeader');
		$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->join('supplier','supplier.id = trxHeader.supplier_id');
		$this->db->join('status','status.id = trxHeader.status_id');
		$this->db->join('karyawan','karyawan.id = trxHeader.confirmedBy');
		//$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->order_by('trxHeader.createON','ASC');
		$header = $this->db->get('');
		return $header;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->from('trxHeader');
		$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->join('supplier','supplier.id = trxHeader.supplier_id');
		$this->db->join('status','status.id = trxHeader.status_id');
		$this->db->join('karyawan','karyawan.id = trxHeader.confirmedBy');
		//$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->order_by('trxHeader.createON','ASC');
		$this->db->where('trxHeader', $clause);
		$header = $this->db->get('');
		return $header;
	}
}