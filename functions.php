<?php
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'sidebar1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
register_sidebar(array('name'=>'sidebar2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
));  

/* Add feeds */
add_theme_support('automatic-feed-links');

/* Content width */
if ( ! isset( $content_width ) )
	$content_width = 470;

/* Add search */
function my_search_form( $form ) {

    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <div><label class="screen-reader-text" for="s">' . __('') . '</label>
    <input type="text" size="30" value="' . get_search_query() . '" name="s" id="s" />
    <input type="submit" id="searchsubmit" class="formbutton" value="'. esc_attr__('Search') .'" />
    </div>
    </form>';

    return $form;
}

add_filter( 'get_search_form', 'my_search_form' );
?>