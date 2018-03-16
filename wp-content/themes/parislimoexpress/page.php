<?php
/**
	Theme Name: Paris Limo Express Theme
*/
get_header(); ?>

 <!-- Start Page Banner -->
            <div class="page-banner" style="padding:40px 0; background: url(<?php bloginfo('stylesheet_directory'); ?>/images/blog_bg.jpg) center #f9f9f9;">
                <div class="container">
                    <div class="row abt">
                        <div class="col-md-6">
                            <h2>Blog</h2>   
                            <p>Overview</p>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumbs">
                                <li><a href="index.php">Home</a></li>
                                <li>Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Banner -->
<!-- Start Content -->
			<?php 
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
			?>
            <div id="content">
                <div class="container">
                    <div class="row blog-page">
                        <!-- Start Blog Posts -->
                        <div class="col-md-12 blog-box">
                            <!-- Start Post -->
                            <div class="col-md-9 col-xs-12  blog-box">
                                <div class="image-post">
                                    
                                    <!-- Post Content -->
                                    <div class="post-content">                                       
                                        <h4 class="classic-title"><span><?php the_title();?></span></h4>
                                       
                                         <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
										<?php the_content(); ?>
										<?php endwhile; endif; ?>
                                    </div>
                                       
                                </div>
                            </div> 
                            <!--Sidebar-->
                            <div class="col-md-3 col-xs-12 sidebar right-sidebar">
                                <!-- Popular Posts widget -->
                                <div class="widget widget-popular-posts">
                                    <h4><a href="<?php echo bloginfo('home'); ?>/blog">Popular Post <span class="head-line"></span></a></h4>
                                    <ul>
									<?php $args = array(
										'posts_per_page'   => 5,
										'orderby'          => 'date',
										'order'            => 'DESC',
										'post_type'        => 'post',
										'post_status'      => 'publish'
									);
									$posts = get_posts( $args );
									if($posts):
										foreach($posts as $post){
										$img_url = get_the_post_thumbnail_url(get_the_ID(),'thumbnail');
	
										?>
							
                                        <li>
                                            <div class="widget-thumb">
                                                <a href="javascript:void();"><img width="65px" src="<?php echo $img_url;?>" alt="" /></a>
                                            </div>
                                            <div class="widget-content">
                                                <h5><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></h5>
                                                <span><?php echo get_the_date();?></span>
                                            </div>
                                            <div class="clearfix"></div>
                                        </li>
                                        <?php 
										}
									endif;
										?>
                                    </ul>
                                </div>
                            </div>
                            <!--End sidebar-->
                        </div>                       
                    </div>
                </div>
            </div>
            <!-- End Content -->
			
			
	
<?php get_footer(); ?>

