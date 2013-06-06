
      
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
		            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
		            <p><a class="btn" href="#">Saber Más &raquo;</a></p>
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
		            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
		            <p><a class="btn" href="#">Ir a Portfolio &raquo;</a></p>
		        </div>
	        </div>
          </center>
        </div><!-- /.span4 -->
      </div><!-- /.row -->






      <!-- FOOTER -->
      <footer>
      	<div class="hero-unit">
      		<div class="padding20-foot">
		        <p class="pull-right"><a href="#">Back to top</a></p>
		        <p>&copy; 2013 Los Secretos de tu Almohada, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
					  alert("Necesitamos tu correo electr?nico para realizar una conexi?n!"); 
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
    <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
    <script src="<?php echo base_url('js/holder/holder.js'); ?>"></script>
  </body>
</html>