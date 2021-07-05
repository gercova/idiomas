<?php
defined('BASEPATH') or exit('No direct script access allowed');

class prematriculas extends CI_Controller
{
	private $permisos; /* crear para permisos de modulos  */
	public function __construct(){	
        parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
        $this->load->model('estudiantes_model');
		$this->load->model('view_model');
		$this->load->model('prematriculas_model');
		$this->load->model('tipos_model');
		$this->load->model('carreras_model');
	}

	public function list(){
		$starIndex                          = $_GET['jtStartIndex'];
		$pageSize                           = $_GET['jtPageSize'];
		$buscar                             = (isset($_POST['search']) ? $_POST['search']: '' );
		$libro                              = $this->prematriculas_model->getprematriculas($starIndex, $pageSize, $buscar);
		$jTableResult['Result']             = 'OK';
		$jTableResult['Records']            = $libro[0];
		$jTableResult['TotalRecordCount']   = $libro[1];
		header('Content-Type: application/json');
		echo json_encode($jTableResult);
	}

	public function index(){
        $data = [
            'permisos' => $this->permisos,
        ];
        $this->view_model->render_view('admin/prematriculas/listjt', $data, 'content/c_prematriculas');
    }


    public function add(){
      //  $data['cursos'] = $this->cursos_model->getcursos();
        $data['aperturas'] = $this->prematriculas_model->getaperturas();
		$data['tipos'] = $this->tipos_model->gettipos();
		$data['carreras'] = $this->carreras_model->getcarreras();
	    $this->view_model->render_view('admin/prematriculas/agregar', $data, $content_route = null);
    }
	public function buscarestud()
	{
		$dni = $this->input->post("dni");
		$this->prematriculas_model->buscarestu($dni);
	}
	public function store(){
        $id                 = $this->input->post('idprematrcila');
        $data['estudiante_id']  = $this->input->post('estudiante_id');
        $data['apertura_id']    = $this->input->post('apertura_id');
        $data['tipo_id']    = $this->input->post('tipo_id');
        $data['carrera_id']    = $this->input->post('carrera_id');
		$data['deuda']    = $this->input->post('costo');
		$data['costo']    = $this->input->post('costo');
        $data['usu_reg']     = $this->session->userdata('id');
        date_default_timezone_set('America/Lima');
        $data['fec_reg']    = date('Y-m-d H:i:s');
		
        if(empty($id)){
            if($this->prematriculas_model->save($data)){
                redirect(base_url("prematriculas/prematriculas"));
            }else{
                $this->session->set_flashdata('error','No se pudo guardar la información');
				$this->add();
            }
           
        }elseif(isset($id)){
            if($this->prematriculas_model($id, $data)){
                redirect(base_url("admin/prematriculas"));
            }else{
                $this->session->set_flashdata('error','No se pudo actualizar la información');
				$this->edit($id);
            }
        }
    }	
}
