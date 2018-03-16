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
$car = array();
$car['posttypeid'] = "car";
$car['posttypeid_singular'] = "Car";
$car['title_singular'] = "Car";
$car['title_plural'] = "Cars";

/**
 * Creating Custom Post Type
 */
function sqhr_car() {
    // Retrive outside variable
    global $car;

    // Set labels
    $labels = array(
        'name' => _x($car['title_plural'], 'post type general name'),
        'singular_name' => _x($car['posttypeid_singular'], 'post type singular name'),
        'add_new' => _x('Add New', $car['title_singular']),
        'add_new_item' => __('Add New ' . $car['title_singular']),
        'edit_item' => __('Edit ' . $car['title_singular']),
        'new_item' => __('New ' . $car['title_singular']),
        'all_items' => __('All ' . $car['title_plural']),
        'view_item' => __('View ' . $car['title_singular']),
        'search_items' => __('Search ' . $car['title_plural']),
        'not_found' => __('No ' . $car['title_plural'] . ' found'),
        'not_found_in_trash' => __('No ' . $car['title_plural'] . ' found in the Trash'),
        'parent_item_colon' => '',
        'news_name' => $car['title_plural']
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
        'rewrite' => array("slug" => $car['posttypeid']), // Permalinks format
    );

    // Finally, register the post type
    register_post_type($car['posttypeid'], $args);
}

add_action('init', 'sqhr_car');
