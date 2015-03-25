<?php

// include parent stylesheet
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style'));
}

// Use WP-PageNavi when it's active
if (!function_exists('twentytwelve_content_nav')) {
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
}

/**
 * Datepicker initialisieren
 */
function load_datepicker_scripts() {
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-style', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
	wp_enqueue_script('datepicker-script', get_template_directory_uri() . '/js/datepicker.js');
}
add_action( 'wp_enqueue_scripts', 'load_datepicker_scripts' );

function style_datepicker() {
	wp_enqueue_script('style-datepicker-script', get_template_directory_uri() . '/js/style-datepicker.js');
}
add_action( 'wp_footer', 'style_datepicker');

/**
 * Font Awesome hinzufügen (Icons)
 */
function load_font_awesome() {
	wp_enqueue_style('prefix-font-awesome', get_stylesheet_directory_uri() . '/font-awesome-4.3.0/css/font-awesome.min.css', array(), '4.3.0');
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );