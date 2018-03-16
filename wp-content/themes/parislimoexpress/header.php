<?php
/**
	Theme Name: Paris Limo Express Theme
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<!-- Basic -->
		<title><?php wp_title('&laquo;', true, 'right'); ?><?php bloginfo('name'); ?></title>
		<!-- Define Charset -->
        <meta charset="<?php bloginfo('charset'); ?>">
		<!-- Responsive Metatag -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Page Description and Author -->
        <meta name="description" content="">
        <meta name="author" content="GrayGrids">
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/vendor/bootstrap/css/bootstrap.min.css">
		<!-- Custom fonts for this template -->		
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/vendor/font-awesome/css/font-awesome.min.css"> 
		 <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
		<!-- Plugin CSS -->
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/vendor/magnific-popup/magnific-popup.css" media="screen">
		<!-- Custom styles for this template -->
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/creative.min.css" media="screen">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/custom.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/responsive.css" type="text/css" media="screen">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/videobackground.css" type="text/css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/css/simpleslide.css" media="screen">
        
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/animate.min.css" type="text/css"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrap-datepicker3.css"/>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/bootstrapValidator.css"/>
	   
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" media="screen">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="<?php echo bloginfo('home'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/img/logo.png" alt="LOGO" class="logo"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- Start Navigation List -->
					<?php wp_nav_menu(array('theme_location' => 'navigation','container' => false, 'menu_class' => 'navbar-nav ml-auto' )); ?>
					<!-- End Navigation List -->
                </div>
            </div>
        </nav>         
<?php wp_head(); 
/* $GLOBALS['amount']= '{"c_106":{"outside_paris":"180","cost_for_km":"1.4","euro_per_hour":"85"},"c_109":{"outside_paris":"150","cost_for_km":"1.1","euro_per_hour":"75"},"c_112":{"outside_paris":"140","cost_for_km":"0.9","euro_per_hour":"75"},"c_115":{"outside_paris":"120","cost_for_km":"0.9","euro_per_hour":"75"}}';
$GLOBALS['car_with_driver']= '{"c_106":{"outside_paris":"180","cost_for_km":"1.4","euro_per_hour":"85"},"c_109":{"outside_paris":"150","cost_for_km":"1.1","euro_per_hour":"75"},"c_112":{"outside_paris":"140","cost_for_km":"0.9","euro_per_hour":"75"},"c_115":{"outside_paris":"120","cost_for_km":"0.9","euro_per_hour":"75"}}';
$GLOBALS['additional_costs']= '{"c_106":{"outside_paris":"180","cost_for_km":"1.4","euro_per_hour":"85"},"c_109":{"outside_paris":"150","cost_for_km":"1.1","euro_per_hour":"75"},"c_112":{"outside_paris":"140","cost_for_km":"0.9","euro_per_hour":"75"},"c_115":{"outside_paris":"120","cost_for_km":"0.9","euro_per_hour":"75"}}'; */
?>