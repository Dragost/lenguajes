<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Login extends CI_Controller {

 function __construct() {
   parent::__construct();
 }

 public function index() {
 	


 	if($this->input->post('connect')) {

        define('FB_APP_ID', '366764916762934');
		define('FB_APP_SECRET', '89de063a91d6fd5735ed17b434e42c28');

		$config = array('appId' => FB_APP_ID, 'secret' => FB_APP_SECRET);
	
		$this->load->library("facebook", $config);

		$fbuser = $this->facebook->getUser();

		if($fbuser) {
			try {
				$me = $this->facebook->api('/me');
				$uid = $this->facebook->getUser();
                $a_t = $this->facebook->getAccessToken();
                $photo = $this->facebook->api('/me/?fields=picture');
			} catch (FacebookApiException $e) {
				error_log($e);
			}
		}


	$fullname = $me['first_name'].' '.$me['last_name'];
    $email = $me['email'];

    // Gender male/female
    $gender = $me['gender'];
    if($gender == 'male') {
        $gender = 1; // Macho
    } else if($gender == 'female'){
        $gender = 2; // Caxonda?
    } else {
        $gender = 0; // AlieN?
    }

    // Localizacion...
    if(isset($me['location']['id'])) {
        $location = $me['location']['id']; // returns id to use 4 facebook_graph
    } else {
        $location = 0;
    }

    // Foto de perfil (retrieve url)
    if(isset($photo['picture'])) {
        $foto = $photo['picture']['data']['url'];
    } else {
        $foto = 0;
    }

    $facebook_data = array(
        'facebook_id' => $uid,
        'name' => $me['first_name'],
        'surname' => $me['last_name'],
        'username' => $me['username'],
        'photo' => $foto,
        'email' => $me['email'],
        'gender' => $gender,
        'location_id' => $location,
        'birthdate' => (isset($me['birthday'])) ? date_format(date_create($me['birthday']), 'Y-m-d') : '',
        'token' => $a_t
        );


    // here we go...
    $this->load->model('users', 'usuarios', true);
    if($this->usuarios->verify_existencia($uid)) {
        $this->usuarios->update_token($facebook_data);
    	$this->session->set_userdata(
            array(
                'logged_id' => $uid, 
                'nombre' => $me['first_name'],
                'email' => $me['email'],
                'token' => $a_t
                ));	
    } else {
    	$this->usuarios->alta_usuarios($facebook_data);
    	$this->session->set_userdata(
            array(
                'logged_id' => $uid, 
                'nombre' => $me['first_name'],
                'email' => $me['email'],
                'token' => $a_t
                ));	
    }


 	} else {
 		redirect(base_url());
 	}


 }


}	
?>