<div id="chipthemesetting">

<span id="backtotop"></span>

<div>
  <h2 class="head1"><?php echo $theme_full_name; ?> Theme Settings</h2>
</div>

<div>
  <?php if( $theme_action == "save" ): ?>
  <div id="message" class="updated fade"><p><strong>Settings Saved.</strong></p></div>
  <?php endif; ?>
  <?php if( $theme_action == "reset" ): ?>
  <div id="message" class="updated fade"><p><strong>Settings Reset.</strong></p></div>
  <?php endif; ?>
</div>

<div>
  <p>We really thanks of you for using <?php echo $theme_full_name; ?>.</p>
  <p><strong>Wherever you see 'Save Changes' it will save changes for ALL theme settings.</strong></p>
</div>

<div>
  <ol>
	<?php foreach ( $theme_options as $value ): ?>
    <?php if ( $value['type'] == "header" ): ?>
    <li><a href="#<?php echo $value['id']; ?>"><?php echo $value['name']?></a></li>
    <?php endif; ?>
    <?php endforeach; ?>
  </ol>
</div>

<div>
<form method="post">
  <table class="chipthemesettingtable">
    <?php foreach ($theme_options as $value) { ?>
    
	<?php if ( $value['type'] == "header" ) { ?>
	
    <tr colspan="2">
      <td><p class="submit">
          <input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
          <input type="hidden" name="action" value="save" />
        </p></td>
    </tr>
    <tr colspan="2">
      <td><a href="#backtotop">
        <?php _e("Go to Top"); ?>
        </a></td>
    </tr>
    <tr>
      <td colspan="2"><h3 id="<?php echo $value['id']; ?>" class="head2"><?php echo $value['name']; ?></h3></td>
    </tr>
	
	<?php } else if ($value['type'] == "text") { ?>
    
    <tr valign="top">
      <th><?php echo $value['name']; ?>:</th>
      <td>
        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" />
        <div class="help1"><?php echo $value['help']; ?></div>
      </td>
    </tr>
    
	<?php } else if ($value['type'] == "textarea") { ?>
    
    <tr valign="top">
      <th><?php echo $value['name']; ?>:</th>
      <td>
        <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="3" cols="90"><?php if ( get_option( $value['id'] ) != "") { echo stripslashes(get_option( $value['id'] ) ); } else { echo stripslashes($value['std'] ); } ?></textarea>
        <div class="help1"><?php echo $value['help']; ?></div>
      </td>
    </tr>
    
	<?php } else if ($value['type'] == "select") { ?>
    
    <tr valign="top">
      <th><?php echo $value['name']; ?>:</th>
      <td>
        <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
          <?php foreach ($value['options'] as $option) { ?>
          <option<?php if ( get_option( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
          <?php } ?>
        </select>
        <div class="help1"><?php echo $value['help']; ?></div>
      </td>
    </tr>
    
	<?php
    } // else if ($value['type'] == "select")
} //  foreach ($options as $value)
?>
  </table>
  <p class="submit">
    <input name="save" type="submit" value="<?php _e('Save Changes'); ?>" />
    <input type="hidden" name="action" value="save" />
  </p>
</form>
</div>

<div>
<form method="post">
  <p class="submit" style="float:right;">
    <input name="reset" type="submit" value="<?php _e('Delete all Data and Reset to Default Settings'); ?>" />
    <input type="hidden" name="action" value="reset" />
  </p>
</form>
<br class="clear" />
</div>

</div>
