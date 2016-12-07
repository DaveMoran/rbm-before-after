<?php

//Create a test shortcode

function rbm_gallery_shortcode() {

  ob_start(); ?>
  This is a test
  <?php
  $output = ob_get_clean();
  return $output;
}

add_shortcode('rbm-gallery', 'rbm_gallery_shortcode');
