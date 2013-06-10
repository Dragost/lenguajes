<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('face');
		$this->load->library("pagination");

	}

	public function index(){
		
		if($fb_id = $this->session->userdata('logged_id')) {
			// aqui cualquier.... cuando esta el usuario logeado
			$this->load->model('users', 'usuarios', true);
			$get_usuario = $this->usuarios->verify_existencia($fb_id);
			$data['usuario'] = $get_usuario[0];
		}

		$face = $this->get_face();

		$config = array();
		$config["base_url"] = base_url() . "page/";
        $config["total_rows"] = count($face['data']);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['cur_tag_open'] = '<li class="disabled"><a href="#">';
        $config['cur_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $partido = array_chunk($face['data'], 10, true);

        $num = $page/$config["per_page"];
        if(is_integer($num) && isset($partido[$num])){
       		$data["facebook"] = $partido[$num];
       	}else{
        	$data["facebook"] = $partido[0];
       	}

        $data["links"] = $this->pagination->create_links();


		$this->load->view('inicial_view', $this->stimage($data));



	}


	private function get_face() {
		define('FB_APP_ID', '366764916762934');
		define('FB_APP_SECRET', '89de063a91d6fd5735ed17b434e42c28');

		$config = array('appId' => FB_APP_ID, 'secret' => FB_APP_SECRET);
	
		$this->load->library("facebook", $config);

		return $this->facebook->api('225517524253746/posts?fields=from,picture,source,link,actions,type,status_type,caption,object_id,updated_time,likes,comments,message&limit=50&locale=es_ES'); //225517524253746/posts?limit=10&since=1362850368&locale=es_ES
	}


	private function stimage($datos) {

		foreach ($datos['facebook'] as $key => &$value) { //Añadiendo '&' delante del value editamos el Array original
			// Modificar Imagenes para que salgan grandes
			if(isset($value['picture'])){

				if(substr($value['picture'], strlen($value['picture'])-5) == "s.jpg"){

					$value['picture'] = substr($value['picture'], 0, -5)."n.jpg";
					
				}

			}	

			// Crear arrays de galerias
			if(isset($value['status_type']) && $value['status_type'] == "added_photos"){
				
				$a = $value['link'];
				$b = explode("set=", $a);
				$c = explode(".", $b[1]);

				$d = $this->facebook->api($c[1]."?fields=photos");

				if(count($d['photos']['data']) > 1){

					$datos["gallery"][$value['id']] = $this->facebook->api($c[1]."?fields=photos");

				}

			}
		}

		return $datos;

	}

}