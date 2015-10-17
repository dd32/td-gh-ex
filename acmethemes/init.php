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
/**
 * Customizer additions.
 */
$acmeblog_customizer_file_path = acmeblog_file_directory('acmethemes/customizer/customizer.php');
require $acmeblog_customizer_file_path;


/**
 * Include Functions
 */
$acmeblog_date_display_file_path = acmeblog_file_directory('acmethemes/functions.php');
require $acmeblog_date_display_file_path;

/**
 * Include Hooks
 */
$acmeblog_hooks_header_file_path = acmeblog_file_directory('acmethemes/hooks/header.php');
require $acmeblog_hooks_header_file_path;

$acmeblog_hooks_footer_file_path = acmeblog_file_directory('acmethemes/hooks/footer.php');
require $acmeblog_hooks_footer_file_path;

$acmeblog_comment_form_file_path = acmeblog_file_directory('acmethemes/hooks/comment-forms.php');
require $acmeblog_comment_form_file_path;

$acmeblog_excerpts_form_file_path = acmeblog_file_directory('acmethemes/hooks/excerpts.php');
require $acmeblog_excerpts_form_file_path;

$acmeblog_related_posts_file_path = acmeblog_file_directory('acmethemes/hooks/related-posts.php');
require $acmeblog_related_posts_file_path;

/**
 * Include sidebar and widgets
 */
$acmeblog_sidebar = acmeblog_file_directory('acmethemes/sidebar-widget/sidebar.php');
require $acmeblog_sidebar;

/*core functions imported from functions.php*/
$acmeblog_sidebar = acmeblog_file_directory('acmethemes/core.php');
require $acmeblog_sidebar;