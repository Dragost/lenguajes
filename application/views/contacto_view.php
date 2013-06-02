<?php require_once('skin/header.php'); ?>

	
	<div class="container">
    <div class="hero-unit">
    
      <div class="row">
        <div class="span5">
          <div class="padding20">
          <h2>Contacto</h2>
            <form class="form-horizontal" method="post">
            <?php echo validation_errors(); ?>
              <div class="control-group">
                <label class="control-label" for="imputName">Nombre</label>
                <div class="controls">
                  <input class="input-xlarge" name="name" type="text" id="imputName" placeholder="Nombre" <?php echo ($this->session->userdata('logged_id')) ? 'value="' . $this->session->userdata('nombre'). '"' : 'autofocus'; ?> >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input class="input-xlarge" name="mail" type="email" id="inputEmail" placeholder="Email" <?php echo ($this->session->userdata('logged_id')) ? 'value="' . $this->session->userdata('email'). '"' : ''; ?>>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputSubject">Asunto</label>
                <div class="controls">
                  <input class="input-xlarge" name="subject" type="text" id="inputSubject" placeholder="Asunto" <?php echo ($this->session->userdata('logged_id')) ? 'autofocus' : ''; ?>>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputMessage">Mensaje</label>
                <div class="controls">
                  <textarea class="input-xlarge" name="message" id="inputMessage" rows="5" placeholder="Mensaje"></textarea>
                </div>
              </div>
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


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div><!-- /.span4 -->
      </div><!-- /.row -->


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