<form method="get" class="searchform" action="<?php echo CHIP_LIFE_HOME; ?>" >
  <div>
    <label class="screen-reader-text" for="s">Search for:</label>
    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
    <input type="image" id="searchsubmit" src="<?php echo CHIP_LIFE_IMAGES_WSROOT; ?>searchbtn.gif" />
  </div>
</form>