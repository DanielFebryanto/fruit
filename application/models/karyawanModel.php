<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KaryawanModel extends CI_Model {
	public $karyawan;
	function save($value){
		$insert = $this->db->insert('karyawan', $value);

		if($insert){
			return true;
		}else{
			return false;
		}
	}
	
	function edit($clause, $value){
		$this->db->where('karyawan', $clause);
		$edit = $this->db->update('karyawan', $value);

		if($edit){
			return true;
		}else{
			return false;
		}
	}
	
	function delete($clause){
		$this->db->where('karyawan', $clause);
		$delete = $this->db->update('karyawan', $value);
		if($delete){
			return true;
		}else{
			return false;
		}
	}
	
	function getAll(){
		$this->db->select('*');
		$this->db->from('karyawan');
		$this->db->join('jabatan', 'jabatan.id = karyawan.jabatan_id');
		$this->db->join('departemen', 'departemen.id = jabatan.departemen_id');
		$this->db->order_by('namaDepan','ASC');
		$this->db->join('status','status.id = karyawan.status_id');
		$karyawan = $this->db->get('');
		return $karyawan;
	}
	
	function getByClause($clause){
		$this->db->select('*');
		$this->db->where('supplier', $clause);
		$this->db->join('supplierType','supplierType.id = supplier.supplierType_id');
		$this->db->join('status','status.id = supplier.status_id');
		$this->db->order_by('namaDepan','ASC');
		$karyawan = $this->db->get('');
		return $karyawan;
	}
}