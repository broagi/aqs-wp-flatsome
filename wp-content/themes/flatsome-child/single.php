<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="">
	<div class="banner-pages banner-post">
		<div class="gird-page"><div class="container"><span></span><span></span><span></span></div></div>
		<div class="banner-inner">
			<div class="banner-bg"><div class="bg-loaded"></div></div>
			<div class="banner-layers">
				<div class="res-text">
					<div class="text-inner">
						<h3><span style="font-size: 150%;"><strong><?php echo  __( 'News', 'hrm' ); ?></strong></span></h3>
						<p><?php echo  __( 'Home', 'hrm' ); ?>&nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  __( 'News', 'hrm' ); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>
</div><!-- #content .page-wrapper -->


<?php get_footer();
