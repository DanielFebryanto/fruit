<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TrxDetailModel extends CI_Model {
	
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('trxDetail', $value);
		
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
		
		$this->db->where('trxDetail', $clause);
		
		$this->db->update('trxDetail', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function delete($clause){
		$this->db->where('trxDetail',$clause);
		$delete = $this->db->delete('trxDetail');
		return null;
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('trxDetail');
		$this->db->join('trxHeader','trxHeader.id = trxDetail.trxHeader_id');
		//$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->join('produk','produk.id = trxDetail.produk_id');
		$this->db->order_by('produk.produkName','ASC');
		$detail = $this->db->get('');
		return $detail;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->from('trxDetail');
		$this->db->where('trxDetail', $clause);
		$this->db->join('trxHeader','trxHeader.id = trxDetail.trxHeader_id');
		//$this->db->join('trxType','trxType.id = trxHeader.trxType_id');
		$this->db->join('produk','produk.id = trxDetail.produk_id');
		$this->db->order_by('produk.produkName','ASC');
		$detail = $this->db->get('');
		return $detail;

	}
}