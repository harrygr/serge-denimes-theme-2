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
		<ul class="tabs nav nav-pills nav-stacked">
			
			 <li class="size_guide_tab">
				<a href="#" id="details_tab_li">DETAILS</a>
			</li>
			
            <li class="size_guide_tab">
				<a href="javascript:void(0)" id="size_guide_tab_li">SIZE GUIDE</a>
			</li>
		</ul>
        <?php $tab = array("title" => "DETAILS", "priority" => 10, "callback" => "woocommerce_product_description_tab" ); ?>
        <div class="panel entry-content top-buffer" id="tab-description">
			<?php call_user_func( 'woocommerce_product_description_tab', 'description', $tab ) ?>
        </div>
	</div>
    
    <link rel="stylesheet" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/css/jquery-ui.css">
    <script src="<?php echo get_bloginfo('stylesheet_directory'); ?>/assets/js/jquery-ui.js"></script>
    <script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery( "#dialog" ).dialog({autoOpen: false});
		
		jQuery( "#size_guide_tab_li" ).click(function() {
			jQuery( "#dialog" ).dialog( "open" );
		});
	});
	</script>
    <div id="dialog" title="SIZE GUIDE">
    	<h3>Tees</h3>
<table class="table" style="font-size: 11px;">
<thead>
<tr>
<td colspan="4"><i>MEASUREMENTS IN INCHES</i></td>
<td colspan="4">FINAL MEASUREMENTS</td>
</tr>
<tr>
<th></th>
<th>DESCRIPTION</th>
<th></th>
<th></th>
<th>S</th>
<th>M</th>
<th>L</th>
<th>XL</th>
</tr>
</thead>
<tbody>
<tr>
<td>1</td>
<td>BODY LENGTH</td>
<td>FROM HPS TO BOTTM EDGE</td>
<td></td>
<td>27</td>
<td>28</td>
<td>29</td>
<td>30</td>
</tr>
<tr>
<td>2</td>
<td>WAIST PLACEMENT</td>
<td>FROM HPS</td>
<td></td>
<td>15</td>
<td>15 3/8</td>
<td>15 3/4</td>
<td>16 1/8</td>
</tr>
<tr>
<td>3</td>
<td>WAIST</td>
<td></td>
<td></td>
<td>13 1/2</td>
<td>14 1/2</td>
<td>15 1/2</td>
<td>16 1/2</td>
</tr>
<tr>
<td>4</td>
<td>BOTTOM WIDTH</td>
<td></td>
<td></td>
<td>15 1/4</td>
<td>16 1/4</td>
<td>17 1/4</td>
<td>18 1/4</td>
</tr>
<tr>
<td>5</td>
<td>BODY WIDTH</td>
<td>1" BELOW ARMHOLE</td>
<td></td>
<td>14 3/4</td>
<td>15 3/4</td>
<td>16 3/4</td>
<td>17 3/4</td>
</tr>
<tr>
<td>6</td>
<td>ACROSS SHOULDER</td>
<td>SEAM TO SEAM</td>
<td></td>
<td>13 3/4</td>
<td>14 1/4</td>
<td>14 3/4</td>
<td>15 1/4</td>
</tr>
<tr>
<td>7</td>
<td>ACROSS FRONT</td>
<td>SEAM TO SEAM AT 5" FROM HPS</td>
<td></td>
<td>12</td>
<td>12 1/2</td>
<td>13</td>
<td>13 1/2</td>
</tr>
<tr>
<td>8</td>
<td>ACROSS BACK</td>
<td>SEAM TO SEAM AT 5" FROM HPS</td>
<td></td>
<td>12 3/8</td>
<td>12 7/8</td>
<td>13 3/8</td>
<td>13 7/8</td>
</tr>
<tr>
<td>9</td>
<td>NECK OPENING</td>
<td>SEAM TO SEAM</td>
<td></td>
<td>8</td>
<td>8 1/4</td>
<td>8 1/2</td>
<td>8 3/4</td>
</tr>
<tr>
<td>10</td>
<td>ARMHOLE STRAIGHT</td>
<td>SEAM TO SEAM</td>
<td></td>
<td>7 1/4</td>
<td>7 5/8</td>
<td>8</td>
<td>8 3/8</td>
</tr>
<tr>
<td>11</td>
<td>FRONT NECK DROP</td>
<td>FROM HPS TO SEAM</td>
<td></td>
<td>10</td>
<td>10 1/4</td>
<td>10 1/2</td>
<td>10 3/4</td>
</tr>
<tr>
<td>12</td>
<td>BACK NECK DROP</td>
<td>FROM HPS TO SEAM</td>
<td></td>
<td>1</td>
<td>1</td>
<td>1</td>
<td>1</td>
</tr>
<tr>
<td>13</td>
<td>SHOULDER FORWARD</td>
<td>TO THE FRONT</td>
<td></td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
</tr>
<tr>
<td>14</td>
<td>SLEEVE LENGTH</td>
<td>FROM SHOULDER SEAM</td>
<td></td>
<td>6 1/2</td>
<td>6 7/8</td>
<td>7 1/4</td>
<td>7 5/8</td>
</tr>
<tr>
<td>15</td>
<td>SLEEVE OPENING</td>
<td></td>
<td></td>
<td>5</td>
<td>5 1/4</td>
<td>5 1/2</td>
<td>5 3/4</td>
</tr>
<tr>
<td>16</td>
<td>NECK HEIGHT</td>
<td></td>
<td></td>
<td>1/2</td>
<td>1/2</td>
<td>1/2</td>
<td>1/2</td>
</tr>
<tr>
<td>17</td>
<td>BOTTOM HEM</td>
<td></td>
<td></td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
</tr>
<tr>
<td>18</td>
<td>SLEEVE HEM</td>
<td></td>
<td></td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
<td>5/8</td>
</tr>
</tbody>
</table>
    </div>

<?php endif; ?>