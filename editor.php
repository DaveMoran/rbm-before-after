<?php

add_action('admin_head', 'rbm_add_button');

function rbm_add_button() {
  global $typenow;

  // Check user permissions
  if( !current_user_can('edit_posts') && !current_user_can('edit_pages')) {
    return;
  }

  // Verify post type
  if( !in_array($typenow, array('post', 'page'))) {
    return;
  }

  // Check if WYSIWYG is enabled
  if( get_user_option('rich_editing') == 'true') {
    add_filter('mce_external_plugins', 'rbm_add_tinymce_plugin');
    add_filter('mce_buttons_2', 'rbm_register_button');
  }
}

function rbm_add_tinymce_plugin($plugin_array) {
  $plugin_array['rbm_tc_button'] = plugins_url('/inc/js/text-button.js', __FILE__);
  return $plugin_array;
}

function rbm_register_button($buttons) {
  array_push($buttons, 'rbm_tc_button');
  return $buttons;
}
