<?php

class Users extends CI_Model {

    function __construct(){
        parent::__construct();
    }

    public function verify_existencia($uid) {
    	$data = $this->db->query("SELECT * FROM usuarios WHERE fbid = $uid");
		return $data->result();
    	
    }


    public function alta_usuarios($fields) {
      $data = array(
        'nombre' => $fields['name'],
        'apellidos' => $fields['surname'],
        'fbid' => $fields['facebook_id'],
        'username' => $fields['username'],
        'email' => $fields['email'],
        'genero' => $fields['gender'],
        'birthdate' => $fields['birthdate']
        );


      $this->db->insert('usuarios', $data);

    }

/*
    public function edit_temazo($value, $fields) {
        $data = array(
               'titulo' => $fields['tz_temazo_title'],
               'youtube_id' => $fields['tz_temazo_youtube']
            );
        $this->db->where('idtemazo', $value);
        $this->db->update('tz_temazos', $data); 

        // Update slug
        $data_slug = array(
          'link' => $fields['tz_temazo_link'],
          'hits' => $fields['tz_temazo_hits']
          );

        $this->db->where(array('extra' => $value, 'tipo' => 1));
        $this->db->update('tz_seo', $data_slug);
    }
*/

}
?>