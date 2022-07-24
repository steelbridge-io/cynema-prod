<?php
  if ( ! function_exists('video_post_type') ) {

// Register Custom Post Type
    function video_post_type() {
      
      $labels = array(
        'name'                  => _x( 'Videos', 'Post Type General Name', 'wp-bootstrap-starter' ),
        'singular_name'         => _x( 'Video', 'Post Type Singular Name', 'wp-bootstrap-starter' ),
        'menu_name'             => __( 'Videos', 'wp-bootstrap-starter' ),
        'name_admin_bar'        => __( 'Videos', 'wp-bootstrap-starter' ),
        'archives'              => __( 'Archives', 'wp-bootstrap-starter' ),
        'attributes'            => __( 'Attributes', 'wp-bootstrap-starter' ),
        'parent_item_colon'     => __( 'Parent Item:', 'wp-bootstrap-starter' ),
        'all_items'             => __( 'All Items', 'wp-bootstrap-starter' ),
        'add_new_item'          => __( 'Add New Item', 'wp-bootstrap-starter' ),
        'add_new'               => __( 'Add New', 'wp-bootstrap-starter' ),
        'new_item'              => __( 'New Item', 'wp-bootstrap-starter' ),
        'edit_item'             => __( 'Edit Item', 'wp-bootstrap-starter' ),
        'update_item'           => __( 'Update Item', 'wp-bootstrap-starter' ),
        'view_item'             => __( 'View Item', 'wp-bootstrap-starter' ),
        'view_items'            => __( 'View Items', 'wp-bootstrap-starter' ),
        'search_items'          => __( 'Search Item', 'wp-bootstrap-starter' ),
        'not_found'             => __( 'Not found', 'wp-bootstrap-starter' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'wp-bootstrap-starter' ),
        'featured_image'        => __( 'Featured Image', 'wp-bootstrap-starter' ),
        'set_featured_image'    => __( 'Set featured image', 'wp-bootstrap-starter' ),
        'remove_featured_image' => __( 'Remove featured image', 'wp-bootstrap-starter' ),
        'use_featured_image'    => __( 'Use as featured image', 'wp-bootstrap-starter' ),
        'insert_into_item'      => __( 'Insert into item', 'wp-bootstrap-starter' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'wp-bootstrap-starter' ),
        'items_list'            => __( 'Items list', 'wp-bootstrap-starter' ),
        'items_list_navigation' => __( 'Items list navigation', 'wp-bootstrap-starter' ),
        'filter_items_list'     => __( 'Filter items list', 'wp-bootstrap-starter' ),
      );
      $args = array(
        'label'                 => __( 'Video', 'wp-bootstrap-starter' ),
        'description'           => __( 'Videos', 'wp-bootstrap-starter' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', 'excerpt' ),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-video-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => false,
      );
      register_post_type( 'cynematv_post_type', $args );
      
    }
    add_action( 'init', 'video_post_type', 0 );
    
  }
  
  if ( ! function_exists( 'custom_video_taxonomy' ) ) {

// Register Custom Taxonomy
    function custom_video_taxonomy() {
      
      $labels = array(
        'name'                       => _x( 'Video Categories', 'Taxonomy General Name', 'wp-bootstrap-starter' ),
        'singular_name'              => _x( 'Video Category', 'Taxonomy Singular Name', 'wp-bootstrap-starter' ),
        'menu_name'                  => __( 'Video Category', 'wp-bootstrap-starter' ),
        'all_items'                  => __( 'All Items', 'wp-bootstrap-starter' ),
        'parent_item'                => __( 'Parent Item', 'wp-bootstrap-starter' ),
        'parent_item_colon'          => __( 'Parent Item:', 'wp-bootstrap-starter' ),
        'new_item_name'              => __( 'New Item Name', 'wp-bootstrap-starter' ),
        'add_new_item'               => __( 'Add New Item', 'wp-bootstrap-starter' ),
        'edit_item'                  => __( 'Edit Item', 'wp-bootstrap-starter' ),
        'update_item'                => __( 'Update Item', 'wp-bootstrap-starter' ),
        'view_item'                  => __( 'View Item', 'wp-bootstrap-starter' ),
        'separate_items_with_commas' => __( 'Separate items with commas', 'wp-bootstrap-starter' ),
        'add_or_remove_items'        => __( 'Add or remove items', 'wp-bootstrap-starter' ),
        'choose_from_most_used'      => __( 'Choose from the most used', 'wp-bootstrap-starter' ),
        'popular_items'              => __( 'Popular Items', 'wp-bootstrap-starter' ),
        'search_items'               => __( 'Search Items', 'wp-bootstrap-starter' ),
        'not_found'                  => __( 'Not Found', 'wp-bootstrap-starter' ),
        'no_terms'                   => __( 'No items', 'wp-bootstrap-starter' ),
        'items_list'                 => __( 'Items list', 'wp-bootstrap-starter' ),
        'items_list_navigation'      => __( 'Items list navigation', 'wp-bootstrap-starter' ),
      );
      $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
        'update_count_callback'      => 'video_update',
        'show_in_rest'               => true,
      );
      register_taxonomy( 'video_taxonomy', array( 'cynematv_post_type' ), $args );
      
    }
    add_action( 'init', 'custom_video_taxonomy', 0 );
    
  }
