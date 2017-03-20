<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
        $this->load->model(array('trxReturModel','trxHeaderModel','trxDetailModel'));
	}
   function index(){
       $data['title'] = 'table Retur';
        $this->load->model('trxHeaderModel');
		$clause = array(
			'suppliertype.idsuppliertype'=> 112, //pembeli,
            'trxheader.retur'=>'YES'
		);
		$data['retur'] = $this->trxHeaderModel->getByClause($clause);
        $this->template->display('table/tableRetur', $data);
   }
    function create($id){
        $data['title'] = 'Form Retur';
        $clause = array('trxDetail.idtrxheader'=>$id);
        $data['Detail'] = $this->trxDetailModel->getByClause($clause);

        $this->template->display('form/formRetur', $data);
    }

    function edit($id){
        $data['title'] = 'Form Retur';
        $clause = array('trxRetur.idtrxheader'=>$id);
        $data['Detail'] = $this->trxReturModel->getByClause($clause);

        $this->template->display('form/formReturUpdate', $data);
    }

    function save(){
            $size = $_POST['size'];
            for($i = 0; $i < $size; $i++){
                $returVal = array(
                'idtrxheader'=> $_POST['header'],
                'idproduk'=>$_POST['idproduk_'.$i.''],
                'qty'=>$_POST['returQty_'.$i.'']
            );
            $this->trxReturModel->save($returVal);
            }
            redirect('retur/index');
    }

    function update(){
            $size = $_POST['size'];
            for($i = 0; $i < $size; $i++){
                $clause =$_POST['idtrxretur_'.$i.''];
                $returVal = array(
                'qty'=>$_POST['returQty_'.$i.'']
            );
            $this->trxReturModel->edit($clause, $returVal);
            }
            
            $this->session->set_flashdata('success','data berhasil diubah!');
            redirect('retur/index');
    }
    
}