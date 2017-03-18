<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
	function __construct(){
		parent::__construct();
        $this->load->model(array('returModel','trxModel'));
	}
    function index(){
        // Tampilkan Trx yang ada retur
        $clasue = array(''); 
        $data['retur'] = $this->returModel->getByClause($clasue);
    }

    function getReturById(){
        $clasue = array();
    }
    
    function updateRetur($id){
        $clause=array('idRetur'=>$id);
        $value=array();
        $this->returModel->update($clause, $value);
    }
	function requestPosition($idDep){
		$this->load->model('posisiModel');
		$clause = array('iddepartement'=>$idDep);
		$data['opt'] = $this->posisiModel->getByClause($clause);
		$this->load->view('partial/dropDownPartial', $data);
	}

}