<?php // display the admin options page

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
 
?>