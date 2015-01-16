<?php
class Fmi_theme_settings{
	
	private $sections;
	private $checkboxes;
	private $settings;
	
	public function __construct() {

		$this->checkboxes = array();
		$this->settings = array();
		$this->get_fmi_option();
		
		$this->sections['general']   = __( 'General Settings','fmi');
		$this->sections['styling']   = __( 'Styling Settings','fmi');
        $this->sections['social']   = __( 'Social Links','fmi');
        $this->sections['website']   = __( 'Website Text','fmi');
		
		add_action( 'admin_menu', array( &$this, 'fmi_add_pages' ) );
        
		add_action( 'admin_init', array( &$this, 'fmi_register_settings' ) );
		
	}

    public function fmi_get_options_with_defaults() {

        $options_set_before = get_option( 'theme_options');

        $dafaults_array = array();
        foreach ($this->settings as $settings_key => $settings_array) {
            if( isset($settings_array['std']) ){
                if( !$options_set_before ){
                    $dafaults_array[ $settings_key ] = $settings_array['std'];
                }
            }
        }

        $options = wp_parse_args(
            get_option( 'theme_options', array() ),
            $dafaults_array
        );

        return $options;

    }

	public function fmi_add_pages() {
		$admin_page = add_theme_page( __( 'Theme Settings','fmi'), __( 'Theme Settings','fmi'), 'manage_options', 'theme-options', array( &$this, 'fmi_display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'load_fmi_scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'load_fmi_styles' ) );
		
	}
	
	public function fmi_create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'vs-default-field',
			'title'   => __( 'Fmi Setting','fmi'),
			'desc'    => __( 'This is a default description.','fmi'),
			'std'     => '',
			'type'    => 'text',
			'section' => 'general',
			'choices' => array(),
			'class'   => ''
		);
			
		extract( wp_parse_args( $args, $defaults ) );
		
		$field_args = array(
			'type'      => $type,
			'id'        => $id,
			'desc'      => $desc,
			'std'       => $std,
			'choices'   => $choices,
			'label_for' => $id,
			'class'     => $class
		);
		
		if ( $type == 'checkbox' )
			$this->checkboxes[] = $id;
		
		add_settings_field( $id, $title, array( $this, 'fmi_display_setting' ), 'theme-options', $section, $field_args );
	}
	
	public function fmi_display_page() {
		
		echo '<div class="wrap fmi-theme-options-wrap">
            	<div class="icon32" id="icon-options-general"></div>
            	<h2>' . __( 'Theme Settings','fmi') . '</h2>
                <div class="fmi-recommended-plugins"></div>';
            		if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
            			echo '<div class="updated fade"><p>' . __( 'Theme options updated.','fmi') . '</p></div>';
            		
            		echo '<form action="options.php" method="post">';
            	
            		settings_fields( 'theme_options' );
            		echo '<div class="ui-tabs">
            			<ul class="ui-tabs-nav">';
            		
                    $tab_count = 1;
            		foreach ( $this->sections as $section_slug => $section ) {
            			echo '<li><a href="#tab-' . $tab_count . '">' . $section . '</a></li>';
                        $tab_count++;
                    }
            		
            		echo '</ul>';
            		do_settings_sections( $_GET['page'] );
            		
            		echo '</div>
            		<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __( 'Save Changes','fmi') . '" /></p>
            	</form>';
    	echo '</div>';
	}
	public function fmi_display_section() {
	}
	public function display_fmi_premium_section() {
		locate_template( 'settings/tpl/upsell-page.php', true, false );
	}
	public function fmi_display_setting( $args = array() ) {
		
        extract( $args );
		
		$options = $this->fmi_get_options_with_defaults();
		
		$field_class = '';
		if ( $class != '' )
			$field_class = ' ' . $class;
        
        if ( ! isset( $options[$id] ) )
            $options[$id] = '';
		
		switch ( $type ) {
			
			case 'heading':
                echo '</td></tr><tr valign="top"><td colspan="2" class="fmi-heading-td"><h4>' . esc_html( $desc ) . '</h4>';
                break;
            
            case 'checkbox':
                echo '<input class="checkbox' . esc_attr( $field_class ) . '" type="checkbox" id="' . esc_attr( $id ) . '" name="theme_options[' . esc_attr( $id ) . ']" value="1" ' . checked( $options[$id], 1, false ) . ' /> <label class="option-description" for="' . esc_attr( $id ) . '">' . wp_kses_post( $desc ) . '</label>';
                break;
            
            case 'select':
                echo '<select class="fmi-select' . esc_attr( $field_class ) . '" name="theme_options[' . esc_attr( $id ) . ']">';
                
                foreach ( $choices as $value => $label )
                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . esc_attr( $label ) . '</option>';
                
                echo '</select>';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
            
            case 'radio':
                $i = 0;
                foreach ( $choices as $value => $label ) {
                    echo '<div class="radio-option"><input class="radio' . esc_attr( $field_class ) . '" type="radio" name="theme_options[' . esc_attr( $id ) . ']" id="' . esc_attr( $id ) . esc_attr( $i ) . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label class="option-description" for="' . esc_attr( $id ) . esc_attr( $i ) . '">' . esc_attr( $label ) . '</label></div>';
                    $i++;
                }
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
            
            case 'textarea':
                echo '<textarea class="fmi-textarea ' . esc_attr( $field_class ) . '" id="' . esc_attr( $id ) . '" name="theme_options[' . esc_attr( $id ) . ']" rows="5" cols="30">' . esc_textarea( $options[$id] ) . '</textarea>';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
                
            case 'number':
                echo '<input type="number" id="' . esc_attr( $id ) . '" class="fmi-number" min="" max="" step="any" name="theme_options[' . esc_attr( $id ) . ']" value="' . esc_attr( $options[$id] ) . '" placeholder="">';
                
                break;
                
            case 'media':
                echo '<input id="' . esc_attr( $id ) . '" class="fmi-media-upload" name="theme_options[' . esc_attr( $id ) . ']" type="text" value="' . esc_url_raw( $options[$id] ) . '" />
                      <input id="' . esc_attr( $id ) . '_button" class="media_upload_button" name="' . esc_attr( $id ) . '_button" type="text" value="Upload" />';
                      
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span></label>';
                if ( $options[$id] != '' )
                    echo '<img src="' . esc_url( $options[$id] ) . '" class="media_upload_img_preview" />';
            
                break;
                
            case 'url':
                echo '<input class="fmi-url' . esc_attr( $field_class ) . '" type="text" id="' . esc_attr( $id ) . '" name="theme_options[' . esc_attr( $id ) . ']" value="' . esc_url_raw( $options[$id] ) . '" />';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
                
            case 'color':
                echo '<div class="color-picker-wrapper" id="' . esc_attr( $id ) . '">
                        <span class="color-indicator" style="background-color: ' . esc_attr( $options[$id] ) . '"></span>
                        <input type="text" name="theme_options[' . esc_attr( $id ) . ']" class="color_picker" value="' . esc_attr( $options[$id] ) . '" data-default-color="' . esc_attr( $options[$id] ) . '" />
                      </div>';
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span></label>';
            
                break;
                
            case 'upsell':
                echo '<a href="' . esc_url( $desc ) . '" class="fmi-upsell-btn" target="_blank">Upgrade to Albar Premium</a>';
                echo '<br /><span class="description">' . __( 'Upgrade to premium to get all features','fmi') . '</span></label>';
                break;
						
			case 'text':
            default:
                echo '<input class="fmi-text' . esc_attr( $field_class ) . '" type="text" id="' . esc_attr( $id ) . '" name="theme_options[' . esc_attr( $id ) . ']" value="' . esc_attr( $options[$id] ) . '" />';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
		 	
		}
		
	}
	public function get_fmi_option() {
		$this->settings['vs-favicon'] = array(
			'title'   => __( 'Favicon','fmi'),
			'desc'    => __( 'Upload a favicon to your website, this needs to be 16 pixels by 16 pixels','fmi'),
			'std'     => '',
			'type'    => 'media',
			'section' => 'general'
		);
        
        $this->settings['vs-heading-one'] = array(
            'section' => 'general',
            'title'   => '', // Not used for headings.
            'desc'    => 'Header Settings',
            'type'    => 'heading'
        );
        $this->settings['vs-header-search'] = array(
            'section' => 'general',
            'title'   => __( 'Header Search','fmi'),
            'desc'    => __( 'Select this to show the search in the header','fmi'),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );

        $this->settings['vs-enable-home-slider'] = array(
            'section' => 'slider',
            'title'   => __( 'Enable Slider','fmi'),
            'desc'    => __( 'Click to enable the default homepage slider','fmi'),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        
        $this->settings['vs-heading-two'] = array(
            'section' => 'slider',
            'title'   => '', // Not used for headings.
            'desc'    => 'Slider Options',
            'type'    => 'heading'
        );
        $this->settings['vs-slider-categories'] = array(
            'section' => 'slider',
            'title'   => __( 'Slider Categories','fmi'),
            'desc'    => __( 'Enter the ID of the <a href="'. admin_url('edit-tags.php?taxonomy=category') . '" target="_blank">post categories</a> you\'d like to display in the Homepage Slider, separated by a comma (,) -> Eg: "13, 17, 19"','fmi'),
            'type'    => 'text',
            'std'     => ''
        );

        $this->settings['vs-body-google-font-url'] = array(
            'section' => 'styling',
            'title'   => __( 'Body font URL','fmi'),
            'desc'    => __( 'Enter ONLY the fonts URL here. Eg: link href=\'<b><big> //fonts.googleapis.com/css?family=Open+Sans:400italic,400 </big></b>\' rel=\'stylesheet\' type=\'text/css\'','fmi'),
            'type'    => 'url',
            'std'     => '//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic'
        );
        $this->settings['vs-body-google-font-name'] = array(
            'section' => 'styling',
            'title'   => __( 'Body font name','fmi'),
            'desc'    => __( 'Enter the FULL name. Eg:<b><big> font-family: \'Open Sans\', sans-serif; </big></b>','fmi'),
            'type'    => 'text',
            'std'     => 'font-family: \'Open Sans\', sans-serif;'
        );       
        $this->settings['vs-heading-four'] = array(
            'section' => 'styling',
            'title'   => '',
            'desc'    => 'Custom Styling',
            'type'    => 'heading'
        );
        $this->settings['vs-custom-css'] = array(
            'title'   => __( 'Custom CSS','fmi'),
            'desc'    => __( 'Add Custom CSS to add your own styling to the Theme','fmi'),
            'std'     => '',
            'type'    => 'textarea',
            'section' => 'styling',
            'class'   => 'code'
        );
        
        $this->settings['vs-blog-excl-categories'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Categories','fmi'),
            'desc'    => __( 'Enter the ID of the <a href="'. admin_url('edit-tags.php?taxonomy=category') . '" target="_blank">post categories</a> you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in that category.<br />Eg: "-13, -17, -19"','fmi'),
            'type'    => 'text',
            'std'     => ''
        );

        $this->settings['vs-blog-ppp'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Posts Per Page','fmi'),
            'desc'    => __( 'Enter the number of posts you\'d like to show per page','fmi'),
            'type'    => 'number',
            'std'     => '10'
        );
        

        $this->settings['vs-social-email'] = array(
            'section' => 'social',
            'title'   => __( 'Email Address','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-skype'] = array(
            'section' => 'social',
            'title'   => __( 'Skype','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-facebook'] = array(
            'section' => 'social',
            'title'   => __( 'Facebook','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-twitter'] = array(
            'section' => 'social',
            'title'   => __( 'Twitter','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-google-plus'] = array(
            'section' => 'social',
            'title'   => __( 'Google Plus','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-youtube'] = array(
            'section' => 'social',
            'title'   => __( 'YouTube','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-instagram'] = array(
            'section' => 'social',
            'title'   => __( 'Instagram','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-pinterest'] = array(
            'section' => 'social',
            'title'   => __( 'Pinterest','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-linkedin'] = array(
            'section' => 'social',
            'title'   => __( 'LinkedIn','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-tumblr'] = array(
            'section' => 'social',
            'title'   => __( 'Tumblr','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-social-flickr'] = array(
            'section' => 'social',
            'title'   => __( 'Flickr','fmi'),
            'desc'    => '',
            'type'    => 'url',
            'std'     => ''
        );
        $this->settings['vs-website-error-head'] = array(
            'section' => 'website',
            'title'   => __( '404 Error Page Heading','fmi'),
            'desc'    => __( 'Enter the heading for the 404 Error page','fmi'),
            'type'    => 'text',
            'std'     => 'Oops! That page can\'t be found.'
        );
        $this->settings['vs-website-error-msg'] = array(
            'title'   => __( 'Error 404 Message','fmi'),
            'desc'    => __( 'Enter the default text on the 404 error page (Page not found)','fmi'),
            'std'     => 'The page you are looking for can\'t be found. Please select one of the options below.',
            'type'    => 'textarea',
            'section' => 'website',
            'class'   => 'code'
        );
        
        $this->settings['vs-heading-eight'] = array(
            'section' => 'website',
            'title'   => '',
            'desc'    => 'Search Results Page',
            'type'    => 'heading'
        );
        $this->settings['vs-website-nosearch-msg'] = array(
            'title'   => __( 'No Search Results','fmi'),
            'desc'    => __( 'Enter the default text for when no search results are found','fmi'),
            'std'     => 'Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.',
            'type'    => 'textarea',
            'section' => 'website',
            'class'   => 'code'
        );
		
	}
	
	public function fmi_register_settings() {
		register_setting( 'theme_options', 'theme_options', array ( &$this, 'validate_fmi_settings' ) );
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'premium' )
				add_settings_section( $slug, $title, array( &$this, 'display_fmi_premium_section' ), 'theme-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'fmi_display_section' ), 'theme-options' );
		}
		
		// $this->get_fmi_option();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->fmi_create_setting( $setting );
		}
		
	}
	public function load_fmi_scripts() {
        wp_register_script( 'base-js', get_stylesheet_directory_uri() . '/set/js/base.js', array( 'jquery', 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch', 'iris', 'wp-color-picker' ), false, 1 );
        wp_enqueue_script( 'base-js' );
        wp_print_scripts( 'jquery-ui-tabs' );
        wp_enqueue_media();
	}
	
	public function load_fmi_styles() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_register_style( 'base-css', get_stylesheet_directory_uri() . '/set/css/base.css' );
        wp_enqueue_style( 'base-css' );
	}
	public function validate_fmi_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = $this->fmi_get_options_with_defaults();
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
}

$theme_options = new Fmi_theme_settings();

function fmi_theme_option($option){
    if (!isset($theme_options))$theme_options = new Fmi_theme_settings();
    
    $options = $theme_options->fmi_get_options_with_defaults();
    if (isset($options[$option]))
        return $options[$option];
    else
        return false;
}
?>