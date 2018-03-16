<?php
/**
	This template is used to display custom page content
*/
get_header(); ?>

<section class="about">
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <p class="text-center">
                    <?php the_content(); ?>
                </p>
                <?php endwhile; endif; ?>
            </div>
            <div class="divider1"></div>
        </div>
    </div>     
</section>

<?php get_footer(); ?>

