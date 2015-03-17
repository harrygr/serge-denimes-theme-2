<footer class="content-info" id="main-footer" role="contentinfo">
  <div class="container" id="footer-widgets">
  	<div class="row"><div class="col-md-12"><div class="borderer"></div></div></div>
    <nav class="collapse navbar-collapse" role="navigation">
      <?php if (has_nav_menu('footer_menu')) : ?>
      <div class="row">
        <div class="colf-md-12">
        <?php wp_nav_menu(array('theme_location' => 'footer_menu', 'menu_class' => 'nav navbar-nav')); ?>
        </div>
      </div>
    <?php endif; ?>
  </nav>
  <div class="row top-buffer">
    <?php dynamic_sidebar('sidebar-footer'); ?>
	<?php dynamic_sidebar('sidebar-footer2'); ?>
  </div>
  <div class="row bottom-content top-buffer">
    <div class="col-sm-6"><?php if(is_front_page() ) { ?><?php echo do_shortcode('[ultimatesocial networks="twitter,facebook,pinterest" url="" custom_class="my-ultimatesocial-class" align="left"]'); ?><?php } ?><?php //if ( is_page() ) get_template_part('templates/social', 'buttons'); ?></div>
    <p class="col-sm-6 text_right">&copy; Copyright <?php bloginfo('name'); ?> <?php echo date('Y'); ?></p>
  </div>
</div>
</footer>

<?php wp_footer(); ?>
<?php 
if (!$woocommerce) global $woocommerce;
?>
<script>
$(function(){
  // use the custom woocommerce cookie to determine if the empty cart icon should show in the header or the full cart icon should show

  var cartCount = $.cookie("woocommerce_cart_count");
  var cartTotal = $.cookie("woocommerce_cart_total");
  if ( typeof(cartTotal) === "undefined") cartTotal = "£0.00";

  var cart_url = "<?php echo $woocommerce->cart->get_cart_url(); ?>";
  var shop_url = "<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>";

  if (typeof(cartCount) !== "undefined" && parseInt(cartCount, 10) > 0) {
    $('#micro-cart .cart_link').html(cartCount + ' items');
    $('#micro-cart .cart_link').attr('href', cart_url);
  } else {
    $('#micro-cart .cart_link').html('Basket Empty');
    $('#micro-cart .cart_link').attr('href', shop_url);
  }
  $('#micro-cart .cart_amount').html(cartTotal);

});

</script>