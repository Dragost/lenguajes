<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Feed extends CI_Controller {
 
    public function __construct() {
        parent::__construct();
        //Cargamos los helpers necesarios
        $this->load->helper('url');
        $this->load->helper('text');
        $this->load->helper('xml');
        $this->load->helper('face');
    }
 
    function index() {
        $datos['encoding'] = 'utf-8';
        $datos['nombre_feed'] = 'Los Secretos de tu Almohada';
        $datos['url_feed'] = base_url("feed");
        $datos['descripcion'] = 'Ultimas novedades del Grupo: Los Secretos de tu Almohada';
        $datos['lenguaje'] = 'es-ES';
        $datos['autor'] = 'Alberto Punter';
        $datos['articulos'] = "";
        header("Content-Type: application/rss+xml");


        $face = $this->get_face();


        $datos["facebook"] = $face['data'];

        $this->load->view('feed_view', $datos);

    }

    private function get_face() {
        define('FB_APP_ID', '366764916762934');
        define('FB_APP_SECRET', '89de063a91d6fd5735ed17b434e42c28');

        $config = array('appId' => FB_APP_ID, 'secret' => FB_APP_SECRET);
    
        $this->load->library("facebook", $config);

        return $this->facebook->api('225517524253746/posts?fields=from,picture,source,link,actions,type,object_id,updated_time,likes,comments,message&locale=es_ES'); //225517524253746/posts?limit=10&since=1362850368&locale=es_ES
    }


}
?>