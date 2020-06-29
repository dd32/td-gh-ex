<?php
//about theme info
add_action( 'admin_menu', 'advance_business_abouttheme' );
function advance_business_abouttheme() {    	
	add_theme_page( esc_html__('About Business Theme', 'advance-business'), esc_html__('About Business Theme', 'advance-business'), 'edit_theme_options', 'advance_business_guide', 'advance_business_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function advance_business_admin_theme_style() {
   wp_enqueue_style('advance-business-custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'advance_business_admin_theme_style');

//guidline for about theme
function advance_business_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>

<div class="wrapper-info">
	<div class="header">
	 	<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="<?php esc_attr(the_title()); ?> post thumbnail image">
	 	<h2><?php esc_html_e('Welcome to Advance Business Theme', 'advance-business'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'advance-business'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_BUY_NOW ); ?>"><?php esc_html_e('Buy Now', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_PRO_DOC ); ?>"><?php esc_html_e('Pro Documentation', 'advance-business'); ?></a>
		</div>
	</div>
	<div class="button-bg">
		<button role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'advance-business'); ?></button>
		<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'advance-business'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'advance-business'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_FREE_DOC ); ?>"><?php esc_html_e('Documentation', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_CONTACT ); ?>"><?php esc_html_e('Support', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'advance-business'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'advance-business'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'advance-business'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'advance-business'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'advance-business'); ?></li>
				</ul>
		  	</div>
		  	<div class="doc-image">
		  		<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/home-page-template.png" alt="<?php esc_attr(the_title()); ?> post thumbnail image">	
		  	</div>
		  	<div class="clearfixed">
				<div class="doc-image1">
					<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/set-front-page.png" alt="<?php esc_attr(the_title()); ?> post thumbnail image">	
			    </div>
			    <div class="image-docs1">
				    <ul>
						<li> <b><?php esc_html_e('Step 3.', 'advance-business'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'advance-business'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>
	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'advance-business'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_BUY_NOW ); ?>"><?php esc_html_e('Buy Now', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-business'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_BUSINESS_PRO_DOC ); ?>"><?php esc_html_e('Pro Documentation', 'advance-business'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img role="img" src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.jpg" alt="<?php esc_attr(the_title()); ?> post thumbnail image">
	  			<p><?php esc_html_e( 'This WordPress theme for business is dynamic, modern, powerful and well-structured, serving a vast range of businesses from small to medium and large scale without any glitches. It can be used by businesses, start-up ventures, digital agencies, corporate giants, promotional firms, investment agencies, marketing and sales target businesses and online shops and businesses. The base of the theme is strengthened by Bootstrap framework which facilitates its easy usage. It gives all the flexibility to design a solid website with many different layouts of pages, blogs, header, footer and sidebars. This WordPress theme for business has an intuitive business design to impart the professionalism that your business follows with unlimited colours and numerous Google fonts making your work of giving the website a serious tone further easy. It is full of widgetized areas where you can stuff different components.This WordPress theme for business is blessed with many modern website designing tools, features and functionality that is enough to make the site exclusive and outstanding. Its responsive layout looks gorgeous on varying screen sizes. It is unarguably cross-browser compatible and translation ready. It offers deep customization to give full power in your hands to change its colour, background, header, footer, menu, font size and many other elements. With the embedded social media icons, your website will get an easy access to everyones life through smartphones. You can include posts in a variety of formats like images, gallery, videos, links etc. in this WordPress theme for business. This purpose oriented theme has various sections each of which can be enabled or disabled according to your wish. It offers premium membership wherein you get access to seamless customer support and regular theme updates.', 'advance-business' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'advance-business' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'advance-business' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'advance-business' ); ?></li>
				</ul>
			</div>
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