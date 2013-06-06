<?php require_once('skin/header.php'); ?>
<?php
 
$frm = array (
    'id' => 'frmContacto'
);
 
$frm_captcha = array (
    'name' => 'captcha',
    'id' => 'frCaptcha',
    'captcha' => 'required'
);
 
$frm_enviar = array (
    'name' => 'submit',
    'id' => 'frSubmit',
    'value' => 'Enviar',
    'class' => 'submit'
);
 
?>

	
	<div class="container">
    <div class="hero-unit">
    
      <div class="row">
        <div class="span5">
          <div class="padding20">
          <h2><img src="<?=base_url('img/icon/vector/mail-outgoing.svg')?>" class="icon_mes">Contacto</h2>
            <form class="form-horizontal" method="post">
              <div class="control-group">
                <label class="control-label" for="imputName">Nombre</label>
                <div class="controls">
                  <input class="input-xlarge" name="name" type="text" id="imputName" placeholder="Nombre" <?php echo ($this->session->userdata('logged_id')) ? 'value="' . $this->session->userdata('nombre'). '"' : 'autofocus'; ?> >
                  <?php if(form_error('name')){
                    echo form_error('name','<span class="label label-important">','</span>'); 
                  } ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input class="input-xlarge" name="mail" type="text" id="inputEmail" placeholder="Email" <?php echo ($this->session->userdata('logged_id')) ? 'value="' . $this->session->userdata('email'). '"' : ''; ?>>
                  <?php if(form_error('mail')){
                    echo form_error('mail','<span class="label label-important">','</span>'); 
                  } ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputSubject">Asunto</label>
                <div class="controls">
                  <input class="input-xlarge" name="subject" type="text" id="inputSubject" placeholder="Asunto" <?php echo ($this->session->userdata('logged_id')) ? 'autofocus' : ''; ?>>
                  <?php if(form_error('subject')){
                    echo form_error('subject','<span class="label label-important">','</span>'); 
                  } ?>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputMessage">Mensaje</label>
                <div class="controls">
                  <textarea class="input-xlarge" name="message" id="inputMessage" rows="5" placeholder="Mensaje"></textarea>
                  <?php if(form_error('message')){
                    echo form_error('message','<span class="label label-important">','</span>'); 
                  } ?>
                  <?php if(isset($mess)): ?>
                    <?php if(isset($sucs)): ?>
                      <span class="label label-success"><?=$mess?></span>
                    <?php else: ?>
                      <span class="label label-important"><?=$mess?></span>
                    <?php endif; ?>
                  <?php endif; ?>
                </div>
              </div>

              <?php if(!isset($mess)): ?>
              <div class="control-group">
                <div class="controls">
                  <?php echo $cap['image']; ?>
                </div>
              </div>

              <div class="control-group">
                <div class="controls">
                  <input class="input-xlarge" name="captcha" type="text" placeholder="Captcha">
                  <?php if(form_error('captcha')){
                    echo form_error('captcha','<span class="label label-important">','</span>'); 
                  } ?>
                </div>
              </div>
              <?php endif; ?>

              <div class="control-group">
                <div class="controls pull-right">
                  <button type="submit" class="btn btn-success">Enviar</button>
                </div>
              </div>
            </form>
          </div>
          </div>
        <div class="span7 margin-top">
          <div class="padding20">
            <div class="container-fluid"><h4 class="pull-right">(Zaragoza) Casetas</h4></div>
            <div class="map-outer">
              <div id="map-canvas"></div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>




    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
// Enable the visual refresh
google.maps.visualRefresh = true;

var map;
function initialize() {
  var mapOptions = {
    zoom: 15,
    center: new google.maps.LatLng(41.71803, -1.025205),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>






<?php require_once('skin/footer.php'); ?>