<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
	}
	function loadMisc(){
		$data['current_url']=base64_encode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	
            //$return_url = base64_decode($_POST["return_url"]);
		return $data;
	}
	function index(){
		if(!$this->session->userdata('username')){
			redirect('admin/login');
		}else{
		$data['title'] = 'Dashboard';
		$this->template->display('home',$data);
		}
	}
	function login(){
		$this->load->view('login');
	}
	function doLogin(){
		if($this->session->userdata('username')){
			redirect('admin/index');
		}else{
		$clause = array(
			'email'=>$_POST['email'],
			'password'=>$_POST['password']
		);
		$this->load->model('karyawanModel');
		$check = $this->karyawanModel->getByClause($clause);
		foreach($check->result_array() as $row){
			
		$sessionVal = array(
			'username'=> $row['namapanjang']
			);

			$this->session->set_userdata($sessionVal);
		}
		redirect('admin/index');
		}
	}
	function logout(){
		$this->session->unset_userdata('username');
	}
	function test(){
		$data['test'] = '';
		$this->template->display('testForm',$data);
	}

	function formSupplier(){
		$this->load->model('supplierModel');
		$app = $this->loadMisc();
		$data['title'] = 'Create New Supplier';
		$data['SupType'] = $this->supplierModel->getAll();
		$data['current_url'] = $app['current_url'];
		$this->template->display('form/formSupplier',$data);
	}
	
	function formupdateSupplier(){
		$app = $this->load->model('supplierModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierModel->getAll();
		$this->template->display('form/formSupplierEdit',$data);
	}

	function saveSupplier(){
		$this->load->model('supplierModel');
		$idSupplier = $this->generateIdSupplier();
		$value = array(
			'id'=>$idSupplier,
			'supplierType_id'=>$_POST['type'],
			'namaSupplier'=>$_POST['nama'],
			'email'=>$_POST['email'],
			'alamat'=>$_POST['alamat'],
			'kontak'=>$_POST['kontak'],
			'status_id'=>11,
			'joinON'=>date("Y-m-d")
		);

		$insert = $this->supplierModel->save($value);
		if($insert){
			$this->formSupplier();
		}else{
			echo"error";
		}
	}


	function listSupplier(){
		$this->load->model('supplierModel');
		$data['title'] = 'list of Supplier';
		$data['supplierGetAll'] = $this->supplierModel->getAll();
		$this->template->display('table/tableSupplier',$data);
	}

	function updateSupplier(){
		$this->load->model('supplierModel');

		$value = array (
			'supplierType_id' => $_POST ['type'],
			'namaSupplier' => $_POST ['nama'],
			'email' => $_POST ['email'],
			'alamat' => $_POST ['alamat'],
			'kontak' => $_POST ['kontak'] 
		);
	}

	function deleteSupplier(){
		//
	}

	function formProduct(){
		$this->load->model('produkModel');
		$data['title'] = 'Create New Product';
		$data['SupType'] = $this->produkModel->getAll();
		$this->template->display('form/formProduk',$data);
	}
	
	function formUpdateProduct(){
		$this->load->model('produkModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->produkModel->getAll();
		$this->template->display('form/formSupplier',$data);
	}
	
	// function case(){
	// 	$this->load->model(array('trxHeaderModel', 'trxReturModel', 'trxDetailModel'));
	// 	$headerVal = array(
	// 		'idtrxheader'=>'trx1',
	// 		'idtrxtype'=>771,
	// 		'idstatus'=>11114,
	// 		'idsupplier'=>5,
	// 		'tgltrx'=> date("2017-03-03")
	// 		);
	// 	$detailVal1 = array(
	// 		'idtrxdetail'=>11,
	// 		'idtrxheader'=>'trx1',
	// 		'idproduk'=>4,
	// 		'qty'=>2000,
	// 		'harga'=>1000000
	// 		);
	// 		$detailVal2 = array(
	// 		'idtrxdetail'=>12,
	// 		'idtrxheader'=>'trx1',
	// 		'idproduk'=>5,
	// 		'qty'=>200,
	// 		'harga'=>300000
	// 		);

	// 	$returVal = array(
	// 		'idtrxretur'=>22,
	// 		'idtrxheader'=>'trx1',
	// 		'idproduk'=>4,
	// 		'qty'=>500
	// 	);
	// 	$headInsert = $this->trxHeaderModel->save($headerVal);
	// 	$det1Insert = $this->trxDetailModel->save($detailVal1);
	// 	$det2Insert = $this->trxDetailModel->save($detailVal2);
	// 	$retuR = $this->trxReturModel->save($returVal);
	// }

	function updateProduct(){
		//
	}
	
	function deleteProduct(){
		//
	}
	
	
	public function testDep(){
		$this->load->view('testdep');
	}
	
	function saveDep(){
		$this->load->model('departementModel');
		$value = array('id'=>'D-1001', 'depName'=>'test');
		$save = $this->departementModel->save($value);
	}
	function generateIdSupplier(){
		$this->load->model('supplierModel');
		$this->db->limit('1');
		$this->db->order_by('id','DESC');
		$getId = $this->db->get('supplier');
	
		foreach ($getId->result_array() as $row){
			$id = $row['id'];
		}
		if($getId->num_rows() < 1){
			$hasil ="SP-0001";
		}else{
		$hasil = "Ngaco";
		$idExp=explode("-", $id);
		if($idExp[1] < 9){
			$ee = $idExp[1] + 1;
			$hasil ="SP-000$ee";
		}else if($idExp[1] > 8 && $idExp[1] < 99){
			$ee = $idExp[1] + 1;
			$hasil ="SP-00$ee";
		}else if($idExp[1] > 98&& $idExp[1] < 999){
			$ee = $idExp[1] + 1;
			$hasil ="SP-0$ee";
		}else{
			$ee = $idExp[1] + 1;
			$hasil ="SP-$ee";
		}
		}
		return $hasil;
	}
	
	function generateIdEmployee($kodeJabatan){
		$this->load->model('karyawanModel');
		$this->db->limit(1);
		$this->db->order_by('id','DESC');
		$getId = $this->db->get('karyawan');
		// select karyawan yg punya kode jabatan sama paling besar
		foreach ($getId->result_array() as $row){
			$id = $row['id'];
		}
		if($getId->num_rows() < 1){
			$hasil ="EMP-$kodeJabatan1";
		}else{
		$hasil = "Ngaco";
		$idExp=explode("-", $id);
		if($idExp[1] < 9){
			$ee = $idExp[1] + 1;
			$hasil ="EMP-000$ee";
		}else if($idExp[1] > 8 && $idExp[1] < 99){
			$ee = $idExp[1] + 1;
			$hasil ="EMP-00$ee";
		}else if($idExp[1] > 98&& $idExp[1] < 999){
			$ee = $idExp[1] + 1;
			$hasil ="EMP-0$ee";
		}else{
			$ee = $idExp[1] + 1;
			$hasil ="EMP-$ee";
		}
		}
		return $hasil;
	}
	
	function generateIdTrx(){
		//
	}
}