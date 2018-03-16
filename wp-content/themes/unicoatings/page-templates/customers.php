<?php
/**
    Template Name: Customers Template
*/
?>
<?php get_header(); ?>
        <div class="divider1"></div>
        <!--/ Navigation bar-->       
        <section class="contact">
            <div class="container">
                <div class="row">
                    <div class="header-section text-center">
                        <h2 class="text-uppercase"><?php the_field('page_heading'); ?></h2>
                        <p>
                            <?php
                            if(have_posts()) : 
                                while(have_posts()) : 
                                    the_post();
                                    the_content();
                                endwhile;
                            endif;
                            ?>
                        </p>
                    </div>
                </div>              
                <section id="feature" class="markets_features">
                    <div class="container-fluid">
                        <div class="">
                            <?php
                            $args = array('category_name' => 'markets','orderby' => 'date','order' => 'ASC');
                            $posts = get_posts( $args );
                            ?>
                            <div class="divider1"></div>
                            <div class="row flex">
                                <?php
                                foreach( $posts as $post ): setup_postdata($post); 
                                ?>
                                <div class="col-md-3">
                                    <div class="fea"> 
                                        <?php echo get_the_post_thumbnail($page->ID,'full' ); ?>
                                        <div class="heading">
                                            <h3><?php the_title(); ?></h3>                                           
                                            <p><?php the_content(); ?></p>
                                        </div> 
                                    </div>
                                </div><!--/col-->
                                <?php
                                endforeach;
                                wp_reset_postdata();
                                ?>
                            </div> 
                            <div class="row">
                                <div class="col-md-3 market_link">
                                      <h5 class="text-uppercase">  <b>suitable products</b></h5>
                                      <div class="divider"></div>
                                </div>
                                <div class="col-md-3 market_link">
                                      <h5 class="text-uppercase">  <b>suitable products</b></h5>
                                      <div class="divider"></div>
                                </div>
                                <div class="col-md-3 market_link">
                                      <h5 class="text-uppercase">  <b>suitable products</b></h5>
                                      <div class="divider"></div>
                                </div>
                                <div class="col-md-3 market_link">
                                      <h5 class="text-uppercase">  <b>suitable products</b></h5>
                                      <div class="divider"></div>
                                </div>
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
<?php get_footer(); ?>
