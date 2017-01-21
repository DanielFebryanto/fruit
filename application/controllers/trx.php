<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trx extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
	}
    function index(){
		//$this->load->model('trxHeaderModel');
		$this->load->model('supplierModel');
		$data['title'] = 'Create New Transaction';
		/*$clause = array(
            'supplier.idsuppliertype'=>112,
            'supplier.idstatus'=>11110 //11110 adalah Status Aktif
        );*/
		$data['SupName'] = $this->supplierModel->getAll();
		//$data['ProductName'] = $this->produkModel->getAll();
		$this->template->display('form/formtrx',$data);
	}
	
	function edit(){
		$this->load->model('supplierTypeModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formtrx',$data);
	}
	
	function create(){
		$this->load->model('supplierModel');
		$this->load->model('produkModel');
		$this->load->model('produkKatModel');
		$data['title'] = 'Create New Transaction';
		/*$clause = array(
            'supplier.idsuppliertype'=>112,
            'supplier.idstatus'=>11110 //11110 adalah Status Aktif
        );*/
		$data['SupName'] = $this->supplierModel->loadDdlPembelitrx();
		$data['GetProduk'] = $this->produkModel->getAll();
		$data['GetKategoriProd'] = $this->produkKatModel->getAll();
		$data['getalamat'] = $this->supplierModel->loadDdlPembelitrx();
		//$data['ProductName'] = $this->produkModel->getAll();
		$this->template->display('form/formtrx',$data);
	}

	function save(){
		//
	}
	
	function update(){
		//
	}
	
	function delete(){
		//
	}

	///////////////////ddl section/////////////////////////////

	
}