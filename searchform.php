<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<label class="hidden" for="s"><?php _e('Search for:'); ?></label>
<div><input type="text" name="s" id="s" value="Search..." onfocus="if(this.value=='Search...')this.value='';" onblur="if(this.value=='')this.value='Search...';" />
<!--<input type="submit" id="searchsubmit" value="Search" />-->
</div>
</form>
