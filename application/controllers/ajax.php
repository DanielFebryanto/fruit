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
		$this->load->model('supplierModel');

		$value = array(
			''
		);
		$idpem = $_POST['idpem'];
	    //$name = $_POST['name'];
	    $tanggalkirim = $_POST['tangskir'];
	    // $notlp = $_POST['notlp'];
	    // $alamat = $_POST['alamat'];

	    echo $idpem, $tanggalkirim;

		// $value = array (
		// 	'nama' => $_POST['name'],
		// 	'tangkir' => $_POST['tangskir'],
		// 	// 'notlp' => $_POST['notlp'],
		// 	// 'alamat' => $_POST['alamat'],
		// );

		// echo $value;

		
	}


	function tes(){
		echo(md5(uniqid(rand(), false)));
	}
}