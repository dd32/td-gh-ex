<?php
/**
 * Greenr Theme Customizer
 *
 * @package Greenr
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function greenr_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'greenr_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function greenr_customize_preview_js() {
	wp_enqueue_script( 'greenr_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'greenr_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );

	function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#56cc00'); ?>

	<style type="text/css">

a,.main-navigation a:hover::before,.widget_calendar td a,
.cart-subtotal .amount,.woocommerce #content table.cart a.remove,
.main-navigation a:hover,.ei-title h3,.site-footer .widget.widget_ourteam-widget .team-content li a:hover,.breadcrumb #breadcrumb a,.pullnone:before,
.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.widget_recent-work-widget .recent_work_overlay .fa:hover,.widget_recent-work-widget .work-title h4 a:hover,
.tabs-container ul.ui-tabs-nav li a:hover,.copy a:hover,.main-navigation a:hover:before,.main-navigation .current_page_item > a,.site-footer .widget_social-networks-widget ul li a:hover,
.main-navigation .current-menu-item > a,.ui-accordion .ui-accordion-header-active span.fa,.ui-accordion .ui-accordion .ui-accordion-header:hover,.entry-footer a:hover,.widget-area .widget_calendar caption,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,
.main-navigation .current-menu-ancestor > a,.circle-icon-box:hover p.fa-stack i,.footer-top .widget_calendar a:hover,h1.entry-title a:hover,
.widget-area .widget_calendar th,.toggle .toggle-title .icn,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor
.current_page_item > a:before,.footer-top a:hover,.content-details h3 a:hover,.icon-vertical .fa-stack i,
.services .four.columns:hover .service-title p i,.flex-container .flex-caption,
.widget_testimonial-widget ul li p.client strong,.footer-widgets .widget_calendar caption
		{
			color: <?php echo esc_html($primary_color); ?>; 
		}


.services .four.columns .service-title p,table td#today,input[type="text"]:focus,.site-footer .footer-bottom ul.menu li a:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
.widget_recent-work-widget .flex-direction-nav a.flex-next,.widget_recent-posts-gallery-widget .recent-post,.widget_recent-posts-gallery-widget .recent-post:hover a img,
input[type="email"]:focus,.portfolio-excerpt a.btn-readmore,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,
input[type="url"]:focus,.page-navigation ol li a:hover,.callout-widget .callout-btn a,.page-navigation ol li.bpn-current:hover,
input[type="password"]:focus,.comment-navigation .nav-next a:hover,.flex-container .flex-direction-nav a ,.widget_recent-posts-gallery-widget .recent-post .post-title:before,.ui-accordion .ui-accordion-header-active,
.comment-navigation .nav-previous a:hover,.post-thumb .blog-thumb
.page-links a,.flex-control-paging li a.flex-active,.circle-icon-box .circle-icon-wrapper p.fa-stack,.icon-horizontal .icon-wrapper .fa-stack,
.flex-control-paging li a:hover,.dropcap-circle,.circle-icon-box p.more-button a,
.dropcap-box,.toggle .toggle-title:hover,.withtip:before,.widget_image-box-widget a.more-button,
.widget.widget_skill-widget .skill-content,.ui-accordion h3 span.fa,.widget_recent-work-widget .recent_work_overlay,
input[type="search"]:focus,.post-navigation .nav-links a:hover,.ui-accordion h3:hover,.widget_calendar td#today,
textarea:focus,.site-content .wpcf7-form input[type="submit"],.site-footer a.more-button
		{
			background-color: <?php echo esc_html($primary_color); ?>; 
		}
		.footer-bottom ul.menu li.current_page_item a {
			background-color: <?php echo esc_html($primary_color); ?>!important; 
		}
		
input[type="text"]:focus,.dropcap-book,.widget_image-box-widget .image-box img,
input[type="email"]:focus,.widget_social-networks-widget ul li a:hover,
.share-box ul li a:hover,ul.filter-options li a:hover,.circle-icon-box:hover p.fa-stack,
ul.filter-options li a.selected,.dropcap-circle,.pullleft,.home .site-content .circle-icon-box:hover p.fa-stack,
.pullright,.toggle .toggle-title .icn,.toggle .toggle-content,.flex-container .flex-direction-nav a:hover,
input[type="url"]:focus,.ei-slider-thumbs li.ei-slider-element,.circle-icon-box:hover,
input[type="password"]:focus,.post-navigation .nav-links a:hover,
input[type="search"]:focus,.widget.widget_ourteam-widget .team-social ul li a:hover,
textarea:focus,.site-content .wpcf7-form input[type="submit"],.services .four.columns:hover,.services .four.columns:hover .service-title p
		{
			border-color: <?php echo esc_html($primary_color); ?>; 
		}

.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.icon-horizontal .service,
.tabs-container ul.ui-tabs-nav li a:hover,.withtip.top:after,.home .site-content .circle-icon-box:hover p.fa-stack,
		{
			border-top-color: <?php echo esc_html($primary_color); ?>; 
		}

.withtip.right:after
		{
			border-right-color: <?php echo esc_html($primary_color); ?>; 
		}

.main-navigation a:hover,.social li a:hover,.callout-widget .callout-btn a,.home .site-content .circle-icon-box:hover,
.circle-icon-box p.more-button a,.main-navigation .current_page_item > a,.sep,.withtip.bottom:after,
.main-navigation .current-menu-item > a,.portfolio-excerpt a.btn-readmore,
.main-navigation .current-menu-ancestor > a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
.widget_recent-work-widget .flex-direction-nav a.flex-next,.flex-container .flex-direction-nav a
		{
			border-bottom-color: <?php echo esc_html($primary_color); ?>; 
		}

.pullleft,.withtip.left:after,
.pullright
		{
			border-left-color: <?php echo esc_html($primary_color); ?>; 
		}

				
			</style>
<?php
	}
}

if( get_theme_mod('enable_nav_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_nav_primary_custom_css' );

		function wbls_customizer_nav_primary_custom_css() {
			$nav_primary_color = get_theme_mod( 'nav_primary_color','#56cc00'); ?>

				<style type="text/css">

.main-navigation .current_page_item > a,.main-navigation a:hover,.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a
		{
            border-bottom-color: <?php echo esc_html($nav_primary_color); ?>;
		}
.main-navigation .current_page_item > a,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor > a,.main-navigation ul.menu.nav-menu > li.current-menu-ancestor .current_page_item > a::before,.main-navigation a:hover::before,.main-navigation a:hover,.main-navigation .current-menu-item > a, .main-navigation .current-menu-ancestor > a
		{
          color: <?php echo esc_html($nav_primary_color); ?>;
		}
				</style>
<?php }
}

if( get_theme_mod('enable_dd_bg_color',false) ) {

	add_action( 'wp_head','wbls_customizer_ddbg_custom_css' );

		function wbls_customizer_ddbg_custom_css() {
			$dd_bg_color = get_theme_mod( 'dd_bg_color','#d7d7d7'); ?>

				<style type="text/css">

					.main-navigation ul ul
							{
								background-color: <?php echo esc_html($dd_bg_color); ?>;
							}
				</style>
<?php }
}




if( get_theme_mod('enable_secondary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_secondary_custom_css' );

		function wbls_customizer_secondary_custom_css() {
			$secondary_color = get_theme_mod( 'secondary_color','#000'); ?>

	<style type="text/css">

/*  secondary color */

blockquote cite a ,input[type="text"],.alert-message a,.alert-message a:hover,.toggle .toggle-title,.circle-icon-box:hover h3,
.circle-icon-box:hover a.link-title,.site-footer .circle-icon-box .circle-icon-wrapper p.fa-stack,.site-footer .circle-icon-box .circle-icon-wrapper h3,.site-footer .flex-caption h1,.site-footer .flex-caption h2,.site-footer .flex-caption h3,.site-footer .flex-caption h4,.site-footer .flex-caption h5,.site-footer .flex-caption li,.site-footer a.more-button:hover,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,
input[type="email"],.tabs-container ul.ui-tabs-nav li a,.widget_recent-work-widget .work-title h4 a,
input[type="url"],.widget_social-networks-widget ul li a,.breadcrumb #breadcrumb a:hover,
.share-box ul li a,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,.site-footer .flex-direction-nav a.flex-prev,
.site-footer .flex-direction-nav a.flex-next,
.tabs-container ul.ui-tabs-nav li a:hover,.widget_recent-work-widget .recent_work_overlay .fa ,
input[type="password"],.widget.widget_ourteam-widget .team-social ul li a,.widget.widget_ourteam-widget .team-content p,
input[type="search"],h1.entry-title a,ul.filter-options li a,ul.filter-options li a:hover,
ul.filter-options li a.selected,.widget_recent-posts-gallery-widget h4,.content-details h3 a,.flex-container .flex-caption a,
textarea,.tagcloud a,.logo h1 a:hover,.footer-top .tagcloud :hover,#portfolio h4 a:hover,.flex-container .flex-caption,
blockquote:before,.comment-navigation .nav-next a:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover:before,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover:before,
.comment-navigation .nav-previous a:hover,.main-navigation ul a,.main-navigation ul ul a:before,.page-navigation ol li a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,.post-navigation .nav-links a
		{
			color: <?php echo esc_html($secondary_color); ?>; 
		}



.callout-widget .callout-btn a:hover,.site-footer .widget_image-box-widget a.more-button:hover,
.widget_image-box-widget a.more-button:hover,
.circle-icon-box p.more-button a:hover,.portfolio-excerpt a.btn-readmore:hover,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.site-content .wpcf7-form input[type="submit"]:hover,.comment-navigation .nav-next a,
.comment-navigation .nav-previous a,.copy,.flex-container .flex-direction-nav a:hover
		{
			background-color: <?php echo  esc_html($secondary_color); ?>; 
		}
		

.site-content .wpcf7-form input[type="submit"]:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover:before,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover:before,.callout-widget .callout-btn a:hover,.widget_image-box-widget a.more-button:hover,
.circle-icon-box p.more-button a:hover,.portfolio-excerpt a.btn-readmore:hover,.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-direction-nav a:hover,
.ui-accordion .ui-accordion-header-active span.fa,.sticky,ol.comment-list li.byuser
		{
			border-color: <?php echo  esc_html($secondary_color); ?>; 
		}

.flex-container .flex-caption a:before,.alert-message,.services-2 .textwidget a.btn:before 
		{
			border-bottom-color: <?php echo  esc_html($secondary_color); ?>; 
		}

			</style>
<?php
		}
}

