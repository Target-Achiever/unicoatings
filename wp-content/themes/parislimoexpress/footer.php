<?php
/**
	Theme Name: Paris Limo Express Theme
*/
?>

 <section class="footer">
            <div class="container">      
                <div class="row">
				<?php $ple_options = get_option('ple_theme_options');?>
                    <div class="col-sm-4 col-md-4">
                        <div class="footer_box mb-3 sr-icons text-center">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/footer_icon1.png" alt="Footer Icon">
                            </div>
                            <div class="footer_tittle">
                                <h5>Address</h5>
                            </div>
                            <div class="footer_content">
                                <p><?php echo $ple_options['ple_address']; ?></p>
                              
                            </div>
                        </div>
                    </div> 
                    <div class="col-sm-4 col-md-4">
                        <div class="footer_box mb-3 sr-icons text-center">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/footer_icon2.png" alt="Footer Icon">
                            </div>
                            <div class="footer_tittle">
                                <h5>Phone</h5>
                            </div>
                            <div class="footer_content">
                                <p><?php echo $ple_options['ple_phonenumber']; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="footer_box mb-3 sr-icons text-center">
                            <div class="icon">
                                <img src="<?php bloginfo('stylesheet_directory'); ?>/img/footer_icon3.png" alt="Footer Icon">
                            </div>
                            <div class="footer_tittle">
                                <h5>Email</h5>
                            </div>
                            <div class="footer_content">
                                <p><?php echo $ple_options['ple_email']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="text-center soical_icon">
				<?php if(isset($ple_options['ple_dribbble'])): ?>
                    <a href="<?php echo $ple_options['ple_dribbble']; ?>" class="icon_list">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/social_icon1.png" class="sr-icons" alt="Social">
                    </a>
				<?php endif; ?>
				<?php if(isset($ple_options['ple_gmail'])): ?>
                    <a href="<?php echo $ple_options['ple_gmail']; ?>" class="icon_list">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/social_icon2.png" class="sr-icons" alt="Social">
                    </a>
				<?php endif; ?>
				<?php if(isset($ple_options['ple_twitter'])): ?>
                    <a href="<?php echo $ple_options['ple_twitter']; ?>" class="icon_list">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/img/social_icon3.png" class="sr-icons" alt="Social">
                    </a>
				<?php endif; ?>
                    
                </div>-->
            </div>
        </section>
        <section class="copy">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-sm-12 text-center">
					<?php  
					$amount = $GLOBALS['amount'];  
					$car_with_driver = $GLOBALS['car_with_driver'];  
					$additional_costs = $GLOBALS['additional_costs'];  
					
					?>
                        <p>Copyright &copy;2018 PLE.  All rights reserved. </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Bootstrap core JavaScript -->
        <script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/jquery/jquery.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

        <!-- Custom scripts for this template -->
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/creative.min.js"></script>
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/videobackground.js"></script>
		
		  <!--New Js-->
       <!--Date Picker-->
       <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap-datepicker.min.js"></script>  
       <!--Form Validation-->
       <!--<script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.js"></script> -->      
       <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.js"></script>        
       <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script>
       <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrapValidator.js"></script>
       <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/wow.min.js"></script>
       <!--Animation-->
       <script>
		new WOW().init();
           wow = new WOW(
               {
               boxClass:     'wow',      // default
               animateClass: 'animated', // default
               offset:       0,          // default
               mobile:       true,       // default
               live:         true        // default
             }
             )
             wow.init();
		</script>
		<?php
		// in the loop:
		if ( get_page_template_slug( get_the_ID() ) == "booknow_template.php" ){
		?>
		<script type="text/javascript">	
			$('#inside_paris').attr("disabled", true); 
			function find_cost(car_id){
				var place = $("#pickup_place").val()+'_'+$("#drop_place").val();
				
				var place1 = $("#drop_place").val()+'_'+$("#pickup_place").val();
				
				var trip = $("#trip").val();
				
				var json_amount = <?php echo $amount; ?>;
			   
				var forum = json_amount[car_id]; 
				j = 0;
				for (i = 0; i < forum.length; i++) {
						
						var cost = forum[i][place];
						
						if (typeof cost === "undefined"){
							cost = '';
						}
						else{
							break;
						}
						if(j ==0 && i == (parseInt(forum.length)-1) && cost == ''){
							i = -1; j = 1;
							place = place1;
						}
				}
				//cost = (cost != '')?cost:'';
				if(trip == "round_trip"){
					cost = parseInt(cost) + parseInt(cost);
				}
				$("#cost").val(cost);
			}
			function find_cost1(car_id){
				
				var packages = $("#packages").val();
				//alert(car_id);
				//alert(packages);
				var json_amount = <?php echo $amount; ?>;
				var car_with_driver = <?php echo $car_with_driver; ?>;
				var additional_costs = <?php echo $additional_costs; ?>;
			   
				var add_cost = additional_costs[car_id]; 
				var forum = car_with_driver[car_id]; 
				//alert(add_cost.euro_per_hour);
				for (i = 0; i < forum.length; i++) {
						
						var cost = forum[i][packages];
						
						//alert(cost);
						if (typeof cost === "undefined"){
							cost = '';
						}
						else{
							break;
						}
						
				}
				var html = "<p><strong>"+add_cost.euro_per_hour+".00</strong> euro/hour"
				var html = html + "<br>Km Additional <strong>"+add_cost.cost_for_km+"cts</strong>"
				var html = html + "<br>If Pick-up is Outside Paris During The Full Disposal An Additional cost of <strong>"+add_cost.outside_paris+".00 </strong> Is Applied</p>"
				if($("#inside_paris").val() == 'no'){
					cost = parseInt(cost)+parseInt(add_cost.outside_paris);
				}
				$("#cost1").val(cost);
				$("#additional_cost").html(html);
				
			}
			
			$("#trip, #car_type, #pickup_place, #drop_place").on('change', function(){	
				
				var result = $("#car_type").val().split('%');
				car_id = result[0];
				no_of_pass = result[1];

				var car_id = 'c_'+car_id;
				find_cost(car_id);
				var no_of_p = $("#no_of_pass").val();
				if(no_of_p > no_of_pass){ $("#no_of_pass").val(''); }
				$("#no_of_pass").attr('max',no_of_pass);

			});
			function cal_cost1(){
				var result = $("#car_type1").val().split('%');
				car_id = result[0];
				no_of_pass1 = result[1];
				
				var car_id = 'c_'+car_id;
				find_cost1(car_id);
				
				var no_of_p = $("#no_of_pass1").val();
				if(no_of_p > no_of_pass1){ $("#no_of_pass1").val(''); }
				$("#no_of_pass1").attr('max',no_of_pass1);
			}
			$("#car_type1, #packages").on('change', function(){	
				cal_cost1();				
			});
			
		</script>
		<?php		
		}
		?>
		  
		<script>		
			/*View More Service  */
			$("#view_more").click(function() { $("#view_more_services").fadeIn(500); $("#hide").show(); $("#view_more").hide(); }); $("#hide").click(function() { $("#view_more_services").fadeOut(100); $("#view_more").show(); $("#hide").hide(); });			
        </script>
        <script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/simpleslide.js"></script> 
        <script type="text/javascript">
            $('#browserContainer').simpleSlide({column: 3, autoSliding: 1000, slidingTime: 500})
            $('#slide00').simpleSlide({column: 3, autoSliding: 1000, slidingTime: 500})
            $('#slide01').simpleSlide({column: 1, autoSliding: 500})
            $('#slide02').simpleSlide({column: 4})
            $('#slide03').simpleSlide({column: 3, autoSliding: 500, slidingTime: 500})
        </script>
		<script type="text/javascript" src="<?php bloginfo('stylesheet_directory'); ?>/js/book_now.js"></script>
		
		<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAy9bbfXsq4kUXZT1q5iM8MIkzfdFfSnao&sensor=false&libraries=places"></script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace(); console.log(place);
                var address = place.formatted_address;
                var latitude = place.geometry.location.lat();
                var longitude = place.geometry.location.lng();
                var mesg = "Address: " + address;
                mesg += "\nLatitude: " + latitude;
                mesg += "\nLongitude: " + longitude;
				if (address.indexOf("France") >= 0){
					$("#inside_paris").val('yes'); cal_cost1();
					
				}else{ $("#inside_paris").val('no'); cal_cost1(); }
                
            });
        });
    </script>
	<?php wp_footer(); ?>
	
    </body>

</html>