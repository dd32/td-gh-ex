<?php
/**
 * @package beetech
 */

if ( class_exists( 'WP_Customize_Control' ) ) {
    
    /** Switch Button **/
    class beetech_Customize_Switch_Control extends WP_Customize_Control {

		public $type = 'switch';

		public function render_content() {
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="description customize-control-description"><?php echo esc_html( $this->description ); ?></div>
		        <div class="switch_button">
		        	<?php 
		        		$show_choices = $this->choices;
		        		foreach ( $show_choices as $key => $value ) {
		        			echo '<span class="switch_part '.esc_attr($key).'" data-switch="'.esc_attr($key).'">'. esc_attr($value).'</span>';
		        		}
		        	?>
                  	<input type="hidden" id="switch_button" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" />
                </div>
            </label>
	<?php
		}
	}
    
    /** Custom Category Control **/
	class beetech_Customize_Category_Control extends WP_Customize_Control {
		
		public function render_content() {
			$dropdown = wp_dropdown_categories(
					array(
						'name'              => '_customize-dropdown-categories-' . $this->id,
						'echo'              => 0,
						'show_option_none'  => esc_html__( '&mdash; Select Category &mdash;', 'beetech' ),
						'option_none_value' => '0',
						'selected'          => $this->value(),
					)
			);

			// Hackily add in the data link parameter.
			$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

			printf(
				'<label class="customize-control-select"><span class="customize-control-title">%s</span><span class="description customize-control-description">%s</span> %s </label>',
				$this->label,
				$this->description,
				$dropdown
			);
		}
	}
    
    /** Fa Icons List **/
	class beetech_Customize_Icons_Control extends WP_Customize_Control {

		public $type = 'beetech_icons';

		public function render_content() {

			$saved_icon_value = $this->value();
	?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<div class="fa-icons-list">
					<div class="selected-icon-preview"><?php if( !empty( $saved_icon_value ) ) { echo '<i class="fa '. esc_attr($saved_icon_value) .'"></i>'; } ?></div>
					<ul class="icons-list-wrapper">
						<?php 
							$beetech_icons_list = beetech_icons_array();
							foreach ( $beetech_icons_list as $key => $icon_value ) {
								if( $saved_icon_value == $icon_value ) {
									echo '<li class="selected"><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								} else {
									echo '<li><i class="fa '. esc_attr($icon_value) .'"></i></li>';
								}
							}
						?>
					</ul>
					<input type="hidden" class="ap-icon-value" value="" <?php $this->link(); ?>>
				</div>

			</label>
	<?php
		}
	}

    /** Separator Class **/
	class beetech_Customize_Section_Separator extends WP_Customize_Control {
		
		public $type = 'beetech_separator';

		public function render_content() {
	?>
		<div class="customize-section-wrap">
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			</label>
		</div>
	<?php
		}
	}
    
    /**  Beetech Pro Link **/
    class beetech_Pro_Link_Section extends WP_Customize_Section {

        public $type = 'beetech-pro';

        public $pro_text = '';

        public $pro_url = '';

        public function json() {
            $json = parent::json();
            $json['pro_text'] = $this->pro_text;
            $json['pro_url']  = esc_url( $this->pro_url );
            return $json;
        }
        protected function render_template() { ?>

            <li id="custom-section-{{ data.id }}" class="custom-section control-section control-section-{{ data.type }} cannot-expand">
                <h3 class="custom-section-title">
                    {{ data.title }}
                    <# if ( data.pro_text && data.pro_url ) { #>
                        <a href="{{ data.pro_url }}" class="button button-custom alignright" target="_blank">{{ data.pro_text }}</a>
                    <# } #>
                </h3>
            </li>
        <?php }
    }
    
    /**
     * Theme info
     */
    class beetech_Theme_Info extends WP_Customize_Control {
        public function render_content(){

            $our_theme_infos = array(
                'demo' => array(
                   'link' => esc_url( 'http://buzthemes.com/demo/beetech/' ),
                   'text' => esc_html__( 'View Demo', 'beetech' ),
                ),
                'documentation' => array(
                   'link' => esc_url( 'https://buzthemes.com/doc/beetech/' ),
                   'text' => esc_html__( 'Documentation', 'beetech' ),
                ),
                'support' => array(
                   'link' => esc_url( 'https://buzthemes.com/forums/forum/beetech/' ),
                   'text' => esc_html__( 'Support', 'beetech' ),
                ),
            );
            foreach ( $our_theme_infos as $our_theme_info ) {
                echo '<p><a target="_blank" href="' . $our_theme_info['link'] . '" >' . esc_html( $our_theme_info['text'] ) . ' </a></p>';
            }
        ?>
        	<label>
        	    <h2 class="customize-title"><?php echo esc_html( $this->label ); ?></h2>
        	    <span class="customize-text_editor_desc">                 
        	        <ul class="admin-pro-feature-list">   
                        <li><span><?php esc_html_e('One Click Demo Import','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Modern and elegant design','beetech'); ?> </span></li>
                        <li><span><?php esc_html_e('3 Homepage Layouts','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('100% Responsive theme','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Awesome Counter Section','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Advanced Typography','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Breadcrumb Settings','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Highly configurable home page','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('3 Blog Section Layout','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Pricing Table  Section','beetech'); ?> </span></li>
                        <li><span><?php esc_html_e('Skill Section','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('FAQ Section','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('3 Testimonial Section Layout','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('3 Portfolio Section','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Four Footer Widget Areas','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Sidebar Options','beetech'); ?> </span></li>
        	            <li><span><?php esc_html_e('Translation ready','beetech'); ?> </span></li>
                        <li><span><?php esc_html_e('Useful Shortcodes','beetech'); ?> </span></li>
                        <li><span><?php esc_html_e('WordPress Live Customizer Based','beetech'); ?> </span></li>
        	        </ul>
        	        <?php $beetech_pro_link = 'https://buzthemes.com/demo/beetech-pro/'; ?>
        	        <a href="<?php echo esc_url($beetech_pro_link); ?>" class="button button-primary buynow" target="_blank"><?php esc_html_e('Buy Now','beetech'); ?></a>
        	    </span>
        	</label>
        <?php
        }
    }
    
}