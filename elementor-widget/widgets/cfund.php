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
			'section_cfund', // Section key
			array(
				'label' => __( 'Cfund Section', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'cfund_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Cfund Section', 'best-charity' ), // Control label
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
				'label' => __( 'Cfund Title', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);

		$this->add_control(
			'sub_title', // Control key
			array(
				'label' => __( 'Cfund Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);
		
		$this->add_control(
			'cfund_cat_id', // Control key
			[
				'label' => __( 'Select Category For Cfund', 'best-charity' ), // Control label
				'type' => Controls_Manager::SELECT2, // Type of control
				'options'=>$this->getCategoryForSelect(),
				'default' => '', // Default value for control
			]
		);
		
		
		$this->add_control(
			'no_of_post', // Control key
			array(
				'label' => __( 'Number of post', 'best-charity' ), // Control label
				'description' => __('such as 1, 2, 3....','best-charity'),
				'type' => Controls_Manager::NUMBER, // Type of control
				'default' => '', // Default value for control
			)
		);


		// Ends the controls section
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
// After the Cfund class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Cfund() );