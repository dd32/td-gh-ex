<?php
/**
 * Simple Catch Theme Options
 *
 * @package WordPress
 * @subpackage Simple Catch
 * @since Simple Catch 1.0
 */

/*
 * Create a function for content options pages
 *
 * @uses add_menu_page
 * @add action admin_menu 
 */
add_action( 'admin_menu', 'catch_options_menu' );
function catch_options_menu() {
	
	$catch_options = add_theme_page( 
		sprintf( esc_html__( '%s Theme Options', 'simplecatch' ), get_bloginfo( 'name') ), // Name of page
		__( 'Theme Options', 'simplecatch' ),		// Label in menu
		'edit_theme_options', 						// Capability required
		'catch_options', 							// Menu slug, used to uniquely identify the page
		'catch_options_page'
	);						// Function that renders the options page
	
	$slider_options = add_theme_page( 
		sprintf( esc_html__( '%s Slider', 'simplecatch' ), get_bloginfo( 'name') ), // Name of page
		__( 'Featured Slider', 'simplecatch' ),		// Label in menu
		'edit_theme_options', 						// Capability required
		'catch_options_slider', 							// Menu slug, used to uniquely identify the page
		'catch_options_slider_page'	// Function that renders the options page
	);
			
	// admin_print_scripts-(hookname) and add_print_styles-(hookname)
	add_action( 'admin_print_scripts-' . $catch_options, 'catch_admin_scripts' );
	add_action( 'admin_print_styles-' . $catch_options, 'catch_admin_styles' );
	
	// admin_print_scripts-(hookname) and add_print_styles-(hookname)
	add_action( 'admin_print_scripts-' . $slider_options, 'catch_admin_scripts' );
	add_action( 'admin_print_styles-' . $slider_options, 'catch_admin_styles' );
}
add_action( 'admin_menu', 'catch_options_menu' );

/*
 * Register options and validation callbacks
 *
 * @uses register_setting
 * @action admin_init
 */
function catch_register_settings(){
	register_setting( 'catch_options', 'catch_options', 'catch_options_validation' );
	register_setting( 'catch_options_slider', 'catch_options_slider', 'catch_options_validation' );
}
add_action( 'admin_init', 'catch_register_settings' );


/**
 * Enqueue admin script
 *
 * @uses wp_enqueue_script 
 * @Calling jquery, jquery-ui-tabs,jquery-cookie, jquery-ui-sortable, jquery-ui-draggable
 */
function catch_admin_scripts() {
	//jquery-cookie registered in functions.php
	wp_register_script( 'catch-admin', get_template_directory_uri().'/functions/panel/admin.js', array( 'jquery', 'jquery-ui-tabs', 'jquery-cookie', 'jquery-ui-sortable', 'jquery-ui-draggable' ), '1.0', false );
	wp_enqueue_script ( 'catch-admin' );
	//registering add_image_script.js and enqueue
	wp_register_script( 'ci_upload', get_template_directory_uri().'/functions/panel/add_image_scripts.js', array( 'jquery','media-upload','thickbox' ) );
	wp_enqueue_script( 'ci_upload' );
}

/**
 * Enqueue admin stylesheet
 *
 * @uses wp_enqueue_style
 */
function catch_admin_styles() {
	wp_enqueue_style( 'catch-admin',get_template_directory_uri().'/functions/panel/admin.css', array(), '1.0', 'screen' );
	//Enqueue thickbox.css
	wp_enqueue_style( 'thickbox' );
}

/*
 * Render catch options page
 *
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function catch_options_page() {
?>
	<div class="wrap">
    	
        <form method="post" action="options.php">
			<?php
                settings_fields( 'catch_options' );
                $options = get_option( 'catch_options' );
                
                if( is_array( $options ) && ( !array_key_exists( 'slider_qty', $options ) || !is_numeric( $options[ 'slider_qty' ] ) ) ) $options[ 'slider_qty' ] = 4;
                elseif( !is_array( $options ) ) $options = array( 'slider_qty' => 4);
				
            ?>   
            <h2><?php bloginfo( 'name' ) ._e( ' Options By ', 'simplecatch' ); ?><a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a></h2>
            
            <?php if( isset( $_GET [ 'settings-updated' ] ) && $_GET[ 'settings-updated' ] == 'true' ): ?>
                    <div class="updated" id="message">
                        <p><strong><?php _e( 'Settings saved.', 'simplecatch' );?></strong></p>
                    </div>
            <?php endif; ?>
            
            <div id="catch_ad_tabs">
                <ul class="tabNavigation" id="mainNav">
                    <li><a href="#faq"><?php _e( 'FAQ', 'simplecatch' );?></a></li>
                    <li><a href="#logo"><?php _e( 'Logo', 'simplecatch' );?></a></li>
                    <li><a href="#favicon"><?php _e( 'Fav Icon', 'simplecatch' );?></a></li>
                    <li><a href="#sociallinks"><?php _e( 'Social Links', 'simplecatch' );?></a></li>
                   	<li><a href="#analytic"><?php _e( 'Script Option', 'simplecatch' );?></a></li>
                </ul><!-- .tabsNavigation #mainNav -->
                
                <div id="faq">
                   <?php 
                    //Displays FAQ information witten in ci_faq of  ci_functions.php 
                     if( function_exists( 'ci_faq' ) ): 
					 	ci_faq(); 
					 endif;
                     ?>                
              	</div><!-- #faq -->
                   
                   <!-- Option for changing the header logo -->
                    <div id="logo">
                    	<h2><?php _e( 'Logo options', 'simplecatch' ); ?></h2> 
                    	<table class="form-table">
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Disable Header Logo:', 'simplecatch' ); ?></h4></th>
                                <td><input type="checkbox" id="headerlogo" name="catch_options[remove_header_logo]" value="1" <?php isset($options['remove_header_logo']) ? checked( '1', $options['remove_header_logo'] ) : checked('0', '1'); ?> /></td>
                            </tr>
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Header logo url:', 'simplecatch' ); ?></h4></th>
                                <td>
									<?php  if ( !empty ( $options[ 'featured_logo_header' ] ) ) { ?>
                                        <input size="65" type="text" name="catch_options[featured_logo_header]" value="<?php if( isset( $options [ 'featured_logo_header' ] ) ) echo esc_attr( $options [ 'featured_logo_header' ], 'simplecatch' ); ?>" class="upload" />
                                         <?php } else { ?>
                                         <input size="65" type="text" name="catch_options[featured_logo_header]" value="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo" />
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
                        </table>
                        <table class="form-table">
                            <tr>                            
                                <th scope="row"><h4><?php _e( 'Disable Footer Logo:', 'simplecatch' ); ?></h4></th>
                                <td><input type="checkbox" id="headerlogo" name="catch_options[remove_footer_logo]" value="1" <?php isset($options['remove_footer_logo']) ? checked( '1', $options['remove_footer_logo'] ) : checked('0', '1'); ?> /></td>
                            </tr>
                            <tr>   
                            	<th scope="row"><h4><?php _e( 'Footer logo url: ', 'simplecatch' ); ?></h4></th>
                    			<td>
									<?php  if ( !empty ( $options[ 'featured_logo_footer' ] ) ) { ?>
                                        <input size="65" type="text" name="catch_options[featured_logo_footer]" value="<?php if( isset( $options[ 'featured_logo_footer' ] ) ) echo esc_attr( $options[ 'featured_logo_footer' ] ); ?>" class="upload" />
                                    <?php } else { ?>
                                        <input size="65" type="text" name="catch_options[featured_logo_footer]" value="<?php echo get_template_directory_uri(); ?>/images/logo-foot.png" alt="logo" />
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
                    	</table>
				   		 <p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                    </div> <!-- #logo -->
              
              <div id="favicon">
                <table class="form-table">
                	<h2><?php _e( 'Fav icon options', 'simplecatch' ); ?></h2> 
                    <tr>
                    	<th scope="row"><h4><?php _e( 'Disable Favicon:', 'simplecatch' ); ?></h4></th>
                        <td><input type="checkbox" id="favicon" name="catch_options[remove_favicon]" value="1" <?php isset($options['remove_favicon']) ? checked( '1', $options['remove_favicon'] ) : checked('0', '1'); ?> /></td>
                    </tr>
                    <tr>                            
                     	<th scope="row"><h4><?php _e( 'Fav Icon URL:', 'simplecatch' ); ?></h4></th>
						<td><?php if ( !empty ( $options[ 'fav_icon' ] ) ) { ?>
                            	<input size="65" type="text" name="catch_options[fav_icon]" value="<?php if( isset( $options [ 'fav_icon' ] ) ) echo esc_attr( $options [ 'fav_icon' ] ); ?>" class="upload" />
							<?php } else { ?>
								<input size="65" type="text" name="catch_options[fav_icon]" value="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" alt="fav" />
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
                </table>
				<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
              </div> <!-- #favicon -->
                
              <div id="sociallinks">
                    <h2><?php _e( 'Social links', 'simplecatch' ); ?></h2>                 
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Facebook', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="catch_options[social_facebook]" value="<?php if( isset( $options[ 'social_facebook' ] ) ) echo esc_url( $options[ 'social_facebook' ] ); ?>" />
                                </td>
                            </tr>
                            <tr> 
                                <th scope="row"><h4><?php _e( 'Twitter', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="catch_options[social_twitter]" value="<?php if ( isset( $options[ 'social_twitter' ] ) ) echo esc_url( $options[ 'social_twitter'] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'Youtube', 'simplecatch' ); ?></h4></th>
                                <td><input type="text" size="45" name="catch_options[social_youtube]" value="<?php if ( isset( $options[ 'social_youtube' ] ) ) echo esc_url( $options[ 'social_youtube' ] ); ?>" />
                                </td>
                            </tr>
                            <tr>
                                <th scope="row"><h4><?php _e( 'RSS', 'simplecatch' ); ?> </h4></th>
                                <td><input type="text" size="45" name="catch_options[social_rss]" value="<?php if ( isset( $options[ 'social_rss' ] ) ) echo esc_url( $options[ 'social_rss' ] ); ?>" />
                                </td>
                            </tr>
							<tr>
								<td></td><td><?php _e( 'Note: You can add your social links.', 'simplecatch' ); ?></td>
							</tr>
                        </tbody>
                    </table>
					<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                </div> <!-- #sociallinks -->
                
               	<div id="analytic">
                		<h2><?php _e( 'Script for header/footer', 'simplecatch' ); ?></h2>
                        <table class="form-table">         
                            <tr>
                                <th scope="row"><h4><?php _e( 'Script to display on Header', 'simplecatch' ); ?></h4></th>
                                <td>
                                <textarea name="catch_options[analytic_header]" id="analytics" rows="7" cols="80" ><?php if ( isset( $options [ 'analytic_header' ] ) )  echo esc_html( $options[ 'analytic_header' ] ); ?></textarea>
                                </td>
                            </tr>
							<tr>
								<td></td><td><?php _e('Note: Here you can put scripts from Google, Facebook etc. which will load on Header', 'simplecatch' ); ?></td>
							</tr>
							<tr>
                                <th scope="row"><h4><?php _e('Script to display on Footer', 'simplecatch' ); ?></h4></th>
                                <td>
                                 <textarea name="catch_options[analytic_footer]" id="analytics" rows="7" cols="80" ><?php if ( isset( $options [ 'analytic_footer' ] ) )  echo esc_html( $options[ 'analytic_footer' ] ); ?></textarea>
                     
                                </td>
                            </tr>
							<tr>
								<td></td><td><?php _e( 'Note: Here you can put scripts from Google, Facebook etc. which will load on footer', 'simplecatch' ); ?></td>
							</tr>
                        </table>
						<p class="submit"><input type="submit" class="button-primary" value="<?php esc_attr_e( 'Save', 'simplecatch' ); ?>" /></p> 
                   </div> <!-- #analytic -->  
                   
            </div><!-- #catch_ad_tabs -->
		</form>
	</div><!-- .wrap -->
<?php
}

/*
 * Render catch options page
 * @uses settings_fields, get_option, bloginfo
 * @Settings Updated
 */
function catch_options_slider_page(){
?>
	<div class="wrap">
    	
        <form method="post" action="options.php">
			<?php
                settings_fields( 'catch_options_slider' );
                $options = get_option( 'catch_options_slider' );
                
                if( is_array( $options ) && ( !array_key_exists( 'slider_qty', $options ) || !is_numeric( $options[ 'slider_qty' ] ) ) ) $options[ 'slider_qty' ] = 4;
                elseif( !is_array( $options ) ) $options = array( 'slider_qty' => 4);
				
            ?>   
            <h2><?php bloginfo( 'name' ) ._e( ' Options By ', 'simplecatch' ); ?><a href="<?php echo esc_url( __( 'http://catchthemes.com/', 'simplecatch' ) ); ?>" title="<?php echo esc_attr( 'Catch Themes', 'simplecatch' ); ?>" target="_blank"><?php _e( 'Catch Themes', 'simplecatch' ); ?></a></h2>
            
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
                            <td><input type="text" name="catch_options_slider[slider_qty]" value="<?php if ( array_key_exists ( 'slider_qty', $options ) ) echo intval( $options[ 'slider_qty' ] ); ?>" /></td>
                        </tr>
                        <tbody class="sortable">
                            <?php for ( $i = 1; $i <= $options[ 'slider_qty' ]; $i++ ): ?>
                            <tr>
                                <th scope="row"><label class="handle"><?php _e( 'Featured Col #', 'simplecatch' ); ?><span class="count"><?php echo absint( $i ); ?></span></label></th>
                                <td><input type="text" name="catch_options_slider[featured_slider][<?php echo absint( $i ); ?>]" value="<?php if( array_key_exists( 'featured_slider', $options ) && array_key_exists( $i, $options[ 'featured_slider' ] ) ) echo absint( $options[ 'featured_slider' ][ $i ] ); ?>" />
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
 * @uses esc_url_raw, absint, esc_textarea, sanitize_text_field, catch_invalidate_caches
 * @return array
 */
function catch_options_validation( $options ){
	$options_validated = array();
	
	// data validation for logo
	if ( isset( $options[ 'featured_logo_header' ] ) ) {
		$options_validated[ 'featured_logo_header' ] = esc_url_raw( $options[ 'featured_logo_header' ] );
	}
	if ( !isset( $options['remove_header_logo'] ) )
		$options['remove_header_logo'] = null;
	// Our checkbox value is either 0 or 1 
	$options_validated[ 'remove_header_logo' ] = $options[ 'remove_header_logo' ] == 1 ? 1 : 0 ;
	
	if ( isset( $options[ 'featured_logo_footer' ] ) ){
		$options_validated[ 'featured_logo_footer' ] = esc_url_raw( $options[ 'featured_logo_footer' ] );
	}
	if ( !isset( $options['remove_footer_logo'] ) )
		$options['remove_footer_logo'] = null;
	// Our checkbox value is either 0 or 1 
	$options_validated[ 'remove_footer_logo' ] = $options[ 'remove_footer_logo' ] == 1 ? 1 : 0 ;
	
	if ( isset( $options[ 'fav_icon' ] ) ) {
		$options_validated[ 'fav_icon' ] = esc_url_raw( $options[ 'fav_icon' ] );
	}
	if ( !isset( $options['remove_favicon'] ) )
		$options['remove_favicon'] = null;
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
	
	// data validation for Sociallinks
	if( isset( $options[ 'social_facebook' ] ) ) {
		$options_validated[ 'social_facebook' ] = esc_url_raw( $options[ 'social_facebook' ] );
	}
	if( isset( $options[ 'social_twitter' ] ) )
		$options_validated[ 'social_twitter' ] = esc_url_raw( $options[ 'social_twitter' ] );
	if( isset( $options[ 'social_youtube' ] ) )
		$options_validated[ 'social_youtube' ] = esc_url_raw( $options[ 'social_youtube' ] );
	if( isset( $options[ 'social_rss' ] ) )
		$options_validated[ 'social_rss' ] = esc_url_raw( $options[ 'social_rss' ] );
	
	//data validation for analytics
	if( isset( $options[ 'analytic_header' ] ) )
		$options_validated[ 'analytic_header' ] = wp_kses_stripslashes( $options[ 'analytic_header' ] );
		
	//data validation for footer
	if( isset( $options[ 'analytic_footer' ] ) )
		$options_validated[ 'analytic_footer' ] = wp_kses_stripslashes( $options[ 'analytic_footer' ] );	
	
	//Clearing the theme option cache
	if( function_exists( 'ci_themeoption_invalidate_caches' ) ) ci_themeoption_invalidate_caches();
	
	return $options_validated;
}

/*
 * Clearing the cache if any changes in Admin Theme Option
 */
function ci_themeoption_invalidate_caches(){
	delete_transient( 'ci_header_logo' ); 	// header logo on header
	delete_transient( 'ci_footer_logo' );  // footer logo on footer
	delete_transient( 'ci_fav_icon' );	  // fav icon on cpanel/ backend and frontend
	
	delete_transient( 'ci_featured_sliders' ); // featured slider
	delete_transient( 'ci_header_social_networks' );  // Social links on header
	
	delete_transient( 'ci_header_scripts' ); // scripts which loads on header	
	delete_transient( 'ci_footer_scripts' ); // scripts which loads on footer
	
}

/*
 * Clearing the cache if any changes in post or page
 */
function ci_themeoption_post_invalidate_caches(){
	delete_transient( 'ci_featured_sliders' );
}
//Add action hook here save post
add_action( 'save_post', 'ci_themeoption_post_invalidate_caches' );
?>