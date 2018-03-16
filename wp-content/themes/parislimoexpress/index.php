<?php
/**
	Theme Name: Paris Limo Express Theme
*/
get_header(); ?>

 <!-- Start Page Banner -->
            <div class="page-banner" style="padding:40px 0; background: url(<?php the_field('banner_image'); ?>) center #f9f9f9;">
                <div class="container">
                    <div class="row abt">
                        <div class="col-md-6">
                            <h2><?php the_title();?></h2>
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumbs">
                                <li><a href="<?php echo bloginfo('home'); ?>">Home</a></li>
                                <li><?php echo ucwords(get_the_title());?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Banner -->
<!-- Start Content -->
            <div id="content">
                <div class="container">
                    <div class="row blog-page">

                        <!-- Start Blog Posts -->
                        <div class="col-md-12 blog-box">
                            <!-- Start Post -->
                            <div class="col-md-4 col-xs-12">
                                <div class="blog-post image-post">
                                    <!-- Post Thumb -->
                                    <div class="post-head">
                                        <a class="lightbox" title="Wedding" href="images/Events/Wedding/Wedding_1.jpg">
                                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                            <img alt="" src="images/Events/Wedding/Wedding_1.jpg">
                                        </a>
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">                                       
                                        <h4><a href="blog_details.php">Wedding</a></h4>
                                        <ul class="post-meta">
                                            <li>By <a href="javascript:void();">JD Event</a></li>
                                            <li>December 5, 2017</li>                                                                   
                                        </ul>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                        <a class="main-button" href="blog_details.php">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-xs-12">
                                <div class="blog-post image-post">
                                    <!-- Post Thumb -->
                                    <div class="post-head">
                                        <a class="lightbox" title="Wedding" href="images/Events/Wedding/Wedding_1.jpg">
                                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                            <img alt="" src="images/Events/Wedding/Wedding_1.jpg">
                                        </a>
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">                                       
                                        <h4><a href="blog_details.php">Wedding</a></h4>
                                        <ul class="post-meta">
                                            <li>By <a href="javascript:void();">JD Event</a></li>
                                            <li>December 5, 2017</li>                                                                         
                                        </ul>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                        <a class="main-button" href="blog_details.php">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-4 col-xs-12">
                                <div class="blog-post image-post">
                                    <!-- Post Thumb -->
                                    <div class="post-head">
                                        <a class="lightbox" title="Wedding" href="images/Events/Wedding/Wedding_1.jpg">
                                            <div class="thumb-overlay"><i class="fa fa-arrows-alt"></i></div>
                                            <img alt="" src="images/Events/Wedding/Wedding_1.jpg">
                                        </a>
                                    </div>
                                    <!-- Post Content -->
                                    <div class="post-content">                                       
                                        <h4><a href="blog_details.php">Wedding</a></h4>
                                        <ul class="post-meta">
                                            <li>By <a href="javascript:void();">JD Event</a></li>
                                            <li>December 5, 2017</li>                                                                                 
                                        </ul>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                                        <a class="main-button" href="blog_details.php">Read More <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div> 
                        </div>                       
                    </div>
                </div>
            </div>
            <!-- End Content -->
			
			
<?php get_footer(); ?>