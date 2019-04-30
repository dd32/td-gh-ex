<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Services extends Widget_Base { 
	
	public function get_name() {
		return __( 'services', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Services Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_services', // Section key
			array(
				'label' => __( 'Services Section', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'services_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Services Section', 'best-charity' ), // Control label
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
				'label' => __( 'Services Title', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'sub_title', // Control key
			array(
				'label' => __( 'Services Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'service_items',
			array(
				'label' => __( 'Service Items', 'best-charity' ),
				'type' => Controls_Manager::REPEATER,
				'default' =>array(
					array(
						'service_icon' => '',
						'service_title' => '',
						'service_description' => ''
					)
				),
				'fields' => array(
					array(
						'name' => 'service_icon',
						'label' => __( 'Service Ion', 'best-charity' ),
						'type' => Controls_Manager::ICON,
						'options' => $this->getTermsForSelect(),
						'label_block' => true,
					),
					array(
						'name' => 'service_title',
						'label' => __( 'Service Title', 'best-charity' ), // Control label
						'type' => Controls_Manager::TEXT, // Type of control
						'label_block' => true,
					),
					array(
						'name' => 'service_description',
						'label' => __( 'Service Description', 'best-charity' ), // Control label
						'type' => Controls_Manager::TEXTAREA, // Type of control
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
		$sample_services = $this->get_settings();
	
		include( get_template_directory() . '/section/services.php' );
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
// After the Services class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Services() );