<?php

if ( ! function_exists( 'aster_color_theme' ) ) :



	function aster_color_theme() {
		wp_enqueue_style(
			'aster-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css'
		);
		$color = get_theme_mod( 'aster_theme_color' );
		$custom_css = "

			a,
			a:hover, a:focus,
			h1.entry-title a:hover,
			.entry-meta ul.list-inline>li a:hover,
			.user-profile .profile-heading h3 a:hover,
			.widget a:hover,
			.latest-posts .entry-title a:hover,
			#wp-calendar tfoot a,
			#comments .comment-author a:hover,
			#respond .logged-in-as a:hover,
			#navigation-wrapper ul.top-menu li.current-menu-item> a, #navigation-wrapper ul.top-menu li.current_page_item> a, #navigation-wrapper .top-menu li a:hover{
				color: {$color};
			}

			input[type='submit'],
			#navigation-wrapper ul.top-menu ul a:hover,
			#navigation-wrapper .top-menu ul ul a:hover,
			.pagination li a:focus,
			.pagination li a:hover,
			.pagination li span:focus,
			.pagination li span.current,
			.pagination li span:hover,
			.widget .tagcloud a:hover,
			#comments .comment-reply a:hover,
			.form-submit input[type='submit']:hover,
			.sticky .featured-post,
			.scroll-up a:hover,
			.scroll-up a:active{
				background-color: {$color};
			}

			input[type='submit'],
			#respond input:focus[type='text'],
			#respond input:focus[type='email'],
			#respond input:focus[type='url'],
			#respond textarea:focus{
				border-color: {$color};
			}


         ";
		wp_add_inline_style( 'aster-custom-style', $custom_css );
	}
	add_action( 'wp_enqueue_scripts', 'aster_color_theme' );



endif;
