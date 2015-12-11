<?php
/** Theme Name	: bhumi
* Theme Core Functions and Codes
*/
	/**Includes required resources here**/
	define('CPM_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('CPM_TEMPLATE_DIR', get_template_directory());
	define('CPM_TEMPLATE_DIR_CORE' , CPM_TEMPLATE_DIR . '/core');
	require( CPM_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' );
	require( CPM_TEMPLATE_DIR_CORE . '/menu/bhumi_nav_walker.php' );
	require( CPM_TEMPLATE_DIR_CORE . '/scripts/css_js.php' ); //Enquiring Resources here
	require( CPM_TEMPLATE_DIR_CORE . '/comment-function.php' );
	require(dirname(__FILE__).'/customizer.php');

	//Sane Defaults
	function bhumi_default_settings() {
		$ImageUrl  = CPM_TEMPLATE_DIR_URI ."/assets/images/1.png";
		$ImageUrl2 = CPM_TEMPLATE_DIR_URI ."/assets/images/2.png";
		$ImageUrl3 = CPM_TEMPLATE_DIR_URI ."/assets/images/3.png";
		$ImageUrl4 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio1.png";
		$ImageUrl5 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio2.png";
		$ImageUrl6 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio3.png";
		$ImageUrl7 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio4.png";
		$ImageUrl8 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio5.png";
		$ImageUrl9 = CPM_TEMPLATE_DIR_URI ."/assets/images/portfolio6.png";
		$cpm_theme_options=array(
				'upload_image_logo'=>'',
				'height'=>'55',
				'width'=>'150',
				'_frontpage' => '1',
				'blog_count'=>'3',
				'upload_image_favicon'=>'',
				'custom_css'=>'',
				'slide_image_1' => $ImageUrl,
				'slide_title_1' => __('Slide Title', 'bhumi' ),
				'slide_desc_1' => __('Lorem Ipsum is simply dummy text of the printing', 'bhumi' ),
				'slide_btn_text_1' => __('Read More', 'bhumi' ),
				'slide_btn_link_1' => '#',
				'slide_image_2' => $ImageUrl2,
				'slide_title_2' => __('Phasellus ultrices nulla quis nibh', 'bhumi' ),
				'slide_desc_2' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'bhumi' ),
				'slide_btn_text_2' => __('Read More', 'bhumi' ),
				'slide_btn_link_2' => '#',
				'slide_image_3' => $ImageUrl3,
				'slide_title_3' => __('Contrary to popular ', 'bhumi' ),
				'slide_desc_3' => __('Aldus PageMaker including versions of Lorem Ipsum, rutrum turpi', 'bhumi' ),
				'slide_btn_text_3' => __('Read More', 'bhumi' ),
				'slide_btn_link_3' => '#',
				// Footer Call-Out
				'fc_home'=>'1',
				'fc_title' => __('Lorem Ipsum is simply dummy text of the printing and typesetting industry. ', 'bhumi' ),
				'fc_btn_txt' => __('More Features', 'bhumi' ),
				'fc_btn_link' =>"#",
				'fc_radio'=>'bottom',
				//Social media links
				'header_social_media_in_enabled'=>'1',
				'footer_section_social_media_enbled'=>'1',
				'twitter_link' =>"#",
				'fb_link' =>"#",
				'linkedin_link' =>"#",
				'youtube_link' =>"#",
				'instagram' =>"#",
				'gplus' =>"#",

				'email_id' => 'example@mymail.com',
				'phone_no' => '0159753586',
				'footer_customizations' => __(' &#169; 2015 bhumi Theme', 'bhumi' ),
				'developed_by_text' => __('Theme Developed By', 'bhumi' ),
				'developed_by_bhumi_text' => __('bhumi Themes', 'bhumi' ),
				'developed_by_link' => 'http://bhumi.com/',

				'home_service_heading' => __('Our Services', 'bhumi' ),
				'service_1_title'=>__("Gears",'bhumi' ),
				'service_1_icons'=>"fa fa-gears",
				'service_1_text'=>__("Lorem Ipsum is simply dummy text. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.", 'bhumi' ),
				'service_1_link'=>"#",

				'service_2_title'=>__('Star', 'bhumi' ),
				'service_2_icons'=>"fa fa-star",
				'service_2_text'=>__("Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC", 'bhumi' ),
				'service_2_link'=>"#",

				'service_3_title'=>__("WordPress", 'bhumi' ),
				'service_3_icons'=>"fa fa-wordpress",
				'service_3_text'=>__("Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. ", 'bhumi' ),
				'service_3_link'=>"#",

				'service_4_title'=>__("Base", 'bhumi'),
				'service_4_icons'=>("fa fa-database"),
				'service_4_text'=>__("Morbi in sem quis dui placerat ornare. Pellentesque odio nisi, euismod in, pharetra a, ultricies in, diam. Sed arcu. Cras consequat.", 'bhumi'),
				'service_4_link'=>"#",

				//Portfolio Settings:
				'portfolio_home'=>'1',
				'port_heading' => __('Recent Works', 'bhumi' ),
				'port_1_img'=> $ImageUrl4,
				'port_1_title'=>__('Charity', 'bhumi' ),
				'port_1_link'=>'#',
				'port_2_img'=> $ImageUrl5,
				'port_2_title'=>__('Explore', 'bhumi' ),
				'port_2_link'=>'#',
				'port_3_img'=> $ImageUrl6,
				'port_3_title'=>__('Dream', 'bhumi' ),
				'port_3_link'=>'#',
				'port_4_img'=> $ImageUrl7,
				'port_4_title'=>__('Magazine', 'bhumi' ),
				'port_4_link'=>'#',
				//BLOG Settings
				'show_blog' => '1',
				'blog_title'=>__('Latest Blog', 'bhumi' )

			);
			return apply_filters( 'bhumi_options', $cpm_theme_options );
    }
     
	 /*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
		) );
	add_post_type_support( 'bhumi', 'post-formats', array('aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat') );

	function bhumi_get_options() {
	    // Options API
	    return wp_parse_args(
	        get_option( 'bhumi_options', array() ),
	        bhumi_default_settings()
	    );
	}
	// require( CPM_TEMPLATE_DIR_CORE . '/theme-options/option-panel.php' ); // for Options Panel

	
	
	/*After Theme Setup*/
	add_action( 'after_setup_theme', 'bhumi_head_setup' );
	function bhumi_head_setup()
	{
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 550; //px

	    //Blog Thumb Image Sizes
		add_image_size('home_post_thumb',340,210,true);
		//Blogs thumbs
		add_image_size('cpm_page_thumb',730,350,true);
		add_image_size('blog_2c_thumb',570,350,true);
		add_theme_support( 'title-tag' );
		// Load text domain for translation-ready
		load_theme_textdomain( 'bhumi', CPM_TEMPLATE_DIR_CORE . '/lang' );

		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'bhumi' ) );
		// theme support
		$args = array('default-color' => '000000',);
		add_theme_support( 'custom-background', $args);
		add_theme_support( 'automatic-feed-links');
		require( CPM_TEMPLATE_DIR . '/options-reset.php'); //Reset Theme Options Here
	}


	// Read more tag to formatting in blog page
	function bhumi_content_more($more)
	{
	   return '<div class="blog-post-details-item"><a class="bhumi_blog_read_btn" href="'.get_permalink().'">'.__('Read More', 'bhumi' ).'</a></div>';
	}
	add_filter( 'the_content_more_link', 'bhumi_content_more' );


	// Replaces the excerpt "more" text by a link
	function bhumi_excerpt_more($more) {
	return '...';
	}
	add_filter('excerpt_more', 'bhumi_excerpt_more');
	/*
	* bhumi widget area
	*/
	add_action( 'widgets_init', 'bhumi_widgets_init');
	function bhumi_widgets_init() {
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'bhumi' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'bhumi' ),
			'before_widget' => '<div class="bhumi_sidebar_widget">',
			'after_widget' => '</div>',
			'before_title' => '<div class="bhumi_sidebar_widget_title"><h2>',
			'after_title' => '</h2></div>'
		) );

	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'bhumi' ),
			'id' => 'footer-widget-area',
			'description' => __( 'Footer widget area', 'bhumi' ),
			'before_widget' => '<div class="col-md-3 col-sm-6 bhumi_footer_widget_column">',
			'after_widget' => '</div>',
			'before_title' => '<div class="bhumi_footer_widget_title">',
			'after_title' => '<div class="bhumi-footer-separator"></div></div>',
		) );
	}

	/* Breadcrumbs  */
	function bhumi_breadcrumbs() {
		    $delimiter = '';
		    $home = __('Home', 'bhumi' ); // text for the 'Home' link
		    $before = '<li>'; // tag before the current crumb
		    $after = '</li>'; // tag after the current crumb
		    echo '<ul class="breadcrumb">';
		    global $post;
		    $homeLink = home_url();
		    echo '<li><a href="' . $homeLink . '">' . $home . '</a></li>' . $delimiter . ' ';
		    if (is_category()) {
		        global $wp_query;
		        $cat_obj = $wp_query->get_queried_object();
		        $thisCat = $cat_obj->term_id;
		        $thisCat = get_category($thisCat);
		        $parentCat = get_category($thisCat->parent);
		        if ($thisCat->parent != 0)
		            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
		        echo $before . ' _e("Archive by category","bhumi") "' . single_cat_title('', false) . '"' . $after;
		    } elseif (is_day()) {
		        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
		        echo '<li><a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
		        echo $before . get_the_time('d') . $after;
		    } elseif (is_month()) {
		        echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
		        echo $before . get_the_time('F') . $after;
		    } elseif (is_year()) {
		        echo $before . get_the_time('Y') . $after;
		    } elseif (is_single() && !is_attachment()) {
		        if (get_post_type() != 'post') {
		            $post_type = get_post_type_object(get_post_type());
		            $slug = $post_type->rewrite;
		            echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
		            echo $before . get_the_title() . $after;
		        } else {
		            $cat = get_the_category();
		            $cat = $cat[0];
		            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		            echo $before . get_the_title() . $after;
		        }

		    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
		        $post_type = get_post_type_object(get_post_type());
		        echo $before . $post_type->labels->singular_name . $after;
		    } elseif (is_attachment()) {
		        $parent = get_post($post->post_parent);
		        $cat = get_the_category($parent->ID);
		        $cat = $cat[0];
		        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
		        echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
		        echo $before . get_the_title() . $after;
		    } elseif (is_page() && !$post->post_parent) {
		        echo $before . get_the_title() . $after;
		    } elseif (is_page() && $post->post_parent) {
		        $parent_id = $post->post_parent;
		        $breadcrumbs = array();
		        while ($parent_id) {
		            $page = get_page($parent_id);
		            $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
		            $parent_id = $page->post_parent;
		        }
		        $breadcrumbs = array_reverse($breadcrumbs);
		        foreach ($breadcrumbs as $crumb)
		            echo $crumb . ' ' . $delimiter . ' ';
		        echo $before . get_the_title() . $after;
		    } elseif (is_search()) {
		        echo $before . _e("Search results for","bhumi")  . get_search_query() . '"' . $after;

		    } elseif (is_tag()) {
				echo $before . _e('Tag','bhumi') . single_tag_title('', false) . $after;
		    } elseif (is_author()) {
		        global $author;
		        $userdata = get_userdata($author);
		        echo $before . _e("Articles posted by","bhumi") . $userdata->display_name . $after;
		    } elseif (is_404()) {
		        echo $before . _e("Error 404","bhumi") . $after;
		    }

		    echo '</ul>';
	}


	//PAGINATION
	function bhumi_pagination($pages = '', $range = 2) {
	     $showitems = ($range * 2)+1;

	     global $paged;
	     if(empty($paged)) $paged = 1;

	     if($pages == '')
	     {
	         global $wp_query;
	         $pages = $wp_query->max_num_pages;
	         if(!$pages)
	         {
	             $pages = 1;
	         }
	     }

	     if(1 != $pages)
	     {
	         echo "<div class='bhumi_blog_pagination'><div class='bhumi_blog_pagi'>";
	         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
	         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

	         for ($i=1; $i <= $pages; $i++)
	         {
	             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
	             {
	                echo ($paged == $i)? "<a class='active'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
	             }
	         }

	         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
	         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
	         echo "</div></div>";
	     }
	}
	/*===================================================================================
	* Add Author Links
	* =================================================================================*/
	function bhumi_author_profile( $contactmethods ) {

		$contactmethods['youtube_profile'] = __('Youtube Profile URL','bhumi');
		$contactmethods['twitter_profile'] = __('Twitter Profile URL','bhumi');
		$contactmethods['facebook_profile'] = __('Facebook Profile URL','bhumi');
		$contactmethods['linkedin_profile'] = __('Linkedin Profile URL','bhumi');

		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'bhumi_author_profile', 10, 1);
	/*===================================================================================
	* Add Class Gravtar
	* =================================================================================*/
	add_filter('get_avatar','bhumi_gravatar_class');

	function bhumi_gravatar_class($class) {
	    $class = str_replace("class='avatar", "class='author_detail_img", $class);
	    return $class;
	}
	/****--- Navigation for Author, Category , Tag , Archive ---***/
	function bhumi_navigation() { ?>
		<div class="bhumi_blog_pagination">
		<div class="bhumi_blog_pagi">
		<?php //posts_nav_link(); ?>
			<div class="navigation">
				<div class="alignleft"><?php previous_posts_link( '&laquo; Previous Entries' ); ?></div>
				<div class="alignright"><?php next_posts_link( 'Next Entries &raquo;', '' ); ?></div>
			</div>
		</div>
		</div>
	<?php }

	/****--- Navigation for Single ---***/
	function bhumi_navigation_posts() { ?>
		<div class="navigation_en">
			<nav id="cpm_nav">
				<span class="nav-previous">
					<?php previous_post_link('&laquo; %link'); ?>
				</span>
				<span class="nav-next">
					<?php next_post_link('%link &raquo;'); ?>
				</span>
			</nav>
		</div>
    <?php }

/*class for blog's next button*/
add_filter('next_posts_link_attributes', 'bhumi_posts_link_attributes');
function bhumi_posts_link_attributes() {
    return 'class="next"';
}

/*class for blog's previous button*/
add_filter('previous_posts_link_attributes', 'bhumi_post_link_previous');
function bhumi_post_link_previous() {
    return 'class="previous"';
}


if ( ! function_exists( 'bhumi_the_featured_video' ) ) {
    function bhumi_the_featured_video( $content ) {
        $ori_url = explode( "\n", $content );
        $url = $ori_url[0];
        $w = get_option( 'embed_size_w' );
        if ( !is_single() )
            $url = str_replace( '448', $w, $url );

        if ( 0 === strpos( $url, 'https://' ) ) {

            echo apply_filters( 'the_content', $url );
            $content = trim( str_replace( $url, '', $content ) );
        }
        elseif ( preg_match ( '#^<(script|iframe|embed|object)#i', $url ) ) {
            $h = get_option( 'embed_size_h' );
            echo $url;
            if ( !empty( $h ) ) {

                if ( $w === $h ) $h = ceil( $w * 0.75 );
                $url = preg_replace(
                    array( '#height="[0-9]+?"#i', '#height=[0-9]+?#i' ),
                    array( sprintf( 'height="%d"', $h ), sprintf( 'height=%d', $h ) ),
                    $url
                    );
                echo $url;
            }

            $content = trim( str_replace( $url, '', $content ) );

        }
    }
}
?>

