<?php
/**
 * The blog template file.
 *
 * @package flatsome
 */

get_header();

?>

<div id="content" class="">
<div class="banner-pages banner-post banner-service">
		<div class="gird-page"><div class="container"><span></span><span></span><span></span></div></div>
		<div class="banner-inner">
			<div class="banner-bg"><div class="bg-loaded"></div></div>
			<div class="banner-layers">
				<div class="res-text">
					<div class="text-inner">
					<h3><span style="font-size: 150%;"><strong><?php pll_e('Service'); ?></strong></span></h3>
					<p><?php pll_e('Home1'); ?>&nbsp; &nbsp; &nbsp; &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php pll_e('Service'); ?></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	do_action('flatsome_before_blog');
	?>

	<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
	<div class="section-padding">
	<div class="row row-large <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">

		<div class="col">
			<?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>

			<?php if ( have_posts() ) : ?>

				<?php /* Start the Loop */ ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<div class="article-inner <?php flatsome_blog_article_classes(); ?>">
							<?php
							if(flatsome_option('blog_post_style') == 'default' || flatsome_option('blog_post_style') == 'inline'){
								get_template_part('template-parts/posts/partials/entry-header', flatsome_option('blog_posts_header_style') );
							}
							?>
							<div class="entry-content single-page">
								<?php the_content(); ?>

								<?php
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'flatsome' ),
									'after'  => '</div>',
								) );
								?>

								<?php if ( get_theme_mod( 'blog_share', 1 ) ) {
		// SHARE ICONS
									echo '<div class="blog-share text-center">';
									echo '<div class="is-divider medium"></div>';
									echo do_shortcode( '[share]' );
									echo '</div>';
								} ?>
							</div><!-- .entry-content2 -->

							<?php if ( get_theme_mod( 'blog_single_footer_meta', 1 ) ) : ?>
								<footer class="entry-meta text-<?php echo get_theme_mod( 'blog_posts_title_align', 'center' ); ?>">
									<?php
									/* translators: used between list items, there is a space after the comma */
									$category_list = get_the_category_list( __( ', ', 'flatsome' ) );

									/* translators: used between list items, there is a space after the comma */
									$tag_list = get_the_tag_list( '', __( ', ', 'flatsome' ) );


		// But this blog has loads of categories so we should probably display them here.
									if ( '' != $tag_list ) {
										$meta_text = __( 'This entry was posted in %1$s and tagged %2$s.', 'flatsome' );
									} else {
										$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'flatsome' );
									}

									printf( $meta_text, $category_list, $tag_list, get_permalink(), the_title_attribute( 'echo=0' ) );
									?>
								</footer><!-- .entry-meta -->
							<?php endif; ?>

							<?php if ( get_theme_mod( 'blog_author_box', 1 ) ) : ?>
								<div class="entry-author author-box">
									<div class="flex-row align-top">
										<div class="flex-col mr circle">
											<div class="blog-author-image">
												<?php
												$user = get_the_author_meta( 'ID' );
												echo get_avatar( $user, 90 );
												?>
											</div>
										</div><!-- .flex-col -->
										<div class="flex-col flex-grow">
											<h5 class="author-name uppercase pt-half">
												<?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?>
											</h5>
											<p class="author-desc small"><?php echo esc_html( get_the_author_meta( 'user_description' ) ); ?></p>
										</div><!-- .flex-col -->
									</div>
								</div>
							<?php endif; ?>

							<?php if ( get_theme_mod( 'blog_single_next_prev_nav', 1 ) ) :
								flatsome_content_nav( 'nav-below' );
							endif; ?>
							<?php hrm_recent_post_category(); ?>

    						<?php
    						$listnews = rwmb_meta('page-sel');
    						$args2 = array(
    							'post_type'      => 'post',
    							'posts_per_page' => 6,
    							'post__in' => $listnews,
    						);
    						$query2 = new WP_Query( $args2 ); ?>
    						<?php if ( $query2->have_posts() ){ ?>
    							<div class="news-related">
    								<div class="blog-box-title mt-4">
    									<span style="color: #25317b; font-size: 180%;"><strong><?php pll_e('Related News'); ?></strong></span>
    								</div>
    								<div class="show-related">
    									<ul class="related clearfix clear post-item">
    										<?php while ( $query2->have_posts() ) { $query2->the_post(); ?>
    											<div class="other-news clearfix">
    												<div class="inner-content">
    													<div class="post-thumbnail tie-appear">
    														<a href="<?php the_permalink() ?>"><img src="<?php the_post_thumbnail_url(); ?>"></a>
    													</div>
    													<div class="entry-in-post">
    														<span class="post-box-time">
    															<?php
															        $postdate = get_field('ngay_dang');
															        if($postdate[0] != 1){
															    ?>
																    <?php echo get_the_date('d/m/Y'); ?>
															    <?php } ?>
    														</span>
    														<h2 class="post-box-title">
    															<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
    														</h2>
    														<div class="entry">
    															<p><?php
    															echo get_the_excerpt();
    															?></p>
    														</div>
    													</div>
    												</div>
    											</div>
    											<?php }
    											wp_reset_postdata();
    											wp_reset_query(); ?>
    										</ul>
    								</div>
    							</div>
							<?php } ?>

								<div class="dow-doc">
									<div class="blog-box-title mt-4">
										<span style="color: #25317b; font-size: 180%;"><strong><?php pll_e('Toolkit'); ?></strong></span>
										<div class="list-doc">
											<?php
											$group_values = rwmb_meta( 'dow-tl');

											if (!empty( $group_values ) ) {
												foreach ( $group_values as $group_value ) {
											      if (!empty( $group_value['link-d'] ) ) {
													$value = isset( $group_value['link-t'] ) ? $group_value['link-t'] : '';
													$value2 = isset( $group_value['link-d'] ) ? $group_value['link-d'] : ''; ?>
        										    <a href="<?php echo $value2; ?>">
        										        <div class="li-doc">
										                    <img src="http://icons.iconarchive.com/icons/iconsmind/outline/256/File-Download-icon.png" alt="">
										                    <h3><?php echo $value; ?></h3>
										               </div>
									                </a>
    										<?php } }
										}
									?>
									</div>
								</div>
							</div><!-- .article-inner -->

						</article><!-- #-<?php the_ID(); ?> -->

					<?php endwhile; ?>

					<?php else : ?>

						<?php get_template_part( 'no-results', 'index' ); ?>

					<?php endif; ?>
				</div> <!-- .large-9 -->



			</div><!-- .row -->
			</div>
			<?php
			do_action('flatsome_after_blog');
			?>

		</div><!-- #content .page-wrapper -->

		<?php get_footer();
