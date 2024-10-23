<?php if ( have_posts() ) : ?>
<div id="post-list">

<?php /* Start the Loop */ ?>
<?php while ( have_posts() ) : the_post(); ?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="service-post clearfix">
	<div class="inner-content">
		<div class="post-thumbnail tie-appear">
			<a href="<?php the_permalink(); ?>"><img class="image" src="<?php the_post_thumbnail_url('project-size'); ?>"></a>
			<a href="<?php the_permalink(); ?>"><div class="middle">
				<i class="fa fa-link" aria-hidden="true"></i>
			</div></a>
		</div>
		<div class="entry-inner">   
			<h2 class="post-box-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h2> 
			<div class="entry">
				<p><?php echo get_the_excerpt(); ?></p>
			</div>
			<div class="entry-rm">
				<a href="<?php the_permalink(); ?>"><?php echo __('Read more','sc') ?></a>
			</div>
		</div> 
	</div>
</div>
</article><!-- #-<?php the_ID(); ?> -->

<?php endwhile; ?>

<?php flatsome_posts_pagination(); ?>

</div>

<?php else : ?>

	<?php get_template_part( 'template-parts/posts/content','none'); ?>

<?php endif; ?>