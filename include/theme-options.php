<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) {
	exit;
}
$betilu_theme_options = array(
  'border_radius'   => '',
  'betilu_new_text' => '',
  'top_backgrnd'    => '',
  'phonenumber'     => '',
  'betilu_email'    => '',
  'facebook'        => '',
  'twitter'         => ''


  );

    add_action( 'admin_menu', 'betilu_options_add_page' ); 
function betilu_options_add_page() {
    add_theme_page( 'BetiLu Options', 'Theme Options', 'edit_theme_options', 'betilu-options', 'betilu_options_page' );
}

// connect stylesheet to options page
function betilu_add_init() {
    wp_enqueue_style( 'betilu-admin-style', get_template_directory_uri() . '/include/admin-style.css', false, '1.1' );
    }
    add_action( 'admin_enqueue_scripts', 'betilu_add_init' );

function betilu_register_settings() {
        register_setting( 'betilu-options', 'betilu_theme_options', '');
    } 
    add_action( 'admin_init', 'betilu_register_settings' );
    /*
     * color picker add on
     */
    add_action( 'admin_enqueue_scripts', 'threeby_add_color_picker' );
function threeby_add_color_picker() {
    // Add the color picker css file       
    wp_enqueue_style( 'wp-color-picker' ); 
    // Include our custom jQuery file with WordPress Color Picker dependency
    wp_enqueue_script( 'wp-color-picker-script', get_template_directory_uri() . '/js/custom-script.js', array( 'wp-color-picker' ), false, true );
}

function betilu_options_page() {
   global $betilu_theme_options;
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;
?>
<div class="options-container">
    <figure> <h1> Options Page </h1>  </figure>
	<h2>BetiLu Theme Settings</h2>
                <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="updated" id="fade"><p><strong><?php _e( 'Options saved', 'betilu' ); ?></strong></p></div>
		<?php endif; ?>
	    
	        <form action="options.php" method="POST">
                <?php settings_fields( 'betilu-options' ); ?>
                <?php 
                    //do_settings_sections( 'betilu-options' ); 
                    $options = get_option( 'betilu_theme_options', $betilu_theme_options );
                ?>
            <hr>         
                <h3>Top Right Logo - Square or Circular</h3>     
                <table class="options-table">
                <tr><td><label>Select Logo Style - Select Square or Circular</label></td>
                <td><select name="betilu_theme_options[border_radius]" class="betilu_logo_select">  
<option value="0px" <?php if ( $options['border_radius'] == '0px' ) echo 'selected="selected"'; ?>>Square</option>
<option value="9999px" <?php if ( $options['border_radius'] == '9999px' ) echo 'selected="selected"'; ?>>Circular</option>  
                    </select></td></tr>
                </table>
                <p><img src="<?php echo get_template_directory_uri(); ?>/images/lang-icon.png" height="24"/> Square = <code>carr&#233;, Platz</code> | Circular = <code>circulaire, kreisf&#246;rmig</code> </p>
            <hr>
                <h3>Add middle bar banner text here</h3>  
                <table class="options-table">
                <tr><td><div>Add mid-section banner text here. Same text will appear on lower banner.</div><br />         
                <input id="betilu_new_text" name="betilu_theme_options[betilu_new_text]" size="72" type="text" 
value="<?php if (!empty($options['betilu_new_text'])) echo $options['betilu_new_text']; ?>" /></td></tr>
                </table>
                <p><img src="<?php echo get_template_directory_uri(); ?>/images/info_black.png" height="24"/>You can add HTML4 tags such as <code>&lt;h1&gt; &lt;h2&gt; &lt;h3&gt; &lt;p&gt; &lt;b&gt;</code></p>
            <hr>
                <h3>Sidebar-Top-Right, Middle-Bar and Bottom-Bar Background set here</h3>
                <table class="options-table"><tr><td><label>Change sidebar-right and middle banner background color</label>
<input type="text" name="betilu_theme_options[top_backgrnd]" size="20" value="<?php echo $options['top_backgrnd']; ?>" class="betilu-color-field" /></td></tr>
                    </table>
                <p><img src="<?php echo get_template_directory_uri(); ?>/images/info_black.png" height="24"/>Selected color will appear on all mid-sections, Sticky posts and the Sidebar</p>
            <hr>
                <h3>Add your Phone and eMail plus social media links here</h3>
                <table class="options-table">
                <tr><td><label>Phone Number</label> </td><td><input type="text" name="betilu_theme_options[phonenumber]" size="40" value="<?php echo $options['phonenumber']; ?>" /></td></tr>
                <tr><td><label>Facebook</label> </td><td><input type="text" name="betilu_theme_options[facebookurl]" size="40" value="<?php echo $options['facebookurl']; ?>" /></td</tr>
                <tr><td><label>Twitter</label> </td><td><input type="text" name="betilu_theme_options[twitterurl]" size="40" value="<?php echo $options['twitterurl']; ?>" /></td</tr>
                <tr><td><label>E-Mail</label> </td><td><input type="text" name="betilu_theme_options[betilu_email]" size="40" value="<?php echo $options['betilu_email']; ?>" /></td</tr> 
                </table>
                <p><img src="<?php echo get_template_directory_uri(); ?>/images/info_black.png" height="24"/>Appears under Single Post Ariticles. Type only id for Twitter and url without the <code>https://</code> for facebook.</p>
            <hr>
                <?php submit_button(); ?>
                </form>
</div>
<?php 
}

function betilu_validate_options( $input ) {    
        // We strip all tags from the text field, to avoid vulnerablilties like XSS

        $input['border_radius']   = sanitize_text_field( $input['border_radius'] );
        $input['betilu_new_text'] = sanitize_text_field( $input['betilu_new_text'] );
        $input['top_backgrnd']    = wp_filter_post_kses( $input['top_backgrnd'] );
        $input['phonenumber']     = wp_filter_post_kses( $input['phonenumber'] );
        $input['facebookurl']     = wp_filter_post_kses( $input['facebookurl'] );
        $input['twitterurl']      = wp_filter_post_kses( $input['twitterurl'] );
        $input['googleurl']       = wp_filter_post_kses( $input['betilu_email'] );
           return $input;
    }

function betilu_styles_method() {
   $betilu_theme_options = array( 'top_backgrnd' => '', 'border_radius' => ''  );
        global $betilu_theme_options;     
            $options = get_option( 'betilu_theme_options', $betilu_theme_options );

    wp_enqueue_style(
    'custom-style',
    get_template_directory_uri() . '/include/custom.css'
    ); 

    // insert border-radius to logo  
            $custom_css = "
                #logo-right img, #logo-right {
                    border-radius: {$options['border_radius']};
        }";
    wp_add_inline_style( 'custom-style', $custom_css );

    // insert background color various selectors
            $custom_css = "
                .post-right, #right-sidebar {
                    background: {$options['top_backgrnd']}; opacity: 0.9;
        }";
    wp_add_inline_style( 'custom-style', $custom_css );
            $custom_css = "       
                .midbar {
                    background: {$options['top_backgrnd']}; opacity: 0.9;
        }";          
    wp_add_inline_style( 'custom-style', $custom_css );
            $custom_css = "       
                .content-area-lead, .content-area-left {
                    background: {$options['top_backgrnd']}; opacity: 0.9;
        }";          
    wp_add_inline_style( 'custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'betilu_styles_method' );


 
?>
