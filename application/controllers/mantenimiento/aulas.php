<?php
defined('BASEPATH') or exit('No direct script access allowed');
class aulas extends CI_Controller {
	private $permisos; /* crear para permisos de modulos  */
	public function __construct(){	
		parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
		$this->load->model('view_model');
		$this->load->model("aulas_model");	
	}

	public function index(){	
		$data  = array(
			'permisos' => $this->permisos, /* crear para permisos de modulos  */
		);
		$this->load->view('admin/aulas/listjt', $data, 'content/c_aulas');
	}

	public function lista(){	
		$starIndex 							= $_GET['jtStartIndex'];
		$pageSize 							= $_GET['jtPageSize'];
		$buscar 							= (isset($_POST['search']) ? $_POST['search']: '' );
		$libro 								= $this->aulas_model->grilla($starIndex, $pageSize, $buscar);
		$jTableResult['Result'] 			= 'OK';
		$jTableResult['Records'] 			= $libro[0];
		$jTableResult['TotalRecordCount'] 	= $libro[1];
		header('Content-Type: application/json');
		echo json_encode($jTableResult);
	}

	public function edit(){
		$id = $this->input->post("id");
		$this->aulas_model->getedit($id);
	}

	public function store(){
		$id 					= $this->input->post("id");
		$data['descripcion'] 	= $this->input->post("descripcion");

		if ($id<=0) {
			$this->aulas_model->save($data);
			echo json_encode(['sucess' => true]);
		}else{
			$this->aulas_model->update($id,$data);
			echo json_encode(['sucess' => true]);
		}
	}

	public function delete($id){
		$data['estado'] = "0";
		$this->aulas_model->update($id, $data);
		echo json_encode(['sucess' => true]);
	}
}