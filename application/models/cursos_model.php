<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cursos_model extends CI_Model {

	public function getcursos(){
		$resultados = $this->db->select("c.id, c.descripcion, ci.descripcion as ciclo, n.descripcion as nivel")
			->from("cursos as c")
			->join("niveles as n", "c.nivel_id = n.id")
			->join("ciclos as ci", "c.ciclo_id = ci.id")
			->where("c.estado", "1")
			->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		} else {
			return false;
		}
	}

	public function grilla($starIndex, $pageSize, $buscar){
		$cont = $this->db->where("estado", '1')->from('cursos')->count_all_results(); 
		$this->db->select("c.id, c.descripcion,n.descripcion as nivel,ci.descripcion as ciclo,c.silabus,c.act_web as web");
		$this->db->from("cursos as c");
		$this->db->join("ciclos as ci", "c.ciclo_id = ci.id");
		$this->db->join("niveles as n", "c.nivel_id = n.id");
		$this->db->or_where("c.descripcion LIKE '%$buscar%' AND c.estado=1");
		$this->db->limit($pageSize);
		$this->db->offset($starIndex);
		$this->db->order_by('c.id', 'DESC');
		return [$this->db->get()->result_array(), $cont];
	} 

	public function save($data){ /** guarda los cursos */
		return $this->db->insert("cursos",$data);
	}

	public function update($id,$data){ /** actualiza los datos **/
		$this->db->where("id",$id);
		return $this->db->update("cursos",$data);
	}

	public function getedit($id){
		/// cargar datos docente aula fechas del mantenimiento add prematricula
		$resultado = $this->db->select("id,ciclo_id as ciclos, nivel_id as niveles, descripcion, silabus, act_web as web")
			->from("cursos")
			->where("id",$id)
			->where("estado","1")
			->get();
		if ($resultado->num_rows() > 0) {
			echo json_encode($resultado->result()[0]);
		} else {
			echo json_encode($resultado->result());
		}
	}
	public function getcurso($id){ /** para la opcion editar **/
		$resultados= $this->db->select("c.id, c.descripcion, ci.descripcion as ciclo, n.descripcion as nivel")
				->from("cursos as c")
				->join("niveles as n", "c.nivel_id = n.id")
				->join("ciclos as ci", "c.ciclo_id = ci.id")
				->where("c.id", $id)
				->get();
		//$resultado = $this->db->get();
		return $resultados->row();
	}
	public function getmodulos($id){ /** para la opcion editar **/
		$resultados= $this->db->select("m.id,c.id as curso_id,m.descripcion, m.abreviatura")
				->from("modulos as m")
				->join("cursos as c", "m.curso_id = c.id")
				->where("c.id", $id)
				->get();
		//$resultado = $this->db->get();
		return $resultados->row();
	}
	public function getmodulo($id){ /** guarda los Modulos */
		$this->db->select("m.*,m.id,m.descripcion,m.abreviatura");
		$this->db->from("modulos m");
		$this->db->join("cursos c","m.curso_id = c.id");
		$this->db->where("m.estado","1");
		$this->db->where("c.id",$id);
		//$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function savemodulo($data){ /** guarda los Cursos contendio */
		return $this->db->insert("modulos",$data);
	}
	public function updatemodulo($id, $data)
	{	/** actualiza los datos **/
		$this->db->where("id", $id);
		return $this->db->update("modulos", $data);
	}
	public function eliminarmodulo($id){ /** guarda los Cursos contendio */
		$this->db->where("id", $id);
		return $this->db->delete("modulos");
	}

	public function getcombomodulo($id){
		$this->db->select("m.*,m.id,m.descripcion,m.abreviatura");
		$this->db->from("modulos m");
		$this->db->join("cursos c","m.curso_id = c.id");
		$this->db->where("m.estado","1");
		$this->db->where("c.id",$id);
		//$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}

	public function getsubmodulo($id){ /** guarda los Modulos */
		$this->db->select("s.*,s.id, s.modulo_id,s.descripcion,s.costo, s.horas");
		$this->db->from("submodulos as s");
		$this->db->join("modulos as m","s.modulo_id = m.id");
		$this->db->join("cursos as c","m.curso_id = c.id");
		$this->db->where("m.estado","1");
		$this->db->where("c.id",$id);
		//$this->db->join("tipo_comprobante tc","v.tipo_comprobante_id = tc.id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}else
		{
			return false;
		}
	}
	public function savesubmodulo($data){ /** guarda los Cursos contendio */
		return $this->db->insert("submodulos",$data);
	}
	public function eliminarsubmodulo($id){ /** guarda los Cursos contendio */
		$this->db->where("id", $id);
		return $this->db->delete("submodulos");
	}
	public function updatesubmodulo($id, $data)
	{	/** actualiza los datos **/
		$this->db->where("id", $id);
		return $this->db->update("submodulos", $data);
	}

}
