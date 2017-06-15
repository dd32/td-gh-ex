<?php

// Register parent style

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );
    function enqueue_parent_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

// Register new page widget

function wpb_init_widgets_custom($id) {
    register_sidebar(array(
        'name' => 'Page Sidebar',
        'id'   => 'pagesidebar-1',
        'description' => 'Sidebar for pages.',
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>'
    ));
}
add_action('widgets_init','wpb_init_widgets_custom');

// Add credit to footer

add_action( 'twentysixteen_credits', 'twentysixteen_clean_design_credits_handler' );
    function twentysixteen_clean_design_credits_handler(){
    ?>
    Theme by <a href="https://www.websitehelper.co.uk" target="_blank">Websitehelper.co.uk</a> |
    <?php
}

// Twenty Sixteen Child Theme functions and definitions

require_once dirname(__FILE__ ) . '/inc/include-kirki.php';
require_once dirname(__FILE__ ) . '/inc/class-twentysixteen-child-kirki.php';
require_once dirname(__FILE__ ) . '/inc/customizer.php';


// Remove no-sidebar Body Class if user loads page

if (is_page('')) {
    add_filter('body_class', 'remove_body_class', 20, 2);
 
        function remove_body_class($wp_classes)
	        {
		        foreach($wp_classes as $key => $value)
			{
				if ($value == 'no-sidebar') unset($wp_classes[$key]); 
			}
 
		return $wp_classes;
	}
}










function custom_wp_trim_excerpt($text) {
$raw_excerpt = $text;
if ( '' == $text ) {
    //Retrieve the post content. 
    $text = get_the_content('');
 
    //Delete all shortcode tags from the content. 
    $text = strip_shortcodes( $text );
 
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
     
    $allowed_tags = ''; /*** MODIFY THIS. Add the allowed HTML tags separated by a comma.***/
    $text = strip_tags($text, $allowed_tags);
     
    $excerpt_word_count = 55; /*** MODIFY THIS. change the excerpt word count to any integer you like.***/
    $excerpt_length = apply_filters('excerpt_length', $excerpt_word_count); 
     
    $excerpt_end = '[...]'; /*** MODIFY THIS. change the excerpt endind to something else.***/
    $excerpt_more = apply_filters('excerpt_more', ' ' . $excerpt_end);
     
    $words = preg_split("/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
    if ( count($words) > $excerpt_length ) {
        array_pop($words);
        $text = implode(' ', $words);
        $text = $text . $excerpt_more;
    } else {
        $text = implode(' ', $words);
    }
}
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt);
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'custom_wp_trim_excerpt');
