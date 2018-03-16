<?php
/**
	Theme Name: Paris Limo Express Theme
*/

require( get_template_directory() . '/inc/custom-post-service.php' );
require( get_template_directory() . '/inc/custom-post-car.php' );
//require( get_template_directory() . '/inc/custom-post-testimonial.php' );


add_theme_support( 'post-thumbnails' ); 
add_action( 'init', 'register_my_menus' );

function register_my_menus() { 
	register_nav_menus(
		array(
			'navigation' => __( 'Top Menu Navigation' ),
			'navigation-footer' => __( 'Footer Menu Navigation' ),
		)
	);
}
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => __( 'Sidebar', 'Custom Design' ),
		'id' => 'sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar(array(
		'name' => __( 'Header Left Section', 'Custom Design' ),
		'id' => 'header-left-section',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer Widget 1', 'Custom Design' ),
		'id' => 'footer-widget1',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );

	register_sidebar(array(
		'name' => __( 'Footer Widget 2', 'Custom Design' ),
		'id' => 'footer-widget2',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer Widget 3', 'Custom Design' ),
		'id' => 'footer-widget3',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar(array(
		'name' => __( 'Footer Widget 4', 'Custom Design' ),
		'id' => 'footer-widget4',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
	register_sidebar(array(
		'name' => __( 'Contact us sidebar', 'Custom Design' ),
		'id' => 'contact-us',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => '',
	) );
	
}
if ( !is_admin() ) {
	wp_deregister_script('jquery');
	wp_register_script('jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js", false, null);
	wp_register_script('hoverIntent_script', get_bloginfo('template_directory') . '/js/jquery.hoverIntent.minified.js' );
	wp_register_script('hashchange_script', get_bloginfo('template_directory') . '/js/jquery.hashchange.min.js' );
	wp_register_script('easytabs_script', get_bloginfo('template_directory') . '/js/jquery.easytabs.min.js' );
	//wp_register_script('site_script', get_bloginfo('template_directory') . '/js/site.js' );
	//wp_register_script('site_script', get_bloginfo('template_directory') . '/js/site.js' );
	wp_register_script('tiny_script', get_bloginfo('template_directory') . '/js/tinynav.min.js' );
	wp_enqueue_script('jquery');
	wp_enqueue_script('hashchange_script');
	wp_enqueue_script('easytabs_script');
	wp_enqueue_script('hoverIntent_script');
	//wp_enqueue_script('site_script');
	wp_enqueue_script('tiny_script');
}

/* Admin Scripts for Media Upload */
add_action('admin_enqueue_scripts', 'my_media_scripts'); 
function my_media_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'theme_options') {
		wp_enqueue_media();
		wp_register_script('my_media_uploader', get_bloginfo('template_directory'). '/js/my_media_uploader.js', array('jquery'));
		wp_enqueue_script('my_media_uploader');
	}
}
/* Admin Scripts for Media Upload */
/* ----------------------------------------------------------
Theme Options Comes Here
------------------------------------------------------------- */
require_once ( get_stylesheet_directory() . '/theme-options.php' );
function get_home_gallery(){
	echo "Here comes the gallery!";
}
?>
