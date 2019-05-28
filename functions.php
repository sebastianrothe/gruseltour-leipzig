<?php
// include parent stylesheet
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('subchild-style', get_stylesheet_directory_uri() . '/css/twentytwelve-dark.css');
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/css/gruseltour.css');
    wp_enqueue_style('base-style', get_stylesheet_directory_uri() . '/style.css', array('parent-style', 'subchild-style', 'main-style'));
}

// Use WP-PageNavi when it's active
if (!function_exists('twentytwelve_content_nav')) {
    function twentytwelve_content_nav($nav_id)
    {
        global $wp_query;

        if ($wp_query->max_num_pages > 1): ?>
			<?php /* add wp-pagenavi support for posts */?>
			<?php if (function_exists('wp_pagenavi')): ?>
				<?php wp_pagenavi();?>
			<?php else: ?>
				<nav id="<?php echo $nav_id; ?>">
					<h3 class="assistive-text"><?php _e('Post navigation', 'tto');?></h3>
					<div class="nav-previous"><?php next_posts_link(__('<span class="meta-nav">&larr;</span> Older posts', 'tto'));?></div>
					<div class="nav-next"><?php previous_posts_link(__('Newer posts <span class="meta-nav">&larr;</span>', 'tto'));?></div>
				</nav><!-- #nav-above -->
			<?php endif;?>
		<?php endif;
    }
}

// OpenGraph Images für Startseite
add_action('wp_head', 'add_ogimages_for_frontpage');
function add_ogimages_for_frontpage()
{
    if (!is_front_page()) {
        return;
    }

    $output = '<meta property="og:image" content="https://gruseltour-leipzig.de/wordpress/wp-content/uploads/2013/05/button-scary.png" /><meta property="og:image" content="https://gruseltour-leipzig.de/wordpress/wp-content/uploads/2014/05/cropped-grusel-poster-a3.jpg" /><meta property="og:image" content="https://gruseltour-leipzig.de/wordpress/wp-content/uploads/2014/06/1.jpg" />';
    echo $output;
}

/**
 * Datepicker initialisieren
 */
add_action('wp_enqueue_scripts', 'load_datepicker_scripts');
function load_datepicker_scripts()
{
    // Let's enqueue a script only to be used on a specific page of the site
    if (!is_page('anmeldung')) {
        return;
    }

    // Use `get_stylesheet_directoy_uri() if your script is inside your theme or child theme.
    wp_register_script('dateutil-script', get_stylesheet_directory_uri() . '/js/dateutil.js');
    wp_register_script('datepicker-script', get_stylesheet_directory_uri() . '/js/datepicker.js');

    // Enqueue a script that has both jQuery (automatically registered by WordPress)
    // and my-script (registered earlier) as dependencies.
    wp_enqueue_script('style-datepicker-script', get_stylesheet_directory_uri() . '/js/style-datepicker.js', array('jquery', 'jquery-ui', 'dateutil-script', 'datepicker-script'), false, true);
}

/**
 * Formularanzeige ändern
 */
add_action('wp_enqueue_scripts', 'hide_form_values_scripts');
function hide_form_values_scripts()
{
    // Let's enqueue a script only to be used on a specific page of the site
    if (is_page('anmeldung') || is_page('wir-erwarten-euch-an-halloween-2015') || is_page('wave-gotik-treffen-2015-wgt') || is_page('geschenkgutschein') || is_page('wgt-2016') || is_page('friedhofstour') || is_page('wgt-2017') || is_page('halloween-2017') || is_page('halloween-2018')) {
        // Enqueue a script that has both jQuery (automatically registered by WordPress)
        wp_enqueue_script('hide-form-values-script', get_stylesheet_directory_uri() . '/js/hide-form-values.js', array('jquery'), false, true);
    }
}

// Jquery UI
add_action('wp_enqueue_scripts', 'load_jquery_ui');
function load_jquery_ui()
{
    // Let's enqueue a script only to be used on a specific page of the site
    if (!is_page('anmeldung')) {
        return;
    }

    wp_enqueue_style('jquery-style', '//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.min.css', false, '1.12.1');
}

add_action('wp_enqueue_scripts', 'update_jquery_ui');
function update_jquery(){
    wp_deregister_script('jquery-ui');
    wp_register_script('jquery-ui', ("https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"), ['jquery'], '1.12.1', true);
	wp_enqueue_script('jquery-ui');
}

/**
 * Font Awesome hinzufügen (Icons)
 */
add_action('wp_enqueue_scripts', 'load_font_awesome');
function load_font_awesome()
{
    //wp_enqueue_script('font-awesome', '//use.fontawesome.com/b3e50273fc.js', false, false, true);
    wp_enqueue_script('font-awesome', 'https://use.fontawesome.com/30e90113a0.js', false, '4.7.0', true);
}

// Exclude Posts with following id
add_filter('bwp_gxs_excluded_posts', 'bwp_gxs_exclude_posts', 10, 2);
function bwp_gxs_exclude_posts($excluded_posts, $post_type)
{
    // old halloween, wgt and information page
    return array(12, 157, 1356, 1846);
}

// Change form confirmation message
add_filter('grunion_contact_form_success_message', 'change_grunion_success_message');
function change_grunion_success_message($msg)
{
    return '<h3>' . 'Vielen Dank für deine Anfrage. Wir beantworten sie innerhalb weniger Stunden.<br />Solltest du dennoch nach einem Tag keine Antwort von uns erhalten, schau bitte in deinem Spam-Ordner nach. Besonders bei Web.de und GMX-Mailadressen landen wir leider häufig im Spam-Ordner. ' . '</h3>';
}


add_action('wp_enqueue_scripts', 'update_jquery');
function update_jquery(){
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("https://code.jquery.com/jquery-3.4.1.min.js"), false, '3.4.1', true);
	wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'update_jquery_migrate');
function update_jquery_migrate(){
    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery-migrate', ("https://code.jquery.com/jquery-migrate-3.0.1.min.js"), 'jquery', '3.0.1', true);
	wp_enqueue_script('jquery-migrate');
}

//add_action('template_redirect', 'optimize_jquery');
function optimize_jquery()
{
    if (is_admin()) {
        return;
    }

    wp_deregister_script('jquery');
    wp_deregister_script('jquery-migrate.min');
    wp_deregister_script('comment-reply.min');

    // has to be applied in the header
    wp_register_script('jquery', '//code.jquery.com/jquery-1.12.4.min.js', false, '1.12.4', false);
    wp_enqueue_script('jquery');
}

// Already Done by YOAST and Wordpress
//add_action('wp_head', 'my_dns_prefetch', 0);
// Set custom "dns-prefetch" and "preconnect" headers at top of <head>
function my_dns_prefetch()
{
    // List of domains to set prefetching for
    $prefetchDomains = [
        '//s0.wp.com',
        '//i0.wp.com',
        '//i2.wp.com',
        'use.fontawesome.com,
fonts.gstatic.com,
graph.facebook.com,
pixel.wp.com,
fonts.googleapis.com,
code.jquery.com',
    ];

    $prefetchDomains = array_unique($prefetchDomains);
    $result = '';

    foreach ($prefetchDomains as $domain) {
        $domain = esc_url($domain);
        $result .= '<link rel="dns-prefetch" href="' . $domain . '" crossorigin />';
        $result .= '<link rel="preconnect" href="' . $domain . '" crossorigin />';
    }

    echo $result;
}

/**
 * Load JavaScript in an async manner.
 * @link {https://ikreativ.com/async-with-wordpress-enqueue/|Inspiration}
 * @link {http://wp.me/p1V5ge-24n|Blog post}
 * @returns {String} A <script> tag with the desired attribute applied.
 */
// Doesn't work with the new block editor
//add_filter('script_loader_tag', 'make_js_async', 10, 2);
function make_js_async($tag, $handle)
{
    if (is_admin()) {
        return;
    }

    /*if (!strpos($tag, '#async')) {
    return $tag;
    }*/

    // exclude jquery
    if (strpos($tag, 'jquery')) {
        return $tag;
    }

    if (strpos($tag, 'media')) {
        return $tag;
    }

    $result = str_replace('#async', '', $tag);
    return str_replace(' src', ' defer src', $result);
}
