<?php
//about theme info
add_action( 'admin_menu', 'advance_coaching_abouttheme' );
function advance_coaching_abouttheme() {    	
	add_theme_page( esc_html__('About Coaching Theme', 'advance-coaching'), esc_html__('About Coaching Theme', 'advance-coaching'), 'edit_theme_options', 'advance_coaching_guide', 'advance_coaching_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function advance_coaching_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() .'/inc/admin/admin.css');
}
add_action('admin_enqueue_scripts', 'advance_coaching_admin_theme_style');

//guidline for about theme
function advance_coaching_mostrar_guide() {
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="header">
	 	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/logo.png" alt="" />
	 	<h2><?php esc_html_e('Welcome to Advance Coaching Theme', 'advance-coaching'); ?></h2>
 		<p><?php esc_html_e('Most of our outstanding theme is elegant, responsive, multifunctional, SEO friendly has amazing features and functionalities that make them highly demanding for designers and bloggers, who ought to excel in web development domain. Our Themeshopy has got everything that an individual and group need to be successful in their venture.', 'advance-coaching'); ?></p>
		<div class="main-button">
			<a href="<?php echo esc_url( ADVANCE_COACHING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_COACHING_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_COACHING_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'advance-coaching'); ?></a>
		</div>
	</div>
	<div class="button-bg">
		<button  role="tab" class="tablink" onclick="openPage('Home', this, '')"><?php esc_html_e('Lite Theme Setup', 'advance-coaching'); ?></button>
		<button role="tab" class="tablink" onclick="openPage('Contact', this, '')"><?php esc_html_e('Premium Theme info', 'advance-coaching'); ?></button>
	</div>
	<div id="Home" class="tabcontent tab1">
	  	<h3><?php esc_html_e('How to set up homepage', 'advance-coaching'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_COACHING_FREE_DOC ); ?>"><?php esc_html_e('Documentation', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_COACHING_CONTACT ); ?>"><?php esc_html_e('Support', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Start Customizing', 'advance-coaching'); ?></a>
		</div>
	  	<div class="documentation">
		  	<div class="image-docs">
				<ul>
					<li> <b><?php esc_html_e('Step 1.', 'advance-coaching'); ?></b> <?php esc_html_e('Follow these instructions to setup Home page.', 'advance-coaching'); ?></li>
					<li> <b><?php esc_html_e('Step 2.', 'advance-coaching'); ?></b> <?php esc_html_e(' Create Page to set template: Go to Dashboard >> Pages >> Add New Page.Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.', 'advance-coaching'); ?></li>
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
						<li> <b><?php esc_html_e('Step 3.', 'advance-coaching'); ?></b> <?php esc_html_e('Set the front page: Go to Setting -> Reading --> Set the front page display static page to home page', 'advance-coaching'); ?></li>
					</ul>
			  	</div>
			</div>
		</div>
	</div>
	<div id="Contact" class="tabcontent">
	 	<h3><?php esc_html_e('Premium Theme Info', 'advance-coaching'); ?></h3>
	  	<div class="sec-button">
			<a href="<?php echo esc_url( ADVANCE_COACHING_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_COACHING_LIVE_DEMO ); ?>"><?php esc_html_e('Live Demo', 'advance-coaching'); ?></a>
			<a href="<?php echo esc_url( ADVANCE_COACHING_PRO_DOC ); ?>"><?php esc_html_e('Pro Documentation', 'advance-coaching'); ?></a>
		</div>
	  	<div class="features-section">
	  		<div class="col-4">
	  			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/admin/images/screenshot.png" alt="" />
	  			<p><?php esc_html_e( 'A coaching website should have an inviting layout and appealing design with appropriate professional look to attract students and parents to enrol into your academy and take your services. These all features along with many other are present in this coaching WordPress theme that is a perfect match for not just a coaching centre but also for schools, colleges, LMS, training academies, personal trainers, sports coaching, motivational speakers and so many other relevant professions. You can choose between several designing options from boxed to full-width layout, with and without sidebar, full-screen header image and slider. This coaching WordPress theme, with a user-friendly interface, caters for a smooth navigation that will ultimately give a great website using experience to users. Its header and footer can be designed in many stylish varieties. It supports multiple post formats like standard, image, gallery, video, link etc.', 'advance-coaching' ); ?></p>
	  		</div>
	  		<div class="col-4">
	  			<h4><?php esc_html_e( 'Theme Features', 'advance-coaching' ); ?></h4>
				<ul>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Theme options using customizer API', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Responsive Design', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Favicon, Logo, Title and Tagline Customization', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advanced Color Options and Color Pallets', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( '100+ Font Family Options', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Slider with a Number of Slider Images Upload Option Available.', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Support to Add Custom CSS/JS', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'SEO Friendly', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Pagination Option', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Compatible With Different WordPress Famous Plugins Like Contact Form 7 and Woocommerce', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Enable-Disable Options on All Sections', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Footer Customization Options', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Fully Integrated with Font Awesome Icon', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Short Codes', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Background Image Option', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Page Templates', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Featured Product Images, HD Images and Video display', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Allow To Set Site Title, Tagline, Logo', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Make Post About Firms News, Events, Achievements and So On.', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Left and Right Sidebar', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Sticky Post & Comment Threads', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Parallax Image-Background Section', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Custom Backgrounds, Colors, Headers, Logo & Menu', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Customizable Home Page', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Full-Width Template', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Gallery, Banner & Post Type Plugin Functionality', 'advance-coaching' ); ?></li>
					<li><span class="dashicons dashicons-arrow-right"></span><?php esc_html_e( 'Advance Social Media Feature', 'advance-coaching' ); ?></li>
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