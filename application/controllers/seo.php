<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
Class Seo extends CI_Controller {

    function sitemap()
    {

        $data['data'] = array("historia", "contacto", "calendario", "feed"); // Array para generar las URLS
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("sitemap_view",$data);
    }
}
?>