<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Numbering extends Widget_Base { 
	
	public function get_name() {
		return __( 'numbering', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Numbering Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_numbering',
			array(
				'label' => __( 'Numbering Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, 
			)
		);
	
		$this->add_control(
			'numbering_enable',
			array(
				'label' => __( 'Enable/Disable Numbering Section', 'best-charity' ),
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
				'label' => __( 'Numbering Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT, 
				'default' => '',
			)
		);
		
		$this->add_control(
			'numbering_page_id',
			array(
				'label' => __( 'Select Page For Numbering', 'best-charity' ), // Control label
				'description' => __( 'It\'s display page title and description for numbering heading and description', 'best-charity' ), // Control label
				'type' => Controls_Manager::SELECT2,
				'options'=>$this->getTermsForSelect(),
				'default' => '', 
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
				'placeholder' => '',
			)
		);

		$this->add_control(
			'numbering_items',
			array(
				'label' => __( 'Numbering Items', 'best-charity' ),
				'show_label'=> true,	
				'default' =>array(
					array(
						'numbering_title' => '',
						'numbering_no' => '',
					)
				),
				'label_block' => true,
				'type' => Controls_Manager::REPEATER,
				'fields' => array(
					array(
						'name' => 'numbering_no',
						'label' => __( 'Numbering Number', 'best-charity' ),
						'type' => Controls_Manager::NUMBER,
						'label_block' => true,	
					),
					array(
						'name' => 'numbering_title',
						'label' => __( 'Numbering Title', 'best-charity' ),
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
		$sample_numbering = $this->get_settings();
	
		include( get_template_directory() . '/section/numbering.php' );
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

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Numbering() );