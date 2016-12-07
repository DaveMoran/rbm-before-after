<?php
/*
 Plugin Name: RBM Before After
 Plugin URI: http://reachbeyondmarketing.com
 Description: A plugin to display before and after photos in an easier manner
 Version: 0.2
 Author: Dave M
 Author URI: https://dmoran.co
 License: GPL2
 */

require_once('cpt-before-after.php');
require_once('custom-template.php');

// Register magnific popup scripts

add_action( 'wp_enqueue_scripts', 'rbm_before_after_scripts' );
function rbm_before_after_scripts() {
  wp_enqueue_script('magnific-popup', plugin_dir_path( __FILE__ ) . 'inc/js/jquery.magnific-popup.min.js', array('jquery'), '');
  wp_enqueue_style('magnific-popup', plugin_dir_path( __FILE__ ) . 'inc/css/magnific-popup.css');
}
