<?php
/**
 * Simple Catch Theme Options
 *
 * @package WordPress
 * @subpackage Simple_Catch
 * @since Simple Catch 1.0
 */

 
/**
 * Enqueue admin script
 *
 * @uses wp_enqueue_script 
 * @Calling jquery, jquery-ui-tabs,jquery-cookie, jquery-ui-sortable, jquery-ui-draggable
 */
function simplecatch_admin_scripts() {
	//jquery-cookie registered in functions.php
	wp_enqueue_script( 'simplecatch_admin', get_template_directory_uri().'/functions/panel/admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ), '1.0', false );
	wp_enqueue_script( 'simplecatch_upload', get_template_directory_uri().'/functions/panel/add_image_scripts.js', array( 'jquery','media-upload','thickbox' ) );
}
 

/**
 * Enqueue admin stylesheet
 *
 * @uses wp_enqueue_style
 */
function simplecatch_admin_styles() {
	wp_enqueue_style( 'simplecatch_admin',get_template_directory_uri().'/functions/panel/admin.css', array(), '1.0', 'screen' );
	//Enqueue thickbox.css
	wp_enqueue_style( 'thickbox' );
}


/*
 * Create a function for Theme Options Page
 *
 * @uses add_menu_page
 * @add action admin_menu 
 */
add_action( 'admin_menu', 'simplecatch_options_menu' );
function simplecatch_options_menu() {
	
	$simplecatch_options = add_theme_page( 
		sprintf( esc_html__( '%s Theme Options', 'simplecatch' ), get_bloginfo( 'name') ), // Name of page
		__( 'Theme Options', 'simplecatch' ),	// Label in menu
		'edit_theme_options', 					// Capability required
		'simplecatch_options', 					// Menu slug, used to uniquely identify the page
		'simplecatch_options_page'				// Function that renders the options page
	);						
	
	$slider_options = add_theme_page( 
		sprintf( esc_html__( '%s Slider', 'simplecatch' ), get_bloginfo( 'name') ), // Name of page
		__( 'Featured Slider', 'simplecatch' ),	// Label in menu
		'edit_theme_options', 					// Capability required
		'simplecatch_options_slider', 			// Menu slug, used to uniquely identify the page
		'simplecatch_options_slider_page'		// Function that renders the options page
	);
			
	// admin_print_scripts-(hookname) and add_print_styles-(hookname)
	add_action( 'admin_print_scripts-' . $simplecatch_options, 'simplecatch_admin_scripts' );
	add_action( 'admin_print_styles-' . $simplecatch_options, 'simplecatch_admin_styles' );
	
	// admin_print_scripts-(hookname) and add_print_styles-(hookname)
	add_action( 'admin_print_scripts-' . $slider_options, 'simplecatch_admin_scripts' );
	add_action( 'admin_print_styles-' . $slider_options, 'simplecatch_admin_styles' );
}
add_action( 'admin_menu', 'simplecatch_options_menu' );

/*
 * Register options and validation callbacks
 *
 * @uses register_setting
 * @action admin_init
 */
function simplecatch_register_settings(){
	register_setting( 'simplecatch_options', 'simplecatch_options', 'simplecatch_options_validation' );
	register_setting( 'simplecatch_options_slider', 'simplecatch_options_slider', 'simplecatch_options_validation' );
}
add_action( 'admin_init', 'simplecatch_register_settings' );

/*
 * Render Simple Catch Theme Options page
 *
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function simplecatch_options_page() {
?>
	<div class="wrap">
    	
    	<form method="post" action="options.php">
			<?php
                settings_fields( 'simplecatch_options' );
                $options = get_option( 'simplecatch_options' );
                
                if( is_array( $options ) && ( !array_key_exists( 'slider_qty', $options ) || !is_numeric( $options[ 'slider_qty' ] ) ) ) $options[ 'slider_qty' ] = 4;
                elseif( !is_array( $options ) ) $options = array( 'slider_qty' => 4);
				
            ?>   
            <h2><?php bloginfo( 'name' ) ._e( ' Theme Options By ', 'simplecatch' ); ?><a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a></h2>
            
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                    <div class="updated" id="message">
                        <p><strong><?php _e( 'Settings saved.', 'simplecatch' );?></strong></p>
                    </div>
            <?php endif; ?>
            
            <div id="simplecatch_ad_tabs">
                <ul class="tabNavigation" id="mainNav">
                    <li><a href="#faq"><?php _e( 'FAQ', 'simplecatch' );?></a></li>
                    <li><a href="#logo"><?php _e( 'Logo', 'simplecatch' );?></a></li>
                    <li><a href="#favicon"><?php _e( 'Fav Icon', 'simplecatch' );?></a></li>
                    <li><a href="#socialicons"><?php _e( 'Social Icons', 'simplecatch' );?></a></li>
                    <li><a href="#customstyle"><?php _e( 'Custom CSS Styles', 'simplecatch' );?></a></li>
                   	<li><a href="#webmaster"><?php _e( 'Webmaster Tools', 'simplecatch' );?></a></li>
                </ul><!-- .tabsNavigation #mainNav -->
                
                <div id="faq">
                   <?php 
                    //Displays FAQ information witten in simplecatch_faq of simplecatch_functions.php 
                     if( function_exists( 'simplecatch_faq' ) ): 
					 	simplecatch_faq(); 
					 endif;
                     ?>                
              	</div><!-- #faq -->
                   
                <!-- Option for changing the header logo -->
                <div id="logo">
                    <h2><?php _e( 'Logo options', 'simplecatch' ); ?></h2> 
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Disable Header Logo:', 'simplecatch' ); ?></h4></th>
                                <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_header_logo]" value="1" <?php isset($options['remove_header_logo']) ? checked( '1', $options['remove_header_logo'] ) : checked('0', '1'); ?> /></td>
                            </tr>
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Header logo url:', 'simplecatch' ); ?></h4></th>
                                <td>
                                    <?php  if ( !empty ( $options[ 'featured_logo_header' ] ) ) { ?>
                                        <input size="65" type="text" name="simplecatch_options[featured_logo_header]" value="<?php if( isset( $options [ 'featured_logo_header' ] ) ) echo esc_attr( $options [ 'featured_logo_header' ], 'simplecatch' ); ?>" class="upload" />
                                         <?php } else { ?>
                                         <input size="65" type="text" name="simplecatch_options[featured_logo_header]" value="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" />
                                         <?php }  ?>
                                        
                                        <input class="upload-button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Header Logo','simplecatch' ); ?>" />
                                </td>
                            </tr> 
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Preview:', 'simplecatch' ); ?></h4></th>
                                <td>              
                                    <?php 
                                        if ( !empty( $options[ 'featured_logo_header' ] ) ) { 
                                            echo '<img src="'.esc_url( $options[ 'featured_logo_header' ] ).'" alt="logo"/>';
                                        } else {
                                            echo '<img src="'. get_template_directory_uri().'/images/logo.png" alt="logo" />';
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="form-table">
                        <tbody>
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Disable Footer Logo:', 'simplecatch' ); ?></h4></th>
                                <td><input type="checkbox" id="headerlogo" name="simplecatch_options[remove_footer_logo]" value="1" <?php isset($options['remove_footer_logo']) ? checked( '1', $options['remove_footer_logo'] ) : checked('0', '1'); ?> /></td>
                            </tr>
                            <tr>   
                                <th scope="row"><h4><?php _e( 'Footer logo url: ', 'simplecatch' ); ?></h4></th>
                                <td>
                                    <?php  if ( !empty ( $options[ 'featured_logo_footer' ] ) ) { ?>
                                        <input size="65" type="text" name="simplecatch_options[featured_logo_footer]" value="<?php if( isset( $options[ 'featured_logo_footer' ] ) ) echo esc_attr( $options[ 'featured_logo_footer' ] ); ?>" class="upload" />
                                    <?php } else { ?>
                                        <input size="65" type="text" name="simplecatch_options[featured_logo_footer]" value="<?php echo get_template_directory_uri(); ?>/images/logo-foot.png" alt="logo" />
                                    <?php }  ?>                            
                                        <input class="upload-button button" name="wsl-image-add" type="button" value="Change Footer Logo" />  
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Preview: ', 'simplecatch' ); ?></h4></th>
                                <td>                     
                                    <?php 
                                        if ( !empty( $options[ 'featured_logo_footer' ] ) ) { 
                                            echo '<img src="'.esc_url( $options[ 'featured_logo_footer' ] ).'" alt="logo"/>';
                                        } else {
                                            echo '<img src="'. get_template_directory_uri().'/images/logo-foot.png" alt="logo" />';
                                        }
                                    ?>
                                 </td>
                            </tr>
                        </tbody>
                    </table>
                     <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                </div> <!-- #logo -->
              
				<div id="favicon">
              		<h2><?php _e( 'Fav icon options', 'simplecatch' ); ?></h2> 
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Disable Favicon:', 'simplecatch' ); ?></h4></th>
                                <td><input type="checkbox" id="favicon" name="simplecatch_options[remove_favicon]" value="1" <?php isset($options['remove_favicon']) ? checked( '1', $options['remove_favicon'] ) : checked('0', '1'); ?> /></td>
                            </tr>
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Fav Icon URL:', 'simplecatch' ); ?></h4></th>
                                <td><?php if ( !empty ( $options[ 'fav_icon' ] ) ) { ?>
                                        <input size="65" type="text" name="simplecatch_options[fav_icon]" value="<?php if( isset( $options [ 'fav_icon' ] ) ) echo esc_attr( $options [ 'fav_icon' ] ); ?>" class="upload" />
                                    <?php } else { ?>
                                        <input size="65" type="text" name="simplecatch_options[fav_icon]" value="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="fav" />
                                    <?php }  ?> 
                                    <input class="upload-button button" name="wsl-image-add" type="button" value="<?php esc_attr_e( 'Change Fav Icon','simplecatch' );?>" />
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><h4><?php _e( 'Preview: ', 'simplecatch' ); ?></h4></th>
                                <td> 
                                    <?php 
                                        if ( !empty( $options[ 'fav_icon' ] ) ) { 
                                            echo '<img src="'.esc_url( $options[ 'fav_icon' ] ).'" alt="fav" />';
                                        } else {
                                            echo '<img src="'. get_template_directory_uri().'/images/favicon.ico" alt="fav" />';
                                        }
                                    ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
					<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
      			</div> <!-- #favicon -->
                
				<div id="socialicons">
                    <h2><?php _e( 'Social Icons', 'simplecatch' ); ?></h2>                 
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Facebook', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_facebook]" value="<?php if( isset( $options[ 'social_facebook' ] ) ) echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Twitter', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_twitter]" value="<?php if ( isset( $options[ 'social_twitter' ] ) ) echo esc_url( $options[ 'social_twitter'] ); ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Google+', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_googleplus]" value="<?php if ( isset( $options[ 'social_googleplus' ] ) ) echo esc_url( $options[ 'social_googleplus'] ); ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Pinterest', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_pinterest]" value="<?php if ( isset( $options[ 'social_pinterest' ] ) ) echo esc_url( $options[ 'social_pinterest'] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Youtube', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_youtube]" value="<?php if ( isset( $options[ 'social_youtube' ] ) ) echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Vimeo', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_vimeo]" value="<?php if ( isset( $options[ 'social_vimeo' ] ) ) echo esc_url( $options[ 'social_vimeo' ] ); ?>" />
                                </td>
                            </tr>
                            
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Linkedin', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_linkedin]" value="<?php if ( isset( $options[ 'social_linkedin' ] ) ) echo esc_url( $options[ 'social_linkedin'] ); ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Slideshare', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_slideshare]" value="<?php if ( isset( $options[ 'social_slideshare' ] ) ) echo esc_url( $options[ 'social_slideshare'] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Foursquare', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_foursquare]" value="<?php if ( isset( $options[ 'social_foursquare' ] ) ) echo esc_url( $options[ 'social_foursquare' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Flickr', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_flickr]" value="<?php if ( isset( $options[ 'social_flickr' ] ) ) echo esc_url( $options[ 'social_flickr' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Tumblr', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_tumblr]" value="<?php if ( isset( $options[ 'social_tumblr' ] ) ) echo esc_url( $options[ 'social_tumblr' ] ); ?>" />
                                </td>
                            </tr> 
                            <tr>
                                <th scope="row"><h4><?php _e( 'deviantART', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_deviantart]" value="<?php if ( isset( $options[ 'social_deviantart' ] ) ) echo esc_url( $options[ 'social_deviantart' ] ); ?>" />
                                </td>
                            </tr> 
                            <tr>
                                <th scope="row"><h4><?php _e( 'Dribbble', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_dribbble]" value="<?php if ( isset( $options[ 'social_dribbble' ] ) ) echo esc_url( $options[ 'social_dribbble' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'MySpace', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_myspace]" value="<?php if ( isset( $options[ 'social_myspace' ] ) ) echo esc_url( $options[ 'social_myspace' ] ); ?>" />
                                </td>
                            </tr> 
                            <tr>
                                <th scope="row"><h4><?php _e( 'WordPress', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_wordpress]" value="<?php if ( isset( $options[ 'social_wordpress' ] ) ) echo esc_url( $options[ 'social_wordpress' ] ); ?>" />
                                </td>
                            </tr>                           
                            <tr>
                                <th scope="row"><h4><?php _e( 'RSS', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="simplecatch_options[social_rss]" value="<?php if ( isset( $options[ 'social_rss' ] ) ) echo esc_url( $options[ 'social_rss' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td></td><td><?php _e( 'Note: You can add your social links.', 'simplecatch' ); ?></td>
                            </tr>
                        </tbody>
                    </table>
					<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
          		</div> <!-- #socialicons -->
                
               	<div id="customstyle">
                    <h2><?php _e( 'Custom CSS Styles', 'simplecatch' ); ?></h2>
                    <table class="form-table">  
                        <tbody>       
                            <tr>
                                <th scope="row"><h4><?php _e( 'Enter your custom CSS styles.', 'simplecatch' ); ?></h4></th>
                                <td>
                                    <textarea name="simplecatch_options[custom_css]" id="custom-css" cols="90" rows="12"><?php if ( isset( $options [ 'custom_css' ] ) )  echo esc_html( $options[ 'custom_css' ] ); ?></textarea>
                                </td>
                            </tr>
                           
                            <tr>
                                <th scope="row"><h4><?php _e( 'CSS Tutorial from W3Schools.', 'simplecatch' ); ?></h4></th>
                                <td>
                                    <a class="button" href="<?php echo esc_url( __( 'http://www.w3schools.com/css/default.asp','simplecatch' ) ); ?>" title="<?php esc_attr_e( 'CSS Tutorial', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Click Here to Read', 'simplecatch' );?></a>
                                </td>
                            </tr>
                      	</tbody>
                    </table>
                    <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
              	</div> <!-- #customstyle -->  
                
               	<div id="webmaster">
                	<h2><?php _e( 'Site Verification', 'simplecatch' ); ?></h2>
                    <table class="form-table">  
                    	<tbody>    
                            <tr>
                                <th scope="row"><label><h4><?php _e( 'Google Site Verification ID', 'catchbox' ); ?></h4></label></th>
                                <td><input type="text" size="45" name="simplecatch_options[google_verification]" value="<?php if( isset( $options[ 'google_verification' ] ) ) echo esc_attr( $options[ 'google_verification' ] ); ?>" />
                                </td>
                            </tr>
                            
                            <tr> 
                                <th scope="row"><label><h4><?php _e( 'Yahoo Site Verification ID', 'catchbox' ); ?></h4></label></th>
                                <td><input type="text" size="45" name="simplecatch_options[yahoo_verification]" value="<?php if ( isset( $options[ 'yahoo_verification' ] ) ) echo esc_attr( $options[ 'yahoo_verification'] ); ?>" />
                                </td>
                            </tr>
                            
                            <tr>
                                <th scope="row"><label><h4><?php _e( 'Bing Site Verification ID', 'catchbox' ); ?></h4></label></th>
                                <td><input type="text" size="45" name="simplecatch_options[bing_verification]" value="<?php if ( isset( $options[ 'bing_verification' ] ) ) echo esc_attr( $options[ 'bing_verification' ] ); ?>" />
                                </td>
                            </tr>
                      	</tbody>
                    </table>
                    
                    <h2><?php _e( 'Code for header and footer', 'simplecatch' ); ?></h2>
                    <table class="form-table">  
                    	<tbody>       
                            <tr>
                                <th scope="row"><h4><?php _e( 'Code to display on Header', 'simplecatch' ); ?></h4></th>
                                <td>
                                <textarea name="simplecatch_options[analytic_header]" id="analytics" rows="7" cols="80" ><?php if ( isset( $options [ 'analytic_header' ] ) )  echo esc_html( $options[ 'analytic_header' ] ); ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td><td><?php _e('Note: Here you can put scripts from Google, Facebook etc. which will load on Header', 'simplecatch' ); ?></td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e('Code to display on Footer', 'simplecatch' ); ?></h4></th>
                                <td>
                                 <textarea name="simplecatch_options[analytic_footer]" id="analytics" rows="7" cols="80" ><?php if ( isset( $options [ 'analytic_footer' ] ) )  echo esc_html( $options[ 'analytic_footer' ] ); ?></textarea>
                     
                                </td>
                            </tr>
                            <tr>
                                <td></td><td><?php _e( 'Note: Here you can put scripts from Google, Facebook, Add This etc. which will load on footer', 'simplecatch' ); ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
              	</div> <!-- #analytic -->  
                   
            </div><!-- #simplecatch_ad_tabs -->
		</form>
	</div><!-- .wrap -->
<?php
}

/*
 * Render catch options page
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function simplecatch_options_slider_page(){
?>
	<div class="wrap">
    	
        <form method="post" action="options.php">
			<?php
                settings_fields( 'simplecatch_options_slider' );
                $options = get_option( 'simplecatch_options_slider' );
                
                if( is_array( $options ) && ( !array_key_exists( 'slider_qty', $options ) || !is_numeric( $options[ 'slider_qty' ] ) ) ) $options[ 'slider_qty' ] = 4;
                elseif( !is_array( $options ) ) $options = array( 'slider_qty' => 4);
				
            ?>   
            <h2><?php bloginfo( 'name' ) ._e( ' Featured Slider By ', 'simplecatch' ); ?><a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a></h2>
            
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                    <div class="updated" id="message">
                        <p><strong><?php _e( 'Settings saved.', 'simplecatch' );?></strong></p>
                    </div>
            <?php endif; ?>            
            
                <div id="featuredslider">
                    <h3><?php _e( 'Featured Slider Options', 'simplecatch' ); ?></h3>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><h4><?php _e( 'Number of Slides', 'simplecatch' ); ?></h4></th>
                            <td><input type="text" name="simplecatch_options_slider[slider_qty]" value="<?php if ( array_key_exists ( 'slider_qty', $options ) ) echo intval( $options[ 'slider_qty' ] ); ?>" /></td>
                        </tr>
                        <tbody class="sortable">
                            <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                            <tr>
                                <th scope="row"><label class="handle"><?php _e( 'Featured Col #', 'simplecatch' ); ?><span class="count"><?php echo absint( $i ); ?></span></label></th>
                                <td><input type="text" name="simplecatch_options_slider[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
                                <a href="<?php bloginfo ( 'url' );?>/wp-admin/post.php?post=<?php if( array_key_exists ( 'featured_slider', $options ) && array_key_exists ( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>&action=edit" class="button" title="<?php esc_attr_e('Click Here To Edit'); ?>" target="_blank"><?php _e( 'Click Here To Edit', 'simplecatch' ); ?></a>
                                </td>
                            </tr> 							
                            <?php endfor; ?>
							</tbody>
                    </table>
					<p><?php _e( 'Note: Here You can put your Post IDs which displays on Homepage as slider.', 'simplecatch' ); ?> </p>
                </div> <!-- #featuredslider -->           
                    
                <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
		</form>
	</div><!-- .wrap -->
<?php
}

/**
 * Validate content options
 * @param array $options
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, simplecatch_invalidate_caches
 * @return array
 */
function simplecatch_options_validation( $options ){
	$options_validated = array();
	
	// data validation for logo
	if ( isset( $options[ 'featured_logo_header' ] ) ) {
		$options_validated[ 'featured_logo_header' ] = esc_url_raw( $options[ 'featured_logo_header' ] );
	}
	if ( !isset( $options['remove_header_logo'] ) ) {
		$options['remove_header_logo'] = null;
	}
	// Our checkbox value is either 0 or 1 
	$options_validated[ 'remove_header_logo' ] = $options[ 'remove_header_logo' ] == 1 ? 1 : 0 ;
	
	if ( isset( $options[ 'featured_logo_footer' ] ) ) {
		$options_validated[ 'featured_logo_footer' ] = esc_url_raw( $options[ 'featured_logo_footer' ] );
	}
	if ( !isset( $options['remove_footer_logo'] ) ) {
		$options['remove_footer_logo'] = null;
	}
	// Our checkbox value is either 0 or 1 
	$options_validated[ 'remove_footer_logo' ] = $options[ 'remove_footer_logo' ] == 1 ? 1 : 0 ;
	
	if ( isset( $options[ 'fav_icon' ] ) ) {
		$options_validated[ 'fav_icon' ] = esc_url_raw( $options[ 'fav_icon' ] );
	}
	if ( !isset( $options['remove_favicon'] ) ) {
		$options['remove_favicon'] = null;
	}
	// Our checkbox value is either 0 or 1 
	$options_validated[ 'remove_favicon' ] = $options[ 'remove_favicon' ] == 1 ? 1 : 0 ;
	
	
	//data validation for Featured Slider
	if ( isset( $options[ 'slider_qty' ] ) ) {
		$options_validated[ 'slider_qty' ] = absint( $options[ 'slider_qty' ] ) ? $options [ 'slider_qty' ] : 4;
	}
	if ( isset( $options[ 'featured_slider' ] ) ) {
		$options_validated[ 'featured_slider' ] = array();
	}	
 	if( isset( $options[ 'slider_qty' ] ) )	
	for ( $i = 1; $i <= $options [ 'slider_qty' ]; $i++ ) {
		if ( intval( $options[ 'featured_slider' ][ $i ] ) ) $options_validated[ 'featured_slider' ][ $i ] = absint($options[ 'featured_slider' ][ $i ] );
	}
	
	// data validation for Social Icons
	if( isset( $options[ 'social_facebook' ] ) ) {
		$options_validated[ 'social_facebook' ] = esc_url_raw( $options[ 'social_facebook' ] );
	}
	if( isset( $options[ 'social_twitter' ] ) ) {
		$options_validated[ 'social_twitter' ] = esc_url_raw( $options[ 'social_twitter' ] );
	}
	if( isset( $options[ 'social_googleplus' ] ) ) {
		$options_validated[ 'social_googleplus' ] = esc_url_raw( $options[ 'social_googleplus' ] );
	}
	if( isset( $options[ 'social_pinterest' ] ) ) {
		$options_validated[ 'social_pinterest' ] = esc_url_raw( $options[ 'social_pinterest' ] );
	}	
	if( isset( $options[ 'social_youtube' ] ) ) {
		$options_validated[ 'social_youtube' ] = esc_url_raw( $options[ 'social_youtube' ] );
	}
	if( isset( $options[ 'social_vimeo' ] ) ) {
		$options_validated[ 'social_vimeo' ] = esc_url_raw( $options[ 'social_vimeo' ] );
	}	
	if( isset( $options[ 'social_linkedin' ] ) ) {
		$options_validated[ 'social_linkedin' ] = esc_url_raw( $options[ 'social_linkedin' ] );
	}
	if( isset( $options[ 'social_slideshare' ] ) ) {
		$options_validated[ 'social_slideshare' ] = esc_url_raw( $options[ 'social_slideshare' ] );
	}	
	if( isset( $options[ 'social_foursquare' ] ) ) {
		$options_validated[ 'social_foursquare' ] = esc_url_raw( $options[ 'social_foursquare' ] );
	}
	if( isset( $options[ 'social_flickr' ] ) ) {
		$options_validated[ 'social_flickr' ] = esc_url_raw( $options[ 'social_flickr' ] );
	}
	if( isset( $options[ 'social_tumblr' ] ) ) {
		$options_validated[ 'social_tumblr' ] = esc_url_raw( $options[ 'social_tumblr' ] );
	}	
	if( isset( $options[ 'social_deviantart' ] ) ) {
		$options_validated[ 'social_deviantart' ] = esc_url_raw( $options[ 'social_deviantart' ] );
	}
	if( isset( $options[ 'social_dribbble' ] ) ) {
		$options_validated[ 'social_dribbble' ] = esc_url_raw( $options[ 'social_dribbble' ] );
	}	
	if( isset( $options[ 'social_myspace' ] ) ) {
		$options_validated[ 'social_myspace' ] = esc_url_raw( $options[ 'social_myspace' ] );
	}
	if( isset( $options[ 'social_wordpress' ] ) ) {
		$options_validated[ 'social_wordpress' ] = esc_url_raw( $options[ 'social_wordpress' ] );
	}	
	if( isset( $options[ 'social_rss' ] ) ) {
		$options_validated[ 'social_rss' ] = esc_url_raw( $options[ 'social_rss' ] );
	}
	
	//Custom CSS Style Validation
	if ( isset( $options['custom_css'] ) ) {
		$options_validated['custom_css'] = wp_kses_stripslashes($options['custom_css']);
	}
		
	//Webmaster Tool Verification
	if( isset( $options[ 'google_verification' ] ) ) {
		$options_validated[ 'google_verification' ] = wp_filter_post_kses( $options[ 'google_verification' ] );
	}
	if( isset( $options[ 'yahoo_verification' ] ) ) {
		$options_validated[ 'yahoo_verification' ] = wp_filter_post_kses( $options[ 'yahoo_verification' ] );
	}
	if( isset( $options[ 'bing_verification' ] ) ) {
		$options_validated[ 'bing_verification' ] = wp_filter_post_kses( $options[ 'bing_verification' ] );
	}	
	if( isset( $options[ 'analytic_header' ] ) ) {
		$options_validated[ 'analytic_header' ] = wp_kses_stripslashes( $options[ 'analytic_header' ] );
	}
	if( isset( $options[ 'analytic_footer' ] ) ) {
		$options_validated[ 'analytic_footer' ] = wp_kses_stripslashes( $options[ 'analytic_footer' ] );	
	}
			
	// data validation for tracking code
	if( isset( $options[ 'tracker_header' ] ) )
		$options_validated[ 'tracker_header' ] = wp_kses_stripslashes( $options[ 'tracker_header' ] );
	if( isset( $options[ 'tracker_footer' ] ) )
		$options_validated[ 'tracker_footer' ] = wp_kses_stripslashes( $options[ 'tracker_footer' ] );
		
	
	//Clearing the theme option cache
	if( function_exists( 'simplecatch_themeoption_invalidate_caches' ) ) simplecatch_themeoption_invalidate_caches();
	
	return $options_validated;
}

/*
 * Clearing the cache if any changes in Admin Theme Option
 */
function simplecatch_themeoption_invalidate_caches(){
	delete_transient( 'simplecatch_headerlogo' ); 	// header logo on header
	delete_transient( 'simplecatch_footerlogo' );  // footer logo on footer
	delete_transient( 'simplecatch_favicon' );	  // favicon on cpanel/ backend and frontend
	delete_transient( 'simplecatch_sliders' ); // featured slider
	delete_transient( 'simplecatch_headersocialnetworks' );  // Social links on header
	delete_transient( 'simplecatch_site_verification' ); // scripts which loads on header	
	delete_transient( 'simplecatch_footercode' ); // scripts which loads on footer
	delete_transient( 'simplecatch_inline_css' ); // Custom Inline CSS
}

/*
 * Clearing the cache if any changes in post or page
 */
function simplecatch_post_invalidate_caches(){
	delete_transient( 'simplecatch_sliders' );
}
//Add action hook here save post
add_action( 'save_post', 'simplecatch_post_invalidate_caches' );
?>