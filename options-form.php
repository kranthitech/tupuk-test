<script type="text/javascript">var tupuk_sample_plugin_value = '<?php echo get_option( 'extra_post_info' ); ?>'</script>
<form method="post" action="options.php">
  <?php settings_fields( 'extra-post-info-settings' ); ?>
  <?php do_settings_sections( 'extra-post-info-settings' ); ?>

  <table class="form-table" style="display:none" >
    <tr valign="top">
    <th scope="row">Options Field</th>
    <td><input type="text" name="extra_post_info" value="<?php echo get_option( 'extra_post_info' ); ?>"/></td>
    </tr>
  </table>
  <?php submit_button(); ?>
</form>
 
