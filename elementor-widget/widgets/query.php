<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Query extends Widget_Base { 
	
	public function get_name() {
		return __( 'query', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Query Section', 'best-charity' );
	}
	
	public function get_icon() {
		return 'fa fa-file-image-o';
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_query',
			array(
				'label' => __( 'Query Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
	
		$this->add_control(
			'query_enable',
			array(
				'label' => __( 'Enable/Disable Query Section', 'best-charity' ),
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
				'label' => __( 'Query Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			)
		);
		
		$this->add_control(
			'query_page_id',
			array(
				'label' => __( 'Select Page For Query', 'best-charity' ),
				  /* translators: %s: Description */ 
				'description' => __( 'It\'s display page title, description and featured image for query heading, description and image', 'best-charity' ),
				'type' => Controls_Manager::SELECT2,
				'options'=>$this->getTermsForSelect(),
				'default' => '',
			)
		);
		
		$this->add_control(
			'contact_shortcode',
			array(
				'label' => __( 'Contact Form shortcode', 'best-charity' ),
				'description'           => sprintf( __( 'Use Contact Form 7 Plugins shortcode: Eg: %1$s. %2$s See more here %3$s', 'best-charity' ), '[contact-form-7 id="108" title="Contact form 1"]','<a href="'.esc_url('https://wordpress.org/plugins/contact-form-7/').'" target="_blank">','</a>' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_query = $this->get_settings();
		
		include( get_template_directory() . '/section/query.php' );
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Query() );