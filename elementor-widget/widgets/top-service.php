<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class TopService extends Widget_Base { 
	
	public function get_name() {
		return __( 'topservice', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Top Service Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-cog';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_top_service',
			array(
				'label' => __( 'Top Service Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'top_service_enable',
			array(
				'label' => __( 'Enable/Disable Top Service Section', 'best-charity' ), 
				'type' => Controls_Manager::SWITCHER, 
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

	
		$this->add_control(
			'service_items',
			array(
				'label' => __( 'Service Items', 'best-charity' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => array(
					array(
						'name' => 'page_for_tit_desc',
						'label' => __( 'Select Page For Top Service', 'best-charity' ),
						'description' => __( 'It\'s display page title and description for Top service title and description', 'best-charity' ), // Description label
						'type' => Controls_Manager::SELECT,
						'options' => $this->getTermsForSelect(),
						'label_block' => true,
					),
					array(
						'name' => 'service_icon',
						'label' => __( 'Service Icon', 'best-charity' ), // Control label
						'type' => Controls_Manager::ICON, // Type of control
						'label_block' => true,
					),
				),
				
				'title_field' => '{{{ name }}}',
			)
		);
	
		$this->end_controls_section();
	}
	
	protected function render() {
		$sample_top_service = $this->get_settings();
		
		include( get_template_directory() . '/section/top-service.php' );
	}
	
	public function get_categories() {
		return array( 'best_charity' );
	}
	public function getPostsForSelect( $args = null ) {
        $posts = get_posts();

        $select_posts = array();

        foreach( $posts as $post ) {
            $select_posts[$post->ID] = ucfirst( $post->post_title );
        }
        return $select_posts;
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\TopService() );