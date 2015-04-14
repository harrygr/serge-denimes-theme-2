<?php
/**
 * Single Product Image
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.14
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $woocommerce, $product;

?>
<link href="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/css/jquery.bxslider.css" rel="stylesheet" />


<div id="carousel-product-images" class="bxsliderx carousel slide" data-ride="carousel">

 <!-- Indicators -->
<!--   <ol class="carousel-indicators">
    <li data-target="#carousel-product-images" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-product-images" data-slide-to="1"></li>
    <li data-target="#carousel-product-images" data-slide-to="2"></li>
  </ol> -->

	<div class="carousel-inner"  role="listbox">
	<!-- First Image -->
	<?php
		if ( has_post_thumbnail() ) {

			$image_title 		= esc_attr( get_the_title( get_post_thumbnail_id() ) );
			$image_link  		= wp_get_attachment_url( get_post_thumbnail_id() );
			$image       		= get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ), array(
				'title' => $image_title
				) );
			$attachment_count   = count( $product->get_gallery_attachment_ids() );

			if ( $attachment_count > 0 ) {
				$gallery = '[product-gallery]';
			} else {
				$gallery = '';
			}

			echo sprintf('<a class="item active" href="%s" title="%s">%s</a>', $image_link, $image_title, $image) . PHP_EOL;
			//echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<a href="%s" itemprop="image" class="woocommerce-main-image zoom item active" title="%s" rel="gall[product-gallery]">%s</a>', $image_link, $image_title, $image ), $post->ID );

		} else {

			echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="Placeholder" />', wc_placeholder_img_src() ), $post->ID );

		}
	?>
	
	
	<?php do_action( 'woocommerce_product_thumbnails' ); ?>


	</div>
		<!-- Controls -->
		  <a class="left carousel-control" href="#carousel-product-images" role="button" data-slide="prev">
		    <span class="fa fa-chevron-left glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-product-images" role="button" data-slide="next">
		    <span class="fa fa-chevron-right glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
</div>

