<?php

	// Add shortcodes here

	// Array helper
	function print_array( $array ){
		if( !empty( $array ) ){
			echo '<pre>';
				print_r($array);
			echo '</pre>';
		}
	}

add_shortcode( 'get_product_permalink', 'get_product_permalink' );
function get_product_permalink() {

 /*$customer_id = get_current_user_id();
 $order = wc_get_customer_last_order( $customer_id );
 return $order->get_billing_first_name();*/
 // Not available
 $na = __( 'N/A', 'woocommerce' );

 // For logged in users only
 if ( ! is_user_logged_in() ) return $na;

 // The current user ID
 $user_id = get_current_user_id();

 // Get the WC_Customer instance Object for the current user
 $customer = new WC_Customer( $user_id );

 // Get the last WC_Order Object instance from current customer
 $last_order = $customer->get_last_order();

 // When empty
 if ( empty ( $last_order ) ) return $na;

 // Get order items
 $order_items = $last_order->get_items();

 // Latest WC_Order_Item_Product Object instance
 $last_item = end( $order_items );

 // Get product ID
 //$product_id = $last_item->get_variation_id() > 0 ? $last_item->get_variation_id() : $last_item->get_product_id();
 $product_id = $last_item->get_product_id();
 $product_name = $last_item->get_name();

 // Pass product ID to products shortcode
 $link = get_permalink($product_id);
 return '<a class="btn btn-red" href="'. $link .'">Watch '. $product_name .'</a>';
 //return do_shortcode("[product id='$product_id']");
}

?>