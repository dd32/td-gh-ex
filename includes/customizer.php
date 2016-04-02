<?php
/**
 * BOXY Theme Customizer
 *
 * @package BOXY
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function boxy_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'boxy_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function boxy_customize_preview_js() {
	wp_enqueue_script( 'boxy_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'boxy_customize_preview_js' );


if( get_theme_mod('enable_primary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_primary_custom_css' );

	function wbls_customizer_primary_custom_css() {
			$primary_color = get_theme_mod( 'primary_color','#f94242'); ?>

	<style type="text/css">

a,.cart-subtotal .amount,.comment-navigation .nav-previous a:hover,.site-footer a:hover,.site-footer .widget li a:hover,
.paging-navigation .nav-previous a:hover,.widget a:hover,.site-footer .textwidget ul.cnt-address li a,.widget caption,.widget_rss ul li .rss-date,
.post-navigation .nav-previous a:hover,.comment-navigation .nav-next a:hover,.site-footer .footer-bottom a,
.paging-navigation .nav-next a:hover,.site-title a:hover,.site-footer .widget_meta li a:hover,
.site-footer .widget_pages li a:hover,.entry-meta a:hover,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
.tabs-container ul.ui-tabs-nav li a:hover,.callout-btn a:hover,.ui-accordion .ui-accordion .ui-accordion-header:hover,
.entry-footer a:hover,blockquote:before,ol.comment-list .comment-metadata a:hover,ol.comment-list .comment-author cite a:hover,.required,
.site-footer .widget_recent_entries li a:hover,.widget_recent-work-widget .work-title h4 a:hover,.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.site-footer .widget.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.site-footer .widget_testimonial-widget p.client,
.site-footer .widget_nav_menu li a:hover,.ei-title h3,.breadcrumb #breadcrumb a:hover,.dropcap,
.post-navigation .nav-next a:hover,.pullright:before,.widget_image-box-widget h4,
.pullleft:before,.page-links a:hover,.order-total .amount,.woocommerce #content table.cart a.remove,
.woocommerce table.cart a.remove,
.woocommerce-page #content table.cart a.remove,
.woocommerce-page table.cart a.remove,
.cart-subtotal .amount,.pullnone:before,.page-navigation ol li a:hover,.page-navigation ol li.bpn-current:hover,a.more-link:hover,.site-main .post-navigation .nav-links a:hover,.widget-title,.widget #wp-calendar tbody td a
		{
				color: <?php echo esc_html($primary_color); ?>; 
		}
		


.site-footer .footer-bottom ul.menu li a:hover,.widget_recent-work-widget .recent_work_overlay a,.ui-accordion .ui-accordion-header-active,.widget_tag_cloud a,.site-footer .widget_tag_cloud a:hover,
input[type="reset"],.widget.widget_skill-widget .skill-container .skill .skill-percentage,.ui-accordion h3:hover,
input[type="submit"],.flex-container .flex-control-paging li a.flex-active,.site-footer .widget_image-box-widget a.more-button:hover,.site-footer a.more-button,.flex-control-paging li a.flex-active,
.flex-control-paging li a:hover,.dropcap-circle,.withtip:before,.callout-widget .callout-btn a,.callout-widget .callout-btn a:hover,
.dropcap-box,.toggle .toggle-title:hover,.site-footer .footer-bottom ul.menu li.current_page_item a,.circle-icon-box .service p.more-button a:hover,
.flex-container .flex-control-paging li a:hover,.flex-container p.btn-slider a:hover,
.btn-slider a:hover,
.circle-icon-box .circle-icon-wrapper:hover,
.portfolio-excerpt a.btn-readmore:hover,
.service p.more-button a:hover,.woocommerce #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li a:hover,
.woocommerce #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active,
.woocommerce-page div.product .woocommerce-tabs ul.tabs li.active,
.menu-footer-menu-container ul.menu li a:hover,.slicknav_menu,.woocommerce #content nav.woocommerce-pagination ul li a:focus,
.woocommerce #content nav.woocommerce-pagination ul li a:hover,
.woocommerce #content nav.woocommerce-pagination ul li span.current,
.woocommerce nav.woocommerce-pagination ul li a:focus,
.woocommerce nav.woocommerce-pagination ul li a:hover,
.woocommerce nav.woocommerce-pagination ul li span.current,
.woocommerce-page #content nav.woocommerce-pagination ul li a:focus,
.woocommerce-page #content nav.woocommerce-pagination ul li a:hover,
.woocommerce-page #content nav.woocommerce-pagination ul li span.current,
.woocommerce-page nav.woocommerce-pagination ul li a:focus,
.woocommerce-page nav.woocommerce-pagination ul li a:hover,
.woocommerce-page nav.woocommerce-pagination ul li span.current,
.menu-all-pages-container ul.menu li a:hover,.portfolio-excerpt a.btn-readmore:hover,
.share-box ul li a:hover, .top-right ul li a:hover,table td#today,.flex-recent-posts ul.slides li a.post-readmore:hover .rp-thumb
		{
		 	background-color: <?php echo esc_html($primary_color); ?>; 
		}

.woocommerce #content input.button:hover,
.woocommerce #respond input#submit:hover,
.woocommerce a.button:hover,
.woocommerce button.button:hover,
.woocommerce input.button:hover,
.woocommerce-page #content input.button:hover,
.woocommerce-page #respond input#submit:hover,
.woocommerce-page a.button:hover,
.woocommerce-page button.button:hover,
.woocommerce-page input.button:hover {
	background-color: <?php echo esc_html($primary_color); ?>!important; 
}

		.flex-recent-posts ul.slides li a.post-readmore:hover .rp-thumb {
				opacity: 0.7;
		}

.comment-navigation .nav-previous a,.widget_recent-work-widget .flex-direction-nav a.flex-prev,
.widget_recent-work-widget .flex-direction-nav a.flex-next,ul.filter-options li a:hover,
.portfolio2col:hover,.portfolio-excerpt a.btn-readmore,.flex-container .flex-direction-nav a:hover,
.portfolio3col:hover,.flex-container p.btn-slider a,.toggle .toggle-content,
.portfolio4col:hover,.ei-slider-thumbs li.ei-slider-element,.widget .ei-slider-thumbs li.ei-slider-element,
.portfolio2col_sidebar:hover,.dropcap-circle,.toggle .toggle-title .icn,.widget_testimonial-widget ul li .client-pic,.widget_testimonial-widget .flex-control-nav li a,.widget_image-box-widget .image-box img,.widget_image-box-widget a.more-button,
.portfolio3col_sidebar:hover,.dropcap-book,.circle-icon-box .circle-icon-wrapper,.circle-icon-box .service,.circle-icon-box .service p.more-button a,
ul.filter-options li a.selected,.widget_recent-posts-gallery-widget .recent-post:hover,
.paging-navigation .nav-previous a,.search-form input.search-field,.ui-tabs-panel,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
.tabs-container ul.ui-tabs-nav li a:hover,.widget.widget_ourteam-widget .team-social ul li a,
.post-navigation .nav-previous a,.comment-navigation .nav-next a,.ui-accordion h3 span.fa,i.boxy,
.paging-navigation .nav-next a,.site-main .post-navigation .nav-links a span,.widget_social-networks-widget ul li a,
.share-box ul li a,.tabs-container .ui-tabs-panel,.ui-accordion .ui-accordion-content,
.post-navigation .nav-next a,.page-links a,.page-navigation ol li a,.site-footer .circle-icon-box p.more-button a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,a.more-link,
.share-box ul li a, .top-right ul li a,.main-navigation li.current_page_item > a, .main-navigation li.current-menu-item > a, .main-navigation li.current_page_ancestor > a, .main-navigation li.current_page_parent > a,.main-navigation li:hover > a,.services .service-title, .services .service,.flex-recent-posts ul.slides .recent-post:hover
		{
			border-color: <?php echo esc_html($primary_color);?>;
		}

				
			</style>
<?php
	}
}

if( get_theme_mod('enable_nav_bg_color',false) ) {

	add_action( 'wp_head','wbls_customizer_navbg_custom_css' );

		function wbls_customizer_navbg_custom_css() {
			$nav_bg_color = get_theme_mod( 'nav_bg_color','#d7d7d7'); ?>

				<style type="text/css">

					#site-navigation
							{
								background-color: <?php echo esc_html($nav_bg_color); ?>;
							}
				</style>
<?php }
}

if( get_theme_mod('enable_dd_bg_color',false) ) {

	add_action( 'wp_head','wbls_customizer_ddbg_custom_css' );

		function wbls_customizer_ddbg_custom_css() {
			$dd_bg_color = get_theme_mod( 'dd_bg_color','#d7d7d7'); ?>

				<style type="text/css">

					#site-navigation ul ul,.main-navigation ul.nav-menu li ul li
							{
								background-color: <?php echo esc_html($dd_bg_color); ?>;
							}
				</style>
<?php }
}




if( get_theme_mod('enable_nav_hover_color',false) ) {

	add_action( 'wp_head','wbls_customizer_hover_custom_css' );

		function wbls_customizer_hover_custom_css() {
			$nav_hover_color = get_theme_mod( 'nav_hover_color','#fff'); ?>

				<style type="text/css">

					#site-navigation ul.nav-menu > li.current-menu-parent > a,	#site-navigation li:hover > a,#site-navigation li.current_page_item > a, #site-navigation li.current-menu-item > a, #site-navigation li.current_page_ancestor > a, #site-navigation li.current_page_parent > a 
				 	  	{
						    background-color: <?php echo esc_html($nav_hover_color); ?>;
						}
				</style>
<?php }
}


if( get_theme_mod('enable_secondary_color',false) ) {

	add_action( 'wp_head','wbls_customizer_secondary_custom_css' );

		function wbls_customizer_secondary_custom_css() {
			$secondary_color = get_theme_mod( 'secondary_color','#3a3a3a'); ?>

	<style type="text/css">

/* secondary color */	

button,
input,
select,
textarea,.widget.widget_ourteam-widget .team-content p,.ui-accordion h3 span.fa,.ui-accordion .ui-accordion-header-active span.fa,
.main-navigation ul.nav-menu > li.current-menu-item > a,.widget_social-networks-widget ul li a,
.share-box ul li a,.site-footer .circle-icon-box .service p,.site-footer .circle-icon-box p.more-button a,.site-footer a.more-button:hover,.site-footer .flex-direction-nav a.flex-prev,
.site-footer .flex-direction-nav a.flex-next,.site-footer .footer-bottom ul.menu li a,.tabs-container ul.ui-tabs-nav li a,.widget.widget_ourteam-widget .team-social ul li a,
.main-navigation .menu > ul > li.current_page_item > a,ul.nav-menu li a,.comment-navigation .nav-previous a,
.paging-navigation .nav-previous a,.widget a,.widget_tag_cloud a,.widget_tag_cloud a:hover,.site-title a,.site-description,
.post-navigation .nav-previous a,.comment-navigation .nav-next a,.site-footer .widget_tag_cloud a,.site-footer .textwidget ul.cnt-address li i,.site-footer .footer-bottom,.site-footer .footer-bottom a:hover,.entry-meta a,
.entry-footer a,ol.comment-list .comment-author cite a,.flex-container .flex-direction-nav a,
ol.comment-list .comment-metadata a,.site-footer .circle-icon-box .circle-icon-wrapper p.fa-stack,.site-footer .circle-icon-box .circle-icon-wrapper h3,.flex-container .flex-caption,.flex-container p.btn-slider a,
.paging-navigation .nav-next a,.site-main .post-navigation .nav-links a,.breadcrumb #breadcrumb a,.alert-message a:hover,.widget_button-widget .btn,.toggle .toggle-title,.toggle .toggle-title .icn,ul.filter-options li a,ul.filter-options li a:hover,
ul.filter-options li a.selected,.widget_testimonial-widget ul li p.client strong,.widget_recent-posts-gallery-widget h3.widget-title,.widget_recent-posts-gallery-widget h4,#portfolio h4 a:hover,
.post-navigation .nav-next a,.page-links a,ul.filter-options li a:hover,.page-navigation ol li a,.site-footer .widget_social-networks-widget li a,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,a.more-link
	{
		color: <?php echo $secondary_color; ?>; 
	}
	

.slicknav_menu li.current-menu-item a,
.slicknav_menu li a:hover,
.slicknav_menu .slicknav_row:hover,.slicknav_menu .slicknav_btn,
.slicknav_menu .slicknav_btn:hover,.tabs-container ul.ui-tabs-nav li.ui-tabs-active a,
input[type="button"]:hover,.site-footer .widget_image-box-widget a.more-button,
input[type="reset"]:hover,.widget.widget_skill-widget .skill-container .skill,.widget.widget_skill-widget .skill-container .skill .skill-content span
input[type="submit"]:hover,.site-footer,.panel-row-style-wide-dark-grey 
	{
	 	background-color: <?php echo $secondary_color; ?>; 
	}
	

input[type="button"]:active,.site-footer .footer-bottom ul.menu li a,.widget_image-box-widget a.more-button:hover,.ui-accordion .ui-accordion-header-active span.fa,.callout-widget .callout-btn a,
.widget_recent-work-widget .flex-direction-nav a.flex-prev:hover,
.widget_recent-work-widget .flex-direction-nav a.flex-next:hover,.flex-container .flex-control-paging li a,
input[type="reset"]:active,.page-navigation ol li.bpn-current,.page-navigation ol li.bpn-current:hover,
input[type="submit"]:active,input[type="button"]:focus,.flex-container .flex-direction-nav a,
input[type="reset"]:focus,.site-main .post-navigation .nav-links a:hover span,
input[type="submit"]:focus,.comment-navigation .nav-previous a:hover,.widget .ei-slider-thumbs li,
.paging-navigation .nav-previous a:hover,.tabs-container ul.ui-tabs-nav li a,
.post-navigation .nav-previous a:hover,.comment-navigation .nav-next a:hover,
.paging-navigation .nav-next a:hover,button:active,button:focus,
.post-navigation .nav-next a:hover,.page-links a:hover,.page-navigation ol li a:hover,.page-navigation ol li.bpn-current:hover,a.more-link:hover
	{
		border-color: <?php echo $secondary_color?>;
	}

	abbr,acronym
	{
		border-bottom-color: <?php  echo $secondary_color; ?>;
	}

			</style>
<?php
		}
}

