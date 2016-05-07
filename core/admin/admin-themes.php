<?php if (!function_exists('enigma_info_page')) {
	function enigma_info_page() {
	$page1=add_theme_page(__('Welcome to Enigma', 'weblizar'), __('Pro Themes & Plugin', 'weblizar'), 'edit_theme_options', 'enigma', 'enigmadisplay_theme_info_page');
	
	add_action('admin_print_styles-'.$page1, 'weblizar_admin_info');
	}	
}
add_action('admin_menu', 'enigma_info_page');

function weblizar_admin_info(){
	// CSS
	wp_enqueue_style('bootstrap',  get_template_directory_uri() .'/core/admin/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('admin',  get_template_directory_uri() .'/core/admin/admin-themes.css');
	wp_enqueue_style('font-awesome',  get_template_directory_uri() .'/css/font-awesome-4.3.0/css/font-awesome.css');

	//JS
	wp_enqueue_script('bootstrap-js', get_template_directory_uri().'/core/admin/bootstrap/js/bootstrap.min.js');
	wp_enqueue_script('jquery-photobox-js', get_template_directory_uri().'/core/admin/js/jquery.photobox-admin.js');
	wp_enqueue_style('photobox',  get_template_directory_uri() .'/css/photobox-themes.css');
	wp_enqueue_script('script-menu', get_template_directory_uri().'/js/script.js');
	wp_enqueue_script('photobox-js', get_template_directory_uri().'/core/admin/js/script.js');
	
} 
if (!function_exists('enigmadisplay_theme_info_page')) {
	function enigmadisplay_theme_info_page() {
		$theme_data = wp_get_theme(); ?>
		
<div class="wrapper">
<!-- Header -->
<header>
<div class="container-fluid p_header">
	<div class="container">
		<div class="row p_head">
		<div class="col-md-4"></div>
			<div class="col-md-4">
			<img style="width:268px;height:193px" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo">
				
			</div>
		<div class="col-md-4"></div>	
		</div>
	</div>
</div>
<nav class="navbar navbar-default menu">
		<div class="container-fluid">
			<div class="container">
				<div class="row spa-menu-head">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <!--  <a class="navbar-brand" href="#"></a> -->
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav">
							<li class="theme-menu active" id="theme"><a href="#">Themes</a></li>
							<li class="theme-menu" id="plugin"><a href="#">Plugins</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</nav>
</header>
<!-- Header -->
<!-- Themes & Plugin -->
<div class="container-fluid space p_front theme">
	<div class="container">	
			<div class="row p_head theme">
				<div class="col-xs-12 col-md-8 col-sm-6">
					<h1 class="section-title">WordPress Themes</h1>
				</div>
			</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Enigma.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Enigma.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Enigma- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Enigma is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>39</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/enigma-premium/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/enigma-premium/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Healthcare.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Healthcare.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Healthcare- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, Business,
						WordPress, Corporate, etc…</p>
						<div>
						<p><strong>Description: </strong>
						Healthcare is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>41</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/healthcare-premium/">Detail</a>
					<a class="btn btn-success btn-lg" href="http://demo.weblizar.com/healthcare-premium/">Buy Now</a>
				</div>				
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Creative.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Creative.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Creative- Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Creative is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Competible with WPML & Woo Commerce Plugin.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>41</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/creative-premium/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/creative-premium/">Buy Now</a>
				</div>				
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Chronicle.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Chronicle.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Chronicle- Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Chronicle is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>35</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/chronicle-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/chronicle-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Incredible.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Incredible.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Incridible- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Incredible is an incredibly superfine multipurpose responsive theme coded & designed with a lot of care and love. Incredible is Responsive and flexible based on BOOTSTRAP CSS framework.</p>
						</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>19</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/incredible-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/incredible-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
	
	
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Guardian.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Guardian.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Guardian- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						Guardian is a Full Responsive Multi-Purpose Theme suitable for Business , corporate office and others .Cool Blog Layout and full width page also present.</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>39</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/guardian-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/guardian-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
	
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Green lantern.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Green lantern.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Green Lantern- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						A Responsive WordPress Theme for Business & Corporate Sector’s . Clean And Eye Catching Design with Crisp Look..</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>29</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/green-lantern-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/green-lantern-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/Weblizar.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/Weblizar.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Weblizar- Ultimate Multi-Purpose WordPress Theme</a></h2>
						<p><strong>Tags: </strong>clean, responsive, portfolio, blog, e-commerce, Business,
						WordPress, Corporate, dark, real estate, shop, restaurant, ele…</p>
						<div>
						<p><strong>Description: </strong>
						A Responsive WordPress Theme for Business & Corporate Sector’s . Clean And Eye Catching Design with Crisp Look..</p>
						</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>29</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="https://weblizar.com/themes/weblizar-premium-theme/">Detail</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/themes/weblizar-premium-theme/">Buy Now</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!----Plugin----->
<div class="container-fluid space p_front plugin hidden">
	<div class="container">
		<div class="row p_head theme">
			<div class="col-xs-12 col-md-8 col-sm-6">
				<h1 class="section-title">WordPress Plugins</h1>
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/about-author.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/about-author.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">About Author Pro- Display Profile In Various Style</a></h2>
						<p><strong>Features: </strong>Author Design Templates, Social Media Profiles, General & Google Fonts, Multiple Author Image Layout, Responsive Design, Website Link, Multiple Author Widgets, Multiple Author Shortcode, Live Preview</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>15</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/about-author-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/about-author-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/gallery-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/gallery-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Gallery Pro- Gallery Layout with Various Fonts</a></h2>
						<p><strong>Features: </strong>Gallery Layout, Color Scheme, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Gallery, Layout, Number of Hover Color, Number of Light Styles, Shortcode Button on post or page, Unique settings for each gallery, Hide/Show ,gallery Title and label</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>9</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/gallery-pro-by-weblizar/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/gallery-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/instagram-gallery-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/instagram-gallery-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Instagram Gallery Pro- Display Instagram Images</a></h2>
						<p><strong>Features: </strong>Responsive Design, Hashtag Option, Profile Layout, Animation Effects, Number of LightBox Style, Number of Gallery Layout, Image Style Layout, Google Fonts, Profile Backgound Image Option, Profile Backgound Color Scheme, Text Color Scheme, Hover Color Scheme, Follow Button Colors, Multiple Instagram Shortcode, Hide/Show Profile, Hide/Show Follow Button, Hide/Show Post Count, Hide/Show Website URL & Bio</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>15</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/instagram-gallery-pro-demo/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/instagram-gallery-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/ultimate-image-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/ultimate-image-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Ultimate Responsive Image Slider Pro- Perfect Responsive Image Slider Plugin</a></h2>
						<p><strong>Features: </strong>Responsiveness, Slider Layout, Touch Slider, Full Screen Slideshow, Thumbnail Slider, Color Options, Light Box, All Gallery Shortcode, Drag and Drop image Position, Multiple Image uploader, Shortcode Button on post or page, Unique settings for each gallery, Carousel Slider, External Link, Auto Play/Pause</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>21</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/ultimate-responsive-image-slider-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/ultimate-responsive-image-slider-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/photo-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/photo-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Photo Video Link Gallery Pro- Display Hover Animation & Lightbox</a></h2>
						<p><strong>Features: </strong>Image Hover Animation, Gallery Layout, Hover Color, Hover Color Opacity, Caption Font Style, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Hover Animation, Number of Gallery Layout, Number of Hover Color, Number of Font Style, Number of Lightbox Styles, Drag and Drop image Position, Multiple Image uploader, Shortcode Button on post or page, Unique settings for each gallery, Hide/Show gallery Title and label, Font icon Customization, Google Fonts, Isotope Effects, Video Gallery, External Link</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>16</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/photo-video-link-gallery-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/photo-video-link-gallery-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/flicker-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/flicker-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Flickr Album Gallery Pro- Plublish Flickr Albums On WordPress Blog Site</a></h2>
						<p><strong>Features: </strong>Image Hover Animation, Gallery Layout, Hover Color, Hover Color Opacity, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Hover Animation, Number of Gallery Layout, Number of Hover Color, Number of Light Styles, Shortcode Button on post or page, Unique settings for each gallery, Hide/Show gallery Title and label</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>15</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/flickr-album-gallery-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/flickr-album-gallery-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/responsive-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/responsive-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Responsive Portfolio Pro- Perfect Responsive Portfolio Plugin</a></h2>
						<p><strong>Features: </strong>Image Hover Animation, Gallery Layout, Hover Color, Hover Color Opacity, Caption Font Style, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Hover Animation, Number of Gallery Layout, Number of Hover Color, Number of Font Style, Number of Lightbox Styles, Drag and Drop image Position, Multiple Image uploader, Shortcode Button on post or page, Unique settings for each gallery, Hide/Show gallery Title and label, Font icon Customization, Google Fonts, Isotope Effects, Video Gallery, Carousel Slider, Album View, External Link</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>19</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/responsive-portfolio-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/responsive-portfolio-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/lightbox-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/lightbox-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Lightbox Slider Pro- A Complete Lightbox Gallery Plugin</a></h2>
						<p><strong>Features: </strong>Image Hover Animation, Gallery Layout, Hover Color, Hover Color Opacity, Caption Font Style, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Hover Animation, Number of Gallery Layout, Number of Hover Color, Number of Font Style, Number of Light Styles, Drag and Drop image Position, Multiple Image uploader, Shortcode Button on post or page, Unique settings for each gallery, Hide/Show gallery Title and label, Font icon Customization, Google Fonts, Isotope Effects</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>12</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/lightbox-slider-pro-demo/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/lightbox-slider-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/responsive-photo-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/responsive-photo-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Responsive Photo Gallery Pro- A Highly Animated Image Gallery Plugin</a></h2>
						<p><strong>Features: </strong>Image Hover Animation, Gallery Layout, Hover Color, Hover Color Opacity, Caption Font Style, Light Box, All Gallery Shortcode, Single Gallery Shortcode, Number of Hover Animation, Number of Gallery Layout, Number of Hover Color, Number of Font Style, Number of Lightbox Styles, Drag and Drop image Position, Multiple Image uploader, Shortcode Button on post or page, Unique settings, for each gallery, Hide/Show gallery Title and label, Font icon Customization, Google Fonts, Isotope Effects</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>10</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/responsive-photo-gallery-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/responsive-photo-gallery-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		<div class="row p_plugin blog_gallery">
			<div class="col-xs-12 col-sm-4 col-md-5 p_plugin_pic">
				<div class="img-thumbnail">
					<img src="<?php echo get_template_directory_uri(); ?>/images/recent-post-pro.png" class="img-responsive" alt=""/>
					<div class="overlay">
						<a class="photobox_a" href="<?php echo get_template_directory_uri(); ?>/images/recent-post-pro.png"><i class="fa fa-search"></i></a>
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-5 col-md-5 p_plugin_desc">
				<div class="row p-box">
					<h2><a href="">Recent Related Post And Page WordPress Plugin- Fully Responsive Plugin For WordPress Blog</a></h2>
						<p><strong>Features: </strong>Multiple Template, select feature image, 8 Border style, Border Size, Border color, 2 Layout Style, Post Order, 8 post Status, 2 Post Type, 8 ways Post/Page Order, 50 Post Show, Slide Direction, Pause On Hover, Sliding Arrow Color, Sliding Arrow size, Backgound Color of Template, Use Title as Link, Number of Letters of Title, Title Font Size, Font Text Color, Show/Hide Date, Align Date, Custom text to Link, 500+ Google Font for Template, Custom CSS</p>
				</div>
			</div>
			<div class="col-xs-12 col-sm-3 col-md-2 p_plugin_pic">
				<div class="price">
					<span class="currency">USD</span>
					<span class="price-number">$<span>10</span></span>
				</div>
				<div class="btn-group-vertical">
					<a class="btn btn-primary btn-lg" href="http://demo.weblizar.com/recent-related-post-and-page-pro/">Demo</a>
					<a class="btn btn-success btn-lg" href="https://weblizar.com/plugins/recent-related-post-and-page-pro/">Buy Now</a>
				</div>			
			</div>
		</div>
		
	</div>
</div>
	<div id="theme-author">
		<p><?php printf(__('%1s is proudly brought to you by %2s. If you like this WordPress theme, %3s.', 'weblizar'),
			$theme_data->Name,
			'<a target="_blank" href="https://weblizar.com/" title="weblizar">Weblizar</a>',
			'<a target="_blank" href="https://wordpress.org/support/view/theme-reviews/enigma" title="Enigma Review">' . __('rate it', 'weblizar') . '</a>'); ?>
		</p>
	</div>
</div>
<?php
	}
}

?>