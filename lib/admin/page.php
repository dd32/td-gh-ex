<div class="wrap chiplife-settings">
  
  <?php 
  /** Get the parent theme data. */
  $chiplife_theme_data = chiplife_theme_data();
  screen_icon();
  ?>
  
  <h2><?php echo sprintf( __( '%1$s Theme Settings', 'chiplife' ), $chiplife_theme_data['Name'] ); ?></h2>    
  
  <?php settings_errors(); ?>
  
  <form action="options.php" method="post" id="chiplife-form-wrapper">
    
    <div id="chiplife-form-header" class="chiplife-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'chiplife' ); ?>">
    </div>
	
	<?php settings_fields('chiplife_options_group'); ?>
    
    <div id="chiplife-sidebar">
      
      <ul id="chiplife-group-menu">
        <li id="0_section_group_li" class="chiplife-group-tab-link-li active"><a href="javascript:void(0);" id="0_section_group_li_a" class="chiplife-group-tab-link-a" data-rel="0"><span><?php _e( 'Blog Settings', 'chiplife' ); ?></span></a></li>
        <li id="1_section_group_li" class="chiplife-group-tab-link-li"><a href="javascript:void(0);" id="1_section_group_li_a" class="chiplife-group-tab-link-a" data-rel="1"><span><?php _e( 'Post Settings', 'chiplife' ); ?></span></a></li>
        <li id="2_section_group_li" class="chiplife-group-tab-link-li"><a href="javascript:void(0);" id="2_section_group_li_a" class="chiplife-group-tab-link-a" data-rel="2"><span><?php _e( 'Footer Settings', 'chiplife' ); ?></span></a></li>
        <li id="3_section_group_li" class="chiplife-group-tab-link-li"><a href="javascript:void(0);" id="3_section_group_li_a" class="chiplife-group-tab-link-a" data-rel="3"><span><?php _e( 'General Settings', 'chiplife' ); ?></span></a></li>
      </ul>
    
    </div>
    
    <div id="chiplife-main">
    
      <div id="0_section_group" class="chiplife-group-tab">
        <?php do_settings_sections( 'chiplife_section_blog_page' ); ?>
      </div>
      
      <div id="1_section_group" class="chiplife-group-tab">
        <?php do_settings_sections( 'chiplife_section_post_page' ); ?>
      </div>
      
      <div id="2_section_group" class="chiplife-group-tab">
        <?php do_settings_sections( 'chiplife_section_footer_page' ); ?>
      </div>
      
      <div id="3_section_group" class="chiplife-group-tab">
        <?php do_settings_sections( 'chiplife_section_general_page' ); ?>
      </div>
    
    </div>
    
    <div class="clear"></div>
    
    <div id="chiplife-form-footer" class="chiplife-clearfix">
      <input type="submit" name="" id="" class="button button-primary" value="<?php _e( 'Save Changes', 'chiplife' ); ?>">
    </div>
    
  </form>

</div>