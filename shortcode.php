<?php

//Create a test shortcode

function rbm_gallery_shortcode($atts) {
  $args = shortcode_atts( array(
    'photos'  =>  '710',
    'title'   =>  'Case #'
  ), $atts);

  ob_start(); ?>
    <div class="gallery-wrapper">
      <p>Photos: <?php echo $args['photos']; ?>, Title: <?php echo $args['title']; ?></p>
    </div> <?php
    $output = ob_get_clean();
  return $output;
}

add_shortcode('rbm-gallery', 'rbm_gallery_shortcode');
