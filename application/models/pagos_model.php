<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class pagos_model extends CI_Model {

    public function getpagos($starIndex, $pageSize, $buscar){
        $count = $this->db->where('estado', '1')->from('pagos')->count_all_results(); 
        $this->db->select('p.id, e.dni, e.nombre, p.monto, c.descripcion curso, n.descripcion nivel');
        $this->db->from('pagos p');
        $this->db->join('estudiantes e', 'p.estudiante_id = e.id');
        $this->db->join('matriculas ma', 'e.id = ma.estudiante_id', 'p.matricula_id = ma.id');
        $this->db->join('aperturas a', ' ma.apertura_id = a.id', 'p.apertura_id = a.id');
        $this->db->join('cursos c', 'c.id = a.cursos_id');
        $this->db->join('niveles n', 'c.nivel_id = n.id');
        $this->db->like('e.dni', $buscar, 'both');
        $this->db->like('e.nombre', $buscar, 'both');
        $this->db->where('p.estado', '1');
        $this->db->limit($pageSize);
        $this->db->offset($starIndex);
        $this->db->order_by('p.id', 'desc');
        return [$this->db->get()->result_array(), $count];
    }

    public function getpagoestudiantes(){
        $query = $this->db->select('a.id apertura, m.id matricula, e.id estudiante, e.dni, e.nombre, CONCAT(cu.descripcion, " - ", n.descripcion) curso_nivel, m.deuda')
            ->from('estudiantes e')
            ->join('matriculas m', 'e.id = m.estudiante_id')
            ->join('aperturas a', 'm.apertura_id = a.id')
            ->join('cursos cu', 'cu.id = a.cursos_id')
            ->join('niveles n', 'cu.nivel_id = n.id')
            ->where('m.matriculado', '0')
            ->where('m.deuda >', '0')
            ->order_by('m.matriculado', 'asc')
            ->get();
        return $query->result();
    }

    public function save($data){
        return $this->db->insert('pagos', $data);
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('pagos', $data);
    }

    public function save_detalles($data){
        return $this->db->insert('detalle_pago', $data);
    }

    public function ultimo_id(){
		return $this->db->insert_id();
	}

    public function getdeuda($pago_id){
		# sacar deuda
		$query = $this->db->select('monto')
		    ->from('pagos')
		    ->where('id', $pago_id)
		    ->get();
		return $query->row();
	}

    public function descontardeuda($id, $totaldeuda){
		# actualiza los datos
        $this->db->set('monto', $totaldeuda);
		$this->db->where('id', $id);
		return $this->db->update('pagos', $data);
	}
}