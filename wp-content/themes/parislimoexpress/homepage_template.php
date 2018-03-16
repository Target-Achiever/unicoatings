<?php
/**
 * Template Name: Homepage Template
*/
get_header(); ?>
<header class="masthead text-center text-white d-flex" id="bg-video">
            <div class="container my-auto">
                <div class="row banner_content">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">
                            <strong><?php the_field('video_title_1');?> </strong>                
                        </h1>
                        <div class="divider"></div>
                        <h1 class="text-uppercase text_cab">               
                            <strong><?php the_field('video_title_2');?></strong>
                        </h1>
                        <div class="divider1"></div>
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <p class="text-faded mb-5 header_service"><?php the_field('video_description');?></p>
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href=" <?php echo bloginfo('home').'/book-now';?>">Book Now</a>
                    </div>
                </div>
            </div>
        </header>
        <section class="our_fleet">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center">
                        <!--<h2 class="section-heading text-orange">Our</h2>-->
                        <h2 class="section-heading text-white">Fleet</h2>           
                        <p class="text-faded mb-4">PLE offers a variety of service classes so you can choose the right vehicle to fit your needs.</p>           
                    </div>
                </div>          
            </div>
        </section>
        <div class="car_image">
            <img src="<?php bloginfo('stylesheet_directory'); ?>/img/car_1.png" alt="Car Image">
        </div>  
        <div id="slide00">
            <div class="list">
				<?php
				// check if the repeater field has rows of data
				if( have_rows('car_image_gallery') ):
					$active = ''; $i = 0;
					// loop through the rows of data
					while ( have_rows('car_image_gallery') ) : the_row();
						
					?>
                <div>
                     <div class="col-sm-12 col-lg-12 col-md-12 text-center">
                        <div class="service-box mt-5 mx-auto mb-3 sr-icons">
                            <img src="<?php the_sub_field('image');?>" alt="Car Image">
                        </div>
                        <h3 class="mb-3"><?php the_sub_field('title');?></h3> 
                        <div class="divider2"></div>
                    </div>
                </div>         
                <?php
					endwhile;
				else :
						// no rows found
				endif;

				?>
            </div>
        </div>       
        <section class="book_now_section">
            <div class="container">
                <div class="row">
                    <div style="font-size:14px;" class="col-lg-5 mx-auto book_now_content text-justify">          
                        <?php $id = get_the_ID(); echo ''.$post->post_content.'';
							//var_dump(the_content());
						?><p></p>
                       
                    </div>        
                    <div class="col-lg-7 mx-auto text-center mb-3 sr-icons">      <?php the_post_thumbnail( 'full' ); ?>    
                        
                    </div>   
                </div>
            </div>
        </section>
        <section class="our_services">
            <div class="container">
                <div class="row our_services_header">
                    <div class="col-lg-8 mx-auto text-center">
                        <!--<h2 class="section-heading text-orange"><strong>Our</strong></h2>-->
                        <h2 class="section-heading text-white text-uppercase">Services</h2> 
                    </div>
                </div> 
				<div class="row sec1">
					<?php $args = array(
							'posts_per_page'   => -1,
							'orderby'          => 'date',
							'order'            => 'ASC',
							'post_type'        => 'service',
							'post_status'      => 'publish'
						);
						$services = get_posts( $args ); $i = 1;
						if($services):
							foreach($services as $service){
								setup_postdata($service);
							?>
                    <div class="col-sm-4 col-md-4">
                        <div class="service_box mb-3 sr-icons text-center">
                            <div class="icon">
                               <?php echo get_the_post_thumbnail($service->ID, 'full'); ?>  
                            </div>
                            <div class="service_tittle">
                                <h5><?php echo get_the_title($service->ID);?></h5>
                            </div>
                            <div class="service_content">
                                <?php echo get_the_content($service->ID);?>
                            </div>
                        </div>
                    </div>
                    <?php
						if($i % 6 == 0){ echo '</div><div class="row" id="view_more_services" style="display: none;">'; }
						$i++;
							}
						endif;
					?>       
                 </div>
                
				
				<div class="text-center view_btn">
                   <a href="javascript:void(0);" id="view_more" class="view_more sr-icons">View more Services</a>
                   <a href="javascript:void(0);" id="hide" class="view_more sr-icons" style="display: none;">Hide</a>
               </div>
			   
			   
            </div>
        </section>
        <section class="our_gallery">
            <div class="container">      
                <div class="row">
					<?php
					// check if the repeater field has rows of data
					if( have_rows('service_gallery') ):
						$active = ''; $i = 0;
						// loop through the rows of data
						while ( have_rows('service_gallery') ) : the_row();
							
						?>
                    <div class="col-sm-4 col-md-4">
                        <div class="mb-3 sr-icons text-center">
                            <div class="slide">
                                <img src="<?php the_sub_field('image');?>" alt="Image">
                                <h5><?php the_sub_field('title');?></h5>
                            </div>                    
                        </div>
                    </div>
                     <?php
					endwhile;
					else :
							// no rows found
					endif;

					?>
					<?php $page = get_page_by_path( 'home' ); ?>
                </div>         
            </div>
        </section>
		<script>
            $(document).ready(function () {
                $('#bg-video').videoBackground("<?php echo the_field('video_url', $page); ?>");
            });
		</script>
<?php get_footer(); ?>