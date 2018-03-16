<!DOCTYPE html>
<html <?php language_attributes(); ?>>

	<head>
		<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
        <meta name="keywords" content="unicoatings">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Candal|Alegreya+Sans">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/imagehover.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css">          
    </head>
	<body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <?php

                        if(has_post_thumbnail()) {
                            echo "<a href=".get_option('home')."/>";
                            the_post_thumbnail();
                            echo "</a>";
                        }
                        else {
                            if(function_exists( 'the_custom_logo' ) ) :
                                the_custom_logo();
                            endif;
                        }
						?>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <div class="pull-right">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-md-offset-5 col-sm-offset-5">
                                    <?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
                                    <?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
                                    <?php endif; ?>
                                    <!-- <ul class="list-unstyled list-inline">
                                        <li>
                                            <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/facebook.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/linkedin.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/skype.png"></a>
                                        </li>
                                        <li>
                                            <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/youtube.png"></a>
                                        </li>
                                    </ul>  -->                        
                                </div>                            
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-md-offset-5 col-sm-offset-5">
                                    <form class="form-inline">
                                        <div class="input-group add-on">
                                            <input type="text" class="form-control" placeholder="Search here..." name="srch-term" id="srch-term">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default go_btn" type="submit">Go</button>
                                            </div>
                                        </div>
                                   </form>                          
                                </div>            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Navigation bar-->
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>       
                </div>      
                <div class="collapse navbar-collapse" id="myNavbar">
                    <?php
                        if ( has_nav_menu( 'primary' ) ) : 
                            wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'items_wrap' => '<ul class="nav navbar-nav navbar-right">%3$s</ul>'
                                    ));
                        endif;
                    ?>                  
                </div>
            </div>
        </nav>
        <!--/ Navigation bar--> 

<?php wp_head(); ?>