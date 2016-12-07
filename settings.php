<?php

/* To-Do list for settings page
 ** Create a section to allow users to enqueue the magnific popup scripts
 */

add_action('admin_init', 'rbm_plugin_settings');
function rbm_plugin_settings(){
	// Step 1: Add a section for the enqueue options
	add_settings_section(
		'scripts_settings_section',
		'Enqueue Scripts',
		'scripts_settings_callback',
		'general'
	);
}

function scripts_settings_callback() {
	echo "<h1>Hello World!</h1>";
}
