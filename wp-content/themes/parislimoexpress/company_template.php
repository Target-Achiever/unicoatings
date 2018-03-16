<?php
/**
	Template Name: Company Template
*/
get_header(); ?>

 <section class="masthead company_bg text-center text-white d-flex">
            <div class="container my-auto">
                <div class="row company_content">
                    <div class="col-lg-10 mx-auto">
                                           
                        <h1 class="text-uppercase">               
                            <strong>Company</strong>
                        </h1> 
                        <p>P L E  Executive Chauffeur service</p>
                    </div>
                </div>
            </div>
        </section>                  
        <section class="book_now_section company_section">
            <div class="container about_company">
                <div class="row"><?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                   
                    <div class="col-lg-5 mx-auto book_now_content text-justify">          
						<?php the_content(); ?>
						
                    </div>        
                    <div class="col-lg-7 mx-auto text-center mb-3 sr-icons">     <br><br>     
                        
						<?php
						$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
						
						?>
						<img src="<?php echo $featured_img_url; ?>" alt="Book Car">
                    </div> 
					<?php endwhile; endif; ?> 
                </div>
            </div>           
        </section>
<?php get_footer(); ?>