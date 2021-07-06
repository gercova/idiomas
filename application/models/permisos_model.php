<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permisos_model extends CI_Model {

	public function getPermisos(){
		$resultados = $this->db->select("p.*,m.nombre as menu, r.nombre as rol")
			->from("permisos p")
			->join("roles r", "p.rol_id = r.id")
			->join("menus m", "p.menu_id = m.id")
			->get();
		return $resultados->result();
	}

	public function getMenus(){
		$resultados = $this->db->get("menus");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("permisos",$data);
	}


	public function getPermiso($id){
		$this->db->where("id",$id);
		$resultado = $this->db->get("permisos");
		return $resultado->row();
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("permisos",$data);
	}
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("permisos");
	}

}