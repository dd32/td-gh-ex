<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Cfund extends Widget_Base { 
	
	public function get_name() {
		return __( 'cfund', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Cfund Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_cfund', 
			array(
				'label' => __( 'Cfund Section', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
	
		$this->add_control(
			'cfund_enable',
			array(
				'label' => __( 'Enable/Disable Cfund Section', 'best-charity' ),
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
				'label' => __( 'Cfund Title', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			)
		);

		$this->add_control(
			'sub_title',
			array(
				'label' => __( 'Cfund Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '',
			)
		);
		
		$this->add_control(
			'cfund_cat_id',
			[
				'label' => __( 'Select Category For Cfund', 'best-charity' ),
				'type' => Controls_Manager::SELECT2,
				'options'=>$this->getCategoryForSelect(),
				'default' => '',
			]
		);
		
		
		$this->add_control(
			'no_of_post',
			array(
				'label' => __( 'Number of post', 'best-charity' ),
				'description' => __('such as 1, 2, 3....','best-charity'),
				'type' => Controls_Manager::NUMBER,
				'default' => '',
			)
		);

		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_cfund = $this->get_settings();
	
		include( get_template_directory() . '/section/cfund.php' );
	}
	
	
	public function get_categories() {
		return array( 'best_charity' );
	}
	
    public function getCategoryForSelect( $args = null ) {
        $cats = get_categories();
        
        $select_cats = array();

        foreach( $cats as $cat ) {
            $select_cats[$cat->term_id] = ucfirst( $cat->name );
        }
        return $select_cats;
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Cfund() );