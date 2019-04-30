<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class About extends Widget_Base { 
	
	public function get_name() {
		return __( 'about', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'About Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_about', // Section key
			array(
				'label' => __( 'About Section', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'about_enable', // Control key
			array(
				'label' => __( 'Enable/Disable About Section', 'best-charity' ), // Control label
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
				'label' => __( 'About Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);
		
		$this->add_control(
			'about_page_id', // Control key
			array(
				'label' => __( 'Select Page For About', 'best-charity' ), // Control label
				'description' => __( 'It\'s display page title, description and featured image for about heading, description and image', 'best-charity' ), // Control label
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

		$this->add_control(
			'brand_tagline', // Control key
			array(
				'label' => __( 'Brand Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'brand_title', // Control key
			array(
				'label' => __( 'Brand Title', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'brand_items',
			array(
				'label' => __( 'Brands Items', 'best-charity' ),
				'type' => Controls_Manager::REPEATER,
				'default' =>array(
					array(
						'item_title' => '',
						'item_percentage' => '',
					)
				),
				'fields' => array(
					array(
						'name' => 'item_title',
						'label' => __( 'Item Title', 'best-charity' ),
						'type' => Controls_Manager::TEXT,
						'options' => $this->getTermsForSelect(),
						'label_block' => true,
					),
					array(
						'name' => 'item_percentage',
						'label' => __( 'Item Percentage(%)', 'best-charity' ), // Control label
						'type' => Controls_Manager::TEXT, // Type of control
						'label_block' => true,
					),
				),
				// Which subfield's value is shown when the repeater field is collapsed
				'title_field' => '{{{ name }}}',
			)
		);

		// Ends the controls section
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_about = $this->get_settings();
	
		include( get_template_directory() . '/section/about.php' );
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
// After the About class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\About() );