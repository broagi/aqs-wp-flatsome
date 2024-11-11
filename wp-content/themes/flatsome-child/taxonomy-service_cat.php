<?php
get_header();
?>

<div id="content" class="">

<section class="section section-padding">
<div class="section-content relative">

  <div class="row">
  <div class="pd0 medium-6 small-12">
  <div class="col-inner text-left">


      <div class="title-lg"><h2><?php echo get_queried_object()->name; ?></h2></div>
          </div>
  </div>
  <?php echo do_shortcode('[service_post max="" id="'.get_queried_object()->term_id.'"]'); ?>
  </div>
</div>
</section>

<?php
  do_action('flatsome_after_blog');
?>
</div>

<?php get_footer();
