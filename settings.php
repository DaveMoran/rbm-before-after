<?php
add_action( 'admin_menu', 'rbm_add_admin_menu' );
add_action( 'admin_init', 'rbm_settings_init' );

function rbm_add_admin_menu(  ) {
	add_submenu_page( 'edit.php?post_type=rbm_before_after', 'RBM Before and Afters', 'Settings', 'edit_posts', basename(__FILE__), 'rbm_gallery_options' );
}

function rbm_settings_init(  ) {

	register_setting( 'pluginPage', 'rbm_settings' );

	add_settings_section(
		'rbm_pluginPage_section',
		__( 'Settings page for the RBM Staff plugin', 'wordpress' ),
		'rbm_settings_section_callback',
		'pluginPage'
	);

	add_settings_field(
		'rbm_skills',
		__( 'Enqueue Scripts', 'wordpress' ),
		'rbm_skills_render',
		'pluginPage',
		'rbm_pluginPage_section'
	);
}


function rbm_skills_render(  ) {

	echo "h1";

}

function rbm_settings_section_callback(  ) {
	echo __( '', 'wordpress' );
}


function rbm_gallery_options(  ) {

	?>
	<form action='options.php' method='post'>

		<h2>RBM Staff Settings</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}
