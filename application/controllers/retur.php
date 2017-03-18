<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
        $this->load->model(array('trxReturModel','trxHeaderModel','trxDetailModel'));
	}
   
    function create($id){
        $data['title'] = 'Form Retur';
        $clause = array('trxdetail.idtrxheader'=>$id);
        $data['Detail'] = $this->trxDetailModel->getByClause($clause);

        $this->template->display('form/formRetur', $data);
    }

}