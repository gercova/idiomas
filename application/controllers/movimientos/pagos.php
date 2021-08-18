<?php
defined('BASEPATH') or exit('No direct script access allowed');
class pagos extends CI_Controller {
	
	private $permisos; /* crear para permisos de modulos  */
	public function __construct(){	
		parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
		$this->load->model('view_model');
        $this->load->model('pagos_model');
        $this->load->model('conceptos_model');
        $this->load->model('submodulos_model');
	}

    public function index(){
        $data = [
            'permisos' => $this->permisos,
        ];

        $this->view_model->render_view('admin/pagos/listjt', $data, 'content/c_pagos');
    }

    public function add(){
        $data = [
            'permisos'      => $this->permisos,
            'estudiantes'   => $this->pagos_model->getpagoestudiantes()
        ];

        $this->view_model->render_view('admin/pagos/add', $data, 'content/c_pagos');
    }

    public function store(){
        $data['apertura_id']    = $this->input->post('idapertura');
        $data['matricula_id']   = $this->input->post('idmatricula');
        $data['estudiante_id']  = $this->input->post('idestudiante');
        $data['concepto_id']    = $this->input->post('idconcepto');
        $data['descripcion']    = $this->input->post('nota');
        $data['monto']          = $this->input->post('deuda');
        $data['usu_reg']        = $this->session->userdata('id');
        date_default_timezone_set('America/Lima');
        $data['fec_reg']        = date('Y-m-d');

        $submodulo_pago         = $this->input->post('concepto');
        $codigo_vaucher         = $this->input->post('codigo');
        $descripcion_vaucher    = $this->input->post('descripcion');
        $monto_vaucher          = $this->input->post('monto');
        $fecha_vaucher          = $this->input->post('fecha');

        if($this->pagos_model->save($data)){
            $pago_id = $this->pagos_model->ultimo_id();
            $this->save_detalle_pago($pago_id, $codigo_vaucher, $monto_vaucher, $fecha_vaucher);
            redirect(base_url('movimientos/pagos'));
        }else{
            $this->session->set_flashdata('error', 'No se pudo guardar la información');
			redirect(base_url('admin/pagos/add'));
        }
    }

    protected function save_detalle_pago($pago_id, $codigo_vaucher, $monto_vaucher, $fecha_vaucher){
		for ($i = 0; $i < count($codigo_vaucher); $i++) {
            $data_pay['pago_id']    = $pago_id;
            $data_pay['codigo']     = $codigo_vaucher[$i];
            $data_pay['monto']      = $monto_vaucher[$i];
            $data_pay['fecha']      = $fecha_vaucher[$i];
			$this->pagos_model->save_detalles($data_pay);

			$id         = $pago_id;
			$total      = $this->pagos_model->getdeuda($id);
			$deuda      = $total->monto;
			$totaldeuda = $deuda - $monto_vaucher[$i];
			$this->pagos_model->descontardeuda($id, $totaldeuda);
		}
		return;
	}

    public function list(){
		$starIndex                          = $_GET['jtStartIndex'];
		$pageSize                           = $_GET['jtPageSize'];
		$buscar                             = (isset($_POST['search']) ? $_POST['search']: '' );
		$libro                              = $this->pagos_model->getpagos($starIndex, $pageSize, $buscar);
		$jTableResult['Result']             = 'OK';
		$jTableResult['Records']            = $libro[0];
		$jTableResult['TotalRecordCount']   = $libro[1];
		header('Content-Type: application/json');
		echo json_encode($jTableResult);
	}

    public function getCostoCurso(){
        $id         = $this->input->post('id_curso');
        $results    = $this->submodulos_model->getSubmoduloByCurso($id);
        echo json_encode($results);
    }
}