<?php
/**
 * The template for displaying the footer.
 *
 * Contains footer content and the closing of the
 * #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
		<!-- Buchen Button -->
		<?php if (!isPageWithForm()) { ?>
		<div class="buchen-div" onclick="jQuery('#booknow-button').click();">
			<a id="booknow-button" class="buchen-button" href="//gruseltour-leipzig.de/anmeldung">Gruseltour hier buchen!</a>
		</div>
		<?php } ?>
	</div><!-- #main .wrapper -->

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<a href="//gruseltour-leipzig.de/impressum">Impressum</a>
			&nbsp;
			-
			&nbsp; 
			<a href="//gruseltour-leipzig.de/datenschutz">Datenschutz</a>
			<br />
			Gruseltour Leipzig made with <i class="fa fa-inverse fa-heart"></i>, <i class="fa fa-inverse fa-coffee"></i> and lots of Open Source in Leipzig.
			<br />
			<span class="pagespeed">Generiert mit <?php echo get_num_queries(); ?> Queries in <?php timer_stop(1); ?> Sekunden.</span>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
