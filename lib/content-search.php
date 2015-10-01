<br /><br /><span class = 'search'>
<form method = "get" action='<?php echo esc_url( home_url( '/' ) ); ?>'  name = "search">
<div id = "search-form">
<input type = "text" placeholder = "<?php _e('  Search','Afia'); ?>" id = "searchbox" name= "s">
<img onclick="search.submit();"  id = "search-img" src = "<?php echo esc_url( get_stylesheet_directory_uri( '/' ) );?>/assets/img/search.jpg"/>
</div>
</form></span>