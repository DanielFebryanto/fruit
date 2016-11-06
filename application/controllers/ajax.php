<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct(){
		parent::__construct();
	}
	function requestPosition($idDep){
		$this->load->model('jabatanModel');
		$clause = array('departemen_id'=>$idDep);
		$data['opt'] = $this->jabatanModel->getByClause($clause);
		$this->load->view('partial/dropDownPartial', $data);
		
	}
}