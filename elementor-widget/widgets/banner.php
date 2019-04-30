<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Banner extends Widget_Base { 
	
	public function get_name() {
		return __( 'banner', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Banner Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_banner', // Section key
			array(
				'label' => __( 'Banner Section', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'banner_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Banner Section', 'best-charity' ), // Control label
				'type' => Controls_Manager::SWITCHER, // Type of control
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title', // Control key
			array(
				'label' => __( 'Banner Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);
		
		$this->add_control(
			'banner_page_id', // Control key
			array(
				'label' => __( 'Select Page For Banner', 'best-charity' ), // Control label
				'description' => __( 'It\'s display page title, description and featured image for banner heading, description and image', 'best-charity' ), // Control label
				'type' => Controls_Manager::SELECT2, // Type of control
				'options'=>$this->getTermsForSelect(),
				'default' => '', // Default value for control
			)
		);
		
		$this->add_control(
			'btn_title', // Control key
			array(
				'label' => __( 'Button Text', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'btn_url', // Control key
			array(
				'label' => __( 'Button Url', 'best-charity' ), // Control label
				'type' => Controls_Manager::URL, // Type of control
				'placeholder' => 'https://example.com', // Default value for control
			)
		);
		// Ends the controls section
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_banner = $this->get_settings();
	
		include( get_template_directory() . '/section/banner.php' );
	}
	
	
	public function get_categories() {
		return array( 'best_charity' );
	}

    public function getTermsForSelect( $args = null ){
    	$posts = get_pages();

        $select_posts = array();

        foreach( $posts as $post ) {
            $select_posts[$post->ID] = ucfirst( $post->post_title );
        }
        return $select_posts;
    }
}
// After the Banner class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Banner() );