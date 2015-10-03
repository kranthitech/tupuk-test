<?php
/*
Plugin Name: Tupuk Test
Description: This is a play ground to test plugin functions
Author: Kranthi Kiran
Version: 0.1
*/

add_action( 'wp_footer', 'blog_page_code' );
add_action( 'admin_menu', 'plugin_admin_add_page' );




function blog_page_code(){
	echo '<script> console.log("TUPUK TEST");</script>';
}

function plugin_admin_add_page() {
	add_options_page('Tupuk Settings Page', 'Tupuk Plugin Menu', 'manage_options', 'tupuk_settings', 'plugin_options_page');
}

$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );



function my_plugin_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

// Add settings link on plugin page
function your_plugin_settings_link($links) { 
  $settings_link = '<a href="options-general.php?page=tupuk_settings">Settings</a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
?>

<?php // display the admin options page
function plugin_options_page() {
?>
<div>
<h2>My custom plugin</h2>
Options relating to the Custom Plugin.
<form action="options.php" method="post">
<?php settings_fields('tupuk_options'); ?>
<?php do_settings_sections('plugin'); ?>
 
<input name="Submit" type="submit" value="<?php esc_attr_e('Save Changes'); ?>" />
</form></div>
 
<?php
}?>

<?php // add the admin settings and such
add_action('admin_init', 'plugin_admin_init');
function plugin_admin_init(){
register_setting( 'tupuk_options', 'tupuk_options', 'plugin_options_validate' );
add_settings_section('plugin_main', 'Main Settings', 'plugin_section_text', 'plugin');
add_settings_field('plugin_text_string', 'Plugin Text Input', 'plugin_setting_string', 'plugin', 'plugin_main');
}?>

<?php function plugin_section_text() {
echo '<p>Main description of this section here.</p>';
} ?>

<?php function plugin_setting_string() {
$options = get_option('tupuk_options');
echo "<input id='plugin_text_string' name='tupuk_options[text_string]' size='40' type='text' value='{$options['text_string']}' />";
} ?>

<?php // validate our options
function plugin_options_validate($input) {
$newinput['text_string'] = trim($input['text_string']);
if(!preg_match('/^[a-z0-9]{32}$/i', $newinput['text_string'])) {
$newinput['text_string'] = '';
}
return $newinput;
}
?>