<?php 
add_theme_support( 'woocommerce' );

//prevent loading of default woocommerce styles
add_filter( 'woocommerce_enqueue_styles', '__return_false' );

//hide the sales badge
add_filter('woocommerce_sale_flash', 'woo_custom_hide_sales_flash');
function woo_custom_hide_sales_flash() {
	return false;
}

//Prevent related products appearing too quickly
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'serge_after_single_product_detail', 'woocommerce_output_related_products', 20 );

//Remove product meta
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );



//Hide the "add to cart button" on shop pages
add_filter( 'woocommerce_loop_add_to_cart_link', 'custom_woocommerce_loop_add_to_cart_link' );
function custom_woocommerce_loop_add_to_cart_link( $button ) {
	if ( $product->product_type == 'variable' ) return '';
	return false;
	return $button;
}

//Customise the add to cart message
add_filter( 'wc_add_to_cart_message', 'serge_cart_message', 99);
function serge_cart_message($message){
	$message = str_replace('class="button', 'class="btn btn-primary', $message);
	return $message;
}

// Update the custom cart cookie
// this should only ever fire on non-cached pages (so it SHOULD fire
// whenever we add to cart / update cart / etc
function update_cart_total_cookie() {
	global $woocommerce;
	$cart_total = $woocommerce->cart->get_cart_total();
	$cart_count = $woocommerce->cart->cart_contents_count;
	setcookie('woocommerce_cart_count', $cart_count, 0, '/');
	setcookie('woocommerce_cart_total', $cart_total, 0, '/');
}
if(!is_admin()){
	add_action('init', 'update_cart_total_cookie');
}

//NUMBER OF PRODUCTS TO DISPLAY ON SHOP PAGE
add_filter('loop_shop_per_page', 'wg_view_all_products');
function wg_view_all_products(){
	if($_GET['view'] === 'all'){
		return '9999';
	}
	return 9;
}


// Secret Store

add_action( 'pre_get_posts', 'serge_exclude_cat' );
add_filter( 'woocommerce_product_categories_widget_args', 'serge_exclude_product_cat_widget' );

// Hide from the main store page
function serge_exclude_cat( $q ) 
{

	if ( ! $q->is_main_query() ) return;
	if ( ! $q->is_post_type_archive() ) return;
	
	if ( ! is_admin() && is_shop() ) {

		$q->set( 'tax_query', array(array(
			'taxonomy' => 'product_cat',
			'field' => 'slug',
			'terms' => array( 'secret' ), // Don't display products in the secret category on the shop page
			'operator' => 'NOT IN'
			)));

	}

	remove_action( 'pre_get_posts', 'serge_exclude_cat' );

}

function serge_exclude_product_cat_widget( $args ) 
{
	$cat_id = get_term_by( 'slug', 'secret', 'product_cat');
	// var_dump($cat_id);
	// die();
	$args['exclude'] = array($cat_id->term_id);
	return $args;
}
?>