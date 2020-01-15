<?php if (!function_exists('enigma_info_page')) {
	function enigma_info_page() {
	$page1=add_theme_page(__('Welcome to Enigma', 'enigma'), __('About Enigma', 'enigma'), 'edit_theme_options', 'enigma', 'enigma_display_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'enigma_admin_info');
	}	
}
add_action('admin_menu', 'enigma_info_page');

function enigma_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/css/bootstrap.css' );
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css' );
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-5.11.2/css/all.min.css' );
	//JS
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'popper-js', get_template_directory_uri() .'/js/popper.js', array('jquery'), true, true );
	wp_enqueue_script( 'bootstrap-js',get_template_directory_uri() .'/js/bootstrap.js', array('jquery'), true, true );
 
} 
if (!function_exists('enigma_display_theme_info_page')) {
	function enigma_display_theme_info_page() {
		$wl_th_info = wp_get_theme(); ?>
	

	   <div class="enigma-theme-help-page">
	<div class="jumbotron">
		<div class="row">
			<div class="col-md-10">
				<h1><?php esc_html_e( 'Welcome to Enigma - Version ', 'enigma' ); echo esc_html( $wl_th_info->get('Version') ); ?></h1>
	  			<p><?php esc_html_e( 'Enigma is a feature-loaded, user-friendly, fully responsive  WordPress theme built with care and is loaded with SEO optimized code.Theme features a frontpage slider, animated callouts with over 600 icons to choose from, Portfolio , Services , Testimonials and comes with contact-from on Home Page. Enigma allows you to fully customize your site without having to work with code. Enigma also features a live customizer, allowing you to change settings and preview them live.', 'enigma' ); ?></p>
			</div>
			<div class="col-md-2">
				<div class="update_pro">
					<h3><?php esc_html_e( ' Upgrade Pro ', 'enigma' ); ?></h3>
					<a class="demo" href="https://weblizar.com/themes/enigma-premium/"><?php esc_html_e( 'Get Pro In $39', 'enigma' ); ?></a>
					
				</div>
			</div>
		</div>
	</div>
	</div>

       
<div class="enigma-theme-tabs tebs-sec">
	<div class="jumbotron tab-inner-div">
		<div class="mt-3">
		  	<!-- Nav tabs -->
		 	 <ul class="nav nav-tabs">
			    <li class="nav-item">
			      	<a class="nav-link active" data-toggle="tab" href="#home"><?php esc_html_e( 'Getting Started', 'enigma-parallax' ); ?></a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" data-toggle="tab" href="#menu1"><?php esc_html_e( 'Enigma premium', 'enigma-parallax' ); ?></a>
			    </li>
			    <li class="nav-item">
			      	<a class="nav-link" data-toggle="tab" href="#menu2"><?php esc_html_e( 'Free Vs Pro', 'enigma-parallax' ); ?></a>
			    </li>
		  	</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			    <div id="home" class="tab-pane active"><br>
			      	<div class="row p_plugin blog_gallery">
                        <div class="col-xs-12 col-sm-7 col-md-9 p_plugin_pic">
                            <h4> <?php esc_html_e('How to Setup Homepage','enigma'); ?></h4>
							
							<ol>
							<li> <?php esc_html_e( 'Create new page from Pages->Add New, Give it a name ( Home )', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Then through \'Page Attributes\' options select \'Template\' as \'Home Template\' and publish it. ', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Then go to Settings->Reading->Your homepage displays, Click on  \'A static page (select below)\' then select \'Home\' as \'Homepage\'.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'For Blog Page go to Settings->Reading->Your homepage displays, Click on  \'A static page (select below)\' then select your \'Blog page\' as \'Posts page\'. ( Optional Step )', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Then save it. Its Done.!!', 'enigma' ); ?> </li>
						 </ol>
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-3 p_plugin_desc">
                            <div class="row p-box">
                                 <div class="img-thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" class="img-responsive" alt="img"/>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p_plugin blog_gallery child">
					
                        <div class="col-xs-12 col-sm-7 col-md-9 p_plugin_pic">
                            <h4> <?php echo esc_html__( 'How to Recover Homepage previous data ', 'enigma' ).' '.wp_kses_post( '<a target="_blank" href=" https://youtu.be/bxDM_Zsu4Ok ">watch video is here</a>' ); ?></h4>
							
							<ol>
							<li> <?php esc_html_e( 'First you need to setup homepage, Follow above instructions.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Then you need to install our plugin \'Weblizar Companion\' its required to recover your data.','enigma' ); ?> </li>
							<li> <?php esc_html_e( 'After installing our plugin \'Weblizar Companion\', you can see a new tab option in Appearance tab. ', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Then go to Appearance->Import/Export, from here you can restore your previous home template data ( If exist in Database )', 'enigma'); ?> </li>
							<li> <?php esc_html_e( 'Jsut Click the Import button and its done.!!','enigma' ); ?> </li>
							<li> <?php esc_html_e( 'It will show you a success message means your data is restored successfully.!!','enigma' ); ?> </li>
							</ol>
							 
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-3 p_plugin_desc">
                            <div class="row p-box">
                                 <div class="img-thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/images/recover.png" class="img-responsive" alt="img"/>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="row p_plugin blog_gallery child">
                        <div class="col-xs-12 col-sm-4 col-md-12 p_plugin_pic">
                            <h4><?php esc_html_e( 'Customizer Panel Option\'s Info', 'enigma' ); ?> </h4>
							<ol>
							<li> <?php esc_html_e( 'Go to Appearance -> Customize > Theme Options ', 'enigma' ); ?></li>
							<li> <?php esc_html_e( 'Theme General Options - Theme General Options use for logo width and height, and add custom css.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Search Box - use to add search box on header.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Theme Slider Options - It is use to add slider image, title, description and enable/disable slider on homepage.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Service Options - It is use to add service icon, title, description and enable/disable service on homepage.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Portfolio Options - It is use to add portfolio image, title, link and enable/disable portfolio on homepage.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Home Blog Options - Use to add blog title, description, blog excerpt length and enable/disable blog section on homepage and select category.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Home Team Options - Use to add team member name, image, designation and social links on homepage. ', 'enigma' ); ?></li>
							<li> <?php esc_html_e( 'Typography Settings - use to change the font of the site.', 'enigma' ); ?>  </li>
							<li> <?php esc_html_e( 'Social Options - enable/disable social option on header and footer, add social links, phone number, address and Email-ID.', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Footer Call-Out Options - use to add Footer callout Title, Footer callout Button Text, Footer callout Button Link and Footer callout Icon', 'enigma' ); ?> </li>
							<li> <?php esc_html_e( 'Footer Options - Use to add Customization text, developed by text and developed by link. ', 'enigma' ); ?></li>
							<li> <?php esc_html_e( 'Front Page Layout - use for front page section order and box layout option.', 'enigma' ); ?> </li>
							</ol>
							<a class="add_page" target="_blank" href="<?php echo esc_url(admin_url('customize.php')); ?>"><?php esc_html_e( 'Go to Customizer', 'enigma' ); ?></a>
                        </div>
                    </div>
			    </div>
			    <div id="menu1" class="tab-pane fade"><br>
			      	<div class="row p_plugin blog_gallery">
                        <div class="col-xs-12 col-sm-4 col-md-3 p_plugin_pic">
                            <div class="img-thumbnail">
								<img src="<?php echo get_template_directory_uri(); ?>/images/EP.png" class="img-responsive" alt="img"/>
                            </div>
							
                        </div>
                        <div class="col-xs-12 col-sm-5 col-md-7 p_plugin_desc">
                            <div class="row p-box">
                                <div>
                                	<h3><?php esc_html_e( 'Enigma Premium', 'enigma' ); ?></h3>
                                    <p><strong><?php esc_html_e( 'Description:', 'enigma' ); ?> </strong><?php esc_html_e( 'Enigma is an elegant, versatile theme that gives you the tools you need to express who you are and what your business does in a professional and coherent manner. To help you get started with your website we have made sure to include 4 homepage layouts, 10 unique heros, and some 50+ content blocks that you can use to tailor Enigma to your needs and preferences.', 'enigma' ); ?></p>
                                </div>
								<p><strong><?php esc_html_e( 'Tags:', 'enigma' ); ?> </strong><?php esc_html_e( 'clean, responsive, portfolio, blog, e-commerce, Business, WordPress, Corporate, dark, real estate, shop, restaurant.', 'enigma' ); ?></p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
                            <div class="price1">
                                <span class="currency"><?php esc_html_e( 'USD', 'enigma' ); ?></span>
                                <span class="price-number"><?php esc_html_e( '$', 'enigma' ); ?><span><?php esc_html_e( '39', 'enigma' ); ?></span></span>
                            </div>
                            <div class="btn-group-vertical">
                                <a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/enigma-premium/"><?php esc_html_e( 'Detail', 'enigma' ); ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="row p_plugin blog_gallery child">
                        <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                            <div class="img-thumbnail pro_theme text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/images/492X-CORPO.jpg" class="img-responsive" alt="img"/>
								<div class="btn-vertical">
								<h4 class="pro_thm">
                                <a href="https://weblizar.com/themes/eatos-premium-restaurant-theme/"><?php esc_html_e( 'Eatos Premium', 'enigma' ); ?></a></h4>
								</div>
                            </div>
							
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                            <div class="img-thumbnail pro_theme text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/images/Responsive-Beauty.png" class="img-responsive" alt="img"/>
								<div class="btn-vertical">
								<h4 class="pro_thm">
                                <a href="https://weblizar.com/themes/beautyspa-premium/"><?php esc_html_e( 'Beautyspa Premium', 'enigma' ); ?></a></h4>
								</div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 p_plugin_pic">
                            <div class="img-thumbnail pro_theme text-center">
								<img src="<?php echo get_template_directory_uri(); ?>/images/healthcare1.png" class="img-responsive" alt="img"/>
								<div class="btn-vertical">
								<h4 class="pro_thm">
                                <a href="https://weblizar.com/themes/healthcare/"><?php esc_html_e( 'Healthcare Premium', 'enigma' ); ?></a></h4>
								</div>
                            </div>
                        </div>
                    </div>
			    </div>
			    <div id="menu2" class="tab-pane fade"><br>
			      	<div class="row p_plugin blog_gallery">		
						<div class="columns">
						  <ul class="price">
							<li class="header"><?php esc_html_e( 'Enigma', 'enigma' ); ?></li>
							<li class="grey"><?php esc_html_e( 'Features', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Front Page', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Parallax Design', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Theme Option Panel','enigma' ); ?></li>
							<li><?php esc_html_e( 'Unlimited Color Skins', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Mega Menu Support', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Multilingual', 'enigma' ); ?></li>
							<li><?php esc_html_e( '10 Page Layout', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'Contact Page Template', 'enigma' ); ?></li>
							<li><?php esc_html_e( 'About Us Page Template' , 'enigma'); ?></li>
							<li><?php esc_html_e( 'Custom Shortcodes', 'enigma' ); ?></li>
						  </ul>
						</div>
						
						 <div class="columns">
						  <ul class="price">
							<li class="header"><?php esc_html_e( 'Free', 'enigma' ); ?></li>
							<li class="grey"><?php esc_html_e( '$ 00', 'enigma' ); ?></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
							<li><i class="fa fa-close"></i></li>
						  </ul>
						</div>

						<div class="columns">
						  <ul class="price">
							<li class="header" style="background-color:#3354ad"><?php esc_html_e( 'Enigma Pro', 'enigma' ); ?></li>
							<li class="grey"><?php esc_html_e( '$ 39', 'enigma' ); ?></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li><i class="fa fa-check"></i></li>
							<li class="grey"><a href="http://demo.weblizar.com/enigma-premium/enigma-select/" class="pro_btn"><?php esc_html_e( 'Visit Demo', 'enigma' ); ?></a></li>
						  </ul>
						</div>
					</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<div class="enigma-theme-help-page text-center">
	<div class="jumbotron">
		<h1><?php esc_html_e( 'Visit Our Latest Pro Themes & See Demos', 'enigma' ); ?></h1>
		<p><?php esc_html_e( 'We have put in a lot of effort in all our themes, free and premium both. Each of our Premium themes has a corresponding free version so that you can try out the theme before you decide to purchase it.', 'enigma' ); ?></p>
		<a href="https://weblizar.com/themes/" class="visit-link"><?php esc_html_e( 'Visit Themes', 'enigma' ); ?></a>
	</div>
</div>         
<?php } }            
