<?php // Adding customizer layout manager settings

function elitepress_layout_manager_customizer( $wp_customize ){

class WP_layout_Customize_Control extends WP_Customize_Control {	

	public $type = 'new_menu';
	
	public function render_content() {
		
		$current_options = wp_parse_args( get_option('elitepress_lite_options',array()),theme_data_setup());
		$data_enable = explode(",",$current_options['front_page_data']);	
		$defaultenableddata=array('top-call-out-section','service','portfolio','testimonial','blog','client','contact');
		$layout_disable=array_diff($defaultenableddata,$data_enable); ?>
		
		<h3><?php _e('Enable','elitepress'); ?></h3>
		  <ul class="sortable customizer_layout" id="enable">
		  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
		  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
		  <?php } } ?>
		  </ul>
  
  
		 <h3><?php _e('Disable','elitepress'); ?></h3> 
		 <ul class="sortable customizer_layout" id="disable">
		 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
		  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
		  <?php } } ?>
		 </ul>
		 <div class="section">
		 <p> <b><?php _e('Slider has fixed position on homepage.','elitepress'); ?></b></p>
		 <p> <b><?php _e('Note','elitepress'); ?> </b> <?php _e('By default, all the sections are enabled on the homepage. If you do not want to display any section just drag that section to the disabled box.','elitepress'); ?><p>
		</div>
<script>
jQuery(document).ready(function($) {
    $( ".sortable" ).sortable({
		connectWith: '.sortable'
	});
  });
   
jQuery(document).ready(function($){	
	
	// Get items id you can chose
	function webritiItems(webriti)
	{
		var columns = [];
		$(webriti + ' #enable').each(function(){
			columns.push($(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	//onclick check id
	$('#enable .ui-state,#disable .ui-state').mouseleave(function(){ 
		var enable = webritiItems('#customize-control-elitepress_lite_options-layout_manager');

		$("#customize-control-elitepress_lite_options-front_page_data input[type = 'text']").val(enable);
		$("#customize-control-elitepress_lite_options-front_page_data input[type = 'text']").change();		
	});

  });
</script>
<?php } }


	/* layout manager Panel */
	$wp_customize->add_panel( 'layout_manager', array(
		'priority'       => 999,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Layout Manager', 'elitepress'),
	) );
	
	/* layout manager section */
	$wp_customize->add_section( 'layout_manager_section' , array(
		'title'      => __('Theme Layout Manager', 'elitepress'),
		'panel'  => 'layout_manager',
		'priority'   => 1,
   	) );
	
	
	//Upgrade to pro
		class elitepress_customize_layout_manager_upgrade_pro_message extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php echo sprintf(__("Want to reorder homepage sections? <a href='https://webriti.com/elitepress/' target='_blank'>Upgrade to Pro</a>","elitepress"));?></h3>
			<?php
			}
		}
		
		
		$wp_customize->add_setting( 'layout_manager_upgrade', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new elitepress_customize_layout_manager_upgrade_pro_message(
			$wp_customize,
			'layout_manager_upgrade',
				array(
					'section'				=> 'layout_manager_section',
					'settings'				=> 'layout_manager_upgrade',
					'priority'   => 2,
				)
			)
		);
	
	
	$wp_customize->add_setting(
		'elitepress_lite_options[layout_manager]',
		array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			
		)	
	);
	$wp_customize->add_control( new WP_layout_Customize_Control( $wp_customize, 'elitepress_lite_options[layout_manager]', array(
			'section' => 'layout_manager_section',
			'setting' => 'elitepress_lite_options[layout_manager]',
		))
	);
	
	$wp_customize->add_setting(
		'elitepress_lite_options[front_page_data]',
		array(
			'default'           =>  'top-call-out-section,service,portfolio,testimonial,blog,client,contact',
			'capability'        =>  'edit_theme_options',
			'sanitize_callback' =>  'sanitize_text_field',
			'type'              =>  'option'
		)	
	);
	$wp_customize->add_control('elitepress_lite_options[front_page_data]', array(
			'label' => __('Enable','elitepress'),
			'section' => 'layout_manager_section',
			'type'    =>  'text'
	));	 // enable textbox
	
}
add_action( 'customize_register', 'elitepress_layout_manager_customizer' );