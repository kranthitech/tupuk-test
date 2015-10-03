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

	add_action( 'admin_init', 'register_mysettings' ); //call register settings function
}


function register_mysettings() {
	register_setting( 'extra-post-info-settings', 'extra_post_info' );
 }

// Add settings link on plugin page
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'your_plugin_settings_link' );

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
}?>
