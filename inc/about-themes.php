<?php
//about theme info
add_action( 'admin_menu', 'bb_wedding_bliss_abouttheme' );
function bb_wedding_bliss_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'bb-wedding-bliss'), esc_html__('About Theme', 'bb-wedding-bliss'), 'edit_theme_options', 'bb_wedding_bliss_guide', 'bb_wedding_bliss_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function bb_wedding_bliss_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/css/about-theme.css');
}
add_action('admin_enqueue_scripts', 'bb_wedding_bliss_admin_theme_style');

//guidline for about theme
function bb_wedding_bliss_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		<div class="col-left-area">
			<h3><?php esc_html_e('Free Theme Information', 'bb-wedding-bliss'); ?></h3>
		</div>
		<hr>
        <p><?php esc_html_e('BB Wedding Bliss is a wedding WordPress theme to construct websites for marriage, engagement, couples, wedding planners, wedding band, personal, portfolio, art, design, business, photography, girlie or feminine blogs and websites, as well as photographer type of clients. You can make beautiful wedding websites with this multipurpose theme that caters to businesses such as hospitality, lodge, hotel, restaurant, cafe, food joints, cuisines, recipe, eatery, etc. Its a completely mobile-friendly theme which is built using Bootstrap an excellent framework. It has powerful shortcodes that will set up a pleasing website for you. It has a well-integrated versatile banner with attractive Call to Action Button (CTA). From the testimonial section, you can spread client reviews about your site. This theme has many features such social media tools, amazing typography options, color choices, customizable admin panel, etc. The optimized codes support faster page load time to give a stunning user experience. BB Wedding WordPress Theme is SEO friendly that gets over the top in search result pages. Take away this professional Wedding WordPress Theme which will give a beautiful touch to your wedding website.','bb-wedding-bliss'); ?></p>
		<hr>
		<div class="documentation">
			<h3><?php esc_html_e('Free Theme Documentation', 'bb-wedding-bliss'); ?></h3>
			<hr>
			<h4><?php esc_html_e('Setup Theme Static Page.', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Add new page named as "home page" and select the template "Custom Home Page".', 'bb-wedding-bliss'); ?></li>
				<li> <b><?php esc_html_e('Step 2.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> static front page >> check Static page, then select the page which you have added example "home page".', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For Slider Section', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Add new page, add title, content and featured image and then publish it.', 'bb-wedding-bliss'); ?></li>
				<li> <b><?php esc_html_e('Step 2.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> Slider settings >> here you can select the page which you have add for slider.', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For Love Story Section', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Add new post, add title, content and featured image and then publish it.', 'bb-wedding-bliss'); ?></li>
				<li> <b><?php esc_html_e('Step 2.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> Love Story Section >> here you can select the post which you have add for love story.', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For More Event Section', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Add new category, then publish it.', 'bb-wedding-bliss'); ?></li>
				<li> <b><?php esc_html_e('Step 2.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Add new post, add title, content,featured image, assign that category to the post and then publish it.', 'bb-wedding-bliss'); ?></li>
				<li> <b><?php esc_html_e('Step 3.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> More Event Section >> here you can edit title, sub title and select the category which you have to show in more event.', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For Top Bar', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> Topbar Section >> here you can add your contact details example: email and contact no.', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For Social Icon', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> Social Icon Section >> here you can add social links.', 'bb-wedding-bliss'); ?></li>
			</ul>
			<h4><?php esc_html_e('For Post Layout Settings', 'bb-wedding-bliss'); ?></h4>
			<ul>
				<li> <b><?php esc_html_e('Step 1.', 'bb-wedding-bliss'); ?></b> <?php esc_html_e('Go to customizer >> BB Settings >> Layout Settings >> here you can change the layout of the blog post.example: one column, two column, grid layout etc.', 'bb-wedding-bliss'); ?></li>
			</ul>
		</div>
		<hr>
		<a href="<?php echo esc_url( BB_WEDDING_BLISS_THEMESHOPY_PRO_THEME_URL ); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/themeshopy-table.png" alt="" /></a>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'bb-wedding-bliss'); ?></h3>
		</div>
		<div class="centerbold">
			<hr class="firsthr">
			<a href="<?php echo esc_url( BB_WEDDING_BLISS_THEMESHOPY_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'bb-wedding-bliss'); ?></a>
			<a href="<?php echo esc_url( BB_WEDDING_BLISS_THEMESHOPY_PRO_THEME_URL ); ?>"><?php esc_html_e('Buy Pro', 'bb-wedding-bliss'); ?></a>
			<a href="<?php echo esc_url( BB_WEDDING_BLISS_THEMESHOPY_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'bb-wedding-bliss'); ?></a>
			<hr class="secondhr">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/Wedding-Themes.jpg" alt="" />
		</div>
	</div>
</div>
<?php } ?>