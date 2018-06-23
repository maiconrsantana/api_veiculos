<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Veiculos_model','vm');
	}

	public function index($table){

		(!isset($_POST)) ? die('acesso negado') : '' ;

		if(!isset($_POST['vendido'])){
			$_POST['vendido'] = 0;
		}else{
			$_POST['vendido'] = 1;
		}

		//adicionar veículo
		$result = $this->vm->add($table, $_POST);

		if($result){
			echo $result; 
		}else{
			echo 'error';
		}

		exit();

	}

}