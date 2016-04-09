<?php add_action('admin_menu','becorp_add_opiotn_page');
function becorp_add_opiotn_page(){
$page = add_theme_page( __('becorp','becorp'), __('About Theme','becorp'), 'edit_theme_options', 'becorp', 'becorp_option_panal_function' );
add_action('admin_print_styles-'.$page, 'becorp_admin_enqueue_scripts');
} 

 function becorp_admin_enqueue_scripts()
{
		/*====Becorp Option Panel Style====*/
		wp_enqueue_style('thickbox');	
		wp_enqueue_style('becorp-style', BECORP_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/style.css');//enqueu 
		wp_enqueue_style('becorp-bootstrap', BECORP_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/bootstrap.css');//enqueu option panel bootstrap
		wp_enqueue_style('becorp-font-awesome-4.2.0', BECORP_TEMPLATE_DIR_URI.'/core-functions/option-panel/css/font-awesome-4.2.0/css/font-awesome.min.css');//enqueu option panel font-awesome-4.2.0
}
 
function becorp_option_panal_function()
{ $theme_data = wp_get_theme();	 ?>
<div class="wrapper">
	<div class="at-notify" id="at-notify">
		  <div class="col-md-3">
				<h1><?php _e('Becorp','becorp');?> <span> <?php _e('Premium','becorp');?></span></h1>
				<h4><a href="http://asiathemes.asia/?item=becorp" target="_blank"><?php _e('Get Our','becorp'); ?> <span><?php _e('Premium Theme','becorp'); ?></span></a></h4>
				<div class="about-image">
				<a href="https://asiathemes.com/becorpdetail/" target="_blank"><img src="<?php echo get_template_directory_uri();?>/screenshot.png"></a>
				</div>
			</div>
            <div class="col-md-6">
			  <h3><?php _e('Our Latest Features','becorp'); ?></h3>
			  <div class="col-md-6">
					<ul>
						<li><?php _e('Responsive Design','becorp'); ?> </li>
						<li><?php _e('8 types Colors Scheme','becorp'); ?>  </li>
						<li><?php _e('Patterns Background','becorp'); ?>   </li>
						<li> <?php _e('3 Types Of Blog Templates','becorp'); ?> </li>
						<li><?php _e('Full Width & Boxed Layout','becorp'); ?>  </li>
						<li> <?php _e('Google Fonts','becorp'); ?>  </li>
					</ul>
				</div>
				<div class="col-md-6">
					<ul>
						<li><?php _e('One Year Free Support','becorp'); ?> </li>
						<li> <?php _e('More than 10 Templates','becorp'); ?> </li>
						<li> <?php _e('Bootstrap Slider','becorp'); ?>  </li>
						<li> <?php _e('Ultimate Portfolio layout with &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Taxonomy Tab effect','becorp'); ?>  </li>
						<li> <?php _e('Translation Ready','becorp'); ?> </li>
						<li> <?php _e('Coming Soon Mode','becorp'); ?>  </li>
						
						
					</ul>
				</div>	
             </div>				
			<div class="col-md-3 notify-btn">
					<a href="http://asiathemes.asia/?item=becorp" target="_blank" class="btn btn-success btn-lg"><?php _e('View Becorp Pro Demo','becorp'); ?> </a>
					<a href="https://asiathemes.com/becorpdetail/" target="_blank" class="btn btn-primary btn-lg" ><?php _e('Upgrade to Becorp Pro','becorp'); ?></a>
			</div>
	</div>
<div class="clearfix"></div>


<!-------Header------------>
<div class="header1">
  <div class="logo">
	<h1><?php printf(__('Welcome to %1s %2s', 'becorp'), $theme_data->Name, $theme_data->Version ); ?></h1>
	<h2><?php printf(__('Getting Started with %s', 'becorp'), $theme_data->Name); ?>:</h2>
	<p class="faq-text"><?php printf('How to set-up Home page ?.','becorp'); ?></p>
	<p class="page-text"><?php printf('1. Go to Admin Dashboard >> Pages >>Add new Page. Now select the <b style="color:#f24f18;"> " Home-page " </b>template from right sidebar Template select option and publish the page.', 'becorp'); ?></p>
	<p class="page-text"><?php printf('2. After that Go to Admin Dashboard >> Settings >> Reading. Now select Static Page and set Front Page and Post Page as your choice.', 'becorp'); ?></p>
	<p class="page-text"><?php printf(__('3. %s Theme Customizer for all settings of theme . Click <b style="color:#f24f18;"> "Customize Theme" </b> or Click on given below strip <b style="color:#f24f18;">"View Customizer"</b> Button to open the Customizer now.',  'becorp'), $theme_data->Name); ?></p>
	<h2><?php printf('FAQ.', 'becorp', 'becorp'); ?></h2>
	<p class="page-text"><?php printf('1. Child Theme:','becorp'); ?></p>
	<p class="page-text"><?php printf('If you modify the theme and it upgrade with next updated version. Then your modifications will be lost. <br>If you want to protect your modifications then you create child theme. Child theme you will ensure your modifications and speed up your development time ','becorp'); ?></p>
	<p class="page-text"><?php printf('For child theme to click on' ,'becorp'); ?> <a href="https://codex.wordpress.org/Child_Themes" target="_blank" class="min-button">  <?php _e(' Child Theme', 'becorp'); ?></a>  <?php printf('Button.','becorp'); ?></p>
  </div>
</div>
<br />

<div class="header1">
  <div class="logo">
    <h2><?php _e('We have add all the option Settings inside the customiser, this is powerfull utility of WordPress, with the help of this you can create your site with live preview, ie customizer will provide you the current time preview. We have not changed any structure so you will still be able to access the previously configured data.','becorp');?></h2> 
   </div>
</div>
<br />
<div class="clearfix"></div>
<div class="header1">
  <div class="logo">
    <h2><a href="<?php bloginfo ( 'url' );?>/wp-admin/customize.php" target="_blank" class="min-button-custom pull-right"><?php _e('View Customizer','becorp'); ?></a></h2> 
	<h2><a href="https://asiathemes.com"><img src="<?php echo get_template_directory_uri();?>/core-functions/option-panel/images/asialogo.png"></a></h2>
	
   </div>
</div>
<div class="clearfix"></div>
</div>

<?php }
?>
