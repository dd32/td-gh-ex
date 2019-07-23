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
			'section_newsletter',
			array(
				'label' => __( 'Newsletter Title', 'best-charity' ),
				'type' => Controls_Manager::SECTION, 
				'tab' => Controls_Manager::TAB_CONTENT,
			)
		);
		
		$this->add_control(
			'newsletter_enable',
			array(
				'label' => __( 'Enable/Disable Newsletter Section', 'best-charity' ),
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
				'label' => __( 'Newsletter Tagline', 'best-charity' ),
				'type' => Controls_Manager::TEXT,
				'default' => '', 
			)
		);
		
		$this->add_control(
			'newsletter_shortcode',
			array(
				'label' => __( 'Newsletter Plugins shortcode', 'best-charity' ),
				/* translators: %s: Description */ 
  				'description'           => sprintf( __( 'Use Newsletter Plugins shortcode: Eg: %1$s. %2$s See more here %3$s', 'best-charity' ), '[newsletter_form type="minimal"]','<a href="'.esc_url('https://wordpress.org/plugins/newsletter/').'" target="_blank">','</a>' ),
				'type' => Controls_Manager::TEXT,
				'default' => '', 
			)
		);
	
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