<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Usuario extends CI_Model{

	function __construct(){
		parent::__construct();
	}
	public function index(){

    $this->load->model('usuario');
	}

	function getUser(){
		$query=$this->db->get('usuario');
		return $query->result_array();
	}

	function getUserById($id){
		$query=$this->db->where('id', $id);
		$query=$this->db->get('usuario');
		return $query->row();
	}

	function crearUsuarioAleatoreo($nombre, $email){
        
	}


	function login($id, $nombre){
		$query = $this->db->where('id', $id);
		$query = $this->db->where('nombre', $nombre);
		$query = $this->db->get('usuario');
		return $query->row();
	
	}


	function createOnUpdtae($id=0, $datos){
		if($id>0){
			$this->db->where('nombre', $id);
			$this->db->update('usuario', $datos);
			return $this->db->affected_rows();
		}else{
			$this->db->insert('usuario', $datos);
			return $this->db->insert_id();

		}
	}
}
?>