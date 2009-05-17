<div id="before_title"><h1><?php _e('Search','artsavius'); ?></h1></div>
<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php the_search_query(); ?>" name="s" id="s" /></div>
<div><input type="submit" id="searchsubmit" value="<?php _e('Find','artsavius'); ?>" /></div>
</form>