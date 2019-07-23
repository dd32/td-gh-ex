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
			'section_services',
			array(
				'label' => __( 'Services Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'services_enable',
			array(
				'label' => __( 'Enable/Disable Services Section', 'best-charity' ),
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title', // Control key
			array(
				'label' => __( 'Services Title', 'best-charity' ),
				'type' => Controls_Manager::TEXT, 
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'sub_title', // Control key
			array(
				'label' => __( 'Services Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT, 
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
						'label' => __( 'Service Title', 'best-charity' ),
						'type' => Controls_Manager::TEXT, 
						'label_block' => true,
					),
					array(
						'name' => 'service_description',
						'label' => __( 'Service Description', 'best-charity' ),
						'type' => Controls_Manager::TEXTAREA, 
						'label_block' => true,	
					),
				),
				
				'title_field' => '{{{ name }}}',
			)
		);
		
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Services() );