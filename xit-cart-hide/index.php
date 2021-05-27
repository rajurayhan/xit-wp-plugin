<?php 
/**
 * Plugin Name: xIT Hide Add To Cart
 * Description: Hide Add To Cart button for out of stock products
 * Version: 1.0
 * Author: Raju Rayhan
 * Author URI: https://github.com/rajurayhan
*/


add_action( 'woocommerce_single_product_summary', 'xit_hide_cart_in_single_product' );
function xit_hide_cart_in_single_product() {
    
        global $product;
        if ( !$product->stock_quantity ) {
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
        }
}


function xit_remove_out_of_stock_cart_button_from_product_list( $html, $product, $args ) {
    if ( ! $product->stock_quantity ) {
		return '';
    }
	return $html;
}
add_filter( 'woocommerce_loop_add_to_cart_link', 'xit_remove_out_of_stock_cart_button_from_product_list', 10, 3 );
