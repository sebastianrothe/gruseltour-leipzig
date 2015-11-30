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
		<?php if (!isPageWithForm()) { ?>
		<div class="buchen-div">
			<a class="buchen-button" href="//gruseltour-leipzig.de/anmeldung">Gruseltour hier buchen!</a>
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
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>