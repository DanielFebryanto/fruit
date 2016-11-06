<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProdukModel extends CI_Model {
	function save($value){
		$this->db->trans_begin();
		
		$this->db->insert('produk', $value);
		
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
		
		$this->db->where('produk', $clause);
		
		$this->db->update('produk', $value);
		
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
		
		$this->db->where('produk', $clause);
		
		$this->db->update('produk', $value);
		
		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			return  false;
		}
		$this->db->trans_commit();
		return  true;
	}

	function getAll(){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->join('status','status.id = produk.status_id');
		$this->db->order_by('namaProduk','ASC');
		$produk = $this->db->get('');
		return $produk;
	}

	function getByClause($clause){
		$this->db->select('*');
		$this->db->from('produk');
		$this->db->where('produk', $clause);
		$this->db->join('status','status.id = produk.status_id');
		$this->db->order_by('namaProduk','ASC');
		$produk = $this->db->get('');
		return $produk;
	}
}