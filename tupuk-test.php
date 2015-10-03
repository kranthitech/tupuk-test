<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

add_action( 'wp_footer', 'blog_page_code' );
add_action( 'admin_menu', 'my_plugin_menu' );



function blog_page_code(){
	echo '<script> console.log("TUPUK TEST");</script>';
}

function my_plugin_menu() {
	add_options_page( 'Tupuk Plugin Options', 'Tupuk Plugin', 'manage_options', 'tupuk_options', 'my_plugin_options' );
}

function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}
?>