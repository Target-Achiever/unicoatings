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
$event = array();
$event['posttypeid'] = "event";
$event['posttypeid_singular'] = "Event";
$event['title_singular'] = "Event";
$event['title_plural'] = "Events";

/**
 * Creating Custom Post Type
 */
function sqhr_event() {
    // Retrive outside variable
    global $event;

    // Set labels
    $labels = array(
        'name' => _x($event['title_plural'], 'post type general name'),
        'singular_name' => _x($event['posttypeid_singular'], 'post type singular name'),
        'add_new' => _x('Add New', $event['title_singular']),
        'add_new_item' => __('Add New ' . $event['title_singular']),
        'edit_item' => __('Edit ' . $event['title_singular']),
        'new_item' => __('New ' . $event['title_singular']),
        'all_items' => __('All ' . $event['title_plural']),
        'view_item' => __('View ' . $event['title_singular']),
        'search_items' => __('Search ' . $event['title_plural']),
        'not_found' => __('No ' . $event['title_plural'] . ' found'),
        'not_found_in_trash' => __('No ' . $event['title_plural'] . ' found in the Trash'),
        'parent_item_colon' => '',
        'news_name' => $event['title_plural']
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
        'rewrite' => array("slug" => $event['posttypeid']), // Permalinks format
    );

    // Finally, register the post type
    register_post_type($event['posttypeid'], $args);
}

add_action('init', 'sqhr_event');
