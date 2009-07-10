<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
if ( function_exists('register_sidebars') )
register_sidebars(2);

function readintro($filename)
{		
	$path = TEMPLATEPATH . '/' . $filename;
	if ( file_exists( $path ) )		
		print file_get_contents($path);
}

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));

function the_breadcrumb() {
	if (!is_home()) {
		echo '<a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a> | ";
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo " | ";
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}
?>
