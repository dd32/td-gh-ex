<?php
	function accesspress_mag_dynamic_color() {
		$custom_css = '';

		$tpl_color = of_get_option( 'template_color', '#dc3522' );

		if( $tpl_color ) {

			/** Background Color **/
				$custom_css .= "
                    .ticker-title,
                    .big-image-overlay i,
                    #back-top:hover,
                    .bread-you,
                    .entry-meta .post-categories li a,
                    .error404 .error-num .num,
                    .navigation .nav-links a:hover,
                    .bttn:hover,
                    button,
                    input[type=\"button\"]:hover,
                    input[type=\"reset\"]:hover,
                    input[type=\"submit\"]:hover{
					   background: {$tpl_color};
					}";
			/** Color **/
                $custom_css .= "
                    #site-navigation ul li:hover > a,
                    #site-navigation ul li.current-menu-item > a,
                    #site-navigation ul li.current-menu-ancestor > a,
                    .search-icon > i:hover,
                    .block-poston a:hover,
                    .block-post-wrapper .post-title a:hover,
                    .random-posts-wrapper .post-title a:hover,
                    .sidebar-posts-wrapper .post-title a:hover,
                    .review-posts-wrapper .single-review .post-title a:hover,
                    .latest-single-post a:hover,
                    #top-navigation .menu li a:hover,
                    #top-navigation .menu li.current-menu-item > a,
                    #top-navigation .menu li.current-menu-ancestor > a,
                    #footer-navigation ul li a:hover,
                    #footer-navigation ul li.current-menu-item > a,
                    #footer-navigation ul li.current-menu-ancestor > a,
                    #top-right-navigation .menu li a:hover,
                    #top-right-navigation .menu li.current-menu-item > a,
                    #top-right-navigation .menu li.current-menu-ancestor > a,
                    #accesspres-mag-breadcrumbs .ak-container > .current,
                    .entry-footer a:hover,
                    .oops,
                    .error404 .not_found,
                    #cancel-comment-reply-link:before,
                    #cancel-comment-reply-link{
                        color: {$tpl_color};
                    }";
                    
            /** Border Color **/
                $custom_css .= "
                    #site-navigation ul.menu > li:hover > a:after,
                    #site-navigation ul.menu > li.current-menu-item > a:after,
                    #site-navigation ul.menu > li.current-menu-ancestor > a:after,
                    #site-navigation ul.sub-menu li:hover,
                    #site-navigation ul.sub-menu li.current-menu-item,
                    #site-navigation ul.sub-menu li.current-menu-ancestor,
                    .navigation .nav-links a,
                    .bttn,
                    button, input[type=\"button\"],
                    input[type=\"reset\"],
                    input[type=\"submit\"]{
                        border-color: {$tpl_color};
                    }";

			/** Border Left Color **/
				$custom_css .= "
                    .ticker-title:before,
                    .bread-you:after{
					   border-left-color: {$tpl_color};
					}";
		}

		wp_add_inline_style( 'accesspress-mag-style', $custom_css );
	}

	add_action( 'wp_enqueue_scripts', 'accesspress_mag_dynamic_color' );