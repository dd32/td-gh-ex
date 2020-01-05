<?php
/**
 * Filters
 *
 * The Agama theme static filters class.
 *
 * @package Theme Vision
 * @subpackage Agama
 * @since 1.5.0
 */

namespace Agama;

// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Filters {
    
    /**
     * Instance
     *
     * Single instance of this object.
     *
     * @since 1.5.0
     * @access public
     * @return null|object
     */
    public static $instance = null;
    
    /**
     * Get Instance
     *
     * Access the single instance of this class.
     *
     * @since 1.5.0
     * @access public
     * @return object
     */
    public static function get_instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    /**
     * Constructor
     *
     * The filter class constructor.
     *
     * @since 1.5.0
     * @access public
     * @return void
     */
    public function __construct() {
        
        add_filter( 'body_class', [ $this, 'body_class' ] );
        add_filter( 'excerpt_length', [ $this, 'excerpt_length' ], 999 );
        add_filter( 'excerpt_more', [ $this, 'excerpt_more' ] );
        add_filter( 'edit_post_link', [ $this, 'edit_post_link' ] );
        add_filter( 'edit_comment_link', [ $this, 'edit_comment_link' ] );
        
    }
    
    /**
     * Body Class
     *
     * Extend the default WordPress body classes.
     *
     * @param array $classes (required) The existing class values.
     *
     * @since 1.0.0
     * @since 1.5.0 Updated the code.
     * @return array Filtered class values.
     */
    function body_class( $classes ) {
        $background_color = esc_attr( get_background_color() );
        $background_image = esc_url( get_background_image() );
        $header 		  = esc_attr( get_theme_mod( 'agama_header_style', 'transparent' ) );
        $sidebar_position = esc_attr( get_theme_mod( 'agama_sidebar_position', 'right' ) );
        $blog_layout 	  = esc_attr( get_theme_mod('agama_blog_layout', 'list') );

        if( is_customize_preview() ) {
            $classes[] = 'customize-preview';
        }

        if( is_404() ) {
            $classes[] = 'vision-404';
        }

        // Header class.
        switch( $header ) {
            case 'transparent':
                $classes[] = 'header_v1';
            break;
            case 'default':
                $classes[] = 'header_v2';
            break;
            case 'sticky':
                $classes[] = 'header_v3 sticky_header';
            break;
        }

        // Sidebar position class.
        if( $sidebar_position == 'left' ) {
            $classes[] = 'sidebar-left';
        }

        // Blog layout class.
        switch( $blog_layout ) {
            case 'small_thumbs':
                $classes[] = 'blog-small-thumbs';
            break;
            case 'grid':
                $classes[] = 'blog-grid';
            break;
        }

        // Template full-width class.
        if( is_page_template( 'page-templates/template-full-width.php' ) ) { 
            $classes[] = 'template-full-width'; 
        }

        // Template fluid class.
        if( is_page_template( 'page-templates/template-fluid.php' ) ) { 
            $classes[] = 'template-fluid'; 
        }

        // Template empty class.
        if( is_page_template( 'page-templates/template-empty.php' ) ) {
            $classes[] = 'template-empty';
        }

        // Apply empty background class.
        if ( empty( $background_image ) ) {
            if ( empty( $background_color ) )
                $classes[] = 'custom-background-empty';
            elseif ( in_array( $background_color, [ 'fff', 'ffffff' ] ) )
                $classes[] = 'custom-background-white';
        }

        // Single author class.
        if ( ! is_multi_author() )
            $classes[] = 'single-author';

        return $classes;
    }
    
    /**
     * Excerpt Lenght
     *
     * Filters the maximum number of words in a post excerpt.
     *
     * @param num $length (required) The maximum number of words. Default 55.
     *
     * @since 1.0.0
     * @since 1.5.0 Updated the code.
     * @access public
     * @return num
     */
    public function excerpt_length( $length ) {
        $custom = esc_attr( get_theme_mod( 'agama_blog_excerpt', '60' ) );
        return $length = intval( $custom );
    }
    
    /**
     * Excerpt More
     *
     * Filters the string in the “more” link displayed after a trimmed excerpt.
     *
     * @param string $more_string (required) The string shown within the more link.
     *
     * @since 1.1.1
     * @since 1.5.0 Updated the code.
     * @access public
     * @return string
     */
    public function excerpt_more( $more_string ) {
        global $post;
        
        if( get_theme_mod( 'agama_blog_readmore_url', true ) ) {
            return sprintf(
                '<br><br><a class="more-link" href="%s">%s</a>', 
                esc_url( get_permalink( $post->ID ) ), 
                esc_html__( 'Read More', 'agama' )
            );
        }
        
        return;
    }
    
    /**
     * Edit Post Link
     *
     * Filters the post edit link anchor tag.
     *
     * @param mixed $link (required) Anchor tag for the edit link.
     *
     * @since 1.1.1
     * @since 1.5.0 Updated the code.
     * @access public
     * @return string
     */
    function edit_post_link( $link ) {
        $link = str_replace('class="post-edit-link"', 'class="button button-3d button-mini button-rounded"', $link );
        return $link;
    }
    
    /**
     * Edit Comment Link
     *
     * Filters the comment edit link anchor tag.
     *
     * @param mixed $link (required) Anchor tag for the edit link.
     *
     * @since 1.1.1
     * @since 1.5.0 Updated the code.
     * @access public
     * @return string
     */
    function edit_comment_link( $link ) {
        $link = str_replace( 'class="comment-edit-link"', 'class="button button-3d button-mini button-rounded"', $link );
        return $link;
    }
    
}

/* Omit closing PHP tag to avoid "Headers already sent" issues. */
