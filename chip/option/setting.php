<?php
if ( ! isset( $_REQUEST['updated'] ) ) {
	$_REQUEST['updated'] = false;
}
?>
<div class="wrap">
  
  <div class="icon32" id="icon-options-general"><br></div>  
  <h2><?php echo sprintf( '%1$s Theme Settings', get_current_theme() ); ?></h2>  
  
  <div class="ui-tabs ui-widget ui-widget-content ui-corner-all margin10tb">
   <div class="ui-state-default ui-corner-all">
     <div class="padding10">
       <strong>Welcome by Chip Life Support</strong>
     </div>
   </div>
   <div class="wp_themeSkin padding10">
     <p>Thanks of using <?php echo get_current_theme(); ?> WordPress theme and to become a part of <a href="http://www.tutorialchip.com/" class="chiplifeadmin">TutorialChip</a> family. We take care our family by providing a professional and an instant support at <strong><?php echo get_current_theme(); ?> forum</strong>. We are just a few clicks away from you.</p>
     <p>
       <a href="http://forums.tutorialchip.com/forums/6-Chip-Life" class="chiplifeadmin"><?php echo get_current_theme(); ?> Forum</a> &sdot;
       <a href="http://www.tutorialchip.com/chip-life/" class="chiplifeadmin"><?php echo get_current_theme(); ?> Official Page</a> &sdot;
       <a href="http://chip-life.tutorialchip.com/" class="chiplifeadmin"><?php echo get_current_theme(); ?> Demo Page</a> &sdot;
       <a href="http://www.tutorialchip.com/chip-life-guide-book/" class="chiplifeadmin"><?php echo get_current_theme(); ?> Guide Book</a> &sdot;
       <a href="http://www.tutorialchip.com/" class="chiplifeadmin">More WordPress Themes</a>
     </p>
   </div>   
  </div>
  
  <?php if ( undefined_index_fix( $_REQUEST['settings-updated'] ) == "true" ) : ?>
  <div class="updated fade margin10tb"><p><strong>Settings Saved.</strong></p></div>
  <?php endif; ?>
  
  <form action="options.php" method="post" class="margin10tb">
    
    <?php settings_fields('chip_life_options_group'); ?>
    
    <div id="chip_life_tabs" class="margin10tb">
    
      <ul>
        <li><a href="#chip_life_section_blog_tab">Blog Options</a></li>
        <li><a href="#chip_life_section_post_tab">Post Options</a></li>
        <li><a href="#chip_life_section_sponsor_tab">Sponsor Options</a></li>
        <li><a href="#chip_life_section_subscription_tab">Subscription Options</a></li>
        <li><a href="#chip_life_section_general_tab">General Options</a></li>        
      </ul>
      
      <div id="chip_life_section_blog_tab"><?php do_settings_sections( 'chip_life_section_blog_page' ); ?></div>
      <div id="chip_life_section_post_tab"><?php do_settings_sections( 'chip_life_section_post_page' ); ?></div>
      <div id="chip_life_section_sponsor_tab"><?php do_settings_sections( 'chip_life_section_sponsor_page' ); ?></div>
      <div id="chip_life_section_subscription_tab"><?php do_settings_sections( 'chip_life_section_subscription_page' ); ?></div>
      <div id="chip_life_section_general_tab"><?php do_settings_sections( 'chip_life_section_general_page' ); ?></div>      
    
    </div>
    
    <p class="submit">
      <input name="Submit" type="submit" class="button-primary" value="Save Changes" />
    </p>
  
  </form>

</div>
<script>
//<![CDATA[
jQuery(document).ready(function(){
    jQuery( "#chip_life_tabs" ).tabs({
		cookie: { expires: 1 }
	});
});
//]]>
</script>