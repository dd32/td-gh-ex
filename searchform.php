<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
  <label class="hidden" for="s"><?php _e('Search for:', 'theme'); ?></label>
  <input type="text" value="<?php If (get_search_query()) the_search_query(); Else _e('Search'); ?>" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="<?php _e('Search', 'theme'); ?>" />
</form>