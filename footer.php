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
		<?php if (!is_page('anmeldung') && !is_page('wir-erwarten-euch-an-halloween-2015') && !is_page('elite-gruseltour') && !is_page('wave-gotik-treffen-2015-wgt') && !is_page('wgt-2016') && !is_page('friedhofstour') && !is_page('english-guided-city-tour') && !is_page('wgt-2017') && !is_page('wgt-2018') && !is_page('halloween-2017') && !is_page('walpurgisnacht-2018') && !is_page('halloween-2018')) {?>
		<div class="buchen-div">
			<a class="buchen-button" href="//gruseltour-leipzig.de/anmeldung">Gruseltour hier buchen!</a>
		</div>
		<?php }?>
	</div><!-- #main .wrapper -->

	<footer id="colophon" role="contentinfo">
		<p class="site-info">
			<a href="//gruseltour-leipzig.de/bewertungen/">Bewertungen</a>
			&nbsp;-&nbsp;
			<a href="//gruseltour-leipzig.de/treffpunkt/">Treffpunkt</a>
			&nbsp;-&nbsp;
			<a href="//gruseltour-leipzig.de/datenschutz/">Datenschutz</a>
            &nbsp;-&nbsp;
            <a href="//gruseltour-leipzig.de/impressum/">Impressum</a>
			<br />
			Gruseltour Leipzig made with Love and lots of Open Source in Leipzig.
            </a>
		</p><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer();?>

<?php if (is_page('halloween-2017')) {?>
<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '2006373829580840');
  fbq('track', 'PageView');
  fbq('track', 'ViewContent');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=2006373829580840&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
<?php }?>

<?php if (is_page('bewertungen')) {?>
	<script async src="https://www.jscache.com/wejs?wtype=cdsratingsonlynarrow&amp;uniq=517&amp;locationId=7319866&amp;lang=de&amp;border=false&amp;shadow=false&amp;backgroundColor=gray&amp;display_version=2" data-loadtrk onload="this.loadtrk=true" data-cfasync="false"></script>
	<script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=233&amp;locationId=7319866&amp;lang=de&amp;year=2018&amp;display_version=2" data-loadtrk onload="this.loadtrk=true" data-cfasync="false"></script>
	<script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=551&amp;locationId=7319866&amp;lang=de&amp;year=2017&amp;display_version=2" data-loadtrk onload="this.loadtrk=true" data-cfasync="false"></script>
	<script async src="https://www.jscache.com/wejs?wtype=certificateOfExcellence&amp;uniq=440&amp;locationId=7319866&amp;lang=de&amp;year=2016&amp;display_version=2" data-loadtrk onload="this.loadtrk=true" data-cfasync="false"></script>
<?php }?>

</body>
</html>
