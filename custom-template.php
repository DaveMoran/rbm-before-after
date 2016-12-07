<?php

add_filter('template_include', 'include_template_function', 1);

function include_template_function( $template_path ) {
  $queried_object = get_queried_object();
  if( get_query_var('taxonomy') == 'rbm-gallery' ) {
    if(is_taxonomy_hierarchical('rbm-gallery')){
      // Checks to see if there is a file in the theme first
      // Otherwise serve the plugin default
      if ( $theme_file = locate_template( array ( 'taxonomy-rbm-gallery.php' ) ) ) {
        $template_path = $theme_file;
      } else {
        $template_path = plugin_dir_path(__FILE__) . '/taxonomy-rbm-gallery.php';
      }
    }
  }
  return $template_path;
}
