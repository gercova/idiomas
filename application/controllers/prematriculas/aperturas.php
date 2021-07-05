<?php
defined('BASEPATH') or exit('No direct script access allowed');
class aperturas extends CI_Controller {

    private $permisos; /* crear para permisos de modulos  */
	public function __construct(){	
        parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
        $this->load->model('aperturas_model');
		$this->load->model('view_model');
		$this->load->model('cursos_model');
		$this->load->model('ciclos_model');
		$this->load->model('niveles_model');
		$this->load->model('dias_model');
		$this->load->model('sedes_model');
	}

    public function index(){
        $data = [
            'permisos' => $this->permisos,
        ];
        $this->view_model->render_view('admin/aperturas/listjt', $data, 'content/c_aperturas');
    }

    public function add(){
        $data['cursos'] = $this->cursos_model->getcursos();
        $data['sedes'] = $this->sedes_model->getsedes();
        $this->view_model->render_view('admin/aperturas/agregar', $data, 'content/c_aperturas');
    }

    public function edit($id){
        $data['apertura'] = $this->aperturas_model->getapertura($id);
        $data['cursos'] = $this->cursos_model->getcursos();
        $data['sedes'] = $this->sedes_model->getsedes();
        $this->view_model->render_view('admin/aperturas/editar', $data, 'content/c_aperturas');
    }

    public function store(){
        $id                 = $this->input->post('idapertura');
        $data['cursos_id']  = $this->input->post('idcurso');
        $data['sede_id']    = $this->input->post('idsede');
        $data['fec_ini']    = $this->input->post('fecha_ini');
        $data['act_web']    = $this->input->post('estado_inscripcion');
        $data['us_reg']     = $this->session->userdata('id');
        date_default_timezone_set('America/Lima');
        $data['fec_reg']    = date('Y-m-d H:i:s');
		
        if(empty($id)){
            if($this->aperturas_model->save($data)){
                redirect(base_url("prematriculas/aperturas"));
            }else{
                $this->session->set_flashdata('error','No se pudo guardar la información');
				$this->add();
            }
           
        }elseif(isset($id)){
            if($this->aperturas_model->update($id, $data)){
                redirect(base_url("prematriculas/aperturas"));
            }else{
                $this->session->set_flashdata('error','No se pudo actualizar la información');
				$this->edit($id);
            }
        }
    }

    public function list(){
		$starIndex                          = $_GET['jtStartIndex'];
		$pageSize                           = $_GET['jtPageSize'];
		$buscar                             = (isset($_POST['search']) ? $_POST['search']: '' );
		$libro                              = $this->aperturas_model->getaperturas($starIndex, $pageSize, $buscar);
		$jTableResult['Result']             = 'OK';
		$jTableResult['Records']            = $libro[0];
		$jTableResult['TotalRecordCount']   = $libro[1];
		header('Content-Type: application/json');
		echo json_encode($jTableResult);
	}
}