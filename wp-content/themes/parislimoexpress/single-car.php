<?php
/**
	Theme Name: Paris Limo Express Theme
*/
get_header(); ?>

		<div class="details_img">            
            <img src="<?php the_field('header_image');?>" alt="Book Car" class="wow slideInLeft">       
        </div>
        <section class="fleet_section">
            <div class="container">
               <!--List 1-->
                <div class="row fleet_list_details">  
                    <div class="col-lg-12 col-md-12 col-sm-12  text-justify">          
                        <div class="row">
                            <div class="col-lg-12  book_now_content">
                                <h3> <?php the_title();?> </h3>
                            </div>
                            <div class="col-md-12 col-sm-12 col-lg-12">                               
                                <table class="table table-striped">
                                    <thead>
                                      <tr>                                       
                                        <th scope="col">Airport Transfer</th>
                                        <th scope="col"><?php the_field('passengers_and_luggage');?></th>                                      
                                      </tr>
                                    </thead>
                                    <tbody>
									
									<?php if( have_rows('transfer_place_with_price',$car->ID) ):								
									while ( have_rows('transfer_place_with_price',$car->ID) ) : the_row();
									echo "<tr>";
									echo "<td>".get_sub_field('place')."</td>";						
									echo "<td>".get_sub_field('amount').".00 €</td>";	echo "</tr>";					
									endwhile;
									endif;?>
									
                                    </tbody>
                                  </table>
                            </div>                    
                        </div>
                    </div>  
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">          
                                <h5>Car with driver</h5>
                                <ul class="list-unstyled">
                                    <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> <?php the_field('car_with_driver_euro_per_hour');?>.00 euro/hour  </li>
                                    <li><i class="fa fa-check-circle-o" aria-hidden="true"></i> Service minimum 5 hours (Paris) Inside Paris  </li>                                    
                                </ul>
                                <div class="row">
                                    <div class="col-md-12 col-lg-12 col-sm-12">
                                        <table class="table table-striped">                                           
                                            <tbody>
											<?php if( have_rows('package_details',$car->ID) ):								
											while ( have_rows('package_details',$car->ID) ) : the_row();
											echo "<tr>";
											echo "<td>".get_sub_field('package_name')."</td>";
											echo "<td>".get_sub_field('package_amount').".00(Ile de France 100km)</td>";
											echo "</tr>";						
											endwhile;
											endif;
											?>
									
                                            </tbody>
                                          </table>
                                    </div>
                                </div>
                            </div>        
                            <div class="col-lg-12 col-md-12 col-sm-12">  
                                <ul class="list-unstyled text-justify car_features">
								<?php if( have_rows('additional_info',$car->ID) ):		
									echo '<li><i class="fa fa-check-circle-o" aria-hidden="true"></i>Km Additional '.get_field('additional_cost_for_km')."cts</li>";
									
									while ( have_rows('additional_info',$car->ID) ) : the_row();
									echo '<li><i class="fa fa-check-circle-o" aria-hidden="true"></i>'.get_sub_field('additional_info')."</li>";						
									endwhile;
									endif;
									?>   
									
                                                                        
                                </ul>                                
                            </div> 
                            <div class="col-md-12 col-sm-12 car_feature_btn">
                                <a href="<?php echo get_permalink( get_page_by_path( 'book-now' ) )?>" class="btn btn-primary text-uppercase ">Book Now</a>
                                <a href="<?php echo get_permalink( get_page_by_path( 'fleet' ) )?>" class="btn btn-primary text-uppercase ">Back</a>
                            </div>
                        </div>
                    </div>                    
                </div>
                <!--/List 1-->                          
            </div>
        </section>
        <section class="fleet_info_bg">
            <div class="container">
                <div class="row fleet_info">
                    <div class="col-md-12 col-sm-12 col-lg-12">
                        <div class="fleet_info_list">
						<?php 
							$page = get_page_by_path( 'fleet' );
							$pid = $page->ID;
							$post_data = get_post($pid); 
							echo $post_data->post_content;
						?>
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
                        <h4><?php echo get_field('vol_prive_title',$pid); ?></h4>
                        <div class="vol_divider"></div>
                        <?php echo html_entity_decode(get_field('vol_prive_content',$pid)); ?>
                    </div>
                    
                </div>
            </div>
        </section> 

	
<?php get_footer(); ?>

