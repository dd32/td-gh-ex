<?php

// Register Sidebars:
ForEach(Array( 'archive-date' => __('Archives').', '.__('Date'),
               'author'       => __('Author'),
               'category-tag' => __('Categories').', '.__('Tags'),
               'home'         => __('Home', 'theme'),
               'page'         => __('Pages'),
               'post'         => __('Posts'),
               'search-404'   => __('Search').', '.__('404').', '.__('Others', 'theme')
             ) AS $sidebar_id => $sidebar_name ){
  register_sidebar (Array( 'id'            => $sidebar_id,
                           'name'          => $sidebar_name,
                           'before_widget' => '<li id="%1$s" class="widget %2$s">',
                           'after_widget'  => '</li>',
                           'before_title'  => '<h2 class="widgettitle">',
                           'after_title'   => '</h2>' ));
}


/* End of File */