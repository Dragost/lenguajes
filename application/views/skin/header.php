<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Los Secretos de tu Almohada - <?php if($this->uri->segment(1) == ""){ echo "Inicio";} else {echo ucfirst ($this->uri->segment(1));} ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo base_url('css/bootstrap.php'); ?>" rel="stylesheet"  type="text/css">
    <link href="<?php echo base_url('css/bootstrap-responsive.php'); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url('css/colorbox.php'); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

  </head>

  <body>

  <div id="fb-root"></div>
   <!-- NAVBAR
    ================================================== -->
    <nav>
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo base_url(); ?>">Los Secretos de tu Almohada</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li <?php echo ($this->uri->segment(1) == '') ? 'class="active"' : ''; ?>><a href="<?php echo base_url(); ?>">Novedades</a></li>
                <li <?php echo ($this->uri->segment(1) == 'calendario') ? 'class="active"' : ''; ?>><a href="<?php echo base_url("calendario"); ?>">Calendario</a></li>
                <li <?php echo ($this->uri->segment(1) == 'historia') ? 'class="active"' : ''; ?>><a href="<?php echo base_url("historia"); ?>">Historia</a></li>
                <li <?php echo ($this->uri->segment(1) == 'contacto') ? 'class="active"' : ''; ?>><a href="<?php echo base_url("contacto"); ?>">Contacto</a></li>
              </ul>
              <ul class="nav pull-right">
                <?php if (!$this->session->userdata('logged_id')): ?>
                  <li id="dr_login"><a href="javascript:void(0);" onclick="fb_login();"><img src="<?php echo base_url('img/fb-button.png'); ?>"></img></a></li>
                        <?php else: ?>
                          
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <img src="http://graph.facebook.com/<?=$this->session->userdata('logged_id');?>/picture?type=square"></img><?=$this->session->userdata('nombre');?><b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="<?php echo base_url('logout'); ?>">Logout</a></li>
                    </ul>
                  </li>
                <?php endif; ?>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    </nav>

   <!-- NAVBAR
    ================================================== -->
