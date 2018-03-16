<?php
/**
    Template Name: Coatings Template
*/
?>
<?php get_header(); ?>
		<div class="divider1"></div>
        <!--/ Navigation bar-->       
        <section class="contact product_pg">
            <div class="container">
                <div class="row">
                    <div class="header-section text-center">
                        <h2 class="text-uppercase"><?php the_field('page_heading'); ?></h2>
                        <h4 class="black_title">
                            <?php
                            if(have_posts()) : 
                                while(have_posts()) : 
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                        </h4>
                    </div>
                </div>
                <div class="row">
                    <?php
                    // check if the repeater field has rows of data
                    if( have_rows('carousel') ):
                    // loop through the rows of data
                    while ( have_rows('carousel') ) : the_row();                 
                    ?>
                    <div class="col-md-3 col-sm-3">
                        <?php 
                        $img = get_sub_field('image');                      
                        ?>
                        <img src="<?php echo $img; ?>" class="img-responsive" alt="<?php the_sub_field('title');?>" />
                    </div>
                    <?php
                    endwhile;
                    endif;
                    ?>
                </div>      
                <div class="row">
                    <div class="about_content">
                        <div class="row">
                            <div class="col-sm-9 col-md-9">
                                <?php the_field('coatings_content'); ?>
                            </div>
                            <div class="col-md-3 col-sm-3">
                               <?php the_field('resources'); ?>
                            </div>
                        </div>
                    </div>
                </div> 
                <h3 class="text-center text-uppercase"> 
                    <?php 
                    $field = get_field_object('unique_formula'); 
                    echo $field['label'];
                    ?> 
                </h3>
                <div class="divider1"></div>
                <div class="row about_val">
                    <div class="col-md-6 col-sm-6">
                        <div class="coating_list"> <?php the_field('unique_formula'); ?> </div>
                        <?php the_field('tests_certifications'); ?>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <?php the_field('easy_application'); ?>
                        <div class="media">
                            <div class="row media_list">
                                <?php
                                // check if the repeater field has rows of data
                                if( have_rows('uc2k_media') ):
                                // loop through the rows of data
                                while ( have_rows('uc2k_media') ) : the_row();                 
                                ?>
                                <div class="col-md-6 col-sm-6">
                                    <?php 
                                    $img = get_sub_field('image');                      
                                    ?>
                                    <img src="<?php echo $img; ?>" class="img-responsive" alt="<?php the_sub_field('title');?>" />
                                </div>
                                <?php
                                endwhile;
                                endif;
                                ?>
                            </div>
                        </div>    
                    </div>
                </div>
                <?php
                $args = array('category_name' => 'uc2k-benefits','orderby' => 'date','order' => 'ASC','posts_per_page' => 10);
                $posts = get_posts( $args );
                ?>
                <section id="feature" class="about_features product_features">
                    <div class="container-fluid">
                        <div class="">
                            <div class="header-section text-center">
                                <h2 class="text-uppercase"><?php echo category_description( get_category_by_slug( 'uc2k-benefits' )->term_id ); ?></h2>
                            </div>
                            <div class="divider1"></div>
                            <div class="row flex">
                                <?php
                                foreach( $posts as $post ): setup_postdata($post); 
                                ?>
                                <div class="col-md-6">
                                    <div class="fea"> 
                                        <div class="heading">
                                            <?php echo get_the_post_thumbnail($post->ID,'full' ); ?>
                                            <h4 class="green"><?php the_title(); ?></h4>
                                            <p><?php the_content(); ?></p>
                                        </div>                               
                                    </div>
                                </div><!--/col-->
                                <?php
                                endforeach;
                                wp_reset_postdata();
                                ?>
                            </div>  
                        </div>
                    </div>
                </section>
                <div class="divider1"></div>
                <div class="contact_foot_content">
                    <?php the_field('footer_content'); ?>
                </div>
                <div class="divider1"></div>
            </div>     
        </section>         
        <!--Footer-->
<?php get_footer(); ?>
