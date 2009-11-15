<?php

// Settings Class - cause we need an own namespace
$_THEME_SETTINGS = New Theme_Settings();
Class Theme_Settings {
  var $settingskey;
  
  Function Theme_Settings (){
    $this->settingskey = 'Theme-Key-'.MD5(__FILE__);
    
    // Hooks
    If ( Is_Admin() ) Add_Action('admin_menu', Array($this, 'AddMenu'));
  }
  
  Function LoadSetting ($key = Null){
    $settings = get_option($this->settingskey);
    
    If ($key == Null)
      return $settings;
    ElseIf ( IsSet ($settings[$key]) )
      return $settings[$key];
    Else
      return False;      
  }
  
  Function SaveSetting ($key, $val){
    $settings = (Array) $this->LoadSetting();
    $settings[$key] = $val;
    Update_Option ($this->settingskey, $settings);
  }

  Function AddMenu(){
    Add_Options_Page( __('Theme Settings', 'theme'),
                      __('Theme', 'theme'),
                      8,
                      Null,
                      Array($this, 'OptionsPage') );
    
    Add_Submenu_Page( 'themes.php',
                      Null,
                      __('Settings'),
                      8,
                      Null,
                      Array($this, 'OptionsPage') );
  }
  
  Function OptionsPage(){
    ?>    
    <div class="wrap">
      <?php screen_icon(); ?><h2><?php _e('Theme Settings', 'theme') ?></h2>
      <form method="post" action="">
        
        <?php If ($this->SaveSettings()) : ?>
          <div id="message" class="updated fade"><p><strong><?php _e('Settings saved.') ?></strong></p></div>
        <?php EndIf; ?>
        
        <?php Include DirName(__FILE__).'/form.php'; ?>
        
        <p class="submit">
          <input type="submit" name="Submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
        </p>
        </form>

        <h2><?php _e('Like this theme?', 'theme') ?></h2>
				<p><?php _e('Why not do any of the following:', 'theme') ?></p>
				<ol>
          <li><?php PrintF(__('<a href="%s">Link to it</a> so other folks can find out about it.', 'theme'), 'http://dennishoppe.de/artikel/126/wordpress-theme-be-berlin') ?></li>
          <li><?php _e('Give it a good rating on Theme directories, so others will find it more easily too!', 'theme') ?></li>
          <li><?php _e('Donate a token of your appreciation:', 'theme') ?>
            <ol>
              <li><a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=1220480" target="_blank"><?php _e('Per Paypal.', 'theme') ?></a></li>
              <li><a href="http://www.amazon.de/gp/registry/wishlist/2AG0R8BHEOJOL" target="_blank"><?php _e('My Amazon Wish-List.', 'theme') ?></a></li>
            </ol>
          </li>
        </ol>
    </div>
    <?php
  }
  
  Function SaveSettings(){
    If (Empty($_POST)) return False;
    Update_Option ($this->settingskey, $_POST);
    return True;
  }
   
}
/* End of File */