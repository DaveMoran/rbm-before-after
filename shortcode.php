<?php

//Create a test shortcode

function rbm_gallery_shortcode($atts) {
  //Step 1, setup basic shortcode arguements
  $args = shortcode_atts( array(
    'photos'  =>  '710',
    'title'   =>  'Case #'
  ), $atts);

  //Step 2, save the new arguement vallues into variables
  $photos = explode(',', $args['photos']);
  $title = $args['title'];

  ob_start(); ?>
    <div class="gallery-wrapper">
      <?php foreach($photos as $photo){
        $imageThumb = wp_get_attachment_image($photo, 'thumbnail', "");
        $imageFullLink = wp_get_attachment_image_src($photo, 'full'); ?>
        <a href="<?php echo $imageFullLink[0]; ?>" class="gallery-item"><?php echo $imageThumb; ?></a> <?php
      } ?>
    </div> <?php
    $output = ob_get_clean();
  return $output;
}

add_shortcode('rbm-gallery', 'rbm_gallery_shortcode');
