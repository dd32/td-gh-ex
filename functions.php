<?php

/* ENQUEUE JAVASCRIPT
--------------------------------------------------------------- */
if(!is_admin()) :
	add_action('wp_enqueue_scripts', 'autoadjust_js');
endif;
if(!function_exists('autoadjust_js')) :
	function autoadjust_js() {
		wp_enqueue_script('autoadjust-scripts', get_template_directory_uri() . '/js/autoadjust-scripts.js', array('jquery'), '1.0.0', false);
	}
endif;

/* AFTER SETUP THEME HOOK
--------------------------------------------------------------- */
add_action('after_setup_theme', 'autoadjust_setup');

if(!function_exists('autoadjust_setup')):
    function autoadjust_setup() {
		//Define content width
		if (!isset($content_width)) :
			$content_width = 900;
		endif;	
		//Localization support
	   	$locale = get_locale();
		$locale_file = get_template_directory().'/languages/$locale.php';
		if(is_readable($locale_file)) :
			require_once($locale_file);
		endif;
		load_theme_textdomain('autoadjust', get_template_directory().'/languages');
		//Add theme support for a custom stylesheet editor.
        add_editor_style();		
        //Add theme support for post and comment RSS feeds.
        add_theme_support('automatic-feed-links');		
		//Add theme support for custom-background.
		add_theme_support('custom-background');			
		//Add theme support for custom-header.
		add_theme_support('custom-header', array(
			'default-image'		=> get_template_directory_uri() . '/images/default-logo.png',
			'random-default'	=> false,
			'width'				=> 320,
			'height'			=> 107,
			'flex-height'		=> true,
			'flex-width'		=> true,
			'header-text'		=> false,
			'uploads'			=> true
		));	
		//Add theme support for JetPack infinite-scroll
		add_theme_support('infinite-scroll', array(
			'type'				=> 'scroll',
			'container'			=> 'content',
			'footer'			=> false,
			'wrapper'			=> true,
			'render'			=> false,
			'posts_per_page'	=> false
		));
		//Add theme support for post-thumbnails.
        add_theme_support('post-thumbnails');		
		//Add theme support for woocommerce.
		add_theme_support('woocommerce');	
		//Add theme support for custom-menus.
		register_nav_menus(array(
			'top-menu'			=> __('Top Menu', 'autoadjust'),
			'primary-menu'		=> __('Primary Menu', 'autoadjust'),
			'secondary-menu'	=> __('Secondary Menu', 'autoadjust'),
			'footer-menu'		=> __('Footer Menu', 'autoadjust'),
			'bottom-menu'		=> __('Bottom Menu', 'autoadjust')
		));
	}					
endif;

/* WIDIGITS INITIALIZATION
--------------------------------------------------------------- */
add_action('widgets_init', 'autoadjust_widgets_init');

if(!function_exists('autoadjust_widgets_init')):
	function autoadjust_widgets_init() {
		//Sidebar widgets
		register_sidebar(array(
			'name'          => __('Sidebar Widgets', 'autoadjust'),
			'id'            => 'sidebar-widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="title">',
			'after_title'   => '</h1>'
		));
		//Header widgets
		register_sidebar(array(
			'name'          => __('Header Widgets', 'autoadjust'),
			'id'            => 'header-widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="title">',
			'after_title'   => '</h1>'
		));
		//Footer widgets
		register_sidebar(array(
			'name'          => __('Footer Widgets', 'autoadjust'),
			'id'            => 'footer-widgets',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="title">',
			'after_title'   => '</h1>'
		));
	}
endif;

/* TITLE FILTER
--------------------------------------------------------------- */
function autoadjust_wp_title($title, $sep) {
	global $paged, $page;
	if (is_feed()) :
		return $title;
	endif;
	
	$title .= get_bloginfo( 'name' );

	$site_description = get_bloginfo('description', 'display');
	if ($site_description && (is_home() || is_front_page())) :
		$title = "$title $sep $site_description";
	endif;
	
	if ($paged >= 2 || $page >= 2) :
		$title = "$title $sep " . sprintf( __( 'Page %s', 'autoadjust' ), max( $paged, $page ) );
	endif;
	
	return $title;
}
add_filter('wp_title', 'autoadjust_wp_title', 10, 2);


/* GET LOGO
--------------------------------------------------------------- */
function autoadjust_get_logo() { ?>
	<div class="logo">
    	<a href="<?php echo home_url('/'); ?>">
			<?php if(!get_header_image()) : ?>
                <span class="name"><?php bloginfo('name'); ?></span><br />
                <span class="description"><?php bloginfo('description'); ?></span> 
            <?php elseif(get_header_image() != '') : ?>
                <img
                	src="<?php header_image(); ?>"
                	height="<?php echo get_custom_header()->height; ?>"
                    width="<?php echo get_custom_header()->width; ?>"
                    alt=""
                />
            <?php endif; ?>
    	</a>
    </div>
<?php }

/* INFINITE SCROLL
--------------------------------------------------------------- */
function autoadjust_scroll_is_supported() {
	$supported = current_theme_supports('infinite-scroll');
	return $supported;
}
add_filter('infinite_scroll_archive_supported', 'autoadjust_scroll_is_supported');

/* THE ENTRY THUMBNAIL
--------------------------------------------------------------- */
function autoadjust_entry_thumbnail() {
	if(has_post_thumbnail()) : ?>
        <div class="thumbnail">
        	<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a>
		</div>                     
	<?php endif;
}

/* ENTRY THE EDIT
--------------------------------------------------------------- */
function autoadjust_entry_edit() {
	if(current_user_can('edit_posts')) :
		echo '<span class="edit">';
		echo edit_post_link(__('(Edit)', 'autoadjust'));
		echo '</span>';
	endif;
}

/* BEFORE THE ENTRY
--------------------------------------------------------------- */
if(!function_exists('autoadjust_entry_before')) :
	function autoadjust_entry_before() {
		printf(__('<div class="%1$s"><span class="%2$s">Posted by %3$s</span><span class="%4$s">on %5$s</span></div>', 'autoadjust'),
		'before',
		'author',
		sprintf('<a href="%1$s">%2$s</a>',
			get_author_posts_url(get_the_author_meta('ID')),
			esc_attr(get_the_author())
		),
		'date',
		sprintf('%1$s',
			esc_html(get_the_date())
		));
	}	
endif;

/* LOOP NAVIGATION
--------------------------------------------------------------- */
function autoadjust_pagination() {
	if(class_exists('Jetpack') && Jetpack::is_module_active('infinite-scroll')) :
		//Infinite scroll is active
	else :
		get_template_part('pagination');
	endif;
}

/* AFTER THE ENTRY
--------------------------------------------------------------- */
if(!function_exists('autoadjust_entry_after')) :
	function autoadjust_entry_after() {
		if(comments_open() || has_tag() || has_category()) :
			echo '<div class="after">';
			autoadjust_entry_comments();
			autoadjust_entry_tags();
			autoadjust_entry_category();
			echo '</div>';
		endif;
	}
endif;

/* THE ENTRY COMMENTS
--------------------------------------------------------------- */
function autoadjust_entry_comments() {
	if(comments_open()) :
		echo '<span class="comments">';
		echo comments_number(__('No Comments', 'autoadjust'), __('One Comment', 'autoadjust'), __('% Comments', 'autoadjust'));
		echo '</span>';
	endif;
}

/* THE ENTRY TAGS
--------------------------------------------------------------- */
function autoadjust_entry_tags() {
	if(has_tag()) :
		echo '<span class="tags">';
		echo the_tags(__('Tagged with ', 'autoadjust') . ' ', ', ', '');
		echo '</span>';
	endif;
}

/* THE ENTRY CATEGORY
--------------------------------------------------------------- */
function autoadjust_entry_category() {
    if(has_category()) :
        echo '<span class="categories">';
		echo _e('Posted in ', 'autoadjust').the_category(', ');
		echo '</span>';
    endif;
}


function autoadjust_enqueue_comment_reply() {
	if(is_singular() && comments_open() && get_option('thread_comments')) { 
		wp_enqueue_script('comment-reply'); 
	}
}
add_action('wp_enqueue_scripts', 'autoadjust_enqueue_comment_reply');


?>