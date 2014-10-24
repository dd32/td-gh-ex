<?php
/**
 * Kaira Settings theme class
 * 
 */
class Kaira_theme_settings {
	
	private $sections;
	private $checkboxes;
	private $settings;
	
	/**
	 * The Construct function
	 */
	public function __construct() {
		// To keep track of the checkbox options for the validate_kaira_settings function.
		$this->checkboxes = array();
		$this->settings = array();
		$this->get_kaira_option();
		
		$this->sections['general']   = __( 'General Settings', 'conica' );
        $this->sections['slider']   = __( 'Slider Settings', 'conica' );
		$this->sections['styling']   = __( 'Styling Settings', 'conica' );
        $this->sections['blog']   = __( 'Blog Settings', 'conica' );
        $this->sections['social']   = __( 'Social Links', 'conica' );
        $this->sections['website']   = __( 'Website Text', 'conica' );
        
		$this->sections['premium']     = __( 'Kaira', 'conica' );
		
		add_action( 'admin_menu', array( &$this, 'kaira_add_pages' ) );
        
		add_action( 'admin_init', array( &$this, 'kaira_register_settings' ) );
        
	}
    
    /**
     * Set defaults by the std value without saving to the db
     */
    public function kaira_get_options_with_defaults() {

        $options_set_before = get_option( 'kaira_theme_options');

        // defaults
        $dafaults_array = array();
        foreach ($this->settings as $settings_key => $settings_array) {
            if( isset($settings_array['std']) ){
                if( !$options_set_before ){
                    $dafaults_array[ $settings_key ] = $settings_array['std'];
                }
            }
        }

        // Options API
        $options = wp_parse_args(
            get_option( 'kaira_theme_options', array() ),
            $dafaults_array
        );

        return $options;

    }
	
	/**
	 * Add an options page
	 */
	public function kaira_add_pages() {
		$admin_page = add_theme_page( __( 'CONICA Settings', 'conica' ), __( 'CONICA Settings', 'conica' ), 'manage_options', 'kaira-theme-options', array( &$this, 'kaira_display_page' ) );
		
		add_action( 'admin_print_scripts-' . $admin_page, array( &$this, 'load_kaira_scripts' ) );
		add_action( 'admin_print_styles-' . $admin_page, array( &$this, 'load_kaira_styles' ) );
		
	}
	
	/**
	 * Create settings field
	 */
	public function kaira_create_setting( $args = array() ) {
		
		$defaults = array(
			'id'      => 'kra-default-field',
			'title'   => __( 'Kaira Setting', 'conica' ),
			'desc'    => __( 'This is a default description.', 'conica' ),
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
		
		add_settings_field( $id, $title, array( $this, 'kaira_display_setting' ), 'kaira-theme-options', $section, $field_args );
	}
	
	/**
	 * Display options page
	 */
	public function kaira_display_page() {
		
		echo '<div class="wrap kaira-theme-options-wrap">
                <div class="icon32" id="icon-options-general"></div>
                <h2>' . __( 'CONICA Theme Settings', 'conica' ) . '</h2>
                <div class="kaira-recommended-plugins">' . __( 'Install <a href="'. admin_url('plugin-install.php?tab=favorites&user=kaira') . '" target="_blank">recommended plugins</a> to make your website development easier', 'conica' ) . '</div>';
                    if ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == true )
            			echo '<div class="updated fade"><p>' . __( 'Theme options updated.', 'conica' ) . '</p></div>';
            		
            		echo '<form action="options.php" method="post">';
            	
            		settings_fields( 'kaira_theme_options' );
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
            		<p class="submit"><input name="Submit" type="submit" class="button-primary" value="' . __( 'Save Changes', 'conica' ) . '" /></p>
            	</form>';
    	echo '</div>';
	}
	
	/**
	 * Description for section
	 */
	public function kaira_display_section() {
		// code
	}
	
	/**
	 * Description for the Premium Tab section
	 */
	public function display_kaira_premium_section() {
		// This displays the upsell page located in 'settings/tpl/'
		locate_template( 'settings/tpl/upsell-page.php', true, false );
	}
	
	/**
	 * HTML output for text field
	 */
	public function kaira_display_setting( $args = array() ) {
		
        extract( $args );
		
		$options = get_option( 'kaira_theme_options' );
		
		$options = $this->kaira_get_options_with_defaults();
        
        $field_class = '';
        if ( $class != '' )
            $field_class = ' ' . $class;
        
        if ( ! isset( $options[$id] ) )
            $options[$id] = '';
		
		switch ( $type ) {
			
			case 'heading':
                echo '</td></tr><tr valign="top"><td colspan="2" class="kaira-heading-td"><h4>' . esc_html( $desc ) . '</h4>';
                break;
			
			case 'checkbox':
                echo '<input class="checkbox' . esc_attr( $field_class ) . '" type="checkbox" id="' . esc_attr( $id ) . '" name="kaira_theme_options[' . esc_attr( $id ) . ']" value="1" ' . checked( $options[$id], 1, false ) . ' />
                      <label class="option-description" for="' . wp_kses_post( $id ) . '">' . esc_html( $desc ) . '</label>';
                break;
			
			case 'select':
                echo '<select class="kaira-select' . esc_attr( $field_class ) . '" name="kaira_theme_options[' . esc_attr( $id ) . ']">';
                
                foreach ( $choices as $value => $label )
                    echo '<option value="' . esc_attr( $value ) . '"' . selected( $options[$id], $value, false ) . '>' . esc_attr( $label ) . '</option>';
                
                echo '</select>';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
			
			case 'radio':
                $i = 0;
                foreach ( $choices as $value => $label ) {
                    echo '<div class="radio-option"><input class="radio' . esc_attr( $field_class ) . '" type="radio" name="kaira_theme_options[' . esc_attr( $id ) . ']" id="' . esc_attr( $id ) . esc_attr( $i ) . '" value="' . esc_attr( $value ) . '" ' . checked( $options[$id], $value, false ) . '> <label class="option-description" for="' . esc_attr( $id ) . esc_attr( $i ) . '">' . esc_attr( $label ) . '</label></div>';
                    $i++;
                }
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
			
			case 'textarea':
                echo '<textarea class="kaira-textarea ' . esc_attr( $field_class ) . '" id="' . esc_attr( $id ) . '" name="kaira_theme_options[' . esc_attr( $id ) . ']" rows="5" cols="30">' . esc_textarea( $options[$id] ) . '</textarea>';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
                
            case 'number':
                echo '<input type="number" id="' . esc_attr( $id ) . '" class="kaira-number" min="" max="" step="any" name="kaira_theme_options[' . esc_attr( $id ) . ']" value="' . esc_attr( $options[$id] ) . '" placeholder="">';
                
                break;
                
            case 'media':
                echo '<input id="' . esc_attr( $id ) . '" class="kaira-media-upload" name="kaira_theme_options[' . esc_attr( $id ) . ']" type="text" value="' . esc_attr( $options[$id] ) . '" />
                      <input id="' . esc_attr( $id ) . '_button" class="media_upload_button" name="' . esc_attr( $id ) . '_button" type="text" value="Upload" />';
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span></label>';
            
                break;
                
            case 'color':
                echo '<div class="color-picker-wrapper" id="' . esc_attr( $id ) . '">
                        <span class="color-indicator" style="background-color: ' . esc_attr( $options[$id] ) . '"></span>
                        <input type="text" name="kaira_theme_options[' . esc_attr( $id ) . ']" class="color_picker" value="' . esc_attr( $options[$id] ) . '" data-default-color="' . esc_attr( $options[$id] ) . '" />
                      </div>';
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span></label>';
            
                break;
                
            case 'upsell':
                echo '<a href="' . esc_url( $desc ) . '" class="kaira-upsell-btn" target="_blank">Upgrade to Conica Premium</a>';
                echo '<br /><span class="description">' . __( 'Upgrade to premium to get all features', 'conica' ) . '</span></label>';
                break;
						
			case 'text':
            default:
                echo '<input class="kaira-text' . esc_attr( $field_class ) . '" type="text" id="' . esc_attr( $id ) . '" name="kaira_theme_options[' . esc_attr( $id ) . ']" value="' . esc_attr( $options[$id] ) . '" />';
                
                if ( $desc != '' )
                    echo '<br /><span class="description">' . wp_kses_post( $desc ) . '</span>';
                
                break;
		 	
		}
		
	}
	
	/**
	 * Settings and defaults
	 */
	public function get_kaira_option() {
		
		/* General Settings
		===========================================*/
        $this->settings['kra-heading-upsell-one'] = array(
            'section' => 'general',
            'title'   => __( 'Website Layout', 'conica' ),
            'desc'    => __( 'http://sllwi.re/p/EK', 'conica' ),
            'type'    => 'upsell',
            'std'     => ''
        );
		$this->settings['kra-favicon'] = array(
			'title'   => __( 'Favicon', 'conica' ),
			'desc'    => __( 'Upload a favicon to your website, this needs to be 16 pixels by 16 pixels', 'conica' ),
			'std'     => '',
			'type'    => 'media',
			'section' => 'general'
		);
        
        $this->settings['kra-heading-one'] = array(
            'section' => 'general',
            'title'   => '', // Not used for headings.
            'desc'    => 'Header Settings',
            'type'    => 'heading'
        );
        $this->settings['kra-header-search'] = array(
            'section' => 'general',
            'title'   => __( 'Header Search', 'conica' ),
            'desc'    => __( 'Select this to show the search in the header', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        $this->settings['kra-heading-upsell-two'] = array(
            'section' => 'general',
            'title'   => __( 'Sticky Header', 'conica' ),
            'desc'    => __( 'http://sllwi.re/p/EK', 'conica' ),
            'type'    => 'upsell',
            'std'     => ''
        );
        
        
        /* Homepage Slider Settings
        ===========================================*/
        $this->settings['kra-enable-home-slider'] = array(
            'section' => 'slider',
            'title'   => __( 'Enable Slider', 'conica' ),
            'desc'    => __( 'Click to enable the default homepage slider', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 0 // Set to 1 to be checked by default
        );
        $this->settings['kra-slider-bg-color'] = array(
            'title'   => __( 'Slider background color', 'conica' ),
            'desc'    => __( 'Select a background color for the slider. Default: #303030', 'conica' ),
            'std'     => '#303030',
            'type'    => 'color',
            'section' => 'slider'
        );
        
        $this->settings['kra-heading-two'] = array(
            'section' => 'slider',
            'title'   => '', // Not used for headings.
            'desc'    => 'Slider Options',
            'type'    => 'heading'
        );
        $this->settings['kra-slider-categories'] = array(
            'section' => 'slider',
            'title'   => __( 'Slider Categories', 'conica' ),
            'desc'    => __( 'Select the <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to display in the Homepage Slider, separated by a comma (,)<br />Eg: "13, 17, 19"', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-heading-upsell-three'] = array(
            'section' => 'slider',
            'title'   => __( 'Slider Transitions', 'conica' ),
            'desc'    => __( 'http://sllwi.re/p/EK', 'conica' ),
            'type'    => 'upsell',
            'std'     => ''
        );
        $this->settings['kra-circular-slider'] = array(
            'section' => 'slider',
            'title'   => __( 'Circular slider', 'conica' ),
            'desc'    => __( 'Select if the slider should be circular', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        $this->settings['kra-infinite-slider'] = array(
            'section' => 'slider',
            'title'   => __( 'Infinite slider', 'conica' ),
            'desc'    => __( 'Select if the slider should be infinite', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        $this->settings['kra-enable-slider-pagination'] = array(
            'section' => 'slider',
            'title'   => __( 'Show slider Pagination', 'conica' ),
            'desc'    => __( 'Click to display slider pagination', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        $this->settings['kra-slider-auto-scroll'] = array(
            'section' => 'slider',
            'title'   => __( 'Scroll the slider automatically', 'conica' ),
            'desc'    => __( 'Click to scroll the slider automatically', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 0 // Set to 1 to be checked by default
        );
        $this->settings['kra-slider-titles-show'] = array(
            'section' => 'slider',
            'title'   => __( 'Slide Titles', 'conica' ),
            'desc'    => __( 'Select if you\'d like to show the Slide titles', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 1 // Set to 1 to be checked by default
        );
        $this->settings['kra-slider-links'] = array(
            'section' => 'slider',
            'title'   => __( 'Enable slider links', 'conica' ),
            'desc'    => __( 'Select if you want the slides to link to their post page', 'conica' ),
            'type'    => 'checkbox',
            'std'     => 0 // Set to 1 to be checked by default
        );
        
        
        /* Styling Settings
        ===========================================*/
        $this->settings['kra-primary-color'] = array(
            'title'   => __( 'Main Color', 'conica' ),
            'desc'    => __( 'This is the color of buttons, etc around the site. Default: #b53434', 'conica' ),
            'std'     => '#b53434',
            'type'    => 'color',
            'section' => 'styling'
        );
        $this->settings['kra-primary-color-hover'] = array(
            'title'   => __( 'Main Hover Color', 'conica' ),
            'desc'    => __( 'This is the hover color for buttons, etc around the site. Default: #c54513', 'conica' ),
            'std'     => '#c54513',
            'type'    => 'color',
            'section' => 'styling'
        );
        
        $this->settings['kra-heading-three'] = array(
            'section' => 'styling',
            'title'   => '', // Not used for headings.
            'desc'    => 'Website Fonts',
            'type'    => 'heading'
        );
        $this->settings['kra-body-google-font-url'] = array(
            'section' => 'styling',
            'title'   => __( 'Body font URL', 'conica' ),
            'desc'    => __( 'Enter ONLY the fonts URL here. Eg: link href=\'<b><big> //fonts.googleapis.com/css?family=Open+Sans:400italic,400 </big></b>\' rel=\'stylesheet\' type=\'text/css\'', 'conica' ),
            'type'    => 'text',
            'std'     => '//fonts.googleapis.com/css?family=PT+Sans:400,700,400italic,700italic'
        );
        $this->settings['kra-body-google-font-name'] = array(
            'section' => 'styling',
            'title'   => __( 'Body font name', 'conica' ),
            'desc'    => __( 'Enter the FULL name. Eg: <b><big>font-family: \'Open Sans\', sans-serif;</big></b>', 'conica' ),
            'type'    => 'text',
            'std'     => 'font-family: \'PT Sans\', sans-serif;'
        );
        $this->settings['kra-body-google-font-color'] = array(
            'title'   => __( 'Body font color', 'conica' ),
            'desc'    => __( 'Select a color for the body font. Default: #7B7D80', 'conica' ),
            'std'     => '#7B7D80',
            'type'    => 'color',
            'section' => 'styling'
        );
        $this->settings['kra-heading-google-font-url'] = array(
            'section' => 'styling',
            'title'   => __( 'Heading font URL', 'conica' ),
            'desc'    => __( 'Enter ONLY the fonts URL here. Eg: link href=\'<b><big> //fonts.googleapis.com/css?family=Open+Sans:400italic,400 </big></b>\' rel=\'stylesheet\' type=\'text/css\'', 'conica' ),
            'type'    => 'text',
            'std'     => '//fonts.googleapis.com/css?family=Droid+Sans:400,700'
        );
        $this->settings['kra-heading-google-font-name'] = array(
            'section' => 'styling',
            'title'   => __( 'Heading font name', 'conica' ),
            'desc'    => __( 'Enter the FULL name. Eg: <b><big>font-family: \'Roboto\', sans-serif;</big></b>', 'conica' ),
            'type'    => 'text',
            'std'     => 'font-family: \'Droid Sans\', sans-serif;'
        );
        $this->settings['kra-heading-google-font-color'] = array(
            'title'   => __( 'Heading font color', 'conica' ),
            'desc'    => __( 'Select a color for the body font. Default: #5A5A5A', 'conica' ),
            'std'     => '#5A5A5A',
            'type'    => 'color',
            'section' => 'styling'
        );
        
        $this->settings['kra-heading-four'] = array(
            'section' => 'styling',
            'title'   => '', // Not used for headings.
            'desc'    => 'Custom Styling',
            'type'    => 'heading'
        );
        $this->settings['kra-custom-css'] = array(
            'title'   => __( 'Custom CSS', 'conica' ),
            'desc'    => __( 'Add Custom CSS to add your own styling to the Theme', 'conica' ),
            'std'     => '',
            'type'    => 'textarea',
            'section' => 'styling',
            'class'   => 'code'
        );
        
        
        /* Blog Settings
        ===========================================*/
        $this->settings['kra-heading-upsell-four'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Layout', 'conica' ),
            'desc'    => __( 'http://sllwi.re/p/EK', 'conica' ),
            'type'    => 'upsell',
            'std'     => ''
        );
        $this->settings['kra-blog-excl-categories'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Categories', 'conica' ),
            'desc'    => __( 'Select the <a href="' . admin_url( 'edit-tags.php?taxonomy=category' ) . '" target="_blank">post categories</a> you\'d like to EXCLUDE from the Blog, enter only the ID\'s with a minus sign (-) before them, separated by a comma (,)<br />If you enter the ID\'s without the minus then it\'ll show ONLY posts in that category.<br />Eg: "-13, -17, -19"', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-blog-title'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Page Title', 'conica' ),
            'desc'    => __( 'Enter the title you want for the blog page.', 'conica' ),
            'type'    => 'text',
            'std'     => 'Blog'
        );
        $this->settings['kra-blog-ppp'] = array(
            'section' => 'blog',
            'title'   => __( 'Blog Posts Per Page', 'conica' ),
            'desc'    => __( 'Enter the number of posts you\'d like to show per page', 'conica' ),
            'type'    => 'number',
            'std'     => '10'
        );
        
        
        /* Social Links
        ===========================================*/
        $this->settings['kra-social-email'] = array(
            'section' => 'social',
            'title'   => __( 'Email Address', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-skype'] = array(
            'section' => 'social',
            'title'   => __( 'Skype', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-facebook'] = array(
            'section' => 'social',
            'title'   => __( 'Facebook', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-twitter'] = array(
            'section' => 'social',
            'title'   => __( 'Twitter', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-google-plus'] = array(
            'section' => 'social',
            'title'   => __( 'Google Plus', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-youtube'] = array(
            'section' => 'social',
            'title'   => __( 'YouTube', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-instagram'] = array(
            'section' => 'social',
            'title'   => __( 'Instagram', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-pinterest'] = array(
            'section' => 'social',
            'title'   => __( 'Pinterest', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-linkedin'] = array(
            'section' => 'social',
            'title'   => __( 'LinkedIn', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-tumblr'] = array(
            'section' => 'social',
            'title'   => __( 'Tumblr', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        $this->settings['kra-social-flickr'] = array(
            'section' => 'social',
            'title'   => __( 'Flickr', 'conica' ),
            'desc'    => __( '', 'conica' ),
            'type'    => 'text',
            'std'     => ''
        );
        
        
        /* Website Text
        ===========================================*/
        $this->settings['kra-heading-upsell-five'] = array(
            'section' => 'website',
            'title'   => __( 'Footer Copy Text', 'conica' ),
            'desc'    => __( 'http://sllwi.re/p/EK', 'conica' ),
            'type'    => 'upsell',
            'std'     => ''
        );
        $this->settings['kra-heading-seven'] = array(
            'section' => 'website',
            'title'   => '', // Not used for headings.
            'desc'    => '404 Error Page',
            'type'    => 'heading'
        );
        $this->settings['kra-website-error-head'] = array(
            'section' => 'website',
            'title'   => __( '404 Error Page Heading', 'conica' ),
            'desc'    => __( 'Enter the heading for the 404 Error page', 'conica' ),
            'type'    => 'text',
            'std'     => 'Oops! That page can\'t be found.'
        );
        $this->settings['kra-website-error-msg'] = array(
            'title'   => __( 'Error 404 Message', 'conica' ),
            'desc'    => __( 'Enter the default text on the 404 error page (Page not found)', 'conica' ),
            'std'     => 'The page you are looking for can\'t be found. Please select one of the options below.',
            'type'    => 'textarea',
            'section' => 'website',
            'class'   => 'code'
        );
        
        $this->settings['kra-heading-eight'] = array(
            'section' => 'website',
            'title'   => '', // Not used for headings.
            'desc'    => 'Search Results Page',
            'type'    => 'heading'
        );
        $this->settings['kra-website-nosearch-msg'] = array(
            'title'   => __( 'No Search Results', 'conica' ),
            'desc'    => __( 'Enter the default text for when no search results are found', 'conica' ),
            'std'     => 'Sorry, but nothing matched your search terms. Please try again with some different keywords or return to home.',
            'type'    => 'textarea',
            'section' => 'website',
            'class'   => 'code'
        );
		
	}
	
	/**
	* Register settings
	*/
	public function kaira_register_settings() {
		
		register_setting( 'kaira_theme_options', 'kaira_theme_options', array ( &$this, 'validate_kaira_settings' ) );
		
		foreach ( $this->sections as $slug => $title ) {
			if ( $slug == 'premium' )
				add_settings_section( $slug, $title, array( &$this, 'display_kaira_premium_section' ), 'kaira-theme-options' );
			else
				add_settings_section( $slug, $title, array( &$this, 'kaira_display_section' ), 'kaira-theme-options' );
		}
		
		//$this->get_kaira_option();
		
		foreach ( $this->settings as $id => $setting ) {
			$setting['id'] = $id;
			$this->kaira_create_setting( $setting );
		}
		
	}
	
	/**
	* jQuery Tabs
	*/
	public function load_kaira_scripts() {
        wp_register_script( 'kaira-theme-admin-js', get_stylesheet_directory_uri() . '/settings/js/kaira-admin.js', array( 'jquery', 'jquery-ui-draggable', 'jquery-ui-slider', 'jquery-touch-punch', 'iris', 'wp-color-picker' ), false, 1 );
        wp_enqueue_script( 'kaira-theme-admin-js' );
        wp_print_scripts( 'jquery-ui-tabs' );
        wp_enqueue_media();
    }
	
	/**
	* Styling for the theme options page
	*/
	public function load_kaira_styles() {
        wp_enqueue_style( 'wp-color-picker' );
        wp_register_style( 'kaira-theme-admin-css', get_stylesheet_directory_uri() . '/settings/css/kaira-admin.css' );
        wp_enqueue_style( 'kaira-theme-admin-css' );
	}
	
	/**
	* Validate settings
	*/
	public function validate_kaira_settings( $input ) {
		
		if ( ! isset( $input['reset_theme'] ) ) {
			$options = $this->kaira_get_options_with_defaults();
			
			foreach ( $this->checkboxes as $id ) {
				if ( isset( $options[$id] ) && ! isset( $input[$id] ) )
					unset( $options[$id] );
			}
			
			return $input;
		}
		return false;
		
	}
	
}

$theme_options = new Kaira_theme_settings();

function kaira_theme_option( $option ) {
	if ( ! isset ( $theme_options ) )
        $theme_options = new Kaira_theme_settings();
    
    $options = $theme_options->kaira_get_options_with_defaults();
	if ( isset( $options[$option] ) )
		return $options[$option];
	else
		return false;
} ?>