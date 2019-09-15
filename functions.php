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
    if (is_page('anmeldung') || is_page('wir-erwarten-euch-an-halloween-2015') || is_page('wave-gotik-treffen-2015-wgt') || is_page('geschenkgutschein') || is_page('wgt-2016') || is_page('friedhofstour') || is_page('wgt-2017') || is_page('halloween-2017') || is_page('halloween-2018') || is_page('walpurgisnacht-2018') || is_page('walpurgisnacht-2019') || is_page('wgt-2019') || is_page('halloween-2019')) {
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

    wp_enqueue_style('jquery-style', 'https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/themes/smoothness/jquery-ui.css', false, '1.12.1');
}

add_action('wp_enqueue_scripts', 'update_jquery_ui');
function update_jquery_ui(){
    wp_deregister_script('jquery-ui');

    if (!is_page('anmeldung')) {
        return;
    }
    
    wp_register_script('jquery-ui', "https://ajax.aspnetcdn.com/ajax/jquery.ui/1.12.1/jquery-ui.min.js", ['jquery'], '1.12.1', true);
	wp_enqueue_script('jquery-ui');
}

function is_blog() {
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

/**
 * Font Awesome hinzufügen (Icons)
 */
add_action('wp_enqueue_scripts', 'load_font_awesome');
function load_font_awesome()
{
    if (!is_blog()) {
        return;
    }

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
    wp_register_script('jquery', ("https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"), false, '3.4.1', true);
	wp_enqueue_script('jquery');
}

add_action('wp_enqueue_scripts', 'update_jquery_migrate');
function update_jquery_migrate(){
    wp_deregister_script('jquery-migrate');
    wp_register_script('jquery-migrate', ("https://ajax.aspnetcdn.com/ajax/jquery.migrate/jquery-migrate-3.0.0.min.js"), ['jquery'], '3.0.0', true);
	wp_enqueue_script('jquery-migrate');
}

add_filter('autoptimize_filter_extra_gfont_fontstring','add_display');
function add_display($in) {
  return $in.'&amp;display=auto';
}
