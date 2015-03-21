<?php

// Use WP-PageNavi when it's active
function twentytwelve_content_nav( $nav_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<?php /* add wp-pagenavi support for posts */ ?>
		<?php if(function_exists('wp_pagenavi') ) : ?>
			<?php wp_pagenavi(); ?>
		<?php else: ?>
			<nav id="<?php echo $nav_id; ?>">
				<h3 class="assistive-text"><?php _e( 'Post navigation', 'tto' ); ?></h3>
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'tto' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&larr;</span>', 'tto' ) ); ?></div>
			</nav><!-- #nav-above -->
		<?php endif; ?>
	<?php endif;
}