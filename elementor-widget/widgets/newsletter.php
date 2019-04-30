<?php
namespace Elementor; 
if ( ! defined( 'ABSPATH' ) ) exit; 
class Newsletter extends Widget_Base { 
	
	public function get_name() {
		return __( 'newsletter', 'best-charity' );
	}
	
	
	public function get_title() {
		return __( 'Newsletter Section', 'best-charity' );
	}
	
   public function get_icon() {
      return 'fa fa-file-image-o';
   }
	
	protected function _register_controls() {
		$this->start_controls_section(
			'section_newsletter', // Section key
			array(
				'label' => __( 'Newsletter Title', 'best-charity' ), // Section display name
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT, // Which tab to display the section in.
			)
		);
		/*
		 * After you start the section, you can put as many controls inside the section as you want.
		 */
		$this->add_control(
			'newsletter_enable', // Control key
			array(
				'label' => __( 'Enable/Disable Newsletter Section', 'best-charity' ), // Control label
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
				'label' => __( 'Newsletter Tagline', 'best-charity' ), // Control label
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);
		
		$this->add_control(
			'newsletter_shortcode', // Control key
			array(
				'label' => __( 'Newsletter Plugins shortcode', 'best-charity' ), // Control label
				/* translators: %s: Description */ 
  				'description'           => sprintf( __( 'Use Newsletter Plugins shortcode: Eg: %1$s. %2$s See more here %3$s', 'best-charity' ), '[newsletter_form type="minimal"]','<a href="'.esc_url('https://wordpress.org/plugins/newsletter/').'" target="_blank">','</a>' ),
				'type' => Controls_Manager::TEXT, // Type of control
				'default' => '', // Default value for control
			)
		);
		// Ends the controls section
		$this->end_controls_section();
	}
	
	
	protected function render() {
		$sample_newsletter = $this->get_settings();
	
		include( get_template_directory() . '/section/newsletter.php' );
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
// After the Newsletter class is defined, I must register the new widget class with Elementor:
Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Newsletter() );