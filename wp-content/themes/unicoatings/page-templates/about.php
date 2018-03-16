<?php
/**
    Template Name: About Us Template
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
                               <?php the_field('about_content'); ?>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <?php the_field('important_links'); ?>
                            </div>
                        </div>
                    </div>
                </div> 
                <div class="divider1"></div>
                <div class="row about_val">
                    <div class="col-md-6 col-sm-6">
                        <?php the_field('unicoatings_presence'); ?>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <?php the_field('our_values'); ?>
                    </div>
                </div>
                <section id="feature" class="about_features">
                    <div class="container-fluid">
                        <div class="">
                            <div class="header-section text-center">
                                <h2 class="text-uppercase"> 
                                    <?php 
                                    $field = get_field_object('our_people'); 
                                    echo $field['label'];
                                    ?>
                                </h2>
                            </div>
                            <div class="divider1"></div>
                            <div class="row">
                                <?php
                                // check if the repeater field has rows of data
                                if( have_rows('our_people') ):
                                // loop through the rows of data
                                while ( have_rows('our_people') ) : the_row();                 
                                ?>
                                <div class="col-md-6">
                                    <div class="fea"> 
                                        <div class="profile_img">
                                            <?php 
                                            $img = get_sub_field('image');                      
                                            ?>
                                            <img src="<?php echo $img; ?>" class="img-responsive img-circle" alt="Profile" />
                                        </div>
                                        <div class="heading">
                                            <h4><?php the_sub_field('name'); ?></h4>
                                            <h5><?php the_sub_field('role'); ?></h5>
                                            <p> <?php the_sub_field('description'); ?> </p>
                                        </div> 
                                    </div>
                                </div>
                                <?php
                                endwhile;
                                endif;
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
<?php get_footer(); ?>
