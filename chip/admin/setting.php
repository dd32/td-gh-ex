<div class="wrap">
  
  <?php screen_icon(); ?>
  <h2><?php echo sprintf( '%1$s Theme Settings', get_current_theme() ); ?></h2>    
  
  <div class="chip-life-tabs ui-tabs ui-widget ui-widget-content ui-corner-all">
   
     <div class="ui-state-default ui-corner-all">
       <h2>Chip Life Framework</h2>
     </div>
   
     <div class="chip-life-tabs-content">
       <p><strong>Version:</strong> 1.4.3 &sdot; <strong>Released:</strong> October 22, 2011 &sdot; <strong>Author:</strong> <a href="http://www.tutorialchip.com/" target="_blank">TutorialChip</a></p>
       <?php
       $chip_life_current_theme = get_current_theme();
	   $chip_life_theme_info = 'You are using <strong>Chip Life Framework</strong>.';
	   if( $chip_life_current_theme !== 'Chip Life' ) {
		   $chip_life_theme_info = 'You are using Chip Life Child Theme <strong>'. $chip_life_current_theme . '</strong>';
	   }
	   ?>
       <p><?php echo $chip_life_theme_info; ?></p>
       <p>Please visit <a href="<?php echo admin_url( 'themes.php?page=chip-life-reference' ); ?>"><strong>Chip Life Reference</strong></a> page for Chip Life Child Themes, Support and Documentation.</p>       
     </div>   
  
  </div>
  
  <?php settings_errors( 'chip_life_options' ); ?>
  
  <form action="options.php" method="post" class="margin10tb">
    
    <?php settings_fields('chip_life_options_group'); ?>
    
    <div id="chip_life_tabs" class="chip-life-tabs">
    
      <ul>
        <li><a href="#chip_life_section_blog_tab">Blog Options</a></li>
        <li><a href="#chip_life_section_post_tab">Post Options</a></li>
        <li><a href="#chip_life_section_layout_tab">Layout Options</a></li>
        <li><a href="#chip_life_section_general_tab">General Options</a></li>        
      </ul>
      
      <div id="chip_life_section_blog_tab"><?php do_settings_sections( 'chip_life_section_blog_page' ); ?></div>
      <div id="chip_life_section_post_tab"><?php do_settings_sections( 'chip_life_section_post_page' ); ?></div>
      <div id="chip_life_section_layout_tab"><?php do_settings_sections( 'chip_life_section_layout_page' ); ?></div>
      <div id="chip_life_section_general_tab"><?php do_settings_sections( 'chip_life_section_general_page' ); ?></div>      
    
    </div>
    
    <p class="submit">
      <input name="Submit" type="submit" class="button-primary" value="Save Changes" />
    </p>
  
  </form>

</div>

<script>
//<![CDATA[
jQuery(document).ready(function($){
    $( '#chip_life_tabs' ).tabs({
		cookie: { expires: 1 }
	});
});
//]]>
</script>