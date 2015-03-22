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
 * Datepicker hinzufuegen
 */
function load_datepicker_scripts() {
	wp_enqueue_script('jquery-ui-datepicker');
	wp_enqueue_style('jquery-style', '//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css');
}
add_action( 'wp_enqueue_scripts', 'load_datepicker_scripts' );

/**
 * Font Awesome hinzufügen (Icons)
 */
function load_font_awesome() {
	wp_enqueue_style('prefix-font-awesome', '//gruseltour-leipzig.de/font-awesome-4.3.0/css/font-awesome.min.css', array(), '4.3.0');
}
add_action( 'wp_enqueue_scripts', 'load_font_awesome' );

function style_datepicker() {
    ?>
<script type="text/javascript">
    jQuery(document).ready(function() {
	jQuery.datepicker.regional['de'] = {
		closeText: 'Schließen',
		prevText: '&#x3C;Zurück',
		nextText: 'Vor&#x3E;',
		currentText: 'Heute',
		monthNames: ['Januar','Februar','März','April','Mai','Juni',
		'Juli','August','September','Oktober','November','Dezember'],
		monthNamesShort: ['Jan','Feb','Mär','Apr','Mai','Jun',
		'Jul','Aug','Sep','Okt','Nov','Dez'],
		dayNames: ['Sonntag','Montag','Dienstag','Mittwoch','Donnerstag','Freitag','Samstag'],
		dayNamesShort: ['So','Mo','Di','Mi','Do','Fr','Sa'],
		dayNamesMin: ['So','Mo','Di','Mi','Do','Fr','Sa'],
		weekHeader: 'KW',
		dateFormat: 'dd.mm.yy',
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ''
	};
	jQuery.datepicker.setDefaults(jQuery.datepicker.regional["de"]);

	// First, checks if it isn't implemented yet.
	if (!String.prototype.format) {
	  String.prototype.format = function() {
	    var args = arguments;
	    return this.replace(/{(\d+)}/g, function(match, number) { 
	      return typeof args[number] != 'undefined'
	        ? args[number]
	        : match
	      ;
	    });
	  };
	}

	function transformToGermanDateString(date) {
	    return "{0}.{1}.{2}".format(date.getDate().toString(), (date.getMonth() + 1), date.getFullYear());   
	}

	function isDateDisabled(date, disabledDates) {
	    return jQuery.inArray(transformToGermanDateString(date), disabledDates) != -1;
	}

	/* an diesen Tagen können keine Termine mehr angenommen werden */
	var disabledTourDays = ["27.3.2015","28.3.2015","21.3.2015","10.4.2015","11.4.2015","12.4.2015","4.4.2015","5.4.2015","17.4.2015","25.4.2015","26.4.2015","29.5.2015","30.5.2015","31.5.2015","3.7.2015","4.7.2015","5.7.2015"];
	var disabledText = "Die Tour ist an diesem Tag schon ausgebucht";

	function isAvailableTourDate(date) {
	    // TODO: only weekends
	    if (isDateDisabled(date, disabledTourDays)) {
	        return [false, "ui-datepicker-tour-full", disabledText];
	    }
	    return [true];
	}

	/* Finde alle Divs nach dem ersten im Formular und filter nur nach dem 1. */
	var $datumseingabe = jQuery('div#contact-form-18 div input.text').filter(':first');

	/* Aktiviere den Datepicker */
        $datumseingabe.datepicker({
    		minDate: 0,
    		beforeShowDay: isAvailableTourDate
	});

	/* Deaktiviere das Eingabefeld */
	$datumseingabe.addClass('ui-datepicker-readonly');
	$datumseingabe.prop('readonly', true);
    });
</script>
    <?php
}
add_action( 'wp_footer', 'style_datepicker');