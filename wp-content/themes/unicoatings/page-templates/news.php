<?php
/**
    Template Name: News Template
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
                    </div>
                </div>
                <div class="row product_img">
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
                <?php
                $args = array('category_name' => 'news-and-events','orderby' => 'date','order' => 'ASC');
                $posts = get_posts( $args );
                ?>
                <div class="row">
                   <div class="contact_content">
                        <div class="col-md-9 col-sm-9 contact_left">
                            <div class="contact_title text-uppercase">
                                <h3 class="text-uppercase">
                                    <?php
                                    $catObj = get_category_by_slug('news');
                                    $catName1 = $catObj->name;
                                    $catObj = get_category_by_slug('events');
                                    $catName2 = $catObj->name;
                                    echo $catName1." & ".$catName2;
                                    ?>
                                </h3>
                            </div>
                            <?php
                            $my_query_args = array(
                                'posts_per_page' => 10,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'category',
                                        'field' => 'slug',
                                        'terms' => array('events','news'),
                                        'operator' => 'IN'
                                    ),
                                    'orderby' => 'date',
                                    'order'=>'ASC'
                                )
                            );
                            $my_query = new WP_Query( $my_query_args );

                            if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post(); 

                                $post_id = get_the_ID(); // or use the post id if you already have it
                                $category_object = get_the_category($post_id);
                                $category_name = $category_object[0]->name;
                                $category_slug = $category_object[0]->slug;
                            ?>
                            <div class="row product_list_cols"> 
                                <div class="product_list <?php if($category_slug == 'events') echo 'event_list'; ?>">
                                    <div class="col-md-4">
                                        <?php the_post_thumbnail(array(230,192)); ?>
                                    </div>
                                    <div class="col-md-8">
                                        <h4 class="text-uppercase"> <?php echo $category_name; ?> <span class="s_title">: <?php echo the_title(); ?>  </span></h4>
                                        <!-- <h5>02Feb2018</h5> -->
                                        <p><?php the_content(); ?></p>
                                        <a href="#" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_postdata(); ?>
                        </div>
                        <div class="col-md-3 col-sm-3">
                            <div class="side_bar">
                                <?php
                                $args = array('category_name' => 'follow-us','orderby' => 'date','order' => 'ASC');
                                $posts = get_posts( $args );
                                ?>
                                <div class="contact_title text-uppercase">
                                    <h3> 
                                        <?php  
                                            $catObj = get_category_by_slug('follow-us');
                                            echo $catObj->name;
                                        ?> 
                                    </h3>
                                </div>
                                <?php
                                foreach( $posts as $post ): setup_postdata($post); 
                                ?>
                                <div class="sidebar_follow_list">
                                    <?php echo get_the_post_thumbnail($post->ID,'full' ); ?>
                                    <p><?php the_content(); ?></p>
                                </div>
                                <?php
                                endforeach;
                                wp_reset_postdata();
                                ?>
                                <div class="divider"></div>
                                <div class="social_icon_section">
                                <?php 
                                if(is_active_sidebar( 'first-rightbar-widget-area' ) ) : ?>
                                <?php dynamic_sidebar( 'first-rightbar-widget-area' ); ?>
                                <?php endif; ?>
                                </div>
                                <div class="divider"></div>
                                <?php 
                                // if(is_active_sidebar( 'second-rightbar-widget-area' ) ) : ?>
                                <?php 
                                // dynamic_sidebar( 'second-rightbar-widget-area' ); ?>
                                <?php 
                                // endif; ?>
                            </div>                         
                        </div>
                    </div>
                </div>
                <div class="divider1"></div>
                <div class="contact_foot_content">
                    <?php the_field('footer_content'); ?>
                </div>
                <div class="divider1"></div>
            </div>     
        </section>
<?php get_footer(); ?>
