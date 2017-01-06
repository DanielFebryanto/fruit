<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
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
}