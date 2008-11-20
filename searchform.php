<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<div><input type="text" value="<?php if(is_search() ) { the_search_query(); } else { echo 'Search...'; } ?>" name="s" id="s" onfocus="if(this.value=='Search...')this.value='<?php the_search_query(); ?>'" onblur="if(this.value=='')this.value='Search...'" />
</div>
</form>