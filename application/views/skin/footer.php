
      
    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    <div class="container marketing">

      <!-- Three columns of text below the carousel -->
      <div class="row">
        <div class="span4">
          <center>
            <img class="img-circle margin10bot" src="http://graph.facebook.com/anamariaoficialmusic/picture?type=large" data-src="holder.js/140x140">
            <div class="hero-unit">
            	<div class="padding20-foot">
		            <h2>Ana María</h2>
		            <p>Bienvenidos!! <hr> Os doy las gracias por entrar en nuestra web, yo soy la cantante de <strong>"Los Secretos de tu Almohada"</strong>, y os animo a saber más acerca de nosotros!! <hr> Estáis invitados a todos los conciertos.</p>
		            <img class="smile" src="<?=base_url('img/smile.png'); ?>">
		            <p><a class="btn" href="<?=base_url('historia'); ?>">Saber Más &raquo;</a></p>
		        </div>
	        </div>
          </center>
        </div><!-- /.span4 -->
        <div class="span4">
	        <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/contualmohada" data-widget-id="342047292007804929">Tweets por @contualmohada</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div><!-- /.span4 -->
        <div class="span4">
          <center>
            <img class="img-circle margin10bot" src="http://graph.facebook.com/dragost11/picture?type=large" data-src="holder.js/140x140">
            <div class="hero-unit">
            	<div class="padding20-foot">
		            <h2>Alberto</h2>
		            <p>Desarrollador y Diseñador WEB<hr>Muchas gracias por visitar la Web que recientemente ha sido abierta. <br> Es posible que contenga algún fallo. <br> Si tuvierais algún problema, por favor poneros en contacto.<hr> Gracias</p>
		            <p><a class="btn" href="http://dragost.com">Ir a Portfolio &raquo;</a></p>
		        </div>
	        </div>
          </center>
        </div><!-- /.span4 -->
      </div><!-- /.row -->






      <!-- FOOTER -->
      <footer>
      	<div class="hero-unit">
      		<div class="padding20-foot">
		        <p class="pull-right"><a href="#">Volver Arriba <i class="icon-chevron-up"></i></a></p>
		        <p>&copy; 2013 Los Secretos de tu Almohada, 'Grupo Musical'.
		        	<a target="_blank" href="<?=base_url('feed');?>"><img class="rss" src="<?=base_url('img/feed-icon.png');?>"></a>
		        </p>

		    </div>
	    </div>
      </footer>

    </div><!-- /.container -->


	
	
	<!-- FACEBOOK javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	
	<script type="text/javascript">
  /* FaceBoook [begin] */
	window.fbAsyncInit = function() {
		FB.init({
			appId   : '366764916762934',
			oauth   : true,
			status  : true, // check login status
			cookie  : true, // enable cookies to allow the server to access the session
			xfbml   : true // parse XFBML
		});

	  };

	function fb_login(){
		FB.login(function(response) {
		  
			if (response.authResponse) {
			  

				access_token = response.authResponse.accessToken; //get access token
				user_id = response.authResponse.userID; //get FB UID

				FB.api('/me', function(response) {
					user_email = response.email; //get user email
					if(user_email == null) {
					  alert("Necesitamos tu correo electrónico para realizar una conexión!"); 
					} else {
						$('#dr_login').html('<a>Cargando...</a>');
					  AjaxResponse();
					}        
				});

			} else {
				console.log('El usuario cancelo el login al FaceBook!');
			}
		}, {
			scope: 'publish_stream,email,user_website,user_location,user_birthday'
		});
	}
	(function() {
		var e = document.createElement('script');
		e.src = document.location.protocol + '//connect.facebook.net/es_ES/all.js';
		e.async = true;
		document.getElementById('fb-root').appendChild(e);
	}());
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/es_ES/all.js#xfbml=1&appId=366764916762934";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));

	/* Ajax Response  */
        function AjaxResponse() {
           var myData = 'connect=1';
           jQuery.ajax({
           type: "POST",
           url: "<?php echo base_url('login'); ?>",
           dataType:"json",
           crossDomain: true,
           data:myData,
			complete: function() { 
        	window.location.reload();
     	}
         });
         }
        /* Ajax Response [end] */
	
	</script>


	<script src="<?php echo base_url('js/tripleflap.js'); ?>" type="text/javascript"></script>
	<script type="text/javascript">
		var birdSprite='https://lh3.googleusercontent.com/-StM0Csn4ktc/TYNPdDXzNGI/AAAAAAAAAds/QPZ0-DbHgtc/s1600/birdsprite.png';
		var targetElems=new Array('img'); //'img','hr','table','td','div.','input','textarea','button','select','ul','ol','li','h1','h2','h3','h4','p','code','object','a','b','strong','span'
		var twitterAccount = 'http://twitter.com/contualmohada';
		var twitterThisText ='';
		tripleflapInit();
	</script>

	

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-transition.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-alert.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-modal.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-dropdown.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-scrollspy.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-tab.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-tooltip.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-popover.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-button.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-collapse.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-carousel.js'); ?>"></script>
    <script src="<?php echo base_url('js/bootstrap-typeahead.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.colorbox-min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery.colorbox-es.js'); ?>"></script>

    <script type="text/javascript">
	    $(function () {
	        $("[rel='tooltip']").tooltip();
	    });
	</script>
	
	<script>
		$(document).ready(function(){
			//Examples of how to assign the Colorbox event to elements
			$(".lightbox").colorbox({transition:'none', retinaImage:true, retinaUrl:true});
			$(".group1").colorbox({rel:'group1'});
			$(".group2").colorbox({rel:'group2'});
			$(".group3").colorbox({rel:'group3'});
			$(".group4").colorbox({rel:'group4'});
			$(".group5").colorbox({rel:'group5'});
			$(".group6").colorbox({rel:'group6'});
			$(".group7").colorbox({rel:'group7'});
			$(".group8").colorbox({rel:'group8'});
			$(".group9").colorbox({rel:'group9'});
			$(".group0").colorbox({rel:'group0'});

		});
	</script>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-26505234-2', 'dragost.com');
	  ga('send', 'pageview');
	</script>
    <script src="<?php echo base_url('js/holder/holder.js'); ?>"></script>
  </body>
</html>