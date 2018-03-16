<?php

/* ==========    Menu start   ================== */
//  Display header menu and footer menu options in menu page
register_nav_menus( array(
		'primary' => __( 'Header Menu',  'unicoatings' )
));
/* ==========    Menu end   ================== */

/* ==========    Add active class start   ================== */

// Add active class
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

function special_nav_class ($classes, $item) {
    if (in_array('current-menu-item', $classes)){
        $classes[] = 'active ';
    }
    return $classes;
}

/* ==========    Add active class end   ================== */

/* ==========    Add featured image start   ================== */

// Add featured image
add_theme_support( 'post-thumbnails' );

/* ==========    Add featured image end   ================== */

/* ==========    Add style to page at run time start   ================== */

// Add style at run time
function contact_us_style() {

	global $post;
	$post_slug = $post->post_name;

	if($post_slug == "contact-us" || $post_slug == "about-us" || $post_slug == "markets" || $post_slug == "news" || $post_slug == "coatings" || $post_slug == "customers") {
		wp_enqueue_style( 'contact_style', get_stylesheet_directory_uri() . '/css/contact_style.css');
	}
}
add_action( 'wp_enqueue_scripts', 'contact_us_style' );

/* ==========    Add style to page at run time end   ================== */

/* ==========    Add logo as dynamic start   ================== */

// To change logo
add_theme_support( 'custom-logo', array(
        'height'      => 248,
        'width'       => 248,
        'flex-height' => true,
));

/* ==========    Add logo as dynamic end   ================== */

/* ==========    Enable widgets option start   ================== */

//  To add widgets
add_theme_support('widgets');

/* ==========    Enable widgets option end   ================== */

/* ==========    To create custom widgets start  ================== */

function footer_widgets_init() {
 
    // First footer widget area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'First Footer Widget Area'),
        'id' => 'first-footer-widget-area',
        'description' => __( 'Social Media Icons' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title" style="display:none;">',
        'after_title' => '</h3>',
    ) );
 
    // Second Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Second Footer Widget Area'),
        'id' => 'second-footer-widget-area',
        'description' => __('Mobile number and Email address'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title" style="display:none;">',
        'after_title' => '</h3>',
    ) );
 
    // Third Footer Widget Area, located in the footer. Empty by default.
    register_sidebar( array(
        'name' => __( 'Third Footer Widget Area'),
        'id' => 'third-footer-widget-area',
        'description' => __( 'Copyrights'),
        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title" style="display:none;">',
        'after_title' => '</h3>',
    ));        
}
 
add_action( 'widgets_init', 'footer_widgets_init' );

function right_sidebar_widgets_init() {
 
    // Right sidebar area 1 for news screen
    register_sidebar( array(
        'name' => __( 'Right Sidebar Widget Area 1'),
        'id' => 'first-rightbar-widget-area',
        'description' => __( 'Social Icons' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="widget-title">',
        'after_title' => '</h5>',
    ));

    // Right sidebar area 2 for news screen
    register_sidebar( array(
        'name' => __( 'Right Sidebar Widget Area 2'),
        'id' => 'second-rightbar-widget-area',
        'description' => __( 'Archive' ),
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}

add_action( 'widgets_init', 'right_sidebar_widgets_init' );

/* ==========    To create custom widgets start  ================== */

// add_filter( 'storm_social_icons_networks', 'storm_social_icons_networks');
// function storm_social_icons_networks( $networks ) {
 
//     $extra_icons = array (
//         '/feed' => array(                  // Enable this icon for any URL containing this text
//             'name' => 'RSS',               // Default menu item label
//             'class' => 'rss',              // Custom class
//             'icon' => 'icon-rss',          // FontAwesome class
//             'icon-sign' => 'icon-rss-sign' // May not be available. Check FontAwesome.
//         ),
//     );
 
//     $extra_icons = array_merge( $networks, $extra_icons );
//     return $extra_icons;
 
// }

