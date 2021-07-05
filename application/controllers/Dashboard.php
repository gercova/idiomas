<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
	
	}
	public function index(){	

		$data = array();

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/dashboard", $data);
		$this->load->view("layouts/footer");
	}

/*	public function getData()
	{
		$year = $this->input->post("year");
		$resultados = $this->Pagos_model->montos($year);
		echo json_encode($resultados);
	}*/
}
