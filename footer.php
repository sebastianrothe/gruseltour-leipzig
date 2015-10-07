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
		<?php if (!is_page('inscripcion')) { ?>
		<div class="buchen-div">
			<a class="buchen-button" href="//leipzigmisteriosa.de/inscripcion">Reserva tu visita</a>
		</div>
		<?php } ?>
	</div><!-- #main .wrapper -->

	<footer id="colophon" role="contentinfo">
		<div class="site-info">
			<a href="//leipzigmisteriosa.de/imprint">Imprint</a>
			&nbsp;
			-
			&nbsp;
			<a href="//leipzigmisteriosa.de/privacy">Privacy</a>
			<br />
			Leipzig Misteriosa made with <i class="fa fa-inverse fa-heart"></i>, <i class="fa fa-inverse fa-coffee"></i> and lots of Open Source in Leipzig. Leipzig Misteriosa is a project by <a href="//gruseltour-leipzig.de">Gruseltour Leipzig</a>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>