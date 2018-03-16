<?php
/**
	Template Name: Contact Template
*/
get_header(); ?>

        
        <section class="masthead contact_head text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h1 class="text-uppercase">
                            <strong>P L E  Executive chauffeur service </strong>                
                        </h1> 
                    </div>
                </div>
            </div>
        </section>
        <section class="contact_section">
            <div class="container">
                <div class="row">
                      <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                          <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					   <?php the_content(); ?>
					   <?php endwhile; endif; ?>                       
                         <div class="contact_divide"></div>
                      </div>
                </div>                
            </div>
        </section>    
        <section class="contact_frm_bg">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6">                  
                           <?php echo do_shortcode('[contact-form-7 id="4" title="Contact form"]');?>
                    </div>                   
                </div>
            </div>
        </section>
<?php get_footer(); ?>