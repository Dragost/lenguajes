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

			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.gmail.com', //ssl://smtp.gmail.com
			    'smtp_port' => 465,
			    'smtp_user' => 'dragost.xenon@gmail.com',
			    'smtp_pass' => 'uteboricla1993',
			    'mailtype'  => 'html', 
			    'charset'   => 'iso-8859-1'
			);
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");


			// Set to, from, message, etc.
	        $this->email->from( $this->input->post('mail'), $this->input->post('name'));
			$this->email->to('lossecretosdetualmohada@gmail.com');  //TO: lossecretosdetualmohada@gmail.com
	        $this->email->subject("WebPage: ".$this->input->post('subject'));
			$this->email->message($this->mensaje($this->input->post('message')));


			if($this->email->send()){
				$data['mess'] = "Mensaje enviado correctamente.";
				$data['sucs'] = true;
			}else{
				//show_error($this->email->print_debugger());
				$data['mess'] = "Hubo un error, intentelo mas tarde.";
			}

			$this->load->view('contacto_view', $data);


 		}

	}

	private function mensaje($post_mess){

		$plantilla = "<b>Mensaje Recibido desde: </b>".base_url()."<br><br>";
		$plantilla .= "<b>De: </b>".$this->input->post('name')." ( ".$this->input->post('mail')." )<br><br>";
		$plantilla .= "<b>Contenido: </b>$post_mess";

		return $plantilla;

	}

	
}

