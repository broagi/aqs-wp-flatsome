<?php
function hrm_recent_post_taxonomy() {
  $categories = get_taxonomies(get_the_id());
  if ($categories):
    $taxonomy_ids = array();
  foreach($categories as $individual_taxonomy):
    $category_ids[] = $individual_taxonomy->term_id;
  $args=array(
   
    'post__not_in'        => array(get_the_id()),
    'showposts'           =>5,
    'ignore_sticky_posts' =>1,
    'posts_per_page'     =>9, 
     'tax_query' => array(
      array(
        'taxonomy' => 'color',
        'field' => 'slug',
        'terms' => $category_ids,
        'include_children' => true,
      ),
    ),
    );
  $related_post = new wp_query($args);
  endforeach;
  if( $related_post->have_posts() ):
   if( is_single() ):?>
 <div class="related-title">
  <h3><?php _e('Các bài viết liên quan','hrm');?></h3>
</div>
<div class="show-related">
  <ul class="related">
   <?php while ($related_post->have_posts()):
   $related_post->the_post();?>
  <div class="element-item <?php echo $cat_slug; ?> " data-category="<?php echo $cat_slug; ?>">
    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
        <?php if (has_post_thumbnail( )){ ?>
        <?php the_post_thumbnail(); ?>
        <?php } ?>
        <div class="overlay">
          <div class="info-post-type">
            <div class="title-post-type"><?php the_title(); ?></div>
            <div class="time-post-type"><?php echo get_the_date(); ?></div>
          </div>
        </div>      
      </article><!-- #post-## -->
    </a>
  </div>
<?php endwhile; ?>
</ul>
</div>
<?php  endif; endif; endif; wp_reset_query(); }
