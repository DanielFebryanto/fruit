<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function requestPosition($idDep){
		$this->load->model('posisiModel');
		$clause = array('iddepartement'=>$idDep);
		$data['opt'] = $this->posisiModel->getByClause($clause);
		$this->load->view('partial/dropDownPartial', $data);
		
	}

	function getProduk(){
		$this->load->model('produkModel');
		$clause = array(
            'produk.idstatus'=>11118
        );
		$data['produk'] = $this->produkModel->getByClause($clause);
		
		foreach($data['produk']->result_array() as $row){
		$ee[] =$row;
		}
		echo json_encode($ee);
	}

	function getSelectedProduk($id){
		$this->load->model('produkModel');
		$clause = array(
			'idproduk'=>$id
		);
		$data = $this->produkModel->getByClause($clause);
		foreach($data->result_array() as $row){
			$asa[] = $row;
		}
		echo json_encode($asa);
	}

	function getCustomer(){
		$this->load->model('supplierModel');
		$clause = array(
			'supplier.idsuppliertype'=>112,
			'supplier.idstatus'=>11110
		);

		$data['supplier'] = $this->supplierModel->getByClause($clause);

		foreach ($data['supplier']->result_array() as $row) {
			$supp[] = $row;
		}

		echo json_encode($supp);
	}

	function getSelectedCustomer($id){
		$this->load->model('supplierModel');
		$clause = array(
			'idsupplier'=> $id
		);
		$data = $this->supplierModel->getByClause($clause);
		foreach($data->result_array() as $row){
			$asa[] = $row;
		}
		echo json_encode($asa);
	}

	function saveTrxHeader(){
		$this->load->model('trxHeaderModel');
		$this->load->model('trxDetailModel');
		$this->load->model('produkModel');

		// $idpem = $_POST['idpem'];
  //   	$tanggalkirim = $_POST['tangskir'];

		$uniq = uniqid();

		$value = array (
			'idtrxheader'=> $uniq,
			'idsupplier' => $_POST['idpem'],
			'tgltrx' => date("Y-m-d", strtotime($_POST['tangskir'])),
			'idtrxtype' => 1,
			'idstatus' => 11114,
			'nopo' => $_POST['nopo'],
			'retur'=>'NO'
			//'nodo' => $_POST['nodo']
		);
		$insert = $this->trxHeaderModel->save($value);

		foreach ($_POST['detail'] as $val) {
			$detVal = array(
				'idtrxheader' => $uniq,
				'idproduk'=>$val['idProduk'],
				'qty' => $val['qtyP'],
				'harga' => $val['harga']
			);
			$insertDetail = $this->trxDetailModel->save($detVal);
			$proClause = array('idproduk'=>$val['idProduk']);
			$p = $this->produkModel->getByClause($proClause);
			foreach($p->result_array() as $row){
				$stok = $row['stok'];
			}
			$newStok = $stok - $val['qtyP'];
			$proVal = array('stok'=>$newStok);

			$gePro = $this->produkModel->edit($proClause, $proVal);
		}
		
	}


	function UpdateTrxHeader(){
		$this->load->model('trxHeaderModel');

		//echo (json_encode($_POST['idheader']));

		$value = array (
			'idstatus' => 11119,
			'idtrxtype' => 2
		);

		$clause = $_POST['idheader'];
		//echo $clause;

		// foreach ($_POST['idheader'] as $clause) {
		// 	$idheader = array (
		// 		'idtrxheader' => $clause['idhead']
		// 	);
		// };
		
		// $idheader = array (
		// 	'idtrxheader' => $_POST['idhead']
		// );

		$update = $this->trxHeaderModel->edit($clause, $value);
	}


	
}