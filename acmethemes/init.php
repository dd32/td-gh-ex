<?php
/**
 * Main include functions ( to support child theme )
 *
 * @since AcmePhoto 1.0.0
 *
 * @param string $file_path, path from the theme
 * @return string full path of file inside theme
 *
 */
if( !function_exists('acmephoto_file_directory') ){

    function acmephoto_file_directory( $file_path ){
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
$acmephoto_customizer_file_path = acmephoto_file_directory('acmethemes/customizer/customizer.php');
require $acmephoto_customizer_file_path;

/*
* file for additional functions files
*/
$acmephoto_functions_file_path = acmephoto_file_directory('acmethemes/functions.php');
require $acmephoto_functions_file_path;

/*
* files for hooks
*/
$acmephoto_slider_selection_file_path = acmephoto_file_directory('acmethemes/hooks/slider-selection.php');
require $acmephoto_slider_selection_file_path;

$acmephoto_hooks_header_file_path = acmephoto_file_directory('acmethemes/hooks/header.php');
require $acmephoto_hooks_header_file_path;

$acmephoto_social_links_file_path = acmephoto_file_directory('acmethemes/hooks/social-links.php');
require $acmephoto_social_links_file_path;

$acmephoto_hooks_dynamic_css_file_path = acmephoto_file_directory('acmethemes/hooks/dynamic-css.php');
require $acmephoto_hooks_dynamic_css_file_path;

$acmephoto_photography_file_path = acmephoto_file_directory('acmethemes/hooks/masonry.php');
require $acmephoto_photography_file_path;

$acmephoto_hooks_footer_file_path = acmephoto_file_directory('acmethemes/hooks/footer.php');
require $acmephoto_hooks_footer_file_path;

$acmephoto_comment_form_file_path = acmephoto_file_directory('acmethemes/hooks/comment-forms.php');
require $acmephoto_comment_form_file_path;

$acmephoto_excerpts_form_file_path = acmephoto_file_directory('acmethemes/hooks/excerpts.php');
require $acmephoto_excerpts_form_file_path;

$acmephoto_related_posts_file_path = acmephoto_file_directory('acmethemes/hooks/related-posts.php');
require $acmephoto_related_posts_file_path;

$acmephoto_ajax_pagination_file_path = acmephoto_file_directory('acmethemes/hooks/navigation.php');
require $acmephoto_ajax_pagination_file_path;

/*
* file for sidebar and widgets
*/
$acmephoto_acme_author_widget = acmephoto_file_directory('acmethemes/sidebar-widget/acme-author.php');
require $acmephoto_acme_author_widget;

$acmephoto_sidebar = acmephoto_file_directory('acmethemes/sidebar-widget/sidebar.php');
require $acmephoto_sidebar;

/*
* file for core functions imported from functions.php while downloading Underscores
*/
$acmephoto_sidebar = acmephoto_file_directory('acmethemes/core.php');
require $acmephoto_sidebar;