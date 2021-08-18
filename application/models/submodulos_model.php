<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class submodulos_model extends CI_Model {

    public function getSubmodulos(){
        $query = $this->db->where('estado', '1')
            ->get('submodulos');
        return $query->result(); 
    }

    public function getSubmoduloByCurso($id){
        $query = $this->db->select('sm.id, sm.descripcion, sm.costo')
            ->from('submodulos sm')
            ->join('modulos m', 'sm.modulo_id = m.id')
            ->join('cursos c', 'm.curso_id = c.id')
            ->where('c.id', $id)
            ->where('sm.estado', '1')
            ->where('m.estado', '1')
            ->order_by('sm.id', 'asc')
            ->get();
        return $query->result();
    }
}