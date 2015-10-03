<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

class TupukSamplePlugin{

	function __construct() {
		add_action( 'wp_footer', array($this, 'blog_page_code') );
		add_action( 'admin_menu', array($this, 'plugin_admin_add_page') );

		// Add settings link on plugin page
		$plugin = plugin_basename(__FILE__); 
		add_filter("plugin_action_links_$plugin", array($this, 'your_plugin_settings_link') );
	}
	
	function blog_page_code(){
		echo '<script> console.log("TUPUK TEST");</script>';
	}

	function plugin_admin_add_page() {
		//add_options_page('Tupuk Sample Plugin Settings', 'Tupuk Sample Plugin', 'manage_options', 'tupuk_sample_plugin',  'plugin_options_page');
		add_options_page('Tupuk Sample Plugin Settings', 'Tupuk Sample Plugin', 'manage_options', 'tupuk_sample_plugin',  array($this, 'plugin_external_page'));
		add_action( 'admin_init', array($this, 'register_mysettings') ); //call register settings function
	}

	function register_mysettings() {
		register_setting( 'extra-post-info-settings', 'extra_post_info' );
	}

	function your_plugin_settings_link($links) { 
	  $settings_link = '<a href="options-general.php?page=tupuk_settings">Settings</a>'; 
	  array_unshift($links, $settings_link); 
	  return $links; 
	}

	function plugin_external_page(){
		?><?php include 'options_form.php'; ?><?php
	}
}

function plugin_options_page(){
?>
    <h2>My custom plugin</h2>
  Options relating to the Custom Plugin.
  Previous value - <p><?php echo get_option( 'extra_post_info' ); ?></p>

  <form method="post" action="options.php">
    <?php settings_fields( 'extra-post-info-settings' ); ?>
    <?php do_settings_sections( 'extra-post-info-settings' ); ?>

    <table class="form-table">
      <tr valign="top">
      <th scope="row">Extra post info:</th>
      <td><input type="text" name="extra_post_info" value="<?php echo get_option( 'extra_post_info' ); ?>"/></td>
      </tr>
    </table>
    <?php submit_button(); ?>
  </form>

<?php
}

$tupuk_sample_plugin = new TupukSamplePlugin();

?>


