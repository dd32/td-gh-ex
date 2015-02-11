<div class="wrap settings-wrap" id="page-settings">
    <h2><?php _e('Settings','appointment'); ?></h2>
    <div id="option-tree-header-wrap">
        <ul id="option-tree-header">
            <li id=""><a href="" target="_blank"></a>
            </li>
            <li id="option-tree-version"><span><?php _e('Appointment','appointment'); ?></span></li>
			<a target="_blank" href="https://www.facebook.com/webriti" class="btn btn-primary fb-btn"><?php _e('Like us on facebook','appointment'); ?></a>
			
        </ul>
		
    </div>
    <div id="option-tree-settings-api">
    <div id="option-tree-sub-header"></div>
        <div class = "ui-tabs ui-widget ui-widget-content ui-corner-all">
            <ul >
                <li id="tab_create_setting"><a href="#section_general"><?php _e('General Settings','appointment'); ?></a>
                </li>
                <li id="tab_import"><a href="#section_design" ><?php _e('Social link and meta setting','appointment'); ?></a>
                </li>
                <li id="tab_export"><a href="#section_misc"><?php _e('Footer Custmization setting','appointment'); ?></a>
                </li>
               
            </ul>
    <div id="poststuff" class="metabox-holder">
        <div id="post-body">
			<div id="post-body-content">
                <div id="section_general" class = "postbox">
                    <div class="inside">
                        <div id="setting_theme_options_ui_text" class="format-settings">
                            <div class="format-setting-wrap">
                                        
                                  <?php load_template( dirname( __FILE__ ) . './pages/home_page_settings.php' );  ?>    
                </div>
            </div>
        </div>
    </div>
    
	<div id="section_design" class = "postbox">
        <div class="inside">
            <div id="design_customization_settings" class="format-settings">
                <div class="format-setting-wrap">
      <div class = "format-setting type-textarea has-desc">
        <div class = "format-setting-inner">
        
		<?php  load_template( dirname( __FILE__ ) . './pages/home_page_header_setting.php' ); ?>
                                              
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
	<div id="section_misc" class = "postbox" >
        <div class="inside">
            <div id="setting_export_settings_file_text" class="format-settings">
                <div class="format-setting-wrap">
                    <div class="format-setting-label">
					<?php  load_template( dirname( __FILE__ ) . './pages/footer_copyright_settings.php' ); ?>
					</div>
				</div>
            </div>
        </div>
    </div>
		</div>
    </div>
    </div>
	<div class="webriti-submenu" style="height:35px;">			
            <div class="webriti-submenu-links" style="margin-top:5px;">
			<form method="POST">
				<input type="submit" onclick="return confirm( 'Click OK to reset theme data. Theme settings will be lost!' );" value="Restore All Defaults" name="restore_all_defaults" id="restore_all_defaults" class="reset-button btn">
			<form>
            </div><!-- webriti-submenu-links -->
        </div>
        <div class="clear"></div>
        </div>
    </div>
</div>

<?php
// Restore all defaults
if(isset($_POST['restore_all_defaults'])) 
	{
		$appointment_lite_theme_options = theme_data_setup();	
		update_option('appointment_lite_options',$appointment_lite_theme_options);
	}
?>