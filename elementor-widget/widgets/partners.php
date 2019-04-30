<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Partners extends Widget_Base { 
	
	public function get_name() {
		return __( 'partners', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Partners Section', 'best-charity' );
	}
	
	public function get_icon() {
		return 'fa fa-file-image-o';
	}
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_partners', // Section key
			array(
				'label' => __( 'Partners Section', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'partners_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Partners Section', 'best-charity' ), // Control label
				'type' => Controls_Manager::SWITCHER, // Type of control
				'label_on' => __( 'Show', 'best-charity' ),
				'label_off' => __( 'Hide', 'best-charity' ),
				'return_value' => 'yes',
				'default' => 'yes',
			)
		);

		$this->add_control(
			'partner_items',
			array(
				'label' => __( 'Partner Items', 'best-charity' ),
				'type' => Controls_Manager::REPEATER,
				'default' =>array(
					array(
						'partner_image' => ''
					)
				),
				'fields' => array(
					array(
						'name' => 'partner_image',
						'label' => __( 'Partner Image or Logo', 'best-charity' ),
						'type' => Controls_Manager::MEDIA,
						'default' => array(
							'url' => Utils::get_placeholder_image_src(),
						),
					)
				),
				// Which subfield's value is shown when the repeater field is collapsed
				'title_field' => '{{{ name }}}',
			)
		);

		// Ends the controls section
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_partners = $this->get_settings();

		include( get_template_directory() . '/section/partners.php' );
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
// After the Partners class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Partners() );