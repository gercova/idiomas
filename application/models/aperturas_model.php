<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class aperturas_model extends CI_Model {

    public function getaperturas($starIndex, $pageSize, $buscar){
        $count = $this->db->count_all_results('aperturas');
        $this->db->select('a.id, c.descripcion curso, s.descripcion sede, a.fec_ini fecha');
        $this->db->from('aperturas a');
        $this->db->join('cursos c', 'a.cursos_id = c.id');
        $this->db->join('sedes s', 'a.sede_id = s.id');
        $this->db->like('c.descripcion', $buscar, 'both');
        $this->db->like('s.descripcion', $buscar, 'both');
        $this->db->where('a.estado', '1');
        $this->db->limit($pageSize);
        $this->db->offset($starIndex);
        $this->db->order_by('a.id', 'DESC');
        return [$this->db->get()->result_array(), $count];
    }

    public function getapertura($id){
        $query = $this->db->where('id', $id)
            ->where('estado', '1')
            ->get('aperturas');
        return $query->row();
    }

    public function save($data){
        return $this->db->insert('aperturas', $data);
    }

    public function update($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('aperturas', $data);
    }
}