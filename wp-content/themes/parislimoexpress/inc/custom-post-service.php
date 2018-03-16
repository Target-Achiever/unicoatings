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
$service = array();
$service['posttypeid'] = "service";
$service['posttypeid_singular'] = "Service";
$service['title_singular'] = "Service";
$service['title_plural'] = "Services";

/**
 * Creating Custom Post Type
 */
function sqhr_service() {
    // Retrive outside variable
    global $service;

    // Set labels
    $labels = array(
        'name' => _x($service['title_plural'], 'post type general name'),
        'singular_name' => _x($service['posttypeid_singular'], 'post type singular name'),
        'add_new' => _x('Add New', $service['title_singular']),
        'add_new_item' => __('Add New ' . $service['title_singular']),
        'edit_item' => __('Edit ' . $service['title_singular']),
        'new_item' => __('New ' . $service['title_singular']),
        'all_items' => __('All ' . $service['title_plural']),
        'view_item' => __('View ' . $service['title_singular']),
        'search_items' => __('Search ' . $service['title_plural']),
        'not_found' => __('No ' . $service['title_plural'] . ' found'),
        'not_found_in_trash' => __('No ' . $service['title_plural'] . ' found in the Trash'),
        'parent_item_colon' => '',
        'news_name' => $service['title_plural']
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
        'rewrite' => array("slug" => $service['posttypeid']), // Permalinks format
    );

    // Finally, register the post type
    register_post_type($service['posttypeid'], $args);
}

add_action('init', 'sqhr_service');
