<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trx extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
	}
    function index(){
		//$this->load->model('trxHeaderModel');
		// $this->load->model('supplierModel');
		// $data['title'] = 'Create New Transaction';
		// $clause = array(
  //           'supplier.idsuppliertype'=>112,
  //           'supplier.idstatus'=>11110 //11110 adalah Status Aktif
  //       );
		// $data['SupName'] = $this->supplierModel->getAll();
		// //$data['ProductName'] = $this->produkModel->getAll();
		// $this->template->display('form/formtrx',$data);
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

	/////////////////// table purchase request ///////////////////////////////////

	function purchaseRequest()
	{
		$this->load->model('trxHeaderModel');
		$data['title'] = 'table purchase request';
		$clause = array(
			'status.idstatus'=> 11114, /// tunda/pending
			'suppliertype.idsuppliertype'=> 112 //pembeli
		);
		$data['getPurchaseRequest'] = $this->trxHeaderModel->getByClause($clause);
		$this->template->display('table/tablePurchaseRequest',$data);
	}

	/////////////////// table pre delivery order ///////////////////////////////////

	function preDeliveryOrder()
	{
		$this->load->model('trxHeaderModel');
		$data['title'] = 'table pre delivery order';
		$clause = array(
			'status.idstatus'=> 11119, // disetujui
			'suppliertype.idsuppliertype'=> 112 //pembeli
		);
		$data['getPreDeliveryOrder'] = $this->trxHeaderModel->getByClause($clause);
		$this->template->display('table/tablePreDeliveryOrder',$data);
	}
	
	/////////////////// table pre delivery order ///////////////////////////////////

	function deliveryOrder()
	{
		$this->load->model('trxHeaderModel');
		$data['title'] = 'table delivery order';
		$clause = array(
			'status.idstatus'=> 11119, // disetujui
			'suppliertype.idsuppliertype'=> 112 //pembeli
		);
		$data['getDeliveryOrder'] = $this->trxHeaderModel->getByClause($clause);
		$this->template->display('table/tableDeliveryOrder',$data);
	}

	
}