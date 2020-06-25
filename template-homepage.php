<?php

// Template Name: Home Page

get_header();
$wallstreet_options=wallstreet_theme_data_setup();
$current_options = wp_parse_args(  get_option( 'wallstreet_pro_options', array() ), $wallstreet_options );?>
<div id="content">
	<?php
		do_action('wallstreet_sections', false);

		//****** get index blog  ********
		if ($current_options['blog_section_enabled'] ==true) {
		    get_template_part('index', 'blog');
		}
	?>
</div>
<?php 
get_footer();