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
		$data['title'] = 'Dashboard';
		$this->template->display('home',$data);
	}
	
	function test(){
		$data['test'] = '';
		$this->template->display('testForm',$data);
	}

	function formSupplier(){
		$this->load->model('supplierTypeModel');
		$app = $this->loadMisc();
		$data['title'] = 'Create New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$data['current_url'] = $app['current_url'];
		$this->template->display('form/formSupplier',$data);
	}
	
	function formupdateSupplier(){
		$app = $this->load->model('supplierTypeModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formSupplier',$data);
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
		$this->load->model('supplierTypeModel');
		$data['title'] = 'Create New Product';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formProduk',$data);
	}
	
	function formUpdateProduct(){
		$this->load->model('supplierTypeModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formSupplier',$data);
	}
	
	function saveProduct(){
		//
	}

	function updateProduct(){
		//
	}
	
	function deleteProduct(){
		//
	}
	
	function formEmployee(){
		$this->load->model('departemenModel');
		$data['title'] = 'Create New Employee';
		$data['Dep'] = $this->departemenModel->getAll();
		$this->template->display('form/formKaryawan',$data);
	}
	
	function formupdateEmployee(){
		$this->load->model('supplierTypeModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formKaryawan',$data);
	}
	
	function listEmployee(){
		$this->load->model('karyawanModel');
		$data['title'] = 'list of Employee';
		$data['SupType'] = $this->karyawanModel->getAll();
		$this->template->display('table/tableKaryawan',$data);
	}
	
	function saveEmployee(){
		//
	}
	
	function updateEmployee(){
		//
	}
	
	function deleteEmployee(){
		//
	}
	function formTrx(){
		$this->load->model('produkModel');
		$data['title'] = 'Create New Transaction';
		$data['Dep'] = $this->produkModel->getAll();
		$this->template->display('form/formtrx',$data);
	}
	
	function formupdateTrx(){
		$this->load->model('supplierTypeModel');
		$data['title'] = 'Add New Supplier';
		$data['SupType'] = $this->supplierTypeModel->getAll();
		$this->template->display('form/formtrx',$data);
	}
	
	function saveTrx(){
		//
	}
	
	function updateTrx(){
		//
	}
	
	function deleteTrx(){
		//
	}
	public function testDep(){
		$this->load->view('testdep');
	}
	
	function saveDep(){
		$this->load->model('departemenModel');
		$value = array('id'=>'D-1001', 'depName'=>'test');
		$save = $this->departemenModel->save($value);
	}
	function login(){
		$this->load->view('login');
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