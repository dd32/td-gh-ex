<?php
/***********************
/*
/*	Generate_Customize_Slider_Control
/* 
/***********************/
if ( !class_exists('Generate_Customize_Width_Slider_Control') ) :
	class Generate_Customize_Width_Slider_Control extends WP_Customize_Control
	{
		// Setup control type
		public $type = 'slider';
		
		public function __construct($manager, $id, $args = array(), $options = array())
		{
			parent::__construct( $manager, $id, $args );
		}

		// Override content render function to output slider HTML
		public function render_content()
		{ ?>
			<label><span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span></label>
			<input name="<?php echo $this->id; ?>" type="text" <?php $this->link(); ?> value="<?php echo $this->value(); ?>" style="display:none" />
			<div class="slider"></div>
			<p class="description"><?php _e('Width','generate');?> - <strong class="value"><?php echo $this->value(); ?></strong>px</p>
		<?php
		}
		
		// Function to enqueue the right jquery scripts and styles
		public function enqueue() {
			
			wp_enqueue_script( 'jquery-ui-core' );
			wp_enqueue_script( 'jquery-ui-slider' );
			
			wp_register_script( 'generate-customcontrol-slider-js', GEN_URI . '/js/customcontrol.slider.js', array('jquery'), GEN_VERSION );
			wp_enqueue_script( 'generate-customcontrol-slider-js' );
			wp_enqueue_script( 'generate_customizer', GEN_URI . '/js/customizer.js', array( 'jquery' ), GEN_VERSION, true );
			
			wp_register_style('jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css');
			wp_enqueue_style('jquery-ui');
			
		}
	}
endif;