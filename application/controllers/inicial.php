<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicial extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){
		$this->load->helper('face');
		if($fb_id = $this->session->userdata('logged_id')) {
			// aqui cualquier.... cuando esta el usuario logeado
			$this->load->model('users', 'usuarios', true);
			$get_usuario = $this->usuarios->verify_existencia($fb_id);
			$data['usuario'] = $get_usuario[0];

			$data['facebook'] = $this->get_face();
			
			$this->load->view('inicial_view', $data);
			//
			
		} else {
			$data['facebook'] = $this->get_face();
			$this->load->view('inicial_view', $data);
		}


	}


	private function get_face() {
		define('FB_APP_ID', '366764916762934');
		define('FB_APP_SECRET', '89de063a91d6fd5735ed17b434e42c28');

		$config = array('appId' => FB_APP_ID, 'secret' => FB_APP_SECRET);
	
		$this->load->library("facebook", $config);

		

		return $this->facebook->api('225517524253746/posts?fields=message,from,picture,created_time&locale=es_ES'); //225517524253746/posts?limit=10&since=1362850368&locale=es_ES
	}
}

