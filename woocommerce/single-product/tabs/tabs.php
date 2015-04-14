<?php
/**
 * Single Product tabs
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Filter tabs and allow third parties to add their own
 *
 * Each tab is an array containing title, callback and priority.
 * @see woocommerce_default_product_tabs()
 */
$tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $tabs ) ) : ?>

	<?php /* ?><div class="woocommerce-tabs top-buffer">
		<ul class="tabs nav nav-pills nav-stacked">
			<?php foreach ( $tabs as $key => $tab ) : ?>

				<li class="<?php echo $key ?>_tab">
					<a href="#tab-<?php echo $key ?>"><?php echo apply_filters( 'woocommerce_product_' . $key . '_tab_title', $tab['title'], $key ) ?></a>
				</li>

			<?php endforeach; ?>
		</ul>
		<?php foreach ( $tabs as $key => $tab ) : ?>

			<div class="panel entry-content top-buffer" id="tab-<?php echo $key ?>">
				<?php call_user_func( $tab['callback'], $key, $tab ) ?>
			</div>

		<?php endforeach; ?>
	</div><?php*/ ?>
    
    <div class="top-buffer">
		<ul class="tabs nav nav-pills">
			
			 <li>
				<a href="#tab-description" id="details_tab_li">DETAILS</a>
			</li>
			
            <li>
				<a href="#" data-toggle="modal" data-target="#sizeGuideModal">SIZE GUIDE</a>
			</li>
		</ul>
        <?php $tab = array("title" => "DETAILS", "priority" => 10, "callback" => "woocommerce_product_description_tab" ); ?>
        <div class="panel entry-content top-buffer" id="tab-description">
			<?php call_user_func( 'woocommerce_product_description_tab', 'description', $tab ) ?>
        </div>
	</div>
    
	<?php require_once(get_template_directory() . '/templates/size_guide.php'); ?>


<?php endif; ?>