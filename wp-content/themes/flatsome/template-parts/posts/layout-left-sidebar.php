<?php 
	do_action('flatsome_before_blog');
?>

<?php if(!is_single() && flatsome_option('blog_featured') == 'top'){ get_template_part('template-parts/posts/featured-posts'); } ?>
<div class="section-padding">
	<div class="row row-large <?php if(flatsome_option('blog_layout_divider')) echo 'row-divided ';?>">
	
	
		<div class="col medium-col-first">
		<?php if(!is_single() && flatsome_option('blog_featured') == 'content'){ get_template_part('template-parts/posts/featured-posts'); } ?>
		<?php
			if(is_single()){
				get_template_part( 'template-parts/posts/single');
				comments_template();
			} else{
				get_template_part( 'template-parts/posts/archive', flatsome_option('blog_style') );
			}	?>
		</div> <!-- .large-9 -->
	
	</div><!-- .row -->
</div>

<?php 
	do_action('flatsome_after_blog');
?>