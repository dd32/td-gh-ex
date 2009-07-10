<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

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
		echo '</a><img src="http://www.ieub.org/wp-content/themes/ieubistique/images/background.png" alt="in"></img>&nbsp;';
		if (is_category() || is_single()) {
			the_category('title_li=');
			if (is_single()) {
				echo '<img src="http://www.ieub.org/wp-content/themes/ieubistique/images/background.png" alt="in"></img>&nbsp;&nbsp;&nbsp;';
				the_title();
			}
		} elseif (is_page()) {
			echo the_title();
		}
	}
}
?>
