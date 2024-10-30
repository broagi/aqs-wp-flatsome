<?php
// Get Header Top template. Located in flatsome/template-parts/header/header-top.php

  // Get Header Main template. Located in flatsome/template-parts/header/header-main.php
  get_template_part('template-parts/header/header', 'main');



  // Header Backgrounds
  echo '<div class="header-bg-container fill">';
    echo do_action('flatsome_header_background');
  echo '</div><!-- .header-bg-container -->';
  
  do_action('flatsome_header_wrapper');
?>