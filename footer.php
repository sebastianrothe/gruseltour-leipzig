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
		<!-- Mail Button -->

		<!-- Telefon Button -->

		<!-- Buchen Button -->
		<?php if (!is_page('anmeldung')) { ?>
		<div class="buchen-div">
			<a class="buchen-button" href="//gruseltour-leipzig.de/anmeldung">Gruseltour hier buchen!</a>
		</div>
		<?php } ?>
	</div><!-- #main .wrapper -->

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<a href="//gruseltour-leipzig.de/impressum">Impressum</a>
			&nbps;-&nbsp;
			<a href="//gruseltour-leipzig.de/datenschutz">Datenschutz</a>
			<br />
			Gruseltour-Leipzig.de powered by <a href="http://wordpress.org/" title="Wordpress">Wordpress</a>. Theme based on Twenty Twelve Dark Theme by <a href="http://www.zeaks.org/2012/twenty-twelve-dark-child-theme">Zeaks</a> 
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>