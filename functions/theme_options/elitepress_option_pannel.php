<div class="wrap" id="framework_wrap">   		
    <div id="content_wrap">
		<div class="webriti-header">
			<h2 style='padding-top: 0px;font-size: 23px;line-height: 10px;'><a href='http://www.webriti.com' style="margin-bottom:0px;"><img style='margin-left:10px;' src='<?php echo get_template_directory_uri(); ?>/functions/theme_options/images/png.png'></a></h2>
		</div>
		<div class="webriti-submenu">
		<div id="icon-themes" class="icon32"></div>
			<h2><?php _e('elitepress','elitepress'); ?>
				<div class="webriti-submenu-links">
					<a target="_blank" href="https://www.facebook.com/webriti" class="btn btn-primary"><?php _e('Like us on facebook','elitepress'); ?></a>
					<a target="_blank" href="https://wordpress.org/support/theme/elitepress" class="btn btn-primary"><?php _e('Support Desk','elitepress'); ?></a>
				</div><!-- webriti-submenu-links -->
			</h2>
          <div class="clear"></div>
        </div>
        <div id="content">
			<div id="options_tabs" class="ui-tabs ">
				<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
					<div id="nav-shadow"></div>
					<li class="active" >
						<div class="arrow"><div></div></div><a href="#" id="1"><span class="icon home-page"></span><?php _e('Home Page','elitepress');?></a>
						<ul><li class="currunt" ><a href="#" class="ui-tabs-anchor" id="ui-id-1"><?php _e('Quick Start','elitepress');?> </a><span></span></li>
							
							<li><a href="#" id="ui-id-22"><?php _e('Header setting','elitepress');?></a><span></span></li>
							<li><a href="#"  id="ui-id-2"><?php _e('Slider Setting','elitepress');?></a><span></span></li>
							<li><a href="#"  id="ui-id-9"><?php _e('Home Top Call Out Area Setting','elitepress');?></a><span></span></li>
							<li><a href="#"  id="ui-id-3"><?php _e('Service Setting','elitepress');?></a><span></span></li> 
							<li><a href="#"  id="ui-id-4"><?php _e('Project Portfolio','elitepress');?></a><span></span></li>
							</ul>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-24"><span class="icon footer"></span><?php _e('Banner Setting','elitepress');?></a><span></span>
					</li>
					
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-23"><span class="icon footer"></span><?php _e('Footer Customization','elitepress');?></a><span></span>
					</li>
					
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-8"><span class="icon footer"></span><?php _e('Upgrade to Pro','elitepress');?></a><span></span>
					</li>
					<div id="nav-shadow"></div>
                </ul>
				<!--         Home Page   -------->
				
				<!--most 24 Banner_settings --> 
				<?php load_template( dirname( __FILE__ ) . './pages/banner.php' ); ?>
				<!--most 1 tabs home_page_settings --> 
				<?php  load_template( dirname( __FILE__ ) . './pages/home_page_settings.php' ); ?>
				<!--most 2 tabs home_page_settings --> 
				<?php  load_template( dirname( __FILE__ ) . './pages/home_slider_settings.php' ); ?>
				<!--most 22 tabs Social_media_settings -->
				<?php load_template( dirname( __FILE__ ) . './pages/home_page_header_setting.php' ); ?>
				<!--most  home page Project Settings  -->
				<?php  load_template( dirname( __FILE__ ) . './pages/home_header_top_call_out_settings.php' ); ?>
				<!--most 5 tabs footer_call_out_settings -->
				<?php load_template( dirname( __FILE__ ) . './pages/home_service_settings.php' ); ?>
				<!--most  home page Project Settings  -->
				<?php  load_template( dirname( __FILE__ ) . './pages/home_project_portfolio_settings.php' ); ?>
				<!--most 23 tabs footer_copyright_settings --> 
				<?php load_template( dirname( __FILE__ ) . './pages/footer_copyright_settings.php' ); ?>
				<!--Contact page setting-->
				<!--most 8 tabs footer social media Settings  -->
				<?php load_template( dirname( __FILE__ ) . './pages/UpgradeToPro.php' ); ?>
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
<?php
// Restore all defaults
if(isset($_POST['restore_all_defaults'])) 
	{
		$elitepress_lite_theme_options = theme_data_setup();	
		update_option('elitepress_lite_options',$elitepress_lite_theme_options);
	}
?>