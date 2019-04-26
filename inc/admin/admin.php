<?php
//about theme info
add_action( 'admin_menu', 'advance_fitness_gym_abouttheme' );
function advance_fitness_gym_abouttheme() {    	
	add_theme_page( esc_html__('About Fitness Theme', 'advance-fitness-gym'), esc_html__('About Fitness Theme', 'advance-fitness-gym'), 'edit_theme_options', 'advance_fitness_gym_guide', 'advance_fitness_gym_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function advance_fitness_gym_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'advance_fitness_gym_admin_theme_style');

//guidline for about theme
function advance_fitness_gym_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
 <div class="wrapper-info">
	 <div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
	 	<h2><?php esc_html_e('Welcome to Advance Fitness Gym Theme', 'advance-fitness-gym'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'advance-fitness-gym'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-fitness-gym'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-fitness-gym'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-fitness-gym'); ?></a>
		</div>
	</div>
	<div class="button-bg">
	<button class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'advance-fitness-gym'); ?></button>
	<button class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'advance-fitness-gym'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'advance-fitness-gym'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'advance-fitness-gym'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_CONTACT ); ?>"><?php esc_html_e('Support', 'advance-fitness-gym'); ?></a>
			<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'advance-fitness-gym'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'advance-fitness-gym'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'advance-fitness-gym'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'advance-fitness-gym'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'advance-fitness-gym'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png" alt="" />	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" alt="" />	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'advance-fitness-gym'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'advance-fitness-gym'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>

	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'advance-fitness-gym'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-fitness-gym'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-fitness-gym'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_FITNESS_GYM_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-fitness-gym'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg" alt="" />
	  			<p><?php esc_html_e( 'This WordPress fitness theme is dynamic, dazzling, charming and smart with best fit for fitness clubs, personal trainers, yoga classes, health consultants and all the people who are fitness freaks and want to see a fit and healthy world around them. It is utterly modern and has the capability to change its look according to your brand without taking much of your efforts. It comes with plenty of options for layouts, colours, Google fonts and sidebars to style your website in multiple different ways. There are many widgetized areas to stuff varied functionality. Its setup and configuration is easy as vividly explained documentation is provided with it. Numerous short codes are included to expand your capabilities as a website designer. This WordPress fitness theme has unending possibilities of customization through theme customizer which lets you change its colour, background, font, header, footer, menu, slider settings and what not in just a few clicks.', 'advance-fitness-gym' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'advance-fitness-gym' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'advance-fitness-gym' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'advance-fitness-gym' ); ?></li>
				</ul>
			</div>
		</div>
	</div>

<script>
	function openPage(pageName,elmnt,color) {
	    var i, tabcontent, tablinks;
	    tabcontent = document.getElementsByClassName("tabcontent");
	    for (i = 0; i < tabcontent.length; i++) {
	        tabcontent[i].style.display = "none";
	    }
	    tablinks = document.getElementsByClassName("tablink");
	    for (i = 0; i < tablinks.length; i++) {
	        tablinks[i].style.backgroundColor = "";
	    }
	    document.getElementById(pageName).style.display = "block";
	    elmnt.style.backgroundColor = color;

	}
</script>
<?php } ?>