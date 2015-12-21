<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since acmeblog 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('acmeblog_file_directory') ){

    function acmeblog_file_directory( $file_path ){
        if( file_exists( trailingslashit( get_stylesheet_directory() ) . $file_path) ) {
            return trailingslashit( get_stylesheet_directory() ) . $file_path;
        }
        else{
            return trailingslashit( get_template_directory() ) . $file_path;
        }
    }

}
/*
* file for customizer theme options
*/
$acmeblog_customizer_file_path = acmeblog_file_directory('acmethemes/customizer/customizer.php');
require $acmeblog_customizer_file_path;


/*
* file for additional functions files
*/
$acmeblog_date_display_file_path = acmeblog_file_directory('acmethemes/functions.php');
require $acmeblog_date_display_file_path;

/*
* files for hooks
*/
$acmeblog_front_page_file_path = acmeblog_file_directory('acmethemes/hooks/front-page.php');
require $acmeblog_front_page_file_path;

$acmeblog_slider_selection_file_path = acmeblog_file_directory('acmethemes/hooks/slider-selection.php');
require $acmeblog_slider_selection_file_path;

$acmeblog_slider_side_file_path = acmeblog_file_directory('acmethemes/hooks/slider-side.php');
require $acmeblog_slider_side_file_path;

$acmeblog_hooks_header_file_path = acmeblog_file_directory('acmethemes/hooks/header.php');
require $acmeblog_hooks_header_file_path;

$acmeblog_social_links_file_path = acmeblog_file_directory('acmethemes/hooks/social-links.php');
require $acmeblog_social_links_file_path;

$acmeblog_hooks_dynamic_css_file_path = acmeblog_file_directory('acmethemes/hooks/dynamic-css.php');
require $acmeblog_hooks_dynamic_css_file_path;

$acmeblog_hooks_footer_file_path = acmeblog_file_directory('acmethemes/hooks/footer.php');
require $acmeblog_hooks_footer_file_path;

$acmeblog_comment_form_file_path = acmeblog_file_directory('acmethemes/hooks/comment-forms.php');
require $acmeblog_comment_form_file_path;

$acmeblog_excerpts_form_file_path = acmeblog_file_directory('acmethemes/hooks/excerpts.php');
require $acmeblog_excerpts_form_file_path;

$acmeblog_related_posts_file_path = acmeblog_file_directory('acmethemes/hooks/related-posts.php');
require $acmeblog_related_posts_file_path;

/*
* file for sidebar and widgets
*/
$acmeblog_acme_author_widget = acmeblog_file_directory('acmethemes/sidebar-widget/acme-author.php');
require $acmeblog_acme_author_widget;

$acmeblog_sidebar = acmeblog_file_directory('acmethemes/sidebar-widget/sidebar.php');
require $acmeblog_sidebar;

/*
* file for core functions imported from functions.php while downloading Underscores
*/
$acmeblog_sidebar = acmeblog_file_directory('acmethemes/core.php');
require $acmeblog_sidebar;