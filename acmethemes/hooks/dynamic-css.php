<?php
/**
 * Dynamic css
 * @since Beauty Studio 1.0.0
 *
 * @param null
 * @return void
 *
 */
if ( ! function_exists( 'beauty_studio_dynamic_css' ) ) :

    function beauty_studio_dynamic_css() {

        global $beauty_studio_customizer_all_values;
        /*Color options */
        $beauty_studio_header_height            = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-header-height'] );

        $beauty_studio_primary_color            = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-primary-color'] );
	    $beauty_studio_link_color               = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-link-color'] );
	    $beauty_studio_link_hover_color         = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-link-hover-color'] );
	    
        $beauty_studio_header_top_bg_color      = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-header-top-bg-color'] );
        $beauty_studio_footer_bg_color          = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-footer-bg-color'] );
        $beauty_studio_footer_bottom_bg_color   = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-footer-bottom-bg-color'] );

	    /*Advanced Colors*/
        /*animation*/
        $beauty_studio_enable_animation = $beauty_studio_customizer_all_values['beauty-studio-enable-animation'];

	    $custom_css = '';
	    
        /*animation*/
        if( 1 == $beauty_studio_enable_animation ){
            $custom_css .= "
             .init-animate {
                visibility: visible !important;
             }
             ";
        }
        /*background*/
	    $beauty_studio_header_image_display = esc_attr( $beauty_studio_customizer_all_values['beauty-studio-header-image-display'] );
	    if( 'bg-image' == $beauty_studio_header_image_display || 'hide' == $beauty_studio_header_image_display ){
		    $bg_image_url ='';
		    if( get_header_image() && 'bg-image' == $beauty_studio_header_image_display ){
			    $bg_image_url = esc_url( get_header_image() );
		    }
		    $custom_css .= "
              .inner-main-title {
                background-image:url('{$bg_image_url}');
                background-repeat:no-repeat;
                background-size:cover;
                background-attachment:fixed;
                background-position: center; 
                height: {$beauty_studio_header_height}px;
            }";
	    }

        /*color*/
        $custom_css .= "
            .top-header{
                background-color: {$beauty_studio_header_top_bg_color};
            }";
        $custom_css .= "
            .site-footer{
                background-color: {$beauty_studio_footer_bg_color};
            }";
        $custom_css .= "
            .copy-right{
                background-color: {$beauty_studio_footer_bottom_bg_color};
            }";
        $custom_css .= "
	        .site-title:hover,
	        .site-title a:hover,
            .news-notice-content .news-content a:hover,
			 .at-social .socials li a,
			 .primary-color,
			 article.post .entry-header .cat-links a,
			 #beauty-studio-breadcrumbs a:hover,
			 .woocommerce .star-rating, 
            .woocommerce ul.products li.product .star-rating,
            .woocommerce p.stars a,
            .woocommerce ul.products li.product .price,
            .woocommerce ul.products li.product .price ins .amount,
            .woocommerce a.button.add_to_cart_button:hover,
            .woocommerce a.added_to_cart:hover,
            .woocommerce a.button.product_type_grouped:hover,
            .woocommerce a.button.product_type_external:hover,
            .woocommerce .cart .button:hover,
            .woocommerce .cart input.button:hover,
            .woocommerce #respond input#submit.alt:hover,
			.woocommerce a.button.alt:hover,
			.woocommerce button.button.alt:hover,
			.woocommerce input.button.alt:hover,
			.woocommerce .woocommerce-info .button:hover,
			.woocommerce .widget_shopping_cart_content .buttons a.button:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li a,
			.woocommerce-message::before,
			i.slick-arrow:hover,
			.acme-contact .contact-page-content ul li strong,
			.main-navigation .acme-normal-page .current_page_item a,
            .main-navigation .acme-normal-page .current-menu-item a,
            .main-navigation .active a,
            .main-navigation .navbar-nav >li a:hover{
                color: {$beauty_studio_primary_color};
            }";

        /*background color*/
        $custom_css .= "
            .navbar .navbar-toggle:hover,
            .main-navigation .current_page_ancestor > a:before,
            .comment-form .form-submit input,
            .btn-primary,
            .wpcf7-form input.wpcf7-submit,
            .wpcf7-form input.wpcf7-submit:hover,
            .sm-up-container,
            .btn-primary.btn-reverse:before,
            #at-shortcode-bootstrap-modal .modal-header,
            .primary-bg,
			.navigation.pagination .nav-links .page-numbers.current,
			.navigation.pagination .nav-links a.page-numbers:hover,
			.woocommerce .product .onsale,
			.woocommerce a.button.add_to_cart_button,
			.woocommerce a.added_to_cart,
			.woocommerce a.button.product_type_grouped,
			.woocommerce a.button.product_type_external,
			.woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs li:hover,
			.woocommerce div.product .woocommerce-tabs ul.tabs li.active,
			.woocommerce .cart .button,
			.woocommerce .cart input.button,
			.woocommerce input.button:disabled, 
			.woocommerce input.button:disabled[disabled],
			.woocommerce input.button:disabled:hover, 
			.woocommerce input.button:disabled[disabled]:hover,
			 .woocommerce nav.woocommerce-pagination ul li a:focus, 
			 .woocommerce nav.woocommerce-pagination ul li a:hover, 
			 .woocommerce nav.woocommerce-pagination ul li span.current,
			 .woocommerce a.button.wc-forward,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-range,
			 .woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
			 .navbar .cart-wrap .acme-cart-views a span{
                background-color: {$beauty_studio_primary_color};
                color:#fff;
                border:1px solid {$beauty_studio_primary_color};
            }";

        /*borders*/
	    $custom_css .= "
            .woocommerce .cart .button, 
            .woocommerce .cart input.button,
            .woocommerce a.button.add_to_cart_button,
            .woocommerce a.added_to_cart,
            .woocommerce a.button.product_type_grouped,
            .woocommerce a.button.product_type_external,
            .woocommerce .cart .button,
            .woocommerce .cart input.button,
            .woocommerce .single-product #respond input#submit.alt,
			.woocommerce .single-product a.button.alt,
			.woocommerce .single-product button.button.alt,
			.woocommerce .single-product input.button.alt,
			.woocommerce #respond input#submit.alt,
			.woocommerce a.button.alt,
			.woocommerce button.button.alt,
			.woocommerce input.button.alt,
			.woocommerce .widget_shopping_cart_content .buttons a.button,
			.woocommerce div.product .woocommerce-tabs ul.tabs:before{
                border: 1px solid {$beauty_studio_primary_color};
            }";
        $custom_css .= "
            .blog article.sticky{
                border-bottom: 2px solid {$beauty_studio_primary_color};
            }";

	    /*Colors options*/
	    $custom_css .= "
        a,
        .posted-on a,
        .single-item .fa,
        .author.vcard a,
        .cat-links a,
        .comments-link a,
        .edit-link a,
        .tags-links a,
        .byline a,
        .nav-links a,
        .widget li a,
        .entry-meta i.fa, 
        .entry-footer i.fa{
            color: {$beauty_studio_link_color};
        }";
	    $custom_css .= "
        a:hover,
        a:active,
        a:focus,
        .posted-on a:hover,
        .single-item .fa:hover,
        .author.vcard a:hover,
        .cat-links a:hover,
        .comments-link a:hover,
        .edit-link a:hover,
        .tags-links a:hover,
        .byline a:hover,
        .nav-links a:hover,
        .widget li a:hover{
            color: {$beauty_studio_link_hover_color};
        }";

       /*custom added*/
        /*button reverse*/
        $custom_css .= "
       .btn-reverse{
            color: {$beauty_studio_primary_color};
        }";

        $custom_css .= "
       .btn-reverse:hover,
       .image-slider-wrapper .slider-content .btn-reverse:hover,
       .at-widgets.at-parallax .btn-reverse:hover{
            background: {$beauty_studio_primary_color};
            color:#fff;
            border-color:{$beauty_studio_primary_color};
        }";
        
        $custom_css .= "        
       .woocommerce #respond input#submit, 
       .woocommerce a.button, 
       .woocommerce button.button, 
       .woocommerce input.button{
            background: {$beauty_studio_primary_color};
            color:#fff;
        }";

        /*secondary color*/
	    $custom_css .= "
       .team-img-box:before{
            -webkit-box-shadow: 0 -106px 92px -35px {$beauty_studio_header_top_bg_color} inset;
			box-shadow: 0 -106px 92px -35px {$beauty_studio_header_top_bg_color} inset;
        }";
	    $custom_css .= "
       .acme-contact .contact-page-content{
            	border: 10px solid {$beauty_studio_header_top_bg_color};
        }";
        wp_add_inline_style( 'beauty-studio-style', $custom_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'beauty_studio_dynamic_css', 99 );