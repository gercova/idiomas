<?php
defined('BASEPATH') or exit('No direct script access allowed');
class cursos extends CI_Controller {
	
	private $permisos; /* crear para permisos de modulos  */
	public function __construct(){	
		parent::__construct();
		$this->permisos = $this->backend_lib->control();/* crear para permisos de modulos  */
		$this->load->model('view_model');
		$this->load->model("cursos_model");	
		$this->load->model("ciclos_model");	
		$this->load->model("niveles_model");
		$this->load->helper("download");	
	}

	public function index(){	
		$data['permisos'] 	= $this->permisos; /* crear para permisos de modulos  */
		$data['ciclos'] 	= $this->ciclos_model->getciclos(); 
		$data['niveles'] 	= $this->niveles_model->getniveles();

		$this->view_model->render_view('admin/cursos/listjt', $data, 'content/c_cursos');
	}

	public function lista(){	
		$starIndex 							= $_GET['jtStartIndex'];
		$pageSize 							= $_GET['jtPageSize'];
		$buscar 							= (isset($_POST['search']) ? $_POST['search']: '' );
		$libro 								= $this->cursos_model->grilla($starIndex, $pageSize, $buscar);
		$jTableResult['Result'] 			= 'OK';
		$jTableResult['Records'] 			= $libro[0];
		$jTableResult['TotalRecordCount'] 	= $libro[1];
		header('Content-Type: application/json');
		echo json_encode($jTableResult);
	}

	public function edit(){
		$id = $this->input->post("id");
		$this->cursos_model->getedit($id);
	}

	public function modulo($id){
		$data['curso'] 			= $this->cursos_model->getcurso($id);
		$data['modulo'] 		= $this->cursos_model->getmodulo($id); 
		$data['combomodulos'] 	= $this->cursos_model->getcombomodulo($id); 
		$data['submodulo'] 		= $this->cursos_model->getsubmodulo($id); 

		$this->view_model->render_view('admin/cursos/edit', $data, 'layouts/footer_add');
	}
	
	public function store(){

		$data['ciclo_id'] 		= $this->input->post("ciclos");
		$data['nivel_id']		= $this->input->post("niveles");
		$data['descripcion'] 	= $this->input->post("descripcion");
		$data['act_web'] 		= $this->input->post("web");
		$data['usu_reg'] 		= $this->session->userdata("id");
		$data['fec_reg'] 		= date('Y-m-d');

		$config = [
			"upload_path" 	=> "./uploads/silabus/",
			"allowed_types" => "pdf|xlsx|docx",
			"max_size" 		=> "20048"
		];

		$this->load->library("upload", $config);
		if($this->upload->do_upload("silabus")){
			$archivo = array("upload_data" => $this->upload->data());
			if ($id<=0) {
				$this->cursos_model->save($data);
				echo json_encode(['sucess' => true]);
			}else{
				$this->cursos_model->update($id,$data);
				echo json_encode(['sucess' => true]);
			}
		}else{
			if($id<=0){
				$this->cursos_model->save($data);
				echo json_encode(['sucess' => true]);
			}else{
				$this->cursos_model->update($id,$data);
				echo json_encode(['sucess' => true]);
			}
		}
	}
	
	public function delete($id){
		$data['estado'] = "0";
		$this->cursos_model->update($id, $data);
		echo json_encode(['sucess' => true]);
	}

	public function insertmodulo(){
		$curso_id 	= $this->input->post("curso_id");
		$idusuario 	= $this->session->userdata("id");
		$data  		= array(
			'descripcion' 	=> $this->input->post("descripcion_modulo"),
			'abreviatura' 	=> $this->input->post("abreviatura_modulo"),
			'curso_id' 		=> $curso_id,
			'usu_reg' 		=> $idusuario,
			'fec_reg' 		=> date('Y-m-d'),
			'estado' 		=> "1",
     	);		
	    if($this->cursos_model->savemodulo($data)){
			redirect(base_url("registro/cursos/modulo/".$curso_id));	
		} 
	}

	public function updatemodulo($id,$modulo,$abre,$curso_id){
		$data  = array(
         	'descripcion' 	=> $modulo,
		 	'abreviatura' 	=> $abre,
         	'curso_id' 		=> $curso_id,
     	);		
	    if ( $this->cursos_model->updatemodulo($id,$data)) {
			redirect(base_url("registro/cursos/modulo/".$curso_id));	
		} 
	}

	public function deletemodulo($id,$curso_id){
		if ( $this->cursos_model->eliminarmodulo($id)) {
			redirect(base_url("registro/cursos/modulo/".$curso_id));
		} 
	}

	public function insertsubmodulo(){
		$curso_id 	= $this->input->post("curso_id");
		$idusuario 	= $this->session->userdata("id");
		$data  		= array(
			'modulo_id' 	=> $this->input->post("modulo_id"),
			'descripcion' 	=> $this->input->post("submodulo"),
			'horas' 		=> $this->input->post("horas"),
			'costo' 		=> $this->input->post("costo"),
			'usu_reg' 		=> $idusuario,
			'fec_reg' 		=> date('Y-m-d'),
			'estado' 		=> "1",
		);		
		if ( $this->cursos_model->savesubmodulo($data)) {
			redirect(base_url("registro/cursos/modulo/".$curso_id));	
		} 
	}

	public function deletesubmodulo($id,$curso_id){
		if ( $this->cursos_model->eliminarsubmodulo($id)) {
			redirect(base_url("registro/cursos/modulo/".$curso_id));
		} 
	}	 

	public function actualizarmodulos(){
		$curso_id 			= $this->input->post("curso_id");
		$idmodulo 			= $this->input->post("idmodulo");
		$nombremodulo 		= $this->input->post("nombremodulo");
		$abreviaturamodulo 	= $this->input->post("abreviaturamodulo");
		for ($i=0; $i < count($idmodulo); $i++) { 
			$dato = $idmodulo[$i];
			$data  = array(
				'descripcion' => $nombremodulo[$i], 
				'abreviatura' => $abreviaturamodulo[$i],
			);
			$this->cursos_model->updatemodulo($dato,$data);
		}

		$idsubmodulo = $this->input->post("idsubmodulo");
		$nombresubmodulo = $this->input->post("nombresubmodulo");
		$horasubmodulo = $this->input->post("horasubmodulo");
		$costosubmodulo = $this->input->post("costosubmodulo");
		for ($i=0; $i < count($idsubmodulo); $i++) { 
			$id = $idsubmodulo[$i];
			$data  = array(
				'descripcion' => $nombresubmodulo[$i], 
				'horas' => $horasubmodulo[$i],
				'costo' => $costosubmodulo[$i],
			);
			$this->cursos_model->updatesubmodulo($id,$data);
		}
		redirect(base_url("registro/cursos/modulo/".$curso_id));
	}		
}