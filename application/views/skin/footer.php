
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2013 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
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
           url: "http://dragost.com/api/ejemploroland/login",
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