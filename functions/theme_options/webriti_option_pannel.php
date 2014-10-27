<div class="wrap" id="framework_wrap">   		
    <div id="content_wrap">
		<div class="webriti-header">
			<h2 style="padding-top: 0px;font-size: 23px;line-height: 10px;"><a href="http://www.webriti.com/" style="margin-bottom:0px;"><img style="margin-left:10px;" src="<?php echo get_template_directory_uri(); ?>/functions/theme_options/images/png.png"></a></h2>
		</div>
		<div class="webriti-submenu">
		<div id="icon-themes" class="icon32"></div>
			<h2><?php _e('wallstreet','wallstreet'); ?>
				<div class="webriti-submenu-links">
					<a target="_blank" href="http://webriti.com/support/categories/wallstreet" class="btn btn-primary"><?php _e('Support Desk','wallstreet'); ?></a>
					<a target="_blank" href="http://webriti.com/themes/documentation/wallstreet/" class="btn btn-info"> <?php _e('Theme Documentation','wallstreet'); ?></a>
					<a target="_blank" href="http://webriti.com/support/discussion/355/wallstreet-change-log/" class="btn btn-success" ><?php _e('View Changelog','wallstreet'); ?></a>				
				</div><!-- webriti-submenu-links -->
			</h2>
          <div class="clear"></div>
        </div>
        <div id="content">
			<div id="options_tabs" class="ui-tabs ">
				<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">
					<div id="nav-shadow"></div>
					<li class="active" >
						<div class="arrow"><div></div></div><a href="#" id="1"><span class="icon home-page"></span><?php _e('Home Page','wallstreet');?></a>
						<ul><li class="currunt" ><a href="#" class="ui-tabs-anchor" id="ui-id-1"><?php _e('Quick Start','wallstreet');?> </a><span></span></li>
							<li><a href="#"  id="ui-id-2"><?php _e('Featured Image Setting','wallstreet');?></a><span></span></li>
							<li><a href="#"  id="ui-id-3"><?php _e('Service Setting','wallstreet');?></a><span></span></li> 
							<li><a href="#"  id="ui-id-4"><?php _e('Project Portfolio','wallstreet');?></a><span></span></li>			
						</ul>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-15"><span class="icon heading"></span><?php _e('Section Headings','wallstreet');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="22"><span class="icon footer"></span><?php _e('Social Media Links','wallstreet');?></a>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-23"><span class="icon footer"></span><?php _e('Footer Customization','wallstreet');?></a><span></span>
					</li>
					<li>
						<div class="arrow"><div></div></div><a href="#" id="ui-id-8"><span class="icon footer"></span><?php _e('Upgrade to Pro','wallstreet');?></a><span></span>
					</li>
										
					<div id="nav-shadow"></div>
                </ul>
				<!-------  Home Page   -------->
				<!--most 1 tabs home_page_settings --> 
				<?php require_once('pages/home_page_settings.php'); ?>				
				<!--most 2 tabs home_page_settings --> 
				<?php require_once('pages/home_slider_settings.php'); ?>				
				<!--most 3 home_service_settings tabs s --> 
				<?php require_once('pages/home_service_settings.php'); ?>				
				<!--most 4 tabs home_project_portfolio_settings --> 
				<?php require_once('pages/home_project_portfolio_settings.php'); ?>
				<!--most 22 tabs home_page_settings --> 
				<?php require_once('pages/footer_copyright_settings.php'); ?>
				<!--most 15 tabs home_page_settings --> 
				<?php require_once('pages/head_titles.php'); ?>
				<!--footer social media Settings  -->
				<?php require_once('pages/footer_social_media_links.php'); ?>				
				<!--footer social media Settings  -->
				<?php require_once('pages/UpgradeToPro.php'); ?>
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
		$wallstreet_theme_options = theme_data_setup();	
		update_option('wallstreet_lite_options',$wallstreet_theme_options);
	}
?>