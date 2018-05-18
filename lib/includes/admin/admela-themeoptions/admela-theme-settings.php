<?php 

/*-----------------------------------------------------------------------------------*/
# Add Panel Page
/*-----------------------------------------------------------------------------------*/

	/* Admela : Theme Options
	*
	* Contains all the function related to theme options.
	* @package WordPress
	* @subpackage admela
	* @since admela 1.0
	*/
	
	
	
if(! function_exists( 'admela_clear_options' )):	
function admela_clear_options(&$admela_value) {
  $admela_value = htmlspecialchars(stripslashes( $admela_value ));
}
endif;

if(! function_exists( 'admela_save_settings' )):	
function admela_save_settings ( $admela_data , $admela_rfresh = 0 ) {
	global $admela_arrayoptions;
$admela_arrayoptions = array( 'admela_theme_settings' );
	foreach( $admela_arrayoptions as $admela_option ){
		if( isset( $admela_data[$admela_option] )){
			array_walk_recursive( $admela_data[$admela_option] , 'admela_clear_options');
			update_option( $admela_option ,  $admela_data[$admela_option] );
		}		
	}

	if( $admela_rfresh == 2 ) { 	wp_die('2');}
	elseif( $admela_rfresh == 1 ){	wp_die('1');}
}
endif;


/*-----------------------------------------------------------------------------------*/
# Save Options
/*-----------------------------------------------------------------------------------*/

add_action('wp_ajax_admela_theme_data_save', 'admela_save_ajax');
if(! function_exists( 'admela_save_ajax' )):	
function admela_save_ajax() {
	
	check_ajax_referer('admela-theme-data', 'security');
	
	$admela_data = $_POST;

	$admela_rfresh = 1;

	admela_save_settings ( $admela_data , $admela_rfresh );
	
	wp_die();

}
endif;



add_action( 'admin_enqueue_scripts', 'admela_admin_styles_and_scripts' );
if(! function_exists( 'admela_admin_styles_and_scripts' )):	
/**
* Enqueuing some styles and scripts.
*/
function admela_admin_styles_and_scripts() {

$admela_dir_uri =  get_template_directory_uri();

wp_enqueue_style( 'admelabackend_settings', $admela_dir_uri . '/lib/includes/admin/css/admelabackend-settings.css', false, '1.0.0' );


$admela_themecustomcss = "";
$admela_themecustomcss .= " 
#admela_savealert {
	height: 100px;
	width: 200px;
   	position: fixed;
	top: 50%;
	right: 37%;
	z-index: 100;
	-webkit-border-radius: 15px;
	-moz-border-radius: 15px;
	border-radius: 15px;
	display:none;
}\r\n";

$admela_themecustomcss .= "
.admela_savedone {
	display:block !important;
background: rgba(0, 0, 0, .8) url(".$admela_dir_uri."/lib/includes/images/done.png) no-repeat center !important;
}\r\n";

$admela_themecustomcss .= "
.admela_savealertload {
	display:block !important;
background: rgba(0, 0, 0, .8) url(".$admela_dir_uri."/lib/includes/images/loading.gif) no-repeat center !important;
}\r\n";


wp_add_inline_style( 'admelabackend_settings', $admela_themecustomcss);

wp_enqueue_style( 'wp-color-picker');
if(function_exists( 'wp_enqueue_media' )){
    wp_enqueue_media();
}
else{
    wp_enqueue_style('thickbox');
}

// Enqueue javascripts

wp_enqueue_script( 'admelabackend_settingscstmjs', $admela_dir_uri . '/lib/includes/admin/js/admelabackend-settings.js',array('jquery'), null, true );

wp_enqueue_script( 'wp-color-picker');
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');

   	// in JavaScript, object properties are accessed as admelabk_ajaxobject.admela_bkajaxurl
	wp_localize_script( 'admelabackend_settingscstmjs', 'admelabk_ajaxobject',
            array( 'admela_bkajaxurl' => admin_url( 'admin-ajax.php' ),'admelabk_buttontext' => esc_html__('click to enable adrotate options','admela')));
	

}
endif;





    if(! function_exists( 'admela_themesettingsinit' )):
	/**
	* Register Settings
	*/
	function admela_themesettingsinit(){
	register_setting( 'admela_theme_settings', 'admela_theme_settings' );
	}
	endif;
	
	/**
	* Add Actions
	*/
	add_action( 'admin_init', 'admela_themesettingsinit' );
	add_action( 'admin_menu', 'admela_menusettingspage' );
   
    if(! function_exists( 'admela_theme_settings_page' )):

	/**
	* Start the settings page
	*/
	function admela_theme_settings_page() {
		
	if ( ! isset( $_REQUEST['updated'] ) ){	$_REQUEST['updated'] = false;}	//get variables outside scope

	$admela_themeoptionssave='
	<div class="admelapanel-submit">
		<input type="hidden" name="action" value="admela_theme_data_save" />
        <input type="hidden" name="security" value="'. wp_create_nonce("admela-theme-data").'" />
	<input type="submit" name="submit" class="button button-secondary" id="submit" value="'.esc_html__( "Save Changes" , "admela" ).'">
    </div>'; 
	
	$admela_selected = '';		
	$admela_floattype  = '';



/**
* Define Your Variables
*/

$admela_floattype = array('none','left','right');
$admela_floattype1 = array('left','right');

$admela_dir_uri =  get_template_directory_uri();
$admela_bl2pststypes = array('Latest','Random');

$admela_args = array(
'orderby' => 'name',
'order' => 'ASC'
);
$admela_cattypes = get_categories($admela_args);

	if ( !current_user_can( 'manage_options' ) ) return;
	
	function admela_defaults() {
	$admela_options = '';
	return $admela_options;
	}

	if(isset($_POST['reset'])) {
	update_option('admela_theme_settings', admela_defaults() );
	echo '<div class="update-nag admela_updtaenag">
	'.esc_html__('Theme settings have been reset and default values loaded. Please save changes to Continue','admela').'
	</div>'; 
	}	

	//show saved options message
	if ( false !== $_REQUEST['updated'] ) : ?>

<div>
  <p><strong>
    <?php  esc_html_e ( 'Options saved' , 'admela' ); ?>
    </strong></p>
</div>
<?php endif; ?>
<div id="admela_iconoptionsgeneral"></div>
<form class="admelathemesupport" id="admelathemesupport" method="post" action="<?php echo esc_url(admin_url('options.php'));?>">
  <div id="admela_savealert"></div>
  <?php settings_fields( 'admela_theme_settings' ); ?>
  <?php /*** General Settings*/ ?>
  <div id="admela_cssmenu" class="admela_cdtabs">
  <div class="admela_welcome">
    <div class="admela_col1 admela_col2"> <i class="fa fa-cogs"></i>
      <p>
        <?php  esc_html_e ( 'Admela Settings', 'admela' ); //your admin panel title ?>
      </p>
    </div>
    <div class="admela_col1 colver1"><i class="fa fa-trello"></i>
      <p>
        <?php  esc_html_e ( 'Version 1.0', 'admela' ); ?>
      </p>
    </div>
   
  </div>
  <nav>
    <ul class="admela_cdtabsnavigation">
      <li><a data-content="admela-general" class="selected" href="#admela-generalsettings"> <i class="dashicons dashicons-list-view"></i>
        <?php esc_html_e('General Settings','admela'); ?>
        </a></li>
		
    </ul>
    <!-- admela_cdtabsnavigation --> 
  </nav>
  <ul class="admela_cdtabscontent">
    <li data-content="admela-general" class="selected"> <?php echo wp_kses_stripslashes($admela_themeoptionssave); ?>
      <h2>
        <?php  esc_html_e ('General Settings' , 'admela' ); ?>
      </h2>
      <div class="admela_pannelsettings">
      
        <div class="admela_pannelsettingsmain admela_adremoveoption">
			<div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Customize Header Logo,Search box,Container Width,Social Follow Links Section','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Header Logo Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
                        <div class="admela_sectiongap admela_removespace">
							<label for="admela_theme_settings[admela_custom_logo_activestatus]">
								<?php  esc_html_e ( 'Show custom Logo', 'admela' ); ?>
							</label>
							<div class="admela_switch admela_switchstyle">
								<input id="admela_theme_settings[admela_custom_logo_activestatus]" name="admela_theme_settings[admela_custom_logo_activestatus]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_custom_logo_activestatus'))); ?>  />
								<label><i></i></label>
							</div>
						</div>
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_custom_logo]">
						<?php  esc_html_e ( 'Custom logo', 'admela' ); ?>
					</label>
					<input class="admela_custom_logo_url admela_imgpath" type="text" size="70" name="admela_theme_settings[admela_custom_logo]" value="<?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" />
					<input  type="button" class="button admela_customlogo_media_upload" value="<?php  esc_html_e ( 'Upload', 'admela' ); ?>" />
					<p>
						<?php esc_html_e('Recommended Size 300 x 100px','admela'); ?>
					</p>
					<div class="admelabklogo_image"> <img class="admela_custom_logo_image" src="<?php echo esc_url(admela_get_option('admela_custom_logo')); ?>" alt="<?php esc_html_e('image','admela'); ?>"/> </div>					
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Header Search Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">			         
                        <div class="admela_sectiongap admela_gapadjust admela_removespace">
							<label for="admela_theme_settings[admela_hdrsrch]">
								<?php  esc_html_e ( 'Disable Header Search Box:', 'admela' ); ?>
							</label>
							<div class="admela_switch admela_switchstyle">
								<input id="admela_theme_settings[admela_hdrsrch]" name="admela_theme_settings[admela_hdrsrch]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_hdrsrch'))); ?> />
								<label><i></i></label>
							</div>
						</div>              	            
				    </div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Main Container Width Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">			         
                        <label for="admela_theme_settings[wholelayoutwidth]">
							<?php  esc_html_e ( 'Container Width:', 'admela' ); ?>
						</label>
						<input id="admela_theme_settings[wholelayoutwidth]" name="admela_theme_settings[wholelayoutwidth]" type="text" value="<?php echo esc_attr(admela_get_option('wholelayoutwidth')); ?>" />
						<?php esc_html_e('px','admela'); ?>
						<p>
							<?php esc_html_e('Note : Dont write pixels in the above column (eg. 1250)','admela'); ?>
						</p>              	            
				    </div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Header Social Follow Links Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">			         
                    <!-- header social media -->
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_hdfacebook]">
						<?php  esc_html_e ('Header Facebook Url:', 'admela'); ?>
					</label>
					<input class="admela_gapadjust" size="70" id="admela_theme_settings[admela_hdfacebook]" name="admela_theme_settings[admela_hdfacebook]" type="text" value="<?php echo esc_url( admela_get_option('admela_hdfacebook') ); ?>" />
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_hdtwitter]">
						<?php  esc_html_e ('Header Twitter Url:', 'admela'); ?>
					</label>
					<input class="admela_gapadjust" size="70" id="admela_theme_settings[admela_hdtwitter]" name="admela_theme_settings[admela_hdtwitter]" type="text" value="<?php echo esc_url( admela_get_option('admela_hdtwitter') ); ?>" />
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_hdgoogleplus]">
						<?php  esc_html_e ('Header Googleplus Url:', 'admela'); ?>
					</label>
					<input class="admela_gapadjust" size="70" id="admela_theme_settings[admela_hdgoogleplus]" name="admela_theme_settings[admela_hdgoogleplus]" type="text" value="<?php echo esc_url( admela_get_option('admela_hdgoogleplus')  ); ?>" />
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_hdinstagram]">
						<?php  esc_html_e ('Header Instagram Url:', 'admela'); ?>
					</label>
					<input class="admela_moregap" size="70" id="admela_theme_settings[admela_hdinstagram]" name="admela_theme_settings[admela_hdinstagram]" type="text" value="<?php echo esc_url( admela_get_option('admela_hdinstagram')  ); ?>" />
          	        </div>                     
                </div>
            </div>
			</div>
			</div> 
			</div>
			<div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Header Ads Management','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('After Header Ad Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">                 
                      <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_afhdad_act]">
                        <?php  esc_html_e ( 'Enable the After Header Section Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_afhdad_act]" name="admela_theme_settings[admela_afhdad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_afhdad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>  
                      <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_afhdad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'After Header Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_afhdad_code]" name="admela_theme_settings[admela_afhdad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_afhdad_code')); ?></textarea>
                      </div> 
					</div>                     
                </div>
            </div>
			</div>
			</div> 
			</div>
			<div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Customize Home page Slider Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Home page Slider Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
					 <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[hm_slideractive]">
                        <?php  esc_html_e ( 'Enable SliderPost Section', 'admela' ); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[hm_slideractive]" name="admela_theme_settings[hm_slideractive]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('hm_slideractive'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admela_sliderspecl"> <span class="admela_detailsect">
                      <h3>
                        <?php  esc_html_e ('please use anyone of the following methods to display the posts in featuredpostsection','admela'); ?>
                      </h3>
                      </span>
                      <div class="admela_sliderspeclinnr">
                        <div class="admela_optionsinneritem admela_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method1 to display the post using Category name','admela'); ?>
                          </h4>
                          <div class="admela_mthssldinner">
                            <label class="admela_optextrastgs" for="admela_theme_settings[hm_sliderctgs]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admela'); ?>
                            </label>
                            <select id="admela_theme_settings[hm_sliderctgs]" name="admela_theme_settings[hm_sliderctgs]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admela'); ?>
                              </option>
                               <?php 			
								foreach ($admela_cattypes as $admela_option){
								$admela_selected = ((admela_get_option('hm_sliderctgs') == rawurldecode($admela_option->slug) ) ?  'selected="selected"' : ''); 
								?>
                              <option <?php echo esc_attr($admela_selected); ?>><?php echo rawurldecode (!empty($admela_option->slug ) ? $admela_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        </div>
                        <div class="admela_optionsinneritem admela_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method2 to display the post using post ids','admela'); ?>
                          </h4>
                          <div class="admela_mthssldinner">
                            <label class="admela_optextrastgs" for="admela_theme_settings[hm_sliderpstids]">
                              <?php  esc_html_e ( 'Enter the post id to display the post in the featured  section' , 'admela' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the post id like this 32,33,33','admela'); ?>" id="admela_theme_settings[hm_sliderpstids]" name="admela_theme_settings[hm_sliderpstids]" rows="2" cols="100"><?php echo esc_textarea(admela_get_option('hm_sliderpstids')); ?></textarea>
                          </div>
                        </div>
                        <div class="admela_optionsinneritem admela_sldrmthd">
                          <h4>
                            <?php  esc_html_e ('Method3 to display the post using Multiple Category ids','admela'); ?>
                          </h4>
                          <div class="admela_mthssldinner">
                            <label class="admela_optextrastgs" for="admela_theme_settings[hm_sliderctgrsid]">
                              <?php  esc_html_e ( 'Enter the category id to display the post in the featured  section' , 'admela' ); ?>
                            </label>
                            <textarea placeholder="<?php  esc_html_e ('Enter the category id like this 32,33,33','admela'); ?>" id="admela_theme_settings[hm_sliderctgrsid]" name="admela_theme_settings[hm_sliderctgrsid]" rows="2" cols="100"><?php echo esc_textarea(admela_get_option('hm_sliderctgrsid')); ?></textarea>
                          </div>
                        </div>
                      </div>
                      <label for="admela_theme_settings[hm_sliderpostperpage]" class="newstllbl">
                        <?php  esc_html_e ('Enter Post Count ', 'admela'); ?>
                      </label>
                      <input  size="8" id="admela_theme_settings[hm_sliderpostperpage]" name="admela_theme_settings[hm_sliderpostperpage]" type="text" value="<?php echo esc_attr(admela_get_option('hm_sliderpostperpage')); ?>" />
                      <div class="random_content admela_moregap">
                        <label for="admela_theme_settings[hm_sliderrandorlatst]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admela'); ?>
                        </label>
                        <select id="admela_theme_settings[hm_sliderrandorlatst]" name="admela_theme_settings[hm_sliderrandorlatst]">
                          <option value="">
                          <?php  esc_html_e ('Select', 'admela'); ?>
                          </option>
                          <?php 
				foreach ($admela_bl2pststypes as $admela_option){
					$admela_selected = ((admela_get_option('hm_sliderrandorlatst') == $admela_option ) ?  'selected="selected"' : ''); 
					?>
                          <option <?php echo esc_attr($admela_selected); ?>><?php echo (!empty($admela_option) ? $admela_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
					</div>                     
                </div>
            </div>
            </div>
			</div>
			</div> 
			<div class="admela_optsettings_outter"> 
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('After Slider Ads Management','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	 
			  <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
				<div class="admela_optsettings_title admela_optsetgopen">
					<?php esc_html_e('After Slider Section Left Ad Settings','admela'); ?> 
				</div> 
				<div class="admela_optsettings_inner">
				<div class="admela_optinosstngslist">					
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_afsldlftad_act]">
                        <?php  esc_html_e ( 'Enable the After Slider Section Left Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_afsldlftad_act]" name="admela_theme_settings[admela_afsldlftad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_afsldlftad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>  
                    <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_afsldlftad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'After Slider Left Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_afsldlftad_code]" name="admela_theme_settings[admela_afsldlftad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_afsldlftad_code')); ?></textarea>
                       </div>
			
                </div>
				</div>
			  </div>
			  <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
				<div class="admela_optsettings_title admela_optsetgopen">
					<?php esc_html_e('After Slider Section Right Ad Settings','admela'); ?> 
				</div> 
				<div class="admela_optsettings_inner">
				<div class="admela_optinosstngslist">	 
					
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_afsldrgtad_act]">
                        <?php  esc_html_e ( 'Enable the After Slider Section Right Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_afsldrgtad_act]" name="admela_theme_settings[admela_afsldrgtad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_afsldrgtad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>  
                    <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_afsldrgtad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'After Slider Right Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_afsldrgtad_code]" name="admela_theme_settings[admela_afsldrgtad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_afsldrgtad_code')); ?></textarea>
                       </div>
					
				</div>
				</div>
			  </div>
			</div>
			</div>
		    <div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Customize Home Category,Latest Post Section Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Home Category Section Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
                        <div class="random_content random_contentstyle1">
                            <label for="admela_theme_settings[hm_catbx1name]">
                              <?php  esc_html_e ('Select the Categories to display the post in featuredpost section', 'admela'); ?>
                            </label>
                            <select class="admela_bkselect" id="admela_theme_settings[hm_catbx1name]" name="admela_theme_settings[hm_catbx1name]">
                              <option value="">
                              <?php  esc_html_e ('select the categories','admela'); ?>
                              </option>
                              <?php 
			
				foreach ($admela_cattypes as $admela_option){
					$admela_selected = ((admela_get_option('hm_catbx1name') == rawurldecode($admela_option->slug) ) ?  'selected="selected"' : ''); 
					?>
                              <option <?php echo esc_attr($admela_selected); ?>><?php echo rawurldecode (!empty($admela_option->slug ) ? $admela_option->slug : ''); ?></option>
                              <?php }?>
                            </select>
                          </div>
                        <div class="random_content random_contentstyle1">
                        <label for="admela_theme_settings[hm_catbx1subtittxt]">
                          <?php  esc_html_e ('Enter the Category Section Subtitle text', 'admela'); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Category Section Subtitle text Here', 'admela' ); ?>" id="admela_theme_settings[hm_catbx1subtittxt]" name="admela_theme_settings[hm_catbx1subtittxt]" rows="2" cols="68"><?php echo esc_textarea(admela_get_option('hm_catbx1subtittxt')); ?></textarea>
                    </div>  
                        <div class="random_content random_contentstyle1">
                        <label for="admela_theme_settings[hm_catbx1rpst]">
                          <?php  esc_html_e ('Choose the random (or) latest to display post', 'admela'); ?>
                        </label>
                        <select id="admela_theme_settings[hm_catbx1rpst]" name="admela_theme_settings[hm_catbx1rpst]">
                          <option value="">
							<?php  esc_html_e ('Select', 'admela'); ?>
                          </option>
                          <?php 
							foreach ($admela_bl2pststypes as $admela_option){
							$admela_selected = ((admela_get_option('hm_catbx1rpst') == $admela_option ) ?  'selected="selected"' : ''); 
						  ?>
                          <option <?php echo esc_attr($admela_selected); ?>><?php echo (!empty($admela_option) ? $admela_option : ''); ?></option>
                          <?php } ?>
                        </select>
                      </div>					
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Home Page Latest Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">			         
                    <div class="random_content random_contentstyle1">
                        <label for="admela_theme_settings[hm_latesttittxt]">
                          <?php  esc_html_e ('Enter the Latest Post Section title text', 'admela'); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Latest Post Section title text Here', 'admela' ); ?>" id="admela_theme_settings[hm_latesttittxt]" name="admela_theme_settings[hm_latesttittxt]" rows="2" cols="68"><?php echo esc_textarea(admela_get_option('hm_latesttittxt')); ?></textarea>
                    </div> 
                    <div class="random_content random_contentstyle1">
                        <label for="admela_theme_settings[hm_latestsubtittxt]">
                          <?php  esc_html_e ('Enter the Latest Post Section Subtitle text', 'admela'); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Latest Post Section Subtitle text Here', 'admela' ); ?>" id="admela_theme_settings[hm_latestsubtittxt]" name="admela_theme_settings[hm_latestsubtittxt]" rows="2" cols="68"><?php echo esc_textarea(admela_get_option('hm_latestsubtittxt')); ?></textarea>
                    </div>	            
				    </div>                     
                </div>
            </div>
			</div>
			</div> 
			</div>
			<div class="admela_optsettings_outter">
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Home Page Catboxes Ads Management','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">
			<div class="admela_optsettings_outter admela_optsettings_nwoutter">
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('After the Cat Box Post Sections Ad Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">			  
                <div class="admela_headerad_firstsection">  
                  <div class="admela_optinosstngslist">
                   
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_lyt1ct1sn1afpstad_act]">
                        <?php  esc_html_e ( 'Enable After the Cat Box Post Sections Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_lyt1ct1sn1afpstad_act]" name="admela_theme_settings[admela_lyt1ct1sn1afpstad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_lyt1ct1sn1afpstad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>           
				    <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_lyt1ct1sn1afpstad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'Post Sections Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_lyt1ct1sn1afpstad_code]" name="admela_theme_settings[admela_lyt1ct1sn1afpstad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_lyt1ct1sn1afpstad_code')); ?></textarea>
                    </div>                                          
					</div>                                 
                </div>  
			</div>
			</div>
			</div>
			</div>
			<div class="admela_optsettings_outter">
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Latest Articles Ads Management','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">
			<div class="admela_optsettings_outter admela_optsettings_nwoutter">       
				<div class="admela_optsettings_title admela_optsetgopen">
					<?php esc_html_e('After the Latest Post Sections Ad Settings','admela'); ?> 
				</div>
				<div class="admela_optsettings_inner">			  
				<div class="admela_headerad_firstsection">                
                                 
                  <div class="admela_optinosstngslist">
                    
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_lyt1latstafpstad_act]">
                        <?php  esc_html_e ( 'Enable After the Latest Post Sections Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_lyt1latstafpstad_act]" name="admela_theme_settings[admela_lyt1latstafpstad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_lyt1latstafpstad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>           
				   <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_lyt1latstafpstad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'Latest Post Sections Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_lyt1latstafpstad_code]" name="admela_theme_settings[admela_lyt1latstafpstad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_lyt1latstafpstad_code')); ?></textarea>
                       						
					</div>                                 
                </div>  
				</div>
				</div> 
			
			</div>
			</div>
            </div>	
            <div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Customize Post/Page Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Post FeaturedImage,Byline Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
					 <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_dsftdimg]">
                <?php  esc_html_e ( 'Disable Featured Image', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_dsftdimg]" name="admela_theme_settings[admela_dsftdimg]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_dsftdimg'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_ebylfp]">
                <?php  esc_html_e ( 'Disable By Line', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_ebylfp]" name="admela_theme_settings[admela_ebylfp]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ebylfp'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_ppostedby]">
                <?php  esc_html_e ( 'Disable Posted by', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_ppostedby]" name="admela_theme_settings[admela_ppostedby]" type="checkbox" value="1" <?php checked( '1', ( admela_get_option('admela_ppostedby'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_ppostedon]">
                <?php  esc_html_e ( 'Disable Posted On' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_ppostedon]" name="admela_theme_settings[admela_ppostedon]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ppostedon'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_ppostedtime]">
                <?php  esc_html_e ( 'Disable Posted Time' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_ppostedtime]" name="admela_theme_settings[admela_ppostedtime]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ppostedtime'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_pcategory]">
                <?php  esc_html_e ( 'Disable Category' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_pcategory]" name="admela_theme_settings[admela_pcategory]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_pcategory'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_gapadjust admela_removespace">
              <label for="admela_theme_settings[admela_dsebyvw]">
                <?php  esc_html_e ( 'Disable Views Count', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_dsebyvw]" name="admela_theme_settings[admela_dsebyvw]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_dsebyvw'))); ?> />
                <label><i></i></label>
              </div>
            </div>
					</div>                     
                </div>
            </div>
            <div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Page FeaturedImage,Byline Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
					<div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_ebylfpage]">
                <?php  esc_html_e ( 'Show By Line' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_ebylfpage]" name="admela_theme_settings[admela_ebylfpage]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ebylfpage'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[padmela_ppostedby]">
                <?php  esc_html_e ( 'Show Posted by', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[padmela_ppostedby]" name="admela_theme_settings[padmela_ppostedby]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('padmela_ppostedby'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[padmela_ppostedon]">
                <?php  esc_html_e ( 'Show Posted On' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[padmela_ppostedon]" name="admela_theme_settings[padmela_ppostedon]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('padmela_ppostedon')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_gapadjust admela_removespace">
              <label for="admela_theme_settings[padmela_ppview]">
                <?php  esc_html_e ( 'Show Views Count' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[padmela_ppview]" name="admela_theme_settings[padmela_ppview]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('padmela_ppview')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
           
           
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Breadcrumbs Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
					  
					  <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_breadcrumb_post]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Posts', 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_breadcrumb_post]" name="admela_theme_settings[admela_breadcrumb_post]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_breadcrumb_post'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_breadcrumb_pages]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Pages' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_breadcrumb_pages]" name="admela_theme_settings[admela_breadcrumb_pages]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_breadcrumb_pages') ) ); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_sectiongap admela_removespace">
              <label for="admela_theme_settings[admela_breadcrumb_archives]">
                <?php  esc_html_e ( 'Show Breadcrumbs On Archives' , 'admela'); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_breadcrumb_archives]" name="admela_theme_settings[admela_breadcrumb_archives]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_breadcrumb_archives')) ); ?> />
                <label><i></i></label>
              </div>
            </div>
           
           
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Post Socialshare Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
					 <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_active_postsocialshare]">
                <?php  esc_html_e ( 'Enable Post Social share' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_active_postsocialshare]" name="admela_theme_settings[admela_active_postsocialshare]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_active_postsocialshare'))); ?>  />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialfb]">
                <?php  esc_html_e ( 'Enable Facebook:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialfb]" name="admela_theme_settings[admela_postsocialfb]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialfb'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialfblike]">
                <?php  esc_html_e ( 'Enable Facebook Like Button:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialfblike]" name="admela_theme_settings[admela_postsocialfblike]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialfblike'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace admela_removespace">
              <label for="admela_theme_settings[admela_postsocialtwitter]">
                <?php  esc_html_e ( 'Enable Twitter:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialtwitter]" name="admela_theme_settings[admela_postsocialtwitter]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialtwitter'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialgplus]">
                <?php  esc_html_e ( 'Enable Gplus :' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialgplus]" name="admela_theme_settings[admela_postsocialgplus]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialgplus'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsociallinkedin]">
                <?php  esc_html_e ( 'Enable Linkedin:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsociallinkedin]" name="admela_theme_settings[admela_postsociallinkedin]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsociallinkedin'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialpinterest]">
                <?php  esc_html_e ( 'Enable Pinterest:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialpinterest]" name="admela_theme_settings[admela_postsocialpinterest]" type="checkbox" value="1" <?php checked( '1', ( admela_get_option('admela_postsocialpinterest'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialbuffer]">
                <?php  esc_html_e ( 'Enable Buffer:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialbuffer]" name="admela_theme_settings[admela_postsocialbuffer]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialbuffer'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialstumble]">
                <?php  esc_html_e ( 'Enable Stumbleupon:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialstumble]" name="admela_theme_settings[admela_postsocialstumble]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialstumble'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialredit]">
                <?php  esc_html_e ( 'Enable Reddit:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialredit]" name="admela_theme_settings[admela_postsocialredit]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialredit'))); ?> />
                <label><i></i></label>
              </div>
            </div>
            <div class="admela_optionsset admela_gapadjust admela_optionsset1 admela_removespace">
              <label for="admela_theme_settings[admela_postsocialwhatsapp]">
                <?php  esc_html_e ( 'Enable Whatsapp:' , 'admela' ); ?>
              </label>
              <div class="admela_switch admela_switchstyle">
                <input id="admela_theme_settings[admela_postsocialwhatsapp]" name="admela_theme_settings[admela_postsocialwhatsapp]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postsocialwhatsapp'))); ?> />
                <label><i></i></label>
              </div>
            </div>
           
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Related Post By Category Or Tag Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
			      
                        <div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela-enable-related-post-by-category]">
              <?php  esc_html_e ( 'Disable Related Post By Category:', 'admela' ); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela-enable-related-post-by-category]" name="admela_theme_settings[admela-enable-related-post-by-category]" type="checkbox" value="1" <?php checked( '1', ( admela_get_option('admela-enable-related-post-by-category') )); ?> />
              <label><i></i></label>
            </div>
          </div>
						<div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_relatedpostbycategorycount]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post Count:' , 'admela'); ?>
            </label>
            <input id="admela_theme_settings[admela_relatedpostbycategorycount]" name="admela_theme_settings[admela_relatedpostbycategorycount]" type="text" size="7" value="<?php echo esc_attr(admela_get_option('admela_relatedpostbycategorycount')); ?>" class="admela_rldpstcnt"/>
          </div>
						<div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_choserd1]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post order:' , 'admela'); ?>
            </label>
            <select class="admela_rldpstcnt" name="admela_theme_settings[admela_choserd1]" id="admela_theme_settings[admela_choserd1]">
              <option value="">
              <?php  esc_html_e ('--select--','admela'); ?>
              </option>
              <option value="<?php esc_html_e('latest','admela')?>" <?php selected( esc_attr(admela_get_option('admela_choserd1')), "latest" ); ?>>
              <?php esc_html_e('latest','admela')?>
              </option>
              <option value="<?php esc_html_e('random','admela')?>" <?php selected( esc_attr(admela_get_option('admela_choserd1')), "random" ); ?>>
              <?php esc_html_e('random','admela')?>
              </option>
            </select>
          </div>
						<div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela-enable-related-post-by-tag]">
              <?php  esc_html_e ( 'Enable Related Post By Tag:', 'admela' ); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela-enable-related-post-by-tag]" name="admela_theme_settings[admela-enable-related-post-by-tag]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela-enable-related-post-by-tag'))); ?> />
              <label><i></i></label>
            </div>
          </div>
						<div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_choserd2]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post order:' , 'admela'); ?>
            </label>
            <select class="admela_rldpstcnt" name="admela_theme_settings[admela_choserd2]" id="admela_theme_settings[admela_choserd2]">
              <option value="">
              <?php  esc_html_e ('--select--','admela'); ?>
              </option>
              <option value="<?php esc_html_e('date','admela')?>" <?php selected( esc_attr(admela_get_option('admela_choserd2')), "latest" ); ?>>
              <?php esc_html_e('latest','admela')?>
              </option>
              <option value="<?php esc_html_e('rand','admela')?>" <?php selected( esc_attr(admela_get_option('admela_choserd2')), "random" ); ?>>
              <?php esc_html_e('random','admela')?>
              </option>
            </select>
          </div>
						<div class="admela_gapadjust admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_relatedpostbytagcount]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'Related Post Count:', 'admela' ); ?>
            </label>
            <input id="admela_theme_settings[admela_relatedpostbytagcount]" name="admela_theme_settings[admela_relatedpostbytagcount]" type="text" size="7" value="<?php echo esc_attr(admela_get_option('admela_relatedpostbytagcount')); ?>" class="admela_rldpstcnt"/>
          </div>
                    
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Pagination Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
			      
                        <div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_snglpaginationpn]">
              <?php  esc_html_e ( 'Disable Single Post Previous / Next Pagination' , 'admela'); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela_snglpaginationpn]" name="admela_theme_settings[admela_snglpaginationpn]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_snglpaginationpn'))); ?> />
              <label><i></i></label>
            </div>
          </div>
		  <div class="admela_sectiongap admela_removespace" style="border-bottom: 0px solid #F8F8F8;">
            <label for="admela_theme_settings[admela_preposttrnstxt]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'PrevPost Translation Text', 'admela' ); ?>
            </label>
            <input id="admela_theme_settings[admela_preposttrnstxt]" name="admela_theme_settings[admela_preposttrnstxt]" type="text" size="20" value="<?php echo esc_attr(admela_get_option('admela_preposttrnstxt')); ?>" class="admela_rldpstcnt"/>
          </div>
		  <div class="admela_sectiongap admela_removespace" style="border-bottom: 0px solid #F8F8F8;">
            <label for="admela_theme_settings[admela_nxtposttrnstxt]" class="admela_thmnwbkndstngs">
              <?php  esc_html_e ( 'NextPost Translation Text', 'admela' ); ?>
            </label>
            <input id="admela_theme_settings[admela_nxtposttrnstxt]" name="admela_theme_settings[admela_nxtposttrnstxt]" type="text" size="20" value="<?php echo esc_attr(admela_get_option('admela_nxtposttrnstxt')); ?>" class="admela_rldpstcnt"/>
          </div>
          <div class="admela_sectiongap admela_removespace admela_themvmlnlin">
            <label for="admela_theme_settings[admela_hmpgpaginationno]">
              <?php  esc_html_e ( 'Disable Home Page Pagination With Number', 'admela' ); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela_hmpgpaginationno]" name="admela_theme_settings[admela_hmpgpaginationno]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_hmpgpaginationno'))); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admela_sectiongap admela_gapadjust admela_removespace admela_themvmlnlin">
            <label for="admela_theme_settings[admela_hmpgpgnextprev]">
              <?php  esc_html_e ( 'Enable Home Page Previous/Next Pagination', 'admela' ); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela_hmpgpgnextprev]" name="admela_theme_settings[admela_hmpgpgnextprev]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_hmpgpgnextprev'))); ?> />
              <label><i></i></label>
            </div>
          </div>
           
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Comments Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
			           <div class="admela_sectiongap admela_removespace">
            <label for="admela_theme_settings[admela_commentspost]">
              <?php  esc_html_e ( 'Disable Comments on posts?', 'admela' ); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela_commentspost]" name="admela_theme_settings[admela_commentspost]" type="checkbox" value="1" <?php checked( '1', ( admela_get_option('admela_commentspost'))); ?> />
              <label><i></i></label>
            </div>
          </div>
          <div class="admela_sectiongap admela_gapadjust admela_removespace">
            <label for="admela_theme_settings[admela_commentspage]">
              <?php  esc_html_e ( 'Disable Comments on pages?' , 'admela'); ?>
            </label>
            <div class="admela_switch admela_switchstyle">
              <input id="admela_theme_settings[admela_commentspage]" name="admela_theme_settings[admela_commentspage]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_commentspage'))); ?> />
              <label><i></i></label>
            </div>
          </div>
					</div>                     
                </div>
            </div>
			</div>
			</div>
			</div> 
			<div class="admela_optsettings_outter">			
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Single Post Content Ads Management','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">
			<div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Single Post Content Top Ad Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">			  
              <div class="admela_headerad_firstsection">  
                  <div class="admela_optinosstngslist">                   
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_postpgtpad_act]">
                        <?php  esc_html_e ( 'Enable the Post Content Top Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_postpgtpad_act]" name="admela_theme_settings[admela_postpgtpad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postpgtpad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>
                    <div class="admela_optionsinneritem admela_sectiongap admela_sctnhdng admela_removespace admela_vmlspcl4">
                        <label for="admela_theme_settings[admela_postpgtpadalign]">
                          <?php  esc_html_e ('Choose Content Top Ad Position', 'admela'); ?>
                        </label>
                        <select class="admela_adstaticsrgt" id="admela_theme_settings[admela_postpgtpadalign]" name="admela_theme_settings[admela_postpgtpadalign]">
                          <option value="">
                          <?php  esc_html_e ('none', 'admela'); ?>
                          </option>
                          <?php 
							foreach ($admela_floattype1 as $admela_option){
							$admela_selected = ((admela_get_option('admela_postpgtpadalign') == $admela_option ) ?  'selected="selected"' : ''); 
						  ?>
                          <option <?php echo esc_attr($admela_selected); ?>><?php echo (!empty($admela_option) ? $admela_option : ''); ?></option>
                          <?php } ?>
                        </select>
					</div>					
				    <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_postpgtpad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'Post Content Top Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_postpgtpad_code]" name="admela_theme_settings[admela_postpgtpad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_postpgtpad_code')); ?></textarea>
                                               
					</div>  
				</div>
			  </div>	
			</div>	       		
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Single Post Content Bottom Ad Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">			  
              <div class="admela_headerad_firstsection">  
                  <div class="admela_optinosstngslist">                   
                    <div class="admela_sectiongap admela_removespace">
                      <label for="admela_theme_settings[admela_postpgbtmad_act]">
                        <?php  esc_html_e ( 'Enable the Post Content Bottom Ad' , 'admela'); ?>
                      </label>
                      <div class="admela_switch admela_switchstyle">
                        <input id="admela_theme_settings[admela_postpgbtmad_act]" name="admela_theme_settings[admela_postpgbtmad_act]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_postpgbtmad_act'))); ?> />
                        <label><i></i></label>
                      </div>
                    </div>                    				
				    <div class="admela_optionsinneritem admela_sectiongap admela_newgapsectn admela_removespace admela_vmlspcl2" id="admela_adacordnhash1">
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_postpgbtmad_code]" class="admela_vmlspcl11">
                          <?php  esc_html_e ( 'Post Content Bottom Ad ( Html & Google Ad Code )', 'admela' ); ?>
                        </label>
                        <textarea placeholder="<?php  esc_html_e ( 'Paste the Html & Google Ad Code Here', 'admela' ); ?>" id="admela_theme_settings[admela_postpgbtmad_code]" name="admela_theme_settings[admela_postpgbtmad_code]" rows="6" cols="68"><?php echo esc_textarea(admela_get_option('admela_postpgbtmad_code')); ?></textarea>
                    </div>                                 
                </div>  
				</div>
			</div>
			</div>
		    </div>	
		    </div>
	        <div class="admela_optsettings_outter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Customize Footer Logo,About us,Attribution Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner admela_optsettings_nwinner">	            	
            <div class="admela_optsettings_outter admela_optsettings_nwoutter">       
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Footer Logo,About us Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">
                    <div class="admela_sectiongap admela_removespace">
					<label for="admela_theme_settings[admela_ftrcustom_logoactivestatus]">
					<?php  esc_html_e ( 'Show Footer Custom Logo', 'admela' ); ?>
					</label>
					<div class="admela_switch admela_switchstyle">
					<input id="admela_theme_settings[admela_ftrcustom_logoactivestatus]" name="admela_theme_settings[admela_ftrcustom_logoactivestatus]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ftrcustom_logoactivestatus'))); ?>  />
					<label><i></i></label>
					</div>
					</div>
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_ftrcustomlogo]">
						<?php  esc_html_e ( 'Footer Custom Logo And Footer Content', 'admela' ); ?>
					</label>
					<input class="admela_ftrcustomlogo" type="text" size="70" name="admela_theme_settings[admela_ftrcustomlogo]" value="<?php echo esc_url(admela_get_option('admela_ftrcustomlogo')); ?>" />
					<input  type="button" class="button admela_ftr_customlogomediaupload" value="<?php  esc_html_e ( 'Upload', 'admela' ); ?>" />
					<p>
						<?php esc_html_e('Recommended Size 200 x 60px','admela'); ?>
					</p>
					<div class="admelabkftrlogo_image"> <img class="admela_ftrcustom_image" src="<?php echo esc_url(admela_get_option('admela_ftrcustomlogo')); ?>" alt="<?php esc_html_e('image','admela'); ?>"/> </div>
					<?php /*Logo*/?>
					<div class="admela_sectiongap admela_removespace">
					<label for="admela_theme_settings[admela_ftrsitetit_active]">
						<?php  esc_html_e ( 'Disable Footer Site Title', 'admela' ); ?>
					</label>
					<div class="admela_switch admela_switchstyle">
						<input id="admela_theme_settings[admela_ftrsitetit_active]" name="admela_theme_settings[admela_ftrsitetit_active]" type="checkbox" value="1" <?php checked( '1', (admela_get_option('admela_ftrsitetit_active'))); ?>  />
						<label><i></i></label>
					</div>
					</div>
					<label class="admela_optextrastgs" for="admela_theme_settings[admela_ftrabtuscontenttext]">
						<?php  esc_html_e ('Footer About us Content:', 'admela'); ?>
					</label>
					<textarea class="admela_moregap" placeholder="<?php esc_html_e('Change your About us Content text','admela'); ?>" id="admela_theme_settings[admela_ftrabtuscontenttext]" name="admela_theme_settings[admela_ftrabtuscontenttext]" rows="4" cols="68"><?php echo esc_textarea(admela_get_option('admela_ftrabtuscontenttext')); ?></textarea>
        
					</div>                     
                </div>
            </div>
			<div class="admela_optsettings_title admela_optsetgopen">
				<?php esc_html_e('Footer Copyrights Settings','admela'); ?> 
			</div>
			<div class="admela_optsettings_inner">				
                <div class="admela_headerad_firstsection">                   
				    <div class="admela_optinosstngslist">			         
                        <label class="admela_optextrastgs" for="admela_theme_settings[admela_focopyrightscontent]">
							<?php  esc_html_e ('Footer Copyrights Content:', 'admela'); ?>
						</label>
						<textarea class="admela_moregap" placeholder="<?php esc_html_e('Change your footer attribution text','admela'); ?>" id="admela_theme_settings[admela_focopyrightscontent]" name="admela_theme_settings[admela_focopyrightscontent]" rows="4" cols="68"><?php echo esc_textarea(admela_get_option('admela_focopyrightscontent')); ?></textarea>
 	                </div>                     
                </div>
            </div>
			</div>
			</div> 
		</div>
		</div>
		
	  </div>
      <?php echo wp_kses_stripslashes($admela_themeoptionssave); ?> </li>

    
  </ul>
</form>
<form method="post" action="#" class="rest_btn">
  <p class="submit admela_thembkdsubmittopnew">
    <input name="reset" class="button button-secondary" type="submit" value="<?php  esc_html_e ( 'Reset to theme default settings' , 'admela' ); ?>" onclick="return confirm('<?php echo esc_js( esc_html__('Are you sure you want to reset?', 'admela') ); ?>');"/>
    <input type="hidden" name="action" value="<?php  esc_html_e ( 'reset' , 'admela' ); ?>" />
  </p>
</form>
</div>

<!-- END wrap -->
<?php 
}	
endif;

