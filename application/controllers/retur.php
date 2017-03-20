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
        $clause = array('trxDetail.idtrxheader'=>$id);
        $data['Detail'] = $this->trxDetailModel->getReturByClause($clause);

        $this->template->display('form/formRetur', $data);
    }

    function save(){
            $uniq = $_POST['update'];
            $size = $_POST['size'];
            for($i = 0; $i < $size; $i++){
                $returVal = array(
                'idtrxretur'=> $uniq,
                'idtrxheader'=> $_POST['header'],
                'idproduk'=>$_POST['idproduk_'.$i.''],
                'qty'=>$_POST['returQty_'.$i.'']
            );
            $this->trxReturModel->save($returVal);
            }
    }

    function update(){
            $size = $_POST['size'];
            for($i = 0; $i < $size; $i++){
                $clause = array('idtrxretur'=>$_POST['idtrxretur'.$i.'']);
                $returVal = array(
                'idtrxretur'=> $uniq,
                'idtrxheader'=> $_POST['header'],
                'idproduk'=>$_POST['idproduk_'.$i.''],
                'qty'=>$_POST['returQty_'.$i.'']
            );
            $this->trxReturModel->update($returVal, $clause);
            }
    }
    
}