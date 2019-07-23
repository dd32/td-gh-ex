<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Discover extends Widget_Base { 
	
	public function get_name() {
		return __( 'discover', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Discover Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_discover',
			array(
				'label' => __( 'Discover Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'discover_enable',
			array(
				'label' => __( 'Enable/Disable Discover Section', 'best-charity' ),
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title',
			array(
				'label' => __( 'Discover Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT, 
				'default' => '',
			)
		);
		
		$this->add_control(
			'discover_page_id', // Control key
			array(
				'label' => __( 'Select Page For Discover', 'best-charity' ),
				'description' => __( 'It\'s display page title, description and featured image for discover heading, description and image', 'best-charity' ),
				'type' => Controls_Manager::SELECT2, 
				'options'=>$this->getTermsForSelect(),
				'default' => '',
			)
		);
		
		$this->add_control(
			'discover_second_image',
			array(
				'label' => __( 'Choose Second Image', 'best-charity' ),
				'type' => Controls_Manager::MEDIA,
				'default' => array(
					'url' => Utils::get_placeholder_image_src(),
				),
			)
		);

		$this->add_control(
			'btn_title', // Control key
			array(
				'label' => __( 'Button Text', 'best-charity' ),
				'type' => Controls_Manager::TEXT, 
				'default' => '',
			)
		);

		$this->add_control(
			'btn_url', // Control key
			array(
				'label' => __( 'Button Url', 'best-charity' ),
				'type' => Controls_Manager::URL, 
				'placeholder' => 'https://example.com',
			)		
		);

		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_discover = $this->get_settings();
	
		include( get_template_directory() . '/section/discover.php' );
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Discover() );