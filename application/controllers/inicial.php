<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Inicial extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){

		if($fb_id = $this->session->userdata('logged_id')) {
			// aqui cualquier.... cuando esta el usuario logeado
			$this->load->model('users', 'usuarios', true);
			$get_usuario = $this->usuarios->verify_existencia($fb_id);
			$data['usuario'] = $get_usuario[0];

			 $datas = file_get_contents("https://graph.facebook.com/225517524253746/feed?limit=25&since=1362850368&access_token=CAACEdEose0cBAJFNaZBKliNWJTZBoXFC4uhruklub6fZAufLsZAHuKfTT4o5mFBH9ZBLxjHC3Ey0QgLBSsWbeLLuo3DW5a8uZCmdIwxYPrppfnkzbqj8VJWXqHyUm6wOMwtoq9tyg9kgZBhlVJCi2Og4d9xozZCgF2eg9GZBhvjCoTgZDZD");

        $array = json_decode($datas, true);

        $data['facebook'] = array();
                foreach ($array['data'] as $key => $value) {
           array_push($data['facebook'], $value['from']['name']);
        }
			$this->load->view('pagina_inicio', $data);
			
		} else {

			$this->load->view('pagina_inicio');
		}
		

		



	}
}

