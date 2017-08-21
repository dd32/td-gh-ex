<?php
/**
 * beetech custom functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package beetech
 */

/** Define variable for theme version **/
	$beetech_theme_details = wp_get_theme();
	$beetech_theme_version = $beetech_theme_details->Version;
	
/** Parallax Menu Array **/
$beetech_single_menu_fields = array(
		'page' =>  array(
						'default'=> esc_html__( 'Main', 'beetech' ), 
						'label'=>  esc_html__( 'Top Section', 'beetech' ) 
					),
        'services' =>  array( 
						'default'=> esc_html__( 'Services', 'beetech' ), 
						'label'=>  esc_html__( 'Our Services', 'beetech' ) 
					),
        'about' =>  array( 
						'default'=> esc_html__( 'About', 'beetech' ), 
						'label'=>  esc_html__( 'About Us', 'beetech' ) 
					),
		
		'testimonials' =>  array( 
						'default'=> esc_html( '', 'beetech' ), 
						'label'=>  esc_html__( 'Client Says', 'beetech' ) 
					),
		'fact' =>  array( 
						'default'=> esc_html( '', 'beetech' ), 
						'label'=>  esc_html__( 'Fact Us', 'beetech' ) 
					),
		'portfolio' =>  array( 
						'default'=> esc_html__( 'Portfolio', 'beetech' ), 
						'label'=>  esc_html__( 'Portfolio', 'beetech' ) 
					),
        'team' =>  array(
						'default'=> esc_html( '', 'beetech' ), 
						'label'=>  esc_html__( 'Our Team', 'beetech' ) 
					),
		'blog' =>  array( 
						'default'=> esc_html__( 'Blog', 'beetech' ), 
						'label'=>  esc_html__( 'Our Blog', 'beetech' ) 
					),
		'clients' =>  array( 
						'default'=> esc_html( '', 'beetech' ), 
						'label'=>  esc_html__( 'Our Clients', 'beetech' ) 
					),
		'contact' =>  array( 
						'default'=> esc_html__( 'Contact', 'beetech' ), 
						'label'=>  esc_html__( 'Contact Us', 'beetech' ) 
					)
	);


if( ! function_exists( 'beetech_parallax_menu_cb' ) ):

	/** Parallax Menu function **/

	function beetech_parallax_menu_cb() {
		global $beetech_single_menu_fields;
		$parallax_menu_type = get_theme_mod( 'parallax_menu_type', 'default' );
		foreach ( $beetech_single_menu_fields as $section_id => $section_value ) {
			$beetech_menu_mod_id = $section_id.'_menu_title';
			$beetech_menu_mod_default = $section_value['default'];
			$beetech_menu_title = get_theme_mod( $beetech_menu_mod_id, $beetech_menu_mod_default );
			if( !empty( $beetech_menu_title ) ) {
				$beetech_menu_tab = '';
                $beetech_menu_tab .= '<li class="bt-menu-tab">';
                if($section_id == 'page'){
                    $beetech_menu_tab .= '<a href="'. esc_url( home_url() ) .'/#'.esc_html($section_id).'">'. esc_html( $beetech_menu_title ) .'</a>';
                }else{
                    $beetech_menu_tab .= '<a href="'. esc_url( home_url() ) .'/#bt-section-'.esc_html($section_id).'">'. esc_html( $beetech_menu_title ) .'</a>';   
                }
                             
                $beetech_menu_tab .= '</li>';
                echo  $beetech_menu_tab;
			}
		}
	}
endif;

add_action( 'beetech_parallax_menu', 'beetech_parallax_menu_cb', 10 );


/** Primary menu section **/
if( ! function_exists( 'beetech_primary_menu_cb' ) ):
	function beetech_primary_menu_cb() {
		$beetech_menu_style = get_theme_mod( 'primary_menu_type');
?>
		<nav id="site-navigation" class="main-navigation bt-nav bt-parallax-menu" role="navigation">
			<div class="nav-wrapper">
				<div id="toggle" class="nav-toggle">
		            <span class="one"> </span>
		            <span class="two"> </span>
		            <span class="three"> </span>
		        </div>

                <?php
                
                    if( $beetech_menu_style == 'parallax' ) { ?>
					<div class="menu-main-menu-container">
						<ul id="primary-parallax-menu" class="menu parallax-menu">
							<?php do_action( 'beetech_parallax_menu' ); ?>
						</ul>
					</div>
				<?php }else{
				    wp_nav_menu( array( 'theme_location' => 'beetech_primary_menu', 'menu_id' => 'primary-menu' ) );
				}?> 
			</div><!-- .nav-wrapper -->
		</nav><!-- #site-navigation -->
		<div class="bt-head-search">
			<?php 
				$beetech_search_option = get_theme_mod( 'primary_menu_search_option', 'show' );
				if( $beetech_search_option != 'hide' ) {
			?>
					<div class="search-wrap">
                        <div id="search-toggle">
                            <a href="javascript:void(0)" class="search-icon"><i class="fa fa-search"></i></a>
                            <div class="ak-search">
                                <?php get_search_form(); ?>
                            </div>
                        </div>
                    </div>
			<?php } ?>
		</div><!-- .bt-head-search -->
<?php 
	}
endif;

add_action( 'beetech_main_menu', 'beetech_primary_menu_cb', 10, 2 );

/** FA icon array **/
 function beetech_icons_array(){
    $ap_icon_list_raw = 'fa-glass, fa-music, fa-search, fa-envelope-o, fa-heart, fa-star, fa-star-o, fa-user, fa-film, fa-th-large, fa-th, fa-th-list, fa-check, fa-times, fa-search-plus, fa-search-minus, fa-power-off, fa-signal, fa-cog, fa-trash-o, fa-home, fa-file-o, fa-clock-o, fa-road, fa-download, fa-arrow-circle-o-down, fa-arrow-circle-o-up, fa-inbox, fa-play-circle-o, fa-repeat, fa-refresh, fa-list-alt, fa-lock, fa-flag, fa-headphones, fa-volume-off, fa-volume-down, fa-volume-up, fa-qrcode, fa-barcode, fa-tag, fa-tags, fa-book, fa-bookmark, fa-print, fa-camera, fa-font, fa-bold, fa-italic, fa-text-height, fa-text-width, fa-align-left, fa-align-center, fa-align-right, fa-align-justify, fa-list, fa-outdent, fa-indent, fa-video-camera, fa-picture-o, fa-pencil, fa-map-marker, fa-adjust, fa-tint, fa-pencil-square-o, fa-share-square-o, fa-check-square-o, fa-arrows, fa-step-backward, fa-fast-backward, fa-backward, fa-play, fa-pause, fa-stop, fa-forward, fa-fast-forward, fa-step-forward, fa-eject, fa-chevron-left, fa-chevron-right, fa-plus-circle, fa-minus-circle, fa-times-circle, fa-check-circle, fa-question-circle, fa-info-circle, fa-crosshairs, fa-times-circle-o, fa-check-circle-o, fa-ban, fa-arrow-left, fa-arrow-right, fa-arrow-up, fa-arrow-down, fa-share, fa-expand, fa-compress, fa-plus, fa-minus, fa-asterisk, fa-exclamation-circle, fa-gift, fa-leaf, fa-fire, fa-eye, fa-eye-slash, fa-exclamation-triangle, fa-plane, fa-calendar, fa-random, fa-comment, fa-magnet, fa-chevron-up, fa-chevron-down, fa-retweet, fa-shopping-cart, fa-folder, fa-folder-open, fa-arrows-v, fa-arrows-h, fa-bar-chart, fa-twitter-square, fa-facebook-square, fa-camera-retro, fa-key, fa-cogs, fa-comments, fa-thumbs-o-up, fa-thumbs-o-down, fa-star-half, fa-heart-o, fa-sign-out, fa-linkedin-square, fa-thumb-tack, fa-external-link, fa-sign-in, fa-trophy, fa-github-square, fa-upload, fa-lemon-o, fa-phone, fa-square-o, fa-bookmark-o, fa-phone-square, fa-twitter, fa-facebook, fa-github, fa-unlock, fa-credit-card, fa-rss, fa-hdd-o, fa-bullhorn, fa-bell, fa-certificate, fa-hand-o-right, fa-hand-o-left, fa-hand-o-up, fa-hand-o-down, fa-arrow-circle-left, fa-arrow-circle-right, fa-arrow-circle-up, fa-arrow-circle-down, fa-globe, fa-wrench, fa-tasks, fa-filter, fa-briefcase, fa-arrows-alt, fa-users, fa-link, fa-cloud, fa-flask, fa-scissors, fa-files-o, fa-paperclip, fa-floppy-o, fa-square, fa-bars, fa-list-ul, fa-list-ol, fa-strikethrough, fa-underline, fa-table, fa-magic, fa-truck, fa-pinterest, fa-pinterest-square, fa-google-plus-square, fa-google-plus, fa-money, fa-caret-down, fa-caret-up, fa-caret-left, fa-caret-right, fa-columns, fa-sort, fa-sort-desc, fa-sort-asc, fa-envelope, fa-linkedin, fa-undo, fa-gavel, fa-tachometer, fa-comment-o, fa-comments-o, fa-bolt, fa-sitemap, fa-umbrella, fa-clipboard, fa-lightbulb-o, fa-exchange, fa-cloud-download, fa-cloud-upload, fa-user-md, fa-stethoscope, fa-suitcase, fa-bell-o, fa-coffee, fa-cutlery, fa-file-text-o, fa-building-o, fa-hospital-o, fa-ambulance, fa-medkit, fa-fighter-jet, fa-beer, fa-h-square, fa-plus-square, fa-angle-double-left, fa-angle-double-right, fa-angle-double-up, fa-angle-double-down, fa-angle-left, fa-angle-right, fa-angle-up, fa-angle-down, fa-desktop, fa-laptop, fa-tablet, fa-mobile, fa-circle-o, fa-quote-left, fa-quote-right, fa-spinner, fa-circle, fa-reply, fa-github-alt, fa-folder-o, fa-folder-open-o, fa-smile-o, fa-frown-o, fa-meh-o, fa-gamepad, fa-keyboard-o, fa-flag-o, fa-flag-checkered, fa-terminal, fa-code, fa-reply-all, fa-star-half-o, fa-location-arrow, fa-crop, fa-code-fork, fa-chain-broken, fa-question, fa-info, fa-exclamation, fa-superscript, fa-subscript, fa-eraser, fa-puzzle-piece, fa-microphone, fa-microphone-slash, fa-shield, fa-calendar-o, fa-fire-extinguisher, fa-rocket, fa-maxcdn, fa-chevron-circle-left, fa-chevron-circle-right, fa-chevron-circle-up, fa-chevron-circle-down, fa-html5, fa-css3, fa-anchor, fa-unlock-alt, fa-bullseye, fa-ellipsis-h, fa-ellipsis-v, fa-rss-square, fa-play-circle, fa-ticket, fa-minus-square, fa-minus-square-o, fa-level-up, fa-level-down, fa-check-square, fa-pencil-square, fa-external-link-square, fa-share-square, fa-compass, fa-caret-square-o-down, fa-caret-square-o-up, fa-caret-square-o-right, fa-eur, fa-gbp, fa-usd, fa-inr, fa-jpy, fa-rub, fa-krw, fa-btc, fa-file, fa-file-text, fa-sort-alpha-asc, fa-sort-alpha-desc, fa-sort-amount-asc, fa-sort-amount-desc, fa-sort-numeric-asc, fa-sort-numeric-desc, fa-thumbs-up, fa-thumbs-down, fa-youtube-square, fa-youtube, fa-xing, fa-xing-square, fa-youtube-play, fa-dropbox, fa-stack-overflow, fa-instagram, fa-flickr, fa-adn, fa-bitbucket, fa-bitbucket-square, fa-tumblr, fa-tumblr-square, fa-long-arrow-down, fa-long-arrow-up, fa-long-arrow-left, fa-long-arrow-right, fa-apple, fa-windows, fa-android, fa-linux, fa-dribbble, fa-skype, fa-foursquare, fa-trello, fa-female, fa-male, fa-gratipay, fa-sun-o, fa-moon-o, fa-archive, fa-bug, fa-vk, fa-weibo, fa-renren, fa-pagelines, fa-stack-exchange, fa-arrow-circle-o-right, fa-arrow-circle-o-left, fa-caret-square-o-left, fa-dot-circle-o, fa-wheelchair, fa-vimeo-square, fa-try, fa-plus-square-o, fa-space-shuttle, fa-slack, fa-envelope-square, fa-wordpress, fa-openid, fa-university, fa-graduation-cap, fa-yahoo, fa-google, fa-reddit, fa-reddit-square, fa-stumbleupon-circle, fa-stumbleupon, fa-delicious, fa-digg, fa-pied-piper-pp, fa-pied-piper-alt, fa-drupal, fa-joomla, fa-language, fa-fax, fa-building, fa-child, fa-paw, fa-spoon, fa-cube, fa-cubes, fa-behance, fa-behance-square, fa-steam, fa-steam-square, fa-recycle, fa-car, fa-taxi, fa-tree, fa-spotify, fa-deviantart, fa-soundcloud, fa-database, fa-file-pdf-o, fa-file-word-o, fa-file-excel-o, fa-file-powerpoint-o, fa-file-image-o, fa-file-archive-o, fa-file-audio-o, fa-file-video-o, fa-file-code-o, fa-vine, fa-codepen, fa-jsfiddle, fa-life-ring, fa-circle-o-notch, fa-rebel, fa-empire, fa-git-square, fa-git, fa-hacker-news, fa-tencent-weibo, fa-qq, fa-weixin, fa-paper-plane, fa-paper-plane-o, fa-history, fa-circle-thin, fa-header, fa-paragraph, fa-sliders, fa-share-alt, fa-share-alt-square, fa-bomb, fa-futbol-o, fa-tty, fa-binoculars, fa-plug, fa-slideshare, fa-twitch, fa-yelp, fa-newspaper-o, fa-wifi, fa-calculator, fa-paypal, fa-google-wallet, fa-cc-visa, fa-cc-mastercard, fa-cc-discover, fa-cc-amex, fa-cc-paypal, fa-cc-stripe, fa-bell-slash, fa-bell-slash-o, fa-trash, fa-copyright, fa-at, fa-eyedropper, fa-paint-brush, fa-birthday-cake, fa-area-chart, fa-pie-chart, fa-line-chart, fa-lastfm, fa-lastfm-square, fa-toggle-off, fa-toggle-on, fa-bicycle, fa-bus, fa-ioxhost, fa-angellist, fa-cc, fa-ils, fa-meanpath, fa-buysellads, fa-connectdevelop, fa-dashcube, fa-forumbee, fa-leanpub, fa-sellsy, fa-shirtsinbulk, fa-simplybuilt, fa-skyatlas, fa-cart-plus, fa-cart-arrow-down, fa-diamond, fa-ship, fa-user-secret, fa-motorcycle, fa-street-view, fa-heartbeat, fa-venus, fa-mars, fa-mercury, fa-transgender, fa-transgender-alt, fa-venus-double, fa-mars-double, fa-venus-mars, fa-mars-stroke, fa-mars-stroke-v, fa-mars-stroke-h, fa-neuter, fa-genderless, fa-facebook-official, fa-pinterest-p, fa-whatsapp, fa-server, fa-user-plus, fa-user-times, fa-bed, fa-viacoin, fa-train, fa-subway, fa-medium, fa-y-combinator, fa-optin-monster, fa-opencart, fa-expeditedssl, fa-battery-full, fa-battery-three-quarters, fa-battery-half, fa-battery-quarter, fa-battery-empty, fa-mouse-pointer, fa-i-cursor, fa-object-group, fa-object-ungroup, fa-sticky-note, fa-sticky-note-o, fa-cc-jcb, fa-cc-diners-club, fa-clone, fa-balance-scale, fa-hourglass-o, fa-hourglass-start, fa-hourglass-half, fa-hourglass-end, fa-hourglass, fa-hand-rock-o, fa-hand-paper-o, fa-hand-scissors-o, fa-hand-lizard-o, fa-hand-spock-o, fa-hand-pointer-o, fa-hand-peace-o, fa-trademark, fa-registered, fa-creative-commons, fa-gg, fa-gg-circle, fa-tripadvisor, fa-odnoklassniki, fa-odnoklassniki-square, fa-get-pocket, fa-wikipedia-w, fa-safari, fa-chrome, fa-firefox, fa-opera, fa-internet-explorer, fa-television, fa-contao, fa-500px, fa-amazon, fa-calendar-plus-o, fa-calendar-minus-o, fa-calendar-times-o, fa-calendar-check-o, fa-industry, fa-map-pin, fa-map-signs, fa-map-o, fa-map, fa-commenting, fa-commenting-o, fa-houzz, fa-vimeo, fa-black-tie, fa-fonticons, fa-reddit-alien, fa-edge, fa-credit-card-alt, fa-codiepie, fa-modx, fa-fort-awesome, fa-usb, fa-product-hunt, fa-mixcloud, fa-scribd, fa-pause-circle, fa-pause-circle-o, fa-stop-circle, fa-stop-circle-o, fa-shopping-bag, fa-shopping-basket, fa-hashtag, fa-bluetooth, fa-bluetooth-b, fa-percent, fa-gitlab, fa-wpbeginner, fa-wpforms, fa-envira, fa-universal-access, fa-wheelchair-alt, fa-question-circle-o, fa-blind, fa-audio-description, fa-volume-control-phone, fa-braille, fa-assistive-listening-systems, fa-american-sign-language-interpreting, fa-deaf, fa-glide, fa-glide-g, fa-sign-language, fa-low-vision, fa-viadeo, fa-viadeo-square, fa-snapchat, fa-snapchat-ghost, fa-snapchat-square, fa-pied-piper, fa-first-order, fa-yoast, fa-themeisle, fa-google-plus-official, fa-font-awesome' ;
    $ap_icon_list = explode( ", " , $ap_icon_list_raw);
    return $ap_icon_list;
 }


 /** Slider Callback **/

if( ! function_exists( 'beetech_homepage_slider_cb' ) ):
function beetech_homepage_slider_cb() {
	$beetech_slider_option = get_theme_mod( 'homepage_slider_option', 'hide' );
	$beetech_slider_cat_id = get_theme_mod( 'slider_cat_id', '0' );
	if( $beetech_slider_option != 'hide' && !empty( $beetech_slider_cat_id ) ) {
?>
		<div id="section-slider" class="bt-front-slider-wrapper">
			<?php
				$beetech_slider_args = array(
									'category__in' => absint($beetech_slider_cat_id),
									'posts_per_page' => 5
									);
				$beetech_slider_query = new WP_Query( $beetech_slider_args );
				if( $beetech_slider_query->have_posts() ) {
					echo '<ul class="frontSlider">';
					while( $beetech_slider_query->have_posts() ) {
						$beetech_slider_query->the_post();
						$image_id = get_post_thumbnail_id();
						$image_path = wp_get_attachment_image_src( $image_id, 'full', true );
						if( has_post_thumbnail() ) {

		?>
						<div class="single-slide-wrap" style="background-image: url('<?php echo esc_url( $image_path[0] ); ?>');">
							<div class="slider-info">
								<div class="bt-wrapper">
									<h2 class="slider-title"><?php the_title(); ?></h2>
									<div class="slider-desc"><?php the_excerpt(); ?></div>
									<span class="slide-button">
										<a href="<?php the_permalink(); ?>"><?php esc_html_e( 'Learn More', 'beetech' ); ?></a>										
									</span>
								</div>
							</div><!-- .slider-info -->
						</div><!-- .single-slide-wrap -->
		<?php
						}
					}
					echo '</ul>';
				}
                wp_reset_postdata();
			?>
			
		</div><!-- .bt-front-slider-wrapper -->
<?php
	}
}
endif;

add_action( 'beetech_homepage_slider', 'beetech_homepage_slider_cb', 10 );

 /** Inner header Function **/

if( ! function_exists( 'beetech_innerpage_header_cb' ) ):
	function beetech_innerpage_header_cb() {
		
?>
 	<div class="bt-innerpages-header-wrapper" style="background-image: url(<?php header_image(); ?>);">
 		<div class="bt-wrapper">
	 		<header class="entry-header">
				<?php
					if( is_archive() ) {
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="taxonomy-description">', '</div>' );
					} elseif( is_single() && 'post' === get_post_type() ) {
						$post_category = get_the_category();
						$first_cat_name = $post_category[0]->name;
						echo '<h1 class="page-title">'. esc_attr($first_cat_name) .'</h1>';
					} elseif( is_page() ) {
						the_title( '<h1 class="entry-title">', '</h1>' );
					} elseif( is_search() ) {
				?>
						<header class="entry-header">
							<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'beetech' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .page-header -->
				<?php
					}
					
					beetech_breadcrumbs();
				?>
			</header><!-- .entry-header -->
		</div><!-- .bt-wrapper -->
 	</div><!-- .bt-innerpages-header-wrapper -->
<?php
	}
endif;

add_action( 'beetech_innerpage_header', 'beetech_innerpage_header_cb' );


/** Category Array **/
$beetech_raw_categories = get_categories();
foreach ( $beetech_raw_categories  as $categories ) {
	$beetech_categories[$categories->slug] = $categories->name;
}

/** Sidebar **/
if( ! function_exists( 'beetech_get_sidebar' ) ):
function beetech_get_sidebar() {
    $sidebar_meta_option = 'right_sidebar';
    global $post;
    if(is_archive()) {
        $sidebar_meta_option = get_theme_mod( 'beetech_archive_sidebar_layout', 'right_sidebar' );
        if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
            get_sidebar();
        }
        
        if($sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == 'left_sidebar'){
            get_sidebar( 'left' );
        }
        
    }else{
        
        if( 'post' === get_post_type() ) {
            $sidebar_meta_option = get_post_meta( $post->ID, 'beetech_post_sidebar_layout', true );
        }
    
        if( 'page' === get_post_type() ) {
        	$sidebar_meta_option = get_post_meta( $post->ID, 'beetech_post_sidebar_layout', true );
        }
         
        if( is_home() ) {
            $set_id = get_option( 'page_for_posts' );
    		$sidebar_meta_option = get_post_meta( $set_id, 'beetech_post_sidebar_layout', true );
        }
        
        if( $sidebar_meta_option == 'right_sidebar' || $sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == '') {
            get_sidebar();
        }
        
        if($sidebar_meta_option == 'both_sidebar' || $sidebar_meta_option == 'left_sidebar'){
            get_sidebar( 'left' );
        }
        
    }
}
endif;



function beetech_sanitize_bradcrumb($input){
    $all_tags = array(
        'a'=>array(
            'href'=>array()
        )
     );
    return wp_kses($input,$all_tags);
    
}
function beetech_breadcrumbs(){
	/* === OPTIONS === */
	$text['home']     = esc_html__( 'Home', 'beetech' ); // text for the 'Home' link
	$text['category'] = '%s'; // text for a category page
	$text['tax'] 	  = '%s'; // text for a taxonomy page
	$text['search']   = esc_html__( 'Search Results for "%s" Query', 'beetech' ); // text for a search results page
	$text['tag']      = '%s'; // text for a tag page
	$text['author']   = '%s'; // text for an author page
	$text['404']      = '404'; // text for the 404 page
	$showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
	$showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
	$delimiter   = ' &sol; '; // delimiter between crumbs
	$before      = '<span class="current">'; // tag before the current crumb
	$after       = '</span>'; // tag after the current crumb
	/* === END OF OPTIONS === */
	global $post;
	$homeLink = esc_url(home_url() . '/');
	$linkBefore = '<span typeof="v:Breadcrumb">';
	$linkAfter = '</span>';
	$linkAttr = ' rel="v:url" property="v:title"';
	$link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;
	if (is_home() || is_front_page()) {
		if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';
	} else {
		echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;
		
		if ( is_category() ) {
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;
		} elseif( is_tax() ){
			$thisCat = get_category(get_query_var('cat'), false);
			if ($thisCat->parent != 0) {
				$cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
			}
			echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;
		
		}elseif ( is_search() ) {
			echo $before . sprintf($text['search'], get_search_query()) . $after;
		} elseif ( is_day() ) {
			echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), esc_attr(get_the_time('Y'))) . $delimiter;
			echo sprintf($link, esc_url(get_month_link(get_the_time('Y')),esc_attr(get_the_time('m'))), esc_attr(get_the_time('F'))) . $delimiter;
			echo $before . esc_attr(get_the_time('d')) . $after;
		} elseif ( is_month() ) {
			echo sprintf($link, esc_url(get_year_link(get_the_time('Y'))), esc_attr(get_the_time('Y'))) . $delimiter;
			echo $before . esc_attr(get_the_time('F')) . $after;
		} elseif ( is_year() ) {
			echo $before . esc_attr(get_the_time('Y')) . $after;
		} elseif ( is_single() && !is_attachment() ) {
			if ( get_post_type() != 'post' ) {
				$post_type = get_post_type_object(get_post_type());
				$slug = $post_type->rewrite;
				printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
				if ($showCurrent == 1) echo $delimiter . $before . esc_attr(get_the_title()) . $after;
			} else {
				$cat = get_the_category(); $cat = $cat[0];
				$cats = get_category_parents($cat, TRUE, $delimiter);
				if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
				$cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
				$cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
				echo $cats;
				if ($showCurrent == 1) echo $before . esc_attr(get_the_title()) . $after;
			}
		} elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
			$post_type = get_post_type_object(get_post_type());
			echo $before . esc_attr($post_type->labels->singular_name) . $after;
		} elseif (is_attachment()) {
            if ($showCurrent == 1) echo ' ' . $before . esc_attr(get_the_title()) . $after;
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1)
                echo $before . esc_attr(get_the_title()) . $after;
        } elseif (is_page() && $post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . esc_url(get_permalink($page->ID)) . '">' . esc_attr(get_the_title($page->ID)) . '</a>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo beetech_sanitize_bradcrumb($breadcrumbs[$i]);
                if ($i != count($breadcrumbs) - 1)
                    echo ' ' . $delimiter. ' ';
            }
            if ($showCurrent == 1)
                echo ' ' . $delimiter . ' ' . $before . esc_attr(get_the_title()) . $after;
        } elseif ( is_tag() ) {
			echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;
		} elseif ( is_author() ) {
	 		global $author;
			$userdata = get_userdata($author);
			echo $before . sprintf($text['author'], $userdata->display_name) . $after;
		} elseif ( is_404() ) {
			echo $before . $text['404'] . $after;
		}
		if ( get_query_var('paged') ) {
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
			echo esc_html__( 'Page', 'beetech' ) . ' ' . get_query_var('paged');
			if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
		}
		echo '</div>';
	}
}