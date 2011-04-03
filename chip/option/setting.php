<?php
if ( ! isset( $_REQUEST['updated'] ) ) {
	$_REQUEST['updated'] = false;
}
?>
<div class="wrap">
  <div class="icon32" id="icon-options-general"><br></div>
  <h2><?php echo sprintf( '%1$s Theme Settings', get_current_theme() ); ?></h2>
  We really thanks of you for using <?php echo get_current_theme(); ?>.
  
  <?php if ( $_REQUEST['settings-updated'] == "true" ) : ?>
  <div class="updated fade"><p><strong>Settings Saved.</strong></p></div>
  <?php endif; ?>
  
  <form action="options.php" method="post">
    <?php settings_fields('chip_life_options_group'); ?>
    <?php do_settings_sections('chip_life_sections'); ?>
    <p class="submit">
      <input name="Submit" type="submit" class="button-primary" value="Save Changes" />
    </p>
  </form>

</div>