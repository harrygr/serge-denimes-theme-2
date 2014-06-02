<div class="container" id="header-masthead">
	<div class="row top-buffer">
		<div class="col-xs-6 col-md-9 social socmed"  id="socmed1">
			<!-- Social Media Links -->
			<a title="Serge DeNimes Facebook Page" href="http://www.facebook.com/pages/Serge-DeNimes/197436926939967"><i class="icon-facebook fa fa-facebook"></i></a>
			<a title="Serge DeNimes Twitter" href="http://www.twitter.com/sergedenimes"><i class="icon-twitter fa fa-twitter"></i></a>
			<a title="So Serge Tumblr" href="http://soserge.com/"><i class="icon-tumblr fa fa-tumblr"></i></a>
			<a title="Serge DeNimes YouTube Channel" href="http://www.youtube.com/sdnimes"><i class="icon-youtube fa fa-youtube"></i></a>
			<a title="Serge Songs of the Week on Spotify" href="http://open.spotify.com/user/1163287097/playlist/1ztfJ8Z9278J7AVPtRSMg5"><i class="icon-spotify fa fa-spotify"></i></a>
			<a title="Serge DeNimes Pinterest" href="http://pinterest.com/sergedenimes/"><i class="icon-pinterest fa fa-pinterest"></i></a>
			<a title="Serge DeNimes Instagram" href="http://instagram.com/sergedenimes"><i class="icon-instagram fa fa-instagram"></i></a>

			<!-- /Social Media Links -->
		</div>
		<div class="col-xs-6 col-md-3">
			<?php get_search_form(); ?>
			<?php get_template_part( 'templates/header', 'cart' ); ?>
		</div>
	</div>
	<a href="<?php bloginfo("url"); ?>" id="masthead-link">
		<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="Serge DeNimes" />
	</a>
</div>
