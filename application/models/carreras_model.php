<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carreras_model extends CI_Model {

	public function grilla($starIndex, $pageSize, $buscar){
		$cont = $this->db->count_all_results('carreras'); 
		$this->db->select("a.id, a.descripcion, a.estado");
		$this->db->from("carreras as a");
		$this->db->where('a.estado', '1');
		$this->db->like('a.descripcion', $buscar, 'both');
		$this->db->limit($pageSize);
		$this->db->offset($starIndex);
		$this->db->order_by('a.id', 'DESC');
		return [$this->db->get()->result_array(), $cont];
	} 
	
	public function getcarreras(){	
		$resultados = $this->db->select("*")
			->from("carreras")
			->order_by("id","ASC")
			->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		} else {
			return false;
		}
	}

	public function save($data){ 
		# guarda los carreras 
		return $this->db->insert("carreras", $data);
	}

	public function update($id,$data){ 
		# actualiza los datos 
		$this->db->where("id",$id);
		return $this->db->update("carreras",$data);
	}

	public function getedit($id){ 
		# cargar datos docente aula fechas del mantenimiento add prematricula
		$resultado = $this->db->select("*")
			->from("carreras")
			->where("id",$id)
			->where("estado","1")
			->get();
		if ($resultado->num_rows() > 0) {
			echo json_encode($resultado->result()[0]);
		} else {
			echo json_encode($resultado->result());
		}
	}
}
