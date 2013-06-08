<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Historia extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){

			$this->load->view('historia_view');

	}

}
