<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	function __construct(){
		parent::__construct();
 		$this->load->library(array('template'));
	}

    
	
	function loginUser(){
        $this->load->model('employeeModel');
        $clause = array(
            'username' => $_POST['username'],
            'password'=>$_POST['password']
            );

            $key = $this->employeeModel->getByClause($clause);

            if($key == TRUE){

            }else{
                
            }
    }

}