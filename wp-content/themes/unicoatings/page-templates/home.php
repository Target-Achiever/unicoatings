<?php
/**
    Template Name: Home Template
*/

get_header(); ?>
	
<!--Banner-->
<div id="myCarousel" class="carousel slide banner" data-ride="carousel" data-interval="3000">
      <!-- Indicators -->
      

      <!-- Wrapper for slides -->
      <div class="carousel-inner">

        <?php
        // check if the repeater field has rows of data
        if( have_rows('slider') ):
        // loop through the rows of data
        $i=1;
        while (have_rows('slider') ) : the_row();
        ?>
            <div class="item <?php if($i==1) echo 'active'; ?>">
            <?php 
            $img = get_sub_field('image');                      
            ?>
            <img src="<?php echo $img; ?>" class="img-responsive" alt="<?php the_sub_field('title');?>" />
            </div>
        <?php
        $i++;
        endwhile;
        endif;
        ?>
       </div>

        <?php 
        $carousel_count = count(get_field('slider'));
        ?>
        <ol class="carousel-indicators">
            <?php
                $x=1;
                while($x <= $carousel_count) {
                    $class = '';
                    if($x == 1) {
                        $class = 'active';
                    }
                echo "<li data-target='#myCarousel' data-slide-to='".$x."' class='".$class."'></li>";
                $x++;
                } 
            ?>
        </ol>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
</div>
<!--/ Banner-->
<!-- Main content -->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="header-section text-center">
                <!-- <h2 class="text-uppercase"><?php the_title(); ?></h2> -->
                <h2 class="text-uppercase"><?php the_field('page_heading'); ?></h2>
                <p class="text-center">
                    <?php 
                    if(have_posts()) : 
                        while(have_posts()) : 
                            the_post();
                            the_content();
                        endwhile;
                    endif; 
                    ?>
                </p>
                <div class="divider1"></div>
            </div>
        </div>
    </div>     
</section>
<!--/ Main content -->
<!--Feature-->
<?php
$args = array('category_name' => 'services','orderby' => 'date','order' => 'ASC');
$posts = get_posts( $args );
?>
<section id="feature">
    <div class="container">
        <div class="">
            <div class="header-section text-center">
                <h2 class="text-uppercase"><?php echo category_description( get_category_by_slug( 'services' )->term_id ); ?></h2>
            </div>
            <div class="row flex">
                <?php
                foreach( $posts as $post ): setup_postdata($post); 
                ?>
                <div class="col-md-6">
                    <div class="fea">
                        <div class="fea-img">
                            <?php echo get_the_post_thumbnail($post->ID,'full' ); ?>
                        </div>
                        <div class="heading">
                            <h4><?php the_title(); ?></h4>
                            <p><?php the_content(); ?></p>
                        </div>
                    </div>
                </div>
                <?php
                endforeach;
                wp_reset_postdata();
                ?>
            </div> 
        </div>
    </div>
</section>
<div class="divider1"></div>
<!--/  Feature  -->


<?php get_footer(); ?>