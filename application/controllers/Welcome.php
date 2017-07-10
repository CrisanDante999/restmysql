<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function getuser(){
		$this->load->model('usuario');
		$data = $this->usuario->getUser();
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function getuserbuid(){
		$id=$this->input->post_get('id', TRUE);//con esto post('id')es post
		//echo $id;
		$this->load->model('usuario');
		$data = $this->usuario->getUserById($id);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

	public function log1(){
		$id=$this->input->post_get('id', TRUE);//con esto post('id')es post
		$nombre=$this->input->post_get('nombre', TRUE);//con esto post('id')es post
		//echo $id;
		$this->load->model('usuario');
		$data = $this->usuario->login($id, $nombre);
		header('Content-Type: application/json');
		echo json_encode($data);
	}

}
?>