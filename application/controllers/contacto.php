<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Contacto extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('url','form'));
    	$this->load->model('Captcha','',TRUE);
	}

	public function index(){


		// reglas de validacion
		$this->form_validation->set_rules('name', 'Usuario', 'trim|min_length[5]|max_length[20]|required');
		$this->form_validation->set_rules('mail', 'Correo', 'required|valid_email');
		$this->form_validation->set_rules('subject', 'Asunto', 'trim|max_length[50]|required');
		$this->form_validation->set_rules('message', 'Mensaje', 'trim|max_length[500]|required');
	    $this->form_validation->set_rules('captcha','Captcha','required|callback_captcha_check');
	    $this->form_validation->set_message('captcha_check','El código ingresado no es válido');

		if($this->form_validation->run() == false) {

			// Creacion del Captcha
	        $this->load->helper('captcha');
	 
	        $vals = array(
	            'img_path'   => './captcha/',
	            'img_url'    => base_url("captcha").'/',
	            'font_path'  => './captcha/fonts/3.ttf',
	            'img_width'  => '280',
	            'img_height' => 50,
	            'expiration' => 3600 // 1 hora
	        );
	 
	        $cap = create_captcha($vals);
	 		

	        // se agrega el captcha a la base de datos
	        $captcha_info = array (
	            'captcha_time' => $cap['time'],
	            'ip_address' => $this->input->ip_address(),
	            'word' => $cap['word']
	        );
	 
	        $this->Captcha->insertCaptcha($captcha_info);
	 
	        $data['cap'] = $cap;


			$this->load->view('contacto_view', $data);
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

	function captcha_check(){

	    $expiration = time()-7200; // Limite de dos horas
	    $binds = array ($this->input->post('captcha'),$this->input->ip_address(),$expiration);
	 
	    return $this->Captcha->captchaExist($binds);
	}

	
}

