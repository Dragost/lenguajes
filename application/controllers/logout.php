<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function index(){

 		$this->session->sess_destroy();
 		redirect(base_url());

	}
}
