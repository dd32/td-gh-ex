<form method="get" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
  <label for="s" class="assistive-text">Search for:</label>
  <input type="text" class="field" name="s" id="s" value="<?php echo get_search_query(); ?>" />
  <input type="submit" class="submit" name="submit" id="searchsubmit" value="Search" />
  <div class="clear"></div>
</form>