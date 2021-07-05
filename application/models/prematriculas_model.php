<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class prematriculas_model extends CI_Model {

    public function getprematriculas($starIndex, $pageSize, $buscar){
        $count = $this->db->count_all_results('matriculas');
        $this->db->select('m.id, e.nombre, e.celular, a.id as id_apertura, c.descripcion as curso,a.act_web');
        $this->db->from('matriculas m');
        $this->db->join('estudiantes e', 'm.estudiante_id= e.id');
        $this->db->join('aperturas a', 'm.apertura_id = a.id');
        $this->db->join('cursos c', 'a.cursos_id = c.id');
        $this->db->like('e.nombre', $buscar, 'both');
        $this->db->like('c.descripcion', $buscar, 'both');
        $this->db->where('m.estado', '1');
        $this->db->limit($pageSize);
        $this->db->offset($starIndex);
        $this->db->order_by('m.id', 'DESC');
        return [$this->db->get()->result_array(), $count];
    }

    public function getapertura($id){
        $query = $this->db->where('id', $id)
            ->where('estado', '1')
            ->get('matriculas');
        return $query->row();
    }

    public function save($data){
        return $this->db->insert('matriculas', $data);
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('matriculas', $data);
    }
    public function buscarestu($dni)
	{
		/** guarda los Modulos */
		$this->db->select("*");
		$this->db->from("estudiantes");
		$this->db->where("dni", $dni);
	//	$this->db->where("a.id", $id);
		$resultado = $this->db->get();
		if ($resultado->num_rows() > 0) {
			echo json_encode($resultado->result()[0]);
		} else {
			echo json_encode($resultado->result());
		}
	}
    public function getaperturas()
	{
		$this->db->select("a.*,a.id,a.cursos_id,c.descripcion as curso,cl.descripcion as ciclo,n.descripcion as nivel, SUM(s.costo) as costo");
		$this->db->from("aperturas a");
		$this->db->join("cursos c", "a.cursos_id = c.id");
		$this->db->join("ciclos cl", "c.ciclo_id = cl.id");
		$this->db->join("niveles n", "c.nivel_id = n.id");
        $this->db->join("modulos m", "m.curso_id = c.id");
        $this->db->join("submodulos s", "s.modulo_id = m.id");
		$this->db->where("a.estado", "1");
        //$this->db->where("a.estado", "1");
		$this->db->order_by("a.id","DESC");
		$this->db->group_by("a.id");
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		} else {
			return false;
		}
	}

}