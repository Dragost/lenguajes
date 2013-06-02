<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Contacto extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){

			$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Usuario', 'trim|min_length[5]|max_length[20]|required');
		$this->form_validation->set_rules('mail', 'Correo', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Asunto', 'trim|max_length[50]|required');
		$this->form_validation->set_rules('message', 'Mensaje', 'trim|max_length[500]|required');

		if($this->form_validation->run() == false) {
			$this->load->view('contacto_view');
		} else {
			$data['hmmm'] = "Gracias por comunicarse...";
			$this->load->view('contacto_view', $data);
 		}

	}

	
}

