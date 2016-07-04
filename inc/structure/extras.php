<?php

add_filter( 'body_class', 'bellini_body_classes' );

// Add Class to the body
function bellini_body_classes( $classes ) {
    if ( is_multi_author() ) { $classes[] = 'group-blog'; }
    if ( ! is_singular() ) { $classes[] = 'hfeed'; }
    if ( esc_attr(get_option('bellini_layout_single-post', 'layout-3')) == 'layout-3' && is_single() ){ $classes[] = 's__post--l3'; }
    return $classes;
}

// Check if left sidebar is active
function bellini_sidebar_active_left(){
    if (is_active_sidebar( 'sidebar-left' )){
        return true;
    }else{
        return false;
    }
}

// Check if right sidebar is active
function bellini_sidebar_active_right(){
    if (is_active_sidebar( 'sidebar-right' )){
        return true;
    }else{
        return false;
    }
}

/**
 * Query WooCommerce activation
 */
if ( ! function_exists( 'is_woocommerce_activated' ) ) {
    function is_woocommerce_activated() {
        return class_exists( 'woocommerce' ) ? true : false;
    }
}


/**
* Including class for sidebar widget css class
*/
function bellini_sidebar_content_class(){
    if ( is_singular() && bellini_sidebar_active_left() && bellini_sidebar_active_right() ){
        echo 'col-md-6';
    }elseif( is_singular() && bellini_sidebar_active_left()){
        echo 'col-md-9';
    }elseif( is_singular() &&  bellini_sidebar_active_right()){
        echo 'col-md-9';
    }else{
        echo 'col-md-12';
    }
}

function bellini_sidebar_widget_class(){
    if ( is_active_sidebar( 'sidebar-left' ) && is_active_sidebar( 'sidebar-right' ) ){
        echo 'widget-area--both';
    }else{
        echo 'default';
    }
}

function bellini_blog_sidebar(){
	if (is_active_sidebar( 'sidebar-blog' )){
		echo 'col-md-9';
	}else{
		echo 'col-md-12';
	}
}

/**
* Posts Category
*/
function bellini_category() {
    if ( 'post' === get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( '  |   ', 'bellini' ) );

        if ( $categories_list && bellini_categorized_blog() ) {
            printf( '<span class="post-meta__category category col-xs-12" rel="tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $categories_list ); // WPCS: XSS OK.
        }
    }
}

/**
* Prints HTML with meta information for the Tags
*/
function bellini_post_tag() {
    // Hide category and tag text for pages.
    if ( 'post' === get_post_type() ) {
        /* translators: used between list items, there is a space after the comma */
        $tags_list = get_the_tag_list( '', esc_html__( ' ', 'bellini' ) );
        if ( $tags_list ) {
            printf( '<span class="post-meta__tag__item" rel="category tag">' . esc_html__( '%1$s', 'bellini' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
    }
}

/**
* Prints Post published date
*/
function bellini_published_on() {
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
    if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
        $time_string ='<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time><time class="updated" datetime="%3$s" itemprop="dateModified">%4$s</time>';
    }
    $time_string = sprintf( $time_string,esc_attr( get_the_date( 'c' ) ),esc_html( get_the_date() ),esc_attr( get_the_modified_date( 'c' ) ),esc_html( get_the_modified_date() ));
    $posted_on = sprintf(esc_html_x( '%s', 'post date', 'bellini' ),'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>');
    
    echo '<span class="post-meta__time">' . $posted_on . '</span>';
}

/**
* Prints the total comment of a post
*/
function bellini_comment_count(){
    if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
        echo '<span class="comments-link">';
        comments_popup_link( esc_html__( 'Leave a comment', 'bellini' ), esc_html__( '1 Comment', 'bellini' ), esc_html__( '% Comments', 'bellini' ) );
        echo '</span>';
    }
}

/**
* Prints HTML with meta information for the current post-date/time and author.
*/
function bellini_post_author() {
    $byline = sprintf('<span class="fn n post-meta__author " itemprop="name"><a class="post-meta__author__link" itemprop="url" rel="author" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>');
    echo '<p class="vcard author post-meta__author" itemprop="author" itemscope="itemscope" itemtype="http://schema.org/Person"> ' . $byline . '</p>';
}


/**
* Edit Content
*/
function bellini_edit_content() {
    edit_post_link(sprintf(esc_html__( 'Edit %s', 'bellini' ),the_title( '<span class="screen-reader-text">"', '"</span>', false )),'<span class="edit-link">','</span>');
}

/**
* Returns true if a blog has more than 1 category.
*
* @return bool
*/
function bellini_categorized_blog() {
    if ( false === ( $all_the_cool_cats = get_transient( 'bellini_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
                                        'fields'     => 'ids',
                                        'hide_empty' => 1,
                                        // We only need to know if there is more than one category.
                                        'number'     => 2,
                                        ) 
    );
    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );
    set_transient( 'bellini_categories', $all_the_cool_cats );
    }

    if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so bellini_categorized_blog should return true.
        return true;
    } else {
    // This blog has only 1 category so bellini_categorized_blog should return false.
        return false;
    }
}

/**
* Flush out the transients used in bellini_categorized_blog.
*/
add_action( 'edit_category', 'bellini_category_transient_flusher' );
add_action( 'save_post',     'bellini_category_transient_flusher' );
function bellini_category_transient_flusher() {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    // Like, beat it. Dig?
    delete_transient( 'bellini_categories' );
}

/**
* If it doesn't have a featured image, set a default image as Post thumbnail
*/
function bellini_post_thumbnail(){
    if ( has_post_thumbnail() ) {
        the_post_thumbnail('bellini-thumb', array('class' => 'img-respponsive blog__post__image', 'itemprop' => 'image'));
    }else{?>
        <img itemprop="image" src="<?php if (get_option( 'bellini_post_featured_image' )) : echo get_option( 'bellini_post_featured_image'); else: echo get_template_directory_uri() . '/images/featured-image.jpg'; endif; ?>" class="img-responsive blog__post__image" alt="<?php the_title(); ?>" />
    <?php }
}

/**
* Add class to the next page div
*/
add_filter('next_posts_link_attributes', 'bellini_next_page_add_class');
function bellini_next_page_add_class() {
    return 'class="bellini__pagination--np__next"';
}

/**
* Add class to the pevious page div
*/
add_filter('previous_posts_link_attributes', 'bellini_previous_page_add_class');
function bellini_previous_page_add_class() {
    return 'class="bellini__pagination--np__previous"';
}

/**
* Bellini Pagination
*/
if ( ! function_exists( 'bellini_pagination' ) ) :
function bellini_pagination() {
    if(get_option('bellini_blog_pagination_type', 1) == 1):
        // Next & Previous Page Pagination
        echo '<div class="bellini__pagination--np col-md-12">';
        next_posts_link('Next Page', 0);
        previous_posts_link('Previous Page', 0);
        echo '</div>';
    endif;
    if(get_option('bellini_blog_pagination_type', 1) == 2):
        // Numeric Pagination
        echo '<div class="col-md-12">';
        the_posts_pagination();
        echo '</div>';
    endif;
    if(get_option('bellini_blog_pagination_type', 1) == 3):
        // Display Pagination using WP-PageNavi Plugin
        if ( function_exists('wp_pagenavi') ){
            wp_pagenavi();
        }
    endif;       
}
endif;


/**
* Prints Out Breadcrumbs
*/
if ( ! function_exists( 'bellini_breadcrumb_integration' ) ) :
function bellini_breadcrumb_integration() {
    if(get_option('bellini_show_page_breadcrumb', true) == true) : 
        // Breadcrumb NavXT
        if(get_option('bellini_page_breadcrumb_type', 1) == 1):
            if( function_exists('bcn_display') ) : ?>
                <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
                    <?php bcn_display(); ?>
                </div>
        <?php 
            endif;
        endif; 
        // Yoast Breadcrumb       
        if(get_option('bellini_page_breadcrumb_type', 1) == 2):
            if( function_exists('yoast_breadcrumb') ) :
                yoast_breadcrumb('<span class="breadcrumbs">','</span>');
            endif;
        endif;
        // WooCommerce Breadcrumb
        if(get_option('bellini_page_breadcrumb_type', 1) == 3):
            if( function_exists('woocommerce_breadcrumb') ) :
                woocommerce_breadcrumb();
            endif;
        endif;
        endif;
}
endif;


/**
* Prints Out Single Post thumbnail with Schema
*/
function bellini_single_post_thumbnail(){
    if ( has_post_thumbnail() ) {?>
        <figure itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
            <?php the_post_thumbnail('full', array('class' => 'img-responsive single-post__featured-image'));?>
            <?php
                $thumb_id = get_post_thumbnail_id();
                $thumb_url_array = wp_get_attachment_image_src($thumb_id, 'full', true);
                $thumb_url = $thumb_url_array[0];
                $thumb_width = $thumb_url_array[1];
                $thumb_height = $thumb_url_array[2];
            ?>
            <meta itemprop="url" content="<?php echo $thumb_url;?>">
            <meta itemprop="width" content="<?php echo $thumb_width;?>">
            <meta itemprop="height" content="<?php echo $thumb_height;?>">
        </figure>
    <?php }
}

/**
* Prints Out Class Whether the box should be wide or narrow
*/
function canvas_width($canvas){
	if ($canvas == 1){
		return 'bellini__canvas';
	}else{
		return 'bellini__canvas--fluid';
	}
}

/**
* Switches Two Column Image Content Width
*/
 function column_switcher_image($column){
	if ($column == 25){
		return 'col-sm-3';
	}elseif($column == 50){
		return 'col-sm-6';
	}elseif($column == 60){
		return 'col-sm-7';
	}elseif($column == 75){
		return 'col-sm-9';
	}else{
		return 'col-sm-12';
	}
}

/**
* Switches Two Column Content Width
*/
 function column_switcher_text($column){
	if ($column == 25){
		return 'col-sm-9';
	}elseif($column == 50){
		return 'col-sm-6';
	}elseif($column == 60){
		return 'col-sm-5';
	}elseif($column == 75){
		return 'col-sm-3';
	}else{
		return 'col-sm-12';
	}
}

/**
* Switches Two Column Content Width
*/
 function column_switcher_feature_box($column){
	if ($column == 1){
		return 'col-sm-12';
	}elseif($column == 2){
		return 'col-sm-6';
	}elseif($column == 3){
		return 'col-sm-4';
	}else{
		return 'col-sm-3';
	}
}

/**
* Switches Two Column Content Class
*/
function bellini_section_header_class_switcher($value){
    if ($value == 1){
        return 'col-md-12';
    }elseif($value == 2){
        return 'col-md-4';
    }else{
        return 'col-md-4 col-md-push-8';
    }
}

/**
* Switches Two Column Content Class
*/
function bellini_section_content_class_switcher($value){
    if ($value == 1){
        return 'col-md-12';
    }elseif($value == 2){
        return 'col-md-8';
    }else{
        return 'col-md-8 col-md-pull-4';
    }
}

/**
* Check & Prints out Scroll To Top if activated
*/
if(get_option('bellini_show_scroll_to_top', true) == true) :
 add_action( 'wp_footer', 'bellini_scroll_to_top' );   
    function bellini_scroll_to_top(){ ?>
        <script>
            // Scroll To Top
            jQuery(window).scroll(function(){
                if (jQuery(this).scrollTop() > 700) {
                    jQuery('.scrollToTop').fadeIn();
                } else {
                    jQuery('.scrollToTop').fadeOut();
                }
            });
            //Click event to scroll to top
            jQuery('.scrollToTop').click(function(){
                jQuery('html, body').animate({scrollTop : 0},1000);
                return false;
            });
        </script>
    <?php }
endif;


/**
* Changes Footer Column Count
*/
add_filter( 'bellini_widget_footer_column', 'bellini_footer_column_function' );

function bellini_footer_column_function( $class ) {
    if (get_option('bellini_footer_widget_column_selector', 3) == 1):
        $class = '<section id="%1$s" class="widget__after__content col-md-12 %2$s">';
        return $class;
    endif;
    if (get_option('bellini_footer_widget_column_selector', 3) == 2):
        $class = '<section id="%1$s" class="widget__after__content col-md-6 %2$s">';
        return $class;
    endif;
    if (get_option('bellini_footer_widget_column_selector', 3) == 3):
        $class = '<section id="%1$s" class="widget__after__content col-md-4 %2$s">';
        return $class;
    endif;
    if (get_option('bellini_footer_widget_column_selector', 3) == 4):
        $class = '<section id="%1$s" class="widget__after__content col-md-3 %2$s">';
        return $class;
    endif;
}