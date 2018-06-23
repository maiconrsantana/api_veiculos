<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Put extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Veiculos_model','vm');
	}

	public function index($table, $id){

		if(!isset($_POST) OR empty($_POST)){ die('acesso negado'); }

		if(!isset($_POST['vendido'])){
			$_POST['vendido'] = 0;
		}else{
			$_POST['vendido'] = 1;
		}

		//atualizar todos ou apenas parte dos dados do veículo
		$result = $this->vm->update($table, $_POST, $id);

		if($result){
			echo 'success'; 
		}else{
			echo 'error';
		}

		exit();

	}

}