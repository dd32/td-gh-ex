<?php
/**
 * AcmeBlog functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AcmeThemes
 * @subpackage AcmeBlog
 */

/**
 * require int.
 */
$acmeblog_file_directory_init_file_path = trailingslashit( get_template_directory() ).'acmethemes/init.php';
require $acmeblog_file_directory_init_file_path;
