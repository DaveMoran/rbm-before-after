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

	//Step 3: Introduce the field to toggle enqueueing the scripts
	add_settings_field(
		'magnific_scripts',
		'Magnific Popup Scripts',
		'magnific_toggle_callback',
		'general',
		'scripts_settings_section',
		array(
			'Activate this setting to enqueue Magnific Popup'
		)
	);

	// Step 5, register the setting
	register_setting(
		'general',
		'magnific_scripts'
	);
}

// Step 2: Create callback for custom section
function scripts_settings_callback() {
	echo "<p>Select which scripts you wish to enqueue.<br>";
	echo "<strong>Note:</strong> These are disabled by default.</p>";
}

// Step 4: Create callback for custom field
function magnific_toggle_callback( $args ) {
	$html = '<input type="checkbox" id="magnific_scripts" name="magnific_scripts" value="1" ' . checked(1, get_option('magnific_scripts'), false) . '/>';
	$html .= '<label for="magnific_scripts">' . $args[0] . '</label>';
	echo $html;
}
