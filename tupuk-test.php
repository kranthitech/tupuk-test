<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

class TupukSamplePlugin{
	$widget_label = 'Yes No Popup'
	$widget_tag = 'yes_no_popup'

	function __construct() {
		add_action( 'wp_footer', 'blog_page_code' );
		add_action( 'admin_menu', 'plugin_admin_add_page' );

		// Add settings link on plugin page
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );
	}
	
	function blog_page_code(){
		echo '<script> console.log("TUPUK TEST");</script>';
	}

	function plugin_admin_add_page() {
		add_options_page($widget_label+' Settings', 'Tupuk '+$widget_label, 'manage_options', 'tupuk_'+$widget_tag, 'plugin_options_page');

		add_action( 'admin_init', 'register_mysettings' ); //call register settings function
	}

	function register_mysettings() {
		register_setting( 'extra-post-info-settings', 'extra_post_info' );
	}

	function your_plugin_settings_link($links) { 
	  $settings_link = '<a href="options-general.php?page=tupuk_settings">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}

	function plugin_options_page(){
		include dirname( __FILE__ ) . 'options_form.php';
	}
}


?>


