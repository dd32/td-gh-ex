<?php 

// Adding customizer layout manager settings

function corpbiz_layout_manager_customizer( $wp_customize ){

class WP_layout_Customize_Control extends WP_Customize_Control {	

	public $type = 'new_menu';
	
	public function render_content() {
		
		$current_options = wp_parse_args( get_option('corpbiz_options',array()),theme_data_setup());
		$data_enable = explode(",",$current_options['front_page_data']);	
		$defaultenableddata=array('site-info','service','project-slider','portfolio','testimonial','help-support','blog','call-out-area');
		$layout_disable=array_diff($defaultenableddata,$data_enable); ?>
		
		<h3><?php _e('Enable','corpbiz'); ?></h3>
		  <ul class="sortable customizer_layout" id="enable">
		  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
		  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
		  <?php } } ?>
		  </ul>
  
  
		 <h3><?php _e('Disable','corpbiz'); ?></h3> 
		 <ul class="sortable customizer_layout" id="disable">
		 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
		  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
		  <?php } } ?>
		 </ul>
		 <div class="section">
		 <p> <b><?php _e('Slider section always top on the home page','corpbiz'); ?></b></p>
		 <p> <b><?php _e('Note','corpbiz'); ?> </b> <?php _e('By default all the section are enable on homepage. If you do not want to display any section just drag that section to the disabled box.','corpbiz'); ?><p>
		</div>
<?php } }
	
	/* layout manager Panel */
	$wp_customize->add_panel( 'layout_manager_panel', array(
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme layout manager', 'corpbiz'),
	) );
	
	/* layout manager section */
	$wp_customize->add_section( 'frontpage_layout' , array(
		'title'      => __('Theme layout manager', 'corpbiz'),
		'panel'  => 'layout_manager_panel',
		'priority'   => 1,
   	) );
	
	
	
	class WP_layout_pro_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
     <div class="pro-vesrion">
	 <P><?php _e('Use homepage layout section setting drag & drop than upgrade to pro','corpbiz');?></P>
	 </div>
	  <div class="pro-box">
	 <a href="<?php echo esc_url('http://webriti.com/corpbiz/');?>" class="service" id="review_pro">
	 <?php _e( 'Upgrade to pro','corpbiz' ); ?></a>
	 <div>
    <?php
    }
}

	$wp_customize->add_setting(
		'layout_pro',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_layout_pro_Customize_Control( $wp_customize, 'layout_pro', array(	
			'section' => 'frontpage_layout',
			'setting' => 'layout_pro',
		))
	);
	
	
	$wp_customize->add_setting(
		'corpbiz_options[layout_manager]',
		array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			
		)	
	);
	$wp_customize->add_control( new WP_layout_Customize_Control( $wp_customize, 'corpbiz_options[layout_manager]', array(
			'section' => 'frontpage_layout',
			'setting' => 'corpbiz_options[layout_manager]',
		))
	);
	
	$wp_customize->add_setting(
		'corpbiz_options[front_page_data]',
		array(
			'default'           =>  'site-info,service,project-slider,portfolio,testimonial,help-support,blog,call-out-area',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('corpbiz_options[front_page_data]', array(
			'label' => __('Enable','corpbiz'),
			'section' => 'frontpage_layout',
			'type'    =>  'text'
	));	 // enable textbox
	
}
add_action( 'customize_register', 'corpbiz_layout_manager_customizer' );