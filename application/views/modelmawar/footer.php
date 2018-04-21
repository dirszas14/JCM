<footer class="footer">
	<div class="container-fluid bg-dark">
		<div class="container">
			<div class="row py-3">
				<div class="col-md-4 col-centered text-center">
					<p class="text-white"></p>
				</div>
				<div class="col-md-4 col-centered text-center">
					<ul class="social-network social-circle">
						<li>
							<a href="https://www.facebook.com/" class="icoFacebook"><i class="fa fa-facebook"></i>
							</a>
						</li>
						<li>
							<a href="https://www.instagram.com/jc_management/" target = '_blank' class="icoInstagram"><i class="fa fa-instagram"></i>
							</a>
						</li>
						<li>
							<a href="https://twitter.com/" class="icoTwitter">
							<i class="fa fa-twitter"></i></a>
						</li>
						<li>
							<a href="https://www.linkedin.com/company/" class="icoLinkedin">
							<i class="fa fa-linkedin"></i></a>
						</li>
				</div>
				<div class="col-md-4 col-centered text-center">
					<p class="text-white"></p>
				</div>
			</div>
			<div class="row py-3">
				<div class="col-md-4 col-centered text-center">
					<p class="text-white"></p>
				</div>
				<div class="col-md-4 col-centered text-center">
					<p class="text-white">© 2018 Copyright : Jakarta Center Management</p>
				</div>
				<div class="col-md-4 col-centered text-center">
					<p class="text-white"></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--/Footer-->
</body>
<script src="<?php echo base_url('assets/plugins/jquery/dist/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/dist/b4/js/bootstrap.min.js')?>" ></script>
<script>
 var sourceSwap = function () {
        var $this = $(this);
        var newSource = $this.data('alt-src');
        $this.data('alt-src', $this.attr('src'));
        $this.attr('src', newSource);
    }

    $(function() {
        $('img[data-alt-src]').each(function() { 
            new Image().src = $(this).data('alt-src'); 
        }).hover(sourceSwap, sourceSwap); 
    });
 /* $(window).scroll(function(){
    if($(document).scrollTop() > 10){
      $('nav').addClass('shrink');
    }
    else{
      $('nav').removeClass('shrink');
    }
  });*/

  // Add scrollspy to <body>
/*$('body').scrollspy({target: ".navbar", offset: 50});

// Add smooth scrolling on all links inside the navbar
$("#navbarNav a").on('click', function(event) {

  // Make sure this.hash has a value before overriding default behavior
  if (this.hash !== "") {

    // Prevent default anchor click behavior
    event.preventDefault();

    // Store hash
    var hash = this.hash;

    // Using jQuery's animate() method to add smooth page scroll
    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
    $('html, body').animate({
      scrollTop: $(hash).offset().top
    }, 800, function(){

    // Add hash (#) to URL when done scrolling (default click behavior)
      window.location.hash = hash;
    });

  } // End if

});*/
</script>
</html>
