
<?php
while ( have_posts() ):
	the_post(); ?>
<?php
the_content(); ?>
<?php
endwhile; ?>

<?php

// Get the Latest Blog Post
$args = array( 'posts_per_page' => 1, 'meta_key' => '_thumbnail_id' );
$posts = new WP_Query( $args );

$image = '';
while ( $posts->have_posts() ) : 
	$posts->the_post();
if ( has_post_thumbnail( $post->ID ) ) {
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'square' );
}
$post_title 		= get_the_title();
$post_permalink 	= get_permalink();
endwhile;
wp_reset_postdata();

$video_source = of_get_option('video_source');
?>

<!-- First Row -->
<div class="row top-buffer">
	<div class="col-sm-4 img-container home-tile">
		<a href="<?php echo of_get_option( 'tile_1a_url', '#' ); ?>"> 
			<img src="<?php echo of_get_option( 'tile_1a_image' ); ?>" />
			<div class="home-tile-title"><?php echo of_get_option( 'tile_1a_text' ); ?></div>
		</a>
	</div>
	<div class="col-sm-4 img-container home-tile">
		<a href="<?php echo of_get_option( 'tile_1b_url', '#' ); ?>"> 
			<img src="<?php echo of_get_option( 'tile_1b_image' ); ?>" />
			<div class="home-tile-title"><?php echo of_get_option( 'tile_1b_text' ); ?></div>
		</a>
	</div>
	<div class="col-sm-4 img-container home-tile">
		<a href="<?php echo $post_permalink; ?>"> 
			<img src="<?php echo $image[0]; ?>" />
			<div class="home-tile-title">Blog<?php //echo $post_title; ?></div>
		</a>
	</div>
</div>

<!-- Second Row -->
<div class="row top-buffer">
	<div class="col-sm-2 hidden-xs img-container home-tile home-second-row">
		<a href="<?php echo of_get_option( 'tile_2a_url', '#' ); ?>"> 
			<img src="<?php echo of_get_option( 'tile_2a_image' ); ?>">
			<div class="home-tile-title"><?php echo of_get_option( 'tile_2a_text' ); ?></div>
		</a>
	</div>
	<div class="col-sm-8  home-second-row">
		<div class="home-video">
			<?php if ( 'youtube' == $video_source ) : ?>
			<iframe width="616" height="347" src="//www.youtube.com/embed/<?php echo of_get_option('home_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
		<?php elseif ( 'vimeo' == $video_source ) : ?>
		<iframe src="//player.vimeo.com/video/<?php echo of_get_option('home_video_id'); ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="616" height="347" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
	<?php endif; ?>
</div>
</div>
<div class="col-sm-2 hidden-xs img-container home-tile home-second-row">
	<a href="<?php echo of_get_option( 'tile_2b_url', '#' ); ?>"> 
		<img src="<?php echo of_get_option( 'tile_2b_image' ); ?>">
		<div class="home-tile-title"><?php echo of_get_option( 'tile_2b_text' ); ?></div>
	</a>
</div>

</div>
<div class="row top-buffer">
	<div class="col-sm-12 hidden-xs img-container home-tile home-third-row">
		<a href="<?php echo of_get_option( 'tile_3_url', '#' ); ?>"> 
			<img src="<?php echo of_get_option( 'tile_3_image' ); ?>">
			<div class="home-tile-title"><?php echo of_get_option( 'tile_3_text' ); ?></div>
		</a>
	</div>
</div>

<?php if ( of_get_option( 'enable_popup_video' )) : ?>
<script>
	var video_url = '<?php if ( "youtube" == of_get_option("popup_video_source") ) 
	{
		echo "//www.youtube.com/embed/" . of_get_option("popup_video_id") . "?autoplay=1";
	} else {
		echo "//player.vimeo.com/video/" . of_get_option("popup_video_id")  . "?autoplay=1";
	} ?>';

	$(document).ready(function() {
			$.fancybox({
				width: '90%',
				height: '90%',
				autoScale: true,
				transitionIn: 'fade',
				transitionOut: 'fade',
				type: 'iframe',
				padding: 0,
				title: false,
				helpers: {
					media: true
				},
				href: video_url
			});
});

</script>
<?php endif; ?>
