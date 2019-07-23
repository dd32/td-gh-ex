<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Testimonial extends Widget_Base { 
	
	public function get_name() {
		return __( 'testimonial', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Testimonial Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_testimonial',
			array(
				'label' => __( 'Testimonial Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'testimonial_enable',
			array(
				'label' => __( 'Enable/Disable Testimonial Section', 'best-charity' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'title', // Control key
			[
				'label' => __( 'Testimonial Title', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '', // Default value for control
			]
		);
		

		$this->add_control(
			'sub_title', // Control key
			array(
				'label' => __( 'Testimonial Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '', // Default value for control
			)
		);
		$this->add_control(
			'testimonials_items',
			array(
				'label' => __( 'Service Items', 'best-charity' ),
				'type' => Controls_Manager::REPEATER,
				'default' =>array(
					array(
						'testimonial_page' => '',
						'testimonial_position' => '',
					)
				),
				'fields' => array(
					array(
						'name' => 'testimonial_page',
						'label' => __( 'Select Page For Testimonials', 'best-charity' ),
						'description' => __( 'It\'s display page title, description and featured Image for Testimonials title, description and image', 'best-charity' ), // Description label
						'type' => Controls_Manager::SELECT,
						'options' => $this->getTermsForSelect(),
						'label_block' => true,
					),
					array(
						'name' => 'testimonial_position',
						'label' => __( 'Position', 'best-charity' ),
						'description' => __('Eg:- Developer, Designer','best-charity'),
						'type' => Controls_Manager::TEXT,
						'label_block' => true,
					),
				),
				
				'title_field' => '{{{ name }}}',
			)
		);
		
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_testimonial = $this->get_settings();
	
		include( get_template_directory() . '/section/testimonial.php' );
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Testimonial() );