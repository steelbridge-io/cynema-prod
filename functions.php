<?php

 /**
	* Disable JetPack Upsells
	*/
 
 add_filter( 'jetpack_just_in_time_msgs', '_return_false' );

// Include php files
include get_theme_file_path('/includes/shortcodes.php');
include get_theme_file_path('includes/custom-post-types/video.php');

// Enqueue needed scripts
function needed_styles_and_scripts_enqueue() {

	// Custom script
	wp_enqueue_script( 'wpbs-custom-script', get_stylesheet_directory_uri() . '/assets/javascript/script.js' , array( 'jquery' ) );

    // Custom JS
	wp_enqueue_script('addon-js', get_stylesheet_directory_uri() . '/assets/javascript/custom.js', array(), '', true );


  wp_enqueue_script( 'video', get_stylesheet_directory_uri() . '/assets/javascript/video.js', array('jquery'), '', true );
 
	// enqueue style
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
 
	// enqueue Lineicons
	wp_register_style('lineicons', 'https://cdn.lineicons.com/3.0/lineicons.css', array(), '', 'all' );
	wp_enqueue_style('lineicons');
 
	// Add-ons
	wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/assets/scss/supports.css', array(), '', 'all' );
 
	// Animate CSS
	wp_register_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '', 'all');
	wp_enqueue_style('animate-css');

  wp_enqueue_script('airplay', get_stylesheet_directory_uri() . '/assets/javascript/airplay.js', array(), '', false );

}
add_action( 'wp_enqueue_scripts', 'needed_styles_and_scripts_enqueue' );

function cc_mime_types($mimes) {
$mimes['svg'] = 'image/svg+xml';
return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'widget_text', 'do_shortcode' );

//Dynamic Year
function site_year(){
	ob_start();
	echo date( 'Y' );
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'site_year', 'site_year' );
	
	function cynematv_add_woocommerce_support() {
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
			
			'product_grid'          => array(
				'default_rows'    => 3,
				'min_rows'        => 2,
				'max_rows'        => 8,
				'default_columns' => 4,
				'min_columns'     => 2,
				'max_columns'     => 5,
			),
		) );
	}
	add_action( 'after_setup_theme', 'cynematv_add_woocommerce_support' );
 
 remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);

/**
 *
 * Removes downloads from account page.
 */
add_filter ( 'woocommerce_account_menu_items', 'misha_remove_my_account_links' );
function misha_remove_my_account_links( $menu_links ){

	unset( $menu_links['edit-address'] ); // Addresses
	//unset( $menu_links['dashboard'] ); // Remove Dashboard
	//unset( $menu_links['payment-methods'] ); // Remove Payment Methods
	//unset( $menu_links['orders'] ); // Remove Orders
	unset( $menu_links['downloads'] ); // Disable Downloads
	//unset( $menu_links['edit-account'] ); // Remove Account details tab
	//unset( $menu_links['customer-logout'] ); // Remove Logout link

	return $menu_links;

}

/**
 * Display Category Slider on the archive page before the breadcrumb
 */
// Category Slider after Breadcrumb and before Title
add_action('woocommerce_before_main_content', 'woo_cat_slider_show_in_archive', 25);
function woo_cat_slider_show_in_archive() {
	echo do_shortcode('[woocatslider id="1124"]');
}

/**
 * Remove menus from the WordPress dashboard
 */
//add_action('admin_menu', 'cynema_remove_menus');
//function cynema_remove_menus() {
	//remove_menu_page('themes.php');
	//remove_menu_page('plugins.php');
//}

/**
 * Logout redirect
 */
add_action('wp_logout','auto_redirect_after_logout');

function auto_redirect_after_logout(){
	wp_safe_redirect( home_url() );
	exit;
}
/**
 * Remove image zoom woocommerce
 */
add_action( 'wp', 'custom_remove_product_zoom' );

function custom_remove_product_zoom() {
	remove_theme_support( 'wc-product-gallery-zoom' );
}
/**
 * Remove product image lightbox
 */
//add_action( 'wp', 'my_remove_lightbox', 99 );
function my_remove_lightbox() {
	remove_theme_support( 'wc-product-gallery-lightbox' );
}

/**
 * Change Thank You Redirect Label
 */
//add_filter( 'gettext', 'theme_change_comment_field_names', 20, 3 );

function theme_change_comment_field_names( $translated_text, $text, $domain ) {

 switch ( $translated_text ) {

  case 'Thank You URL' :

   $translated_text = __( 'After purchase redirect', $domain );
   break;

 }


 return $translated_text;
}