<?php function rambo_join_email_course_customizer( $wp_customize ) {


$wp_customize->add_section( 'rambo_email_course_section' , array(
		'title'      => __('CREATE TRUSTWORTHY WEBSITES', 'rambo'),
		'priority'   => 1200,
   	) );


/* Email Course */

class WP_course_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
	   <div class="pro-vesrion">
	   <p><?php _e('A website exists for one and ONLY one reason:','rambo');?>
	   <b><?php _e('To bring you more business.','rambo'); ?></b></p>
	   <p>
	   <?php _e('Think of your website as a hardworking salesman who works 24/7 and never asks for a raise!','rambo');?>
	   </p>
	   <?php _e('In this email course I deliver 4 highly actionable tips on how you can build a website which is trustworthy and which, in turn, brings more business to you.','rambo'); ?>
	</div>
	  </br>
	  <div class="pro-box">
     <a href="<?php echo 'http://webriti.com/website-email-course/';?>" target="_blank" class="course" id="email_course"><?php _e('JOIN COURSE','rambo' ); ?></a>
	 </div>
    <?php
    }
}

$wp_customize->add_setting(
    'email_course',
    array(
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_course_Customize_Control( $wp_customize, 'email_course', array(	
		'section' => 'rambo_email_course_section',
		'setting' => 'email_course',
    ))
);


}
add_action( 'customize_register', 'rambo_join_email_course_customizer' );