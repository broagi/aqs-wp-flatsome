<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="blog-wrapper blog-single page-wrapper">
	<div class="banner-post">
		<div class="cont-banner">
			<div class="text-inner text-center">
				<h3><span style="font-size: 150%;"><strong><?php echo  __( 'News', 'hrm' ); ?></strong></span></h3>
				<p><?php echo  __( 'Home', 'hrm' ); ?>&nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  __( 'News', 'hrm' ); ?></p>
			</div>
		</div>
	</div>
	
	<?php get_template_part( 'template-parts/posts/layout', get_theme_mod('blog_post_layout','right-sidebar') ); ?>
</div><!-- #content .page-wrapper -->


<?php get_footer();
