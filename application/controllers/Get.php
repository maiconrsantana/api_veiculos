<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Veiculos_model','vm');
	}

	public function index($table){

		//índice: retorna todos os veículos
		$result = $this->vm->get($table);

		echo json_encode($result); 

		exit();

	}

	public function find($table){

		// buscar o termo recebido no parâmetro "q"
		if(!isset($_GET['q']) OR empty($_GET['q'])){ die('acesso negado'); }

		$result = $this->vm->get($table);

		echo json_encode($result); 

		exit();

	}

	public function detail($table, $id){

		//índice: retorna o veículos com id especificado
		$result = $this->vm->get($table, $id);

		echo json_encode($result); 

		exit();

	}

}