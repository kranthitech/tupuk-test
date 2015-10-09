<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/
class TupukSamplePlugin{


	function __construct() {
		//hook to insert code on blog page
		add_action( 'wp_footer', array($this, 'blog_page_code') );
		//hook to insert code on admin page
		add_action( 'admin_menu', array($this, 'plugin_admin_add_page') );
		//register the script that is common for all tupuk plugins
		wp_register_script( 'tupuk-client-core', plugins_url( 'tupuk-test/common/scripts/tupuk-client-core.js' ));
		wp_register_script( 'tupuk-admin-core', plugins_url( 'tupuk-test/common/scripts/tupuk-admin-core.js' ));
		
		wp_register_script( 'tupuk-angular', plugins_url( 'tupuk-test/common/scripts/angular.min.js' ));
		wp_register_script( 'tupuk-angular-toggle-switch', plugins_url( 'tupuk-test/common/scripts/angular-toggle-switch.min.js' ));		
		wp_register_script( 'tupuk-bootstrap', plugins_url( 'tupuk-test/common/scripts/bootstrap.min.js'));
		wp_register_script( 'tupuk-angular-animate', plugins_url( 'tupuk-test/common/scripts/angular-animate.min.js' ));
		wp_register_script( 'tupuk-angular-ui-bootstrap', plugins_url( 'tupuk-test/common/scripts/ui-bootstrap-tpls-0.13.4.min.js'));
		wp_register_script( 'tupuk-angular-base64', plugins_url( 'tupuk-test/common/scripts/angular-base64.min.js'));
		wp_register_script( 'tupuk-angular-formly', plugins_url( 'tupuk-test/common/scripts/formly.min.js'));
		wp_register_script( 'tupuk-api-check', plugins_url( 'tupuk-test/common/scripts/api-check.min.js'));
		wp_register_script( 'tupuk-formly-bootstrap', plugins_url( 'tupuk-test/common/scripts/angular-formly-templates-bootstrap.min.js'));


		wp_register_style( 'tupuk-bootstrap', plugins_url( 'tupuk-test/common/styles/bootstrap.min.css'));
		wp_register_style( 'tupuk-angular-toggle-switch', plugins_url( 'tupuk-test/common/styles/angular-toggle-switch.css'));

		wp_register_style( 'tupuk-widget-blank', plugins_url( 'tupuk-test/widget/blank-popup-styles.css'));
		wp_register_style( 'tupuk-widget-yes-no', plugins_url( 'tupuk-test/widget/yesno-popup-styles.css'));

		// Add settings link on plugin page
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", array($this, 'your_plugin_settings_link') );

	}
	
	function blog_page_code(){
		include 'common/views/on-blog-page.php';
	}

	function plugin_admin_add_page() {
		//add_options_page('Tupuk Sample Plugin Settings', 'Tupuk Sample Plugin', 'manage_options', 'tupuk_sample_plugin',  'plugin_options_page');
		add_options_page('Tupuk Sample Plugin Settings', 'Tupuk Sample Plugin', 'manage_options', 'tupuk_sample_plugin',  array($this, 'plugin_options_page'));
		add_action( 'admin_init', array($this, 'register_mysettings') ); //call register settings function
	}

	function register_mysettings() {
		register_setting( 'tupuk-sample-widget-options', 'tupuk_widget_settings' );
		register_setting( 'tupuk-sample-widget-options', 'tupuk_widget_template' );
		register_setting( 'tupuk-sample-widget-options', 'tupuk_widget_active' );
	}

	function your_plugin_settings_link($links) { 
	  $settings_link = '<a href="options-general.php?page=tupuk_settings">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}

	function plugin_options_page(){
		include 'common/views/admin-screen.php';
	}
}

$tupuk_sample_plugin = new TupukSamplePlugin();
?>


