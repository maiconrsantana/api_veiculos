<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Veiculos_model','vm');
	}

	public function index($table, $id){

		//excluir veículo da base de dados
		$result = $this->vm->delete($table, $id);

		if($result){
			echo 'success'; 
		}else{
			echo 'error';
		}

		exit();

	}

}