<?php
/*
 * Register magnific popup scripts
 */

add_action( 'wp_enqueue_scripts', 'rbm_before_after_scripts' );
function rbm_before_after_scripts() {
  if(get_option('magnific_scripts')){
    wp_enqueue_script('magnific-popup', plugins_url("rbm-before-after") . '/inc/js/jquery.magnific-popup.min.js', array('jquery'), '');
    wp_enqueue_style('magnific-popup', plugins_url("rbm-before-after") . '/inc/css/magnific-popup.css');
  }
  wp_enqueue_style('rbm-before-after', plugins_url("rbm-before-after") . '/inc/css/rbm-before-after.css');

  // Custom script to enqueue only if the shortcode exists
  global $post;
  if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'rbm-gallery') ) {
    wp_enqueue_script( 'custom-magnific', plugins_url('rbm-before-after') . '/inc/js/custom-magnific.js', array('jquery'), '');
  }
}
