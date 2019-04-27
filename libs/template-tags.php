<?php
/**
 *  Template Tags
 */

// Show Date
if( ! function_exists( "bnw_theme_meta_date" ) ):

    function bnw_theme_meta_date(){

        $archive_year  = get_the_time('Y'); 
        $archive_month = get_the_time('m'); 
        $archive_day   = get_the_time('d');
        $date_link = get_day_link( $archive_year, $archive_month, $archive_day);
        $date = get_the_date();

        echo sprintf ( __( 'On <a href="%1$1s">%2$2s</a>' , "bnw-theme" ), $date_link , $date );
    
    }

endif;

// Show Author 
if (! function_exists ( "bnw_theme_meta_author" ) ):

    function bnw_theme_meta_author(){
        $author_link =  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ;
        $author = get_the_author();

        echo sprintf ( __( 'By <a href="%1$s">%2$s</a>' , "bnw-theme" ), $author_link , $author );
    }   

endif;

// Show Comment popup link
if (! function_exists ( "bnw_theme_comment_link" ) ):

    function bnw_theme_comment_link(){
        
        comments_popup_link( __( 'No comments', "bnw-theme" ) , '1 comment', '% comments', 'comments-link', 'Comments Off' );
        
    }

endif;

// Show post edit link
if (! function_exists ( "bnw_theme_edit_link" ) ):

    function bnw_theme_edit_link(){
        $post_edit_link = esc_url( get_edit_post_link() );

        echo sprintf ( __( '<a href="%s">Edit</a>' , "bnw-theme" ) , $post_edit_link );
    }

endif;

// Show category lists 
if (! function_exists ( "bnw_theme_meta_cat_list" ) ):

    function bnw_theme_meta_cat_list(){
		//$separate_meta = __( '', "bnw-theme" );
		$categories_list = get_the_category_list();
        
        //echo  $categories_list;
        echo get_the_category_list();
    }

endif;

// Show tag list
if (! function_exists ( "bnw_theme_meta_tag_list" ) ):

    function bnw_theme_meta_tag_list(){
		//$separate_meta = __( '', "bnw-theme" );
		$tag_list = get_the_tag_list();
        
        //echo $tag_list;
        echo get_the_tag_list();
    }

endif;