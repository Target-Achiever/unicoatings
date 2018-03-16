<?php
/**
	Template Name: Fleet Template
*/
get_header(); ?>
 <style>
            #mainNav {
                border-color: #000;
                background-color: #000;
                padding: 0px;
            }
            .fleet_bg.text-white 
            {
                color:#333 !important;
            }
            .fleet_bg
            {
                padding-bottom: 0px;
            }
            .fleet_section
            {
                padding-top: 0px;
            }
            @media(max-width:767px)
            {
                #mainNav {
                    border-color: #ddd;
                    background-color: #fff;
                    padding: .5rem 1rem;
                }
            }
			#mainNav {
			border-color: #ddd;
			background-color: #000;
			padding: .5rem 1rem;
			}
        </style>
<section class="masthead fleet_bg text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">               
                            <strong>Fleet</strong>
                        </h1> 
                        <p>PLE offers a variety of service classes so you can choose the right vehicle to fit your needs.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="fleet_section">
            <div class="container">
			<?php 
				function show_img($car, $class, $c_class){ ?>
					<div class="col-lg-6 col-md-6 col-sm-6 mx-auto <?php echo $c_class;?>">           
                        <?php
						$featured_img_url = get_the_post_thumbnail_url($car->ID,'full'); 
						
						?>
						<img <?php echo $class;?> src="<?php echo $featured_img_url; ?>" alt="Book Car">
                    
                    </div>
				<?php }
				function show_details($car){ ?>
					<div class="col-lg-6 col-md-6 col-sm-6 mx-auto book_now_content text-justify">          
                        <div class="row">
							<div class="col-lg-12  book_now_content">
								<h3> <?php echo get_the_title($car->ID);?> </h3>
							</div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <h5 class="price_head">Airport Transfer</h5>
							
                                <ul class="list-unstyled">
								<?php if( have_rows('transfer_place_with_price',$car->ID) ):								
								while ( have_rows('transfer_place_with_price',$car->ID) ) : the_row();
								echo "<li>".get_sub_field('place')."</li>";						
								endwhile;
								endif;
								?>
                                </ul>
                            </div>
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <h5 class="price_head"><?php echo get_field('passengers_and_luggage',$car->ID);?></h5>
                                <ul class="list-unstyled">
									<?php if( have_rows('transfer_place_with_price',$car->ID) ):								
									while ( have_rows('transfer_place_with_price',$car->ID) ) : the_row();
									echo "<li>".get_sub_field('amount').".00 &euro;</li>";						
									endwhile;
									endif;
									?>
                                </ul>
                            </div>
							<div class="row more_details">                                
                                <div class="col-sm-4 col-md-4 col-lg-4 book_btn">                                    
                                    <a href="<?php echo get_permalink( get_page_by_path( 'book-now' ) )?>" class="btn btn-primary">Book Now</a>
                                </div> 
                                <div class="col-sm-4 col-md-4 col-lg-4 more_btn">                                    
                                    <a href="<?php echo get_the_permalink($car->ID);?>" class="btn btn-primary">More Details</a>
                                </div> 
                            </div>
                        </div>
                    </div>
				<?php }
				$args = array(
							'posts_per_page'   => -1,
							'orderby'          => 'date',
							'order'            => 'ASC',
							'post_type'        => 'car',
							'post_status'      => 'publish'
						);
						$cars = get_posts( $args );
						$i = 1;
						if($cars):
							foreach($cars as $car){ 
									setup_postdata($car);
			?>
               <!--List 1-->
                <div class="row fleet_list">
                    
                    <?php 
					if($i % 2 != 0){
						show_img($car, 'class="wow slideInLeft" data-wow-delay="0.00s"', "");
						show_details($car);
						//show_img($car, 'class="wow slideInRight" data-wow-delay="0.00s"', "hidden-max");
					}else{
						show_img($car, 'class="wow slideInRight" data-wow-delay="0.00s"', "hidden-max");
						show_details($car);
						show_img($car, 'class="wow slideInRight" data-wow-delay="0.00s"', "hidden-xs");
					}
					?>
                      
                    <!--<div class="fleet_foot container-fluid">
                        <div class="row">
                            <div class="col-lg-7 col-md-7 col-sm-7">          
                                <h5 class="text-center">Car with driver</h5>
                                <ul class="list-unstyled text-center">
                                    <li> <?php echo get_field('car_with_driver_euro/hour',$car->ID);?>.00 euro/hour  </li>
                                    <li> Service minimum 5 hours (Paris) Inside Paris  </li>                                    
                                </ul>
                                <div class="row">
                                    <div class="col-md-6 col-lg-6 col-sm-6">
									<?php if( have_rows('package_details',$car->ID) ):								
									while ( have_rows('package_details',$car->ID) ) : the_row();
									echo "<p>".get_sub_field('package_name')."</p>";						
									endwhile;
									endif;
									?>
                                    </div>
                                    <div class="col-md-6 col-lg-6 col-sm-6">
									<?php if( have_rows('package_details',$car->ID) ):								
									while ( have_rows('package_details',$car->ID) ) : the_row();
									echo "<p>".get_sub_field('package_amount').".00 &euro; (Ile de France 100km)</p>";						
									endwhile;
									endif;
									?>
										
                                    </div>
                                </div>
                            </div>        
                            <div class="col-lg-5 col-md-5 col-sm-5">  
                                <ul class="list text-justify car_features">
                                    <?php if( have_rows('additional_info',$car->ID) ):								
									while ( have_rows('additional_info',$car->ID) ) : the_row();
									echo "<li>".get_sub_field('additional_info')."</li>";						
									endwhile;
									endif;
									?>                                    
                                </ul>                                
                            </div> 
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="<?php echo bloginfo('home').'/book-now';?>" class="btn btn-primary text-uppercase ">Book Now</a>
                            </div>
                        </div>
                    </div> -->                   
                </div>
                <!--/List 1-->
               <?php
						$i++;
							}
						endif;
					?>
			</div>
		</section>
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<section class="fleet_info_bg">
					<div class="container">
						<div class="row fleet_info">
							<div class="col-md-12 col-sm-12 col-lg-12">
								<div class="fleet_info_list">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
					</div>
				</section>
        <div class="vol_prive_above"></div>
        <section class="vol_prive text-center">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h4><?php the_field('vol_prive_title'); ?></h4>
                        <div class="vol_divider"></div>
						<?php echo html_entity_decode(get_field('vol_prive_content')); ?>
                    </div>
                </div><?php endwhile; endif; ?> 
            </div>
        </section>    
<?php get_footer(); ?>