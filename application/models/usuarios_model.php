<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class usuarios_model extends CI_Model {

	public function getUsuarios(){
		$resultados = $this->db->select("u.*,r.nombre as rol")
			->from("usuarios u")
			->join("roles r","u.rol_id = r.id")
			->where("u.estado","1")
			->get();
		return $resultados->result();
	}

	public function getUsuario($id){
		$resultado = $this->db->select("u.*,r.nombre as rol")
			->from("usuarios u")
			->join("roles r","u.rol_id = r.id")
			->where("u.id",$id)
			->where("u.estado","1")
			->get();
		return $resultado->row();
	}

	public function getRoles(){
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("usuarios",$data);
	}

	public function login($username, $password){
		$this->db->where("username", $username);
		$this->db->where("password", $password);

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
	}
}