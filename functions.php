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
add_action( 'wp_footer', 'load_datepicker_scripts');
function load_datepicker_scripts() {
	// Use `get_stylesheet_directoy_uri() if your script is inside your theme or child theme.
    wp_register_script( 'datepicker-script', get_stylesheet_directory_uri() . '/js/datepicker.js');

    // Let's enqueue a script only to be used on a specific page of the site
    if (is_page('anmeldung') || is_page('wave-gotik-treffen-2015-wgt')) {
        // Enqueue a script that has both jQuery (automatically registered by WordPress)
        // and my-script (registered earlier) as dependencies.
        wp_enqueue_script('style-datepicker-script', get_stylesheet_directory_uri() . '/js/style-datepicker.js', array('jquery', 'jquery-ui-datepicker', 'datepicker-script'));
    }
}

// Jquery UI
add_action( 'wp_enqueue_scripts', 'load_jquery_ui');
function load_jquery_ui() {
    // Let's enqueue a script only to be used on a specific page of the site
    if (is_page('anmeldung') || is_page('wave-gotik-treffen-2015-wgt')) 
    	wp_enqueue_style('jquery-style', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
}

/**
 * Font Awesome hinzufügen (Icons)
 */
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );
function load_font_awesome() {
	wp_enqueue_style('prefix-font-awesome', get_stylesheet_directory_uri() . '/font-awesome-4.3.0/css/font-awesome.min.css', array(), '4.3.0');
}
