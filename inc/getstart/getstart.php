<?php
//about theme info
add_action( 'admin_menu', 'automotive_centre_gettingstarted' );
function automotive_centre_gettingstarted() {    	
	add_theme_page( esc_html__('About Automotive Centre', 'automotive-centre'), esc_html__('About Automotive Centre', 'automotive-centre'), 'edit_theme_options', 'automotive_centre_guide', 'automotive_centre_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function automotive_centre_admin_theme_style() {
   wp_enqueue_style( 'automotive-centre-font', automotive_centre_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/getstart/getstart.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'automotive_centre_admin_theme_style');

// Theme Font URL
function automotive_centre_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function automotive_centre_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'automotive-centre' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Automotive Centre Theme', 'automotive-centre' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','automotive-centre'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Automotive Centre at 20% Discount','automotive-centre'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','automotive-centre'); ?> ( <span><?php esc_html_e('vwpro20','automotive-centre'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( AUTOMOTIVE_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'automotive-centre' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'automotive_lite')"><?php esc_html_e( 'Getting Started', 'automotive-centre' ); ?></button>		  
		  <button class="tablinks" onclick="openCity(event, 'automotive_pro')"><?php esc_html_e( 'Get Premium', 'automotive-centre' ); ?></button>
		  <button class="tablinks" onclick="openCity(event, 'free_pro')"><?php esc_html_e( 'Support', 'automotive-centre' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="automotive_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'automotive-centre' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('Our Automotive WordPress Theme is designed to be stylish and classy, much like all our beloved cars. This exclusive theme is developed especially for car dealership, Motorhome, Travel Trailer, Lifts, Trators, Forklift, Campers, Lift Trucks, MotoSnow, Snow Motorcycle, Motorbike Motor Full, Agriculture Equipment and similar businesses. We aid this multi-purpose responsive theme while keeping the motor-heads in mind and what will appeal to the people the most. Our WordPress theme makes the use of secure and clean codes, you can easily customize our theme as per your wishes. You can even add or remove anything that you may or may not like. With ample of personalization options, optimized codes, call to action button (CTA), beautiful banners, useful shortcodes, numerous styling options, it is the best professional WordPress theme to grab. You will get an interactive demo, responsive slider, display options, SEO friendly features, social media icons, and a bunch of other phenomenal features with this supreme theme. Furthermore, built on Bootstrap framework, the theme will ease the web development. No matter what kind of automobile industry or services you offer, our Automobile theme is made for the gear-heads like you. Whether you sell used car, deal in motorbikes, motorcycles, small cars, trucks, cab service, automobile blogger, own a car review website, run a garage, repair service, own a showroom, run a driving school and etc., this highly interactive, WooCommerce compatible, user-friendly, and multipurpose ecommerce theme will fit perfectly for you.','automotive-centre'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'automotive-centre' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'automotive-centre' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'automotive-centre' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'automotive-centre'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'automotive-centre'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'automotive-centre'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'automotive-centre'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'automotive-centre' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','automotive-centre'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=automotive_centre_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','automotive-centre'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=automotive_centre_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Settings','automotive-centre'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=automotive_centre_about_section') ); ?>" target="_blank"><?php esc_html_e('About Us','automotive-centre'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','automotive-centre'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','automotive-centre'); ?></a>
							</div>
						</div>
						
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=automotive_centre_left_right') ); ?>" target="_blank"><?php esc_html_e('Blog Layout','automotive-centre'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=automotive_centre_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','automotive-centre'); ?></a>
							</div>
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','automotive-centre'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','automotive-centre'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','automotive-centre'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','automotive-centre'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','automotive-centre'); ?></p></li>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','automotive-centre'); ?></span><?php esc_html_e(' Go to ','automotive-centre'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','automotive-centre'); ?></b></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','automotive-centre'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="automotive_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'automotive-centre' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Automotive WordPress theme is exemplary and in high demand in the international online market and has been the preferred one in the automotive sector since the inception. It is a premium category theme and has performed constantly well in the international popularity charts making it a sort of brand for the dealership of automobiles or for any kind of start-up related to the automotive sector. Armed with the exemplary features crafted by some of the brightest minds in the theme making industry, it has been doing rounds primarily because of its responsive and multipurpose nature. The companies or start-ups that have used this theme have done remarkably well when it comes to the automotive sector. It is also good for Motorhome, Travel Trailer, Lifts, Trators, Forklift, Campers, Lift Trucks, MotoSnow, Snow Motorcycle, Motorbike Motor Full, Agriculture Equipment and even Aircrafts, Jets, Side-By-Side, ATV, Utilities ATV, RVs Helicopters, Turboprops, Charter, Airplanes and Aerotrader businesses.','automotive-centre'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( AUTOMOTIVE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'automotive-centre'); ?></a>
					<a href="<?php echo esc_url( AUTOMOTIVE_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'automotive-centre'); ?></a>
					<a href="<?php echo esc_url( AUTOMOTIVE_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'automotive-centre'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'automotive-centre' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'automotive-centre'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'automotive-centre'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'automotive-centre'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'automotive-centre'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'automotive-centre'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'automotive-centre'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'automotive-centre'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'automotive-centre'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'automotive-centre'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'automotive-centre'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'automotive-centre'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'automotive-centre'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'automotive-centre'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getstart/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( AUTOMOTIVE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'automotive-centre'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'automotive-centre'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'automotive-centre'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'automotive-centre'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','automotive-centre'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'automotive-centre'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'automotive-centre'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( AUTOMOTIVE_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'automotive-centre'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>