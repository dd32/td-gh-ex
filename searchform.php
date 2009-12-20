<?php
/**
  * @package WordPress
  * @subpackage A_Theme
*/
?><form method="get" class="sform" action="<?php bloginfo('url')?>/">
  <input type="text" value="<?php the_search_query();?>" name="s" class="s" />
  <input type="hidden" class="searchsub" value="" />
</form>
