<?php
/**
 * News CPT
 * 
 * If it is required to have more than one category filter
 * for the current post then create a taxanomy
 *  
 * http://codex.wordpress.org/Taxonomies
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */
$testimonial = array();
$testimonial['posttypeid'] = "testimonial";
$testimonial['posttypeid_singular'] = "Testimonial";
$testimonial['title_singular'] = "Testimonial";
$testimonial['title_plural'] = "Testimonials";

/**
 * Creating Custom Post Type
 */
function sqhr_testimonial() {
    // Retrive outside variable
    global $testimonial;

    // Set labels
    $labels = array(
        'name' => _x($testimonial['title_plural'], 'post type general name'),
        'singular_name' => _x($testimonial['posttypeid_singular'], 'post type singular name'),
        'add_new' => _x('Add New', $testimonial['title_singular']),
        'add_new_item' => __('Add New ' . $testimonial['title_singular']),
        'edit_item' => __('Edit ' . $testimonial['title_singular']),
        'new_item' => __('New ' . $testimonial['title_singular']),
        'all_items' => __('All ' . $testimonial['title_plural']),
        'view_item' => __('View ' . $testimonial['title_singular']),
        'search_items' => __('Search ' . $testimonial['title_plural']),
        'not_found' => __('No ' . $testimonial['title_plural'] . ' found'),
        'not_found_in_trash' => __('No ' . $testimonial['title_plural'] . ' found in the Trash'),
        'parent_item_colon' => '',
        'news_name' => $testimonial['title_plural']
    );

    // Setup parameters
    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-welcome-add-page', // https://developer.wordpress.org/resource/dashicons/#share-alt
        'description' => 'Holds Addons and Addon specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'has_archive' => false,
        'taxonomies' => array(), //[category/post_tag]
        'rewrite' => array("slug" => $testimonial['posttypeid']), // Permalinks format
    );

    // Finally, register the post type
    register_post_type($testimonial['posttypeid'], $args);
}

add_action('init', 'sqhr_testimonial');
