<?php 
// layout manager settings
function spasalon_layout_manager_customizer( $wp_customize ){
	
class WP_hotel_layout_Customize_Control extends WP_Customize_Control {	

	public $type = 'new_menu';
	
	public function render_content() {
		
		$current_options = wp_parse_args(  get_option( 'spa_theme_options', array() ), default_data() );
		
		$data_enable = is_array( $current_options['front_page_data'] ) ? $current_options['front_page_data'] : explode(",",$current_options['front_page_data']); 
		
		$defaultenableddata=array('slider','Service Section','product section','news');
		$layout_disable=array_diff($defaultenableddata,$data_enable);  
		?>
		
		<h3><?php _e('Enable','sis_spa'); ?></h3>
		  <ul class="sortable customizer_layout" id="enable">
		  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
		  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
		  <?php } } ?>
		  </ul>
  
  
		 <h3>Disable</h3> 
		 <ul class="sortable customizer_layout" id="disable">
		 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
		  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
		  <?php } } ?>
		 </ul>
		 <div class="section">
		 <p> <b><?php _e('Slider section always top on the home page','sis_spa'); ?></b></p>
		 <p> <b><?php _e('Note:','sis_spa'); ?> </b> <?php _e('By default all the section are enable on homepage. If you do not want to display any section just drag that section to the disabled box.','sis_spa'); ?><p>
		</div>
<?php } 

}
	
	/* layout manager settings */
	$wp_customize->add_panel( 'layout_settings', array(
		'priority'       => 131,
		'capability'     => 'edit_theme_options',
		'title'      => __('Layout Manager', 'sis_spa'),
	) );
	
		/* Front Page Layout */
		$wp_customize->add_section( 'frontpage_layout' , array(
			'title'      => __('Front Page Layout', 'sis_spa'),
			'panel'  => 'layout_settings'
		) );
		
			$wp_customize->add_setting('spa_theme_options[layout_manager]',	array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option'
			));
			$wp_customize->add_control( new WP_hotel_layout_Customize_Control( $wp_customize, 'spa_theme_options[layout_manager]', array(
			'label' => __('Discover Spasalon Pro','sis_spa'),
			'section' => 'frontpage_layout',
			'setting' => 'layout_manager',
			) ) );
			
			$wp_customize->add_setting( 'spa_theme_options[front_page_data]', array(
			'default'           =>  'slider,Service Section,product section,news',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type' => 'option'
			) );
			$wp_customize->add_control('spa_theme_options[front_page_data]', array(
			'label' => __('Enable','sis_spa'),
			'section' => 'frontpage_layout',
			'type'    =>  'text'
			));	 // enable textbox
	
}
add_action( 'customize_register', 'spasalon_layout_manager_customizer' );