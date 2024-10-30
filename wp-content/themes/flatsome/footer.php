<?php
/**
 * The template for displaying the footer.
 *
 * @package flatsome
 */

global $flatsome_opt;
?>

</main><!-- #main -->

<section class="section section-contact">
	<div class="section-content relative">
		<div class="row align-middle align-center">
			<div class="col pd0 medium-6 small-12 large-6">
				Hotline:<a href="tel: 842862636160"> <strong>(84 28) 6263 6160</strong></a></span>
			</div>
			<div class="col pd0 medium-6 small-12 large-6 text-right">
					<a href="lien-he/?lang=vi" target="_self" class="button secondary">
					<span>liên hệ</span>
				</a>
			</div>
		</div>
	</div>
</section>
<footer id="footer" class="footer-wrapper">

	<?php do_action('flatsome_footer'); ?>

</footer><!-- .footer-wrapper -->

</div><!-- #wrapper -->

<?php wp_footer(); ?>

</body>
</html>